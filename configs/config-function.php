<?php 
// config-function.php

    session_start();

// database initialization

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'capstone_project_db';
    $dbstatus = false;

    try {

        $conn = new mysqli($servername, $username, $password, $dbname);
        $dbstatus = true;

    } catch (mysqli_sql_exception) {
        exit();
    }

    define('ROOT', 'http://localhost/_capstone-project/');
    define('PATH', $_SERVER['DOCUMENT_ROOT'] . '\/_capstone-project/');

    if (isset($_POST['action'])) {

        if($dbstatus == true) {
            switch ($_POST['action']) {
                case 'register':
                    register();
                    break;
                case 'login':
                    login();
                    break;
                case 'logout':
                    logout();
                    break;
                case 'select account':
                    selectAccount($_POST['account_id']);
                    break;
                case 'delete account':
                    deleteAccount($_POST['account_id']);
                    break;
                case 'sidenav select':
                    sidenavSelect($_POST['selected']);
                    break;
                case 'get stocks':
                    getStocks();
                    break;
                case 'item add':
                    addItem();
                case 'stock add':
                    addStock();
                    break;
                case 'stock select':
                    selectStock($_POST['stock_id']);
                default:
                    break;
            };
        } 
        else { 
            echo (
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning!</strong> Something went wrong with the database connection.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            exit();
        }
    }

    function addStock() {
        global $conn;

        $item_id = $_POST['item_id'];
        $qty = $_POST['qty'];

        $stmt = $conn -> prepare ("UPDATE items SET quantity_in_stock = quantity_in_stock +? WHERE item_id =?");
        $stmt -> bind_param("ii", $qty, $item_id);

        if ($stmt -> execute()) {
            echo'success';
        } else  echo 'error';

        $stmt->close();

    }

    function getStocks () {
        global $conn;

        $stmt = $conn -> prepare("SELECT item_id, item_name, description, category, unit_of_measure, quantity_in_stock, price FROM items");
        $stmt -> execute();
        $result = $stmt -> get_result();

        $items = [];
        while ($row = $result -> fetch_assoc()) {
            $items[] = $row;
        }

        $_SESSION['items'] = $items;
        $stmt->close();
    }

    function addItem() {

        global $conn;

        $item_name = $_POST['item_name'];
        $item_category = $_POST['item_category'];
        $item_uom = $_POST['item_uom'];
        $item_price = $_POST['item_price'];
        $item_desc = $_POST['item_desc'];

        $stmt = $conn -> prepare ("INSERT INTO items (item_name, category, unit_of_measure, price, description) VALUES (?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssis", $item_name, $item_category, $item_uom, $item_price, $item_desc);

        if($stmt -> execute()){
            echo'success';
        }

        $stmt->close();
    }

    function register() {

        global $conn;

        $name = $_POST['name'];
        $password = $_POST['password'];
        $password_rep = $_POST['password_rep'];
        $acc_type = $_POST['acc_type'] == 'true' ? 1 : 0;

        // check: filled
        if (empty($name) || empty($password) || empty($password_rep)) {
            echo '<div class="alert alert-danger">All fields are required.</div>';
            exit();
        }

        // check: password
        if ($password!== $password_rep) {
            echo '<div class="alert alert-danger">Passwords do not match.</div>';
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $acc_type = $acc_type ? 'officer' : 'master';

        $stmt = $conn -> prepare ("INSERT INTO dispatch_officers (name, password, role) VALUES (?, ?, ?)");
        $stmt -> bind_param("sss", $name, $hashed_password, $acc_type);

        $stmt -> execute();

        getAccounts ();

        echo '<div class="alert alert-success">Registered successfully.</div>';

    }

    function getUserInfo($user_id) {

        global $conn;

        $stmt = $conn -> prepare("SELECT * FROM dispatch_officers WHERE id = ?");
        $stmt -> bind_param("i", $user_id);
        $stmt -> execute();
        $stmt -> bind_result($db_id, $db_name, $db_password, $db_created_at, $db_updated_at, $db_role);
        $stmt -> fetch();
        $stmt -> close();

        return array(
            'id' => $db_id,
            'name' => $db_name,
            'password' => $db_password,
            'role' => $db_role,
            'created_at' => $db_created_at,
            'updated_at' => $db_updated_at
        );
        
    }

    function getAccounts () {
        
        global $conn;

        $stmt = $conn -> prepare("SELECT id, name, role, created_at, updated_at FROM dispatch_officers");
        $stmt -> execute();
        $result = $stmt -> get_result();

        $officers = [];
        while ($row = $result -> fetch_assoc()) {
            $officers[] = $row;
        }

        // session_start();
        $_SESSION['officers'] = $officers;

    }

    function login() {

        global $conn;

        echo ' reached login function';

        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($name) || empty($password)) {
            echo '<div class="alert alert-danger">All fields are required.</div>';
            return;
        }

        $stmt = $conn -> prepare("SELECT id, password FROM dispatch_officers WHERE name = ?");
        $stmt -> bind_param("s", $name);
        $stmt -> execute();
        $stmt -> store_result();

        if ($stmt -> num_rows() > 0) {
            $stmt -> bind_result($db_id, $db_hashed_password);
            $stmt -> fetch();
            
            if (password_verify($password, $db_hashed_password)) {
                session_start();
                $userInfo = getUserInfo($db_id);
                $_SESSION['user_info'] = $userInfo;
                echo ($_SESSION['user_info']['name']);
                echo '<div class="alert alert-success">Login successful.</div>';

            } else { echo '<div class="alert alert-danger">Invalid credentials.</div>';}
        } else { echo '<div class="alert alert-danger">User not found.</div>'; }
    }

    function logout() {
        
        session_start();
        session_unset();
        session_destroy();
        
    }

    function selectAccount($info) {
        // session_start();
        $_SESSION['selected_account'] = $info;

    }

    function deleteAccount($id) {
        
        global $conn;
        $stmt = $conn -> prepare("DELETE FROM dispatch_officers WHERE id = ?");
        $stmt -> bind_param("i", $id);
        
        if ($stmt -> execute()) {
            echo 'success';
        } else  echo 'error';

    }

    // sidenav
    function sidenavSelect($selected) {

        if ($_SESSION['sidenav_active'] != $selected) {
            $_SESSION['sidenav_active'] = $selected;
            echo'success';
        } else echo 'failed';

    }

    function selectStock($selected) {
        
            $_SESSION['stock_active'] = $selected;
            echo'success';

    }