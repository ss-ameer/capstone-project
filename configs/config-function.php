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
                    break;

                case 'stock add':
                    addStock();
                    break;

                case 'stock select':
                    selectStock($_POST['stock_id']);
                    break;

                case 'stock delete':
                    deleteStock($_POST['stock_id']);
                    break;

                case 'stock edit':
                    editStock();
                    break;

                case 'item search':
                    itemSearch();
                    break;

                case 'create order':
                    saveOrder();
                    break;

                case 'client search':
                    searchClients();
                    break;

                case 'get client info':
                    getClientInfo();
                    break;

                case 'get units info':
                    $units = getTableData('truck_types');
                    echo json_encode($units);
                    break;

                case 'add unit':
                    addUnit();
                    break;

                case 'add unit_type':
                    addUnitType();
                    break;

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

    $unit_types = getTableData('truck_types');

    function itemSearch() {
        global $conn;
        $query = $_POST['query'];

        $sql = "SELECT * FROM items WHERE item_name LIKE ?";
        $stmt = $conn -> prepare($sql);
        $search_param = "%" . $query . "%";
        $stmt -> bind_param("s", $search_param);
        $stmt -> execute();
        $result = $stmt -> get_result();

        $items = [];
        while ($row = $result -> fetch_assoc()) {
            $items[] = $row;
        }

        echo json_encode($items);
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

    function editStock() {
        global $conn;

        $stock_id = $_POST['stock_id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $uom = $_POST['uom'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("UPDATE items SET item_name = ?, category = ?, unit_of_measure = ?, price = ?, description = ? WHERE item_id = ?");
        $stmt->bind_param("sssisi", $name, $category, $uom, $price, $description, $stock_id);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
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
                echo $_SESSION['user_info']['name'];
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

    function deleteStock($id){
        
        global $conn;
        $stmt = $conn -> prepare("DELETE FROM items WHERE item_id = ?");
        $stmt -> bind_param("i", $id);
        
        if ($stmt -> execute()) {
            echo 'success';
        } else  echo 'error';
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
        } else {
            echo 'failed ';
        }
    }

    function selectStock($selected) {
        
            $_SESSION['stock_active'] = $selected;
            echo'success';

    }

    // orders
    function saveOrder() {
        
        global $conn;

        mysqli_begin_transaction($conn);

        try {
            // client information
            $client_name = $_POST['client_name'];
            $client_number = $_POST['client_number'];
            $client_email = $_POST['client_email'];

            $checkClientQuery = "SELECT client_id FROM clients WHERE name = ?";
            $stmt = $conn -> prepare($checkClientQuery);
            $stmt -> bind_param("s", $client_name);
            $stmt -> execute();
            $stmt -> store_result();

            if ($stmt -> num_rows > 0) {
                $stmt -> bind_result($client_id);
                $stmt -> fetch();
                
                // contact information
                // checking mobile number
                $checkContactQuery = "SELECT id FROM contacts WHERE client_id = ? AND contact_type = ? AND contact_value = ?";
                $stmt = $conn -> prepare($checkContactQuery);

                $contactType = 'phone';
                $stmt -> bind_param("isi", $client_id, $contactType, $client_number);
                $stmt -> execute();
                $stmt -> store_result();

                // inserting if number does not exist
                if ($stmt -> num_rows == 0) {
                    $insertContactQuery = "INSERT INTO contacts (client_id, contact_type, contact_value) VALUES (?,?, ?)";
                    $stmt = $conn -> prepare($insertContactQuery);
                    $stmt -> bind_param("isi", $client_id, $contactType, $client_number);
                    $stmt -> execute();
                }

                // checking email address
                $contactType = 'email';
                $stmt -> bind_param("iss", $client_id, $contactType, $client_email);
                $stmt -> execute();
                $stmt -> store_result();

                if ($stmt -> num_rows == 0) {
                    $insertContactQuery = $stmt = $conn -> prepare($insertContactQuery);
                    $stmt -> bind_param("iss", $client_id, $contactType, $client_email);
                    $stmt -> execute();
                }

            } else {
                // insert a new client
                $insertClientQuery = "INSERT INTO clients (name) VALUES (?)";
                $stmt = $conn -> prepare($insertClientQuery);
                $stmt -> bind_param("s", $client_name);
                $stmt -> execute();
                $client_id = $conn -> insert_id;

                $insertContactQuery = "INSERT INTO contacts (client_id, contact_type, contact_value) VALUES (?, ?, ?)";
                
                // phone number
                $contactType = 'phone';
                $stmt = $conn->prepare($insertContactQuery);
                $stmt->bind_param("iss", $client_id, $contactType, $client_number);
                $stmt->execute();

                // email
                $contactType = 'email';
                $stmt = $conn->prepare($insertContactQuery);
                $stmt->bind_param("iss", $client_id, $contactType, $client_email);
                $stmt->execute();
            }

            // address information
            $city = $_POST['address']['city'];
            $barangay = $_POST['address']['barangay'];
            $street = $_POST['address']['street'];
            $number = $_POST['address']['number'];

            $checkAddressQuery = "SELECT address_id FROM addresses WHERE client_id = ? AND city = ? AND barangay = ? AND street = ? AND house_number = ?";
            $stmt = $conn -> prepare($checkAddressQuery);
            $stmt -> bind_param("issss", $client_id, $city, $barangay, $street, $number);
            $stmt -> execute();
            $stmt -> store_result();

            if ($stmt -> num_rows() > 0) {
                $stmt -> bind_result($address_id);
                $stmt -> fetch();
            } else {
                $insertAddressQuery = 'INSERT INTO addresses (client_id, city, barangay, street, house_number) VALUES (?, ?, ?, ?, ?)';
                $stmt = $conn -> prepare($insertAddressQuery);
                $stmt -> bind_param("issss", $client_id, $city, $barangay, $street, $number);
                $stmt -> execute();
                $address_id = $conn -> insert_id;
            }

            // order information
            $total_amount = $_POST['total_amount'];
            $total_qty = $_POST['total_qty'];
            $insertOrderQuery = "INSERT INTO orders (client_id, address_id, total_qty, total_amount) VALUES (?, ?, ?, ?)";
            $stmt = $conn -> prepare($insertOrderQuery);
            $stmt -> bind_param("iiid", $client_id, $address_id, $total_qty, $total_amount);
            $stmt -> execute();
            $order_id = $conn -> insert_id;

            // order item information
            $order_items = $_POST['items'];

            foreach($order_items as $item) {
                $item_id = $item['item_id'];
                $quantity = $item['quantity'];
                $price = $item['price'];
                $total = $item['total'];

                $insertItemQuery = "INSERT INTO order_items (order_id, item_id, quantity, price, item_total) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn -> prepare($insertItemQuery);
                $stmt -> bind_param("iiidd", $order_id, $item_id, $quantity, $price, $total);
                $stmt -> execute();
            }

            $stmt -> close();

            mysqli_commit($conn);
            echo json_encode(['status' => 'success', 'message' => 'Order saved successfully.']);

        } catch(Exception $e) {
            mysqli_rollback($conn);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function getClientInfo() {
        global $conn;
        $client_id = $_POST['client_id'];

        $clientQuery = 
        "SELECT c.client_id, c.name,
            (SELECT contact_value FROM contacts WHERE client_id = c.client_id AND contact_type = 'phone' ORDER BY id DESC LIMIT 1) AS latest_phone,
            (SELECT contact_value FROM contacts WHERE client_id = c.client_id AND contact_type = 'email' ORDER BY id DESC LIMIT 1) AS latest_email,
            (SELECT a.city FROM addresses a WHERE a.client_id = c.client_id ORDER BY address_id DESC LIMIT 1) AS latest_city,
            (SELECT a.barangay FROM addresses a WHERE a.client_id = c.client_id ORDER BY address_id DESC LIMIT 1) AS latest_barangay,
            (SELECT a.street FROM addresses a WHERE a.client_id = c.client_id ORDER BY address_id DESC LIMIT 1) AS latest_street,
            (SELECT a.house_number FROM addresses a WHERE a.client_id = c.client_id ORDER BY address_id DESC LIMIT 1) AS latest_house_number
        FROM clients c
        WHERE c.client_id = ?";

        $stmt = $conn -> prepare($clientQuery);
        $stmt -> bind_param("i", $client_id);
        $stmt -> execute();
        $result = $stmt -> get_result();

        if ($result -> num_rows > 0) {
            $client_info = $result -> fetch_assoc();
            echo json_encode([
                'success' => true,
                'client_name' => $client_info['name'],
                'address' => [
                    'city' => $client_info['latest_city'],
                    'barangay' => $client_info['latest_barangay'],
                    'street' => $client_info['latest_street'],
                    'house_number' => $client_info['latest_house_number']
                ],
                'phone' => $client_info['latest_phone'],
                'email' => $client_info['latest_email']
            ]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    function searchClients() {
        global $conn;

        $query = $_POST['query'];
        $searchQuery = "SELECT * FROM clients WHERE name LIKE ? LIMIT 3";
        $stmt = $conn -> prepare($searchQuery);
        $searchTerm = '%' . $query . '%';
        $stmt -> bind_param("s", $searchTerm);
        $stmt -> execute();
        $result = $stmt -> get_result();

        $clients = [];
        while ($row = $result -> fetch_assoc()) {
            $clients[] = $row;
        }

        echo json_encode($clients);
    }

    function getTableData($tableName, $columns = '*') {
        global $conn;

        $tableName = mysqli_real_escape_string($conn, $tableName);

        if (is_array($columns)) {
            $columns = implode(', ', array_map(function($col) use ($conn) {
                return mysqli_real_escape_string($conn, $col);
            }, $columns));
        }

        $sql = "SELECT $columns FROM $tableName";
        $result = $conn -> query($sql);

        $data = [];
        
        while ($row = $result -> fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function addRecord($table, $data) {
        global $conn;

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $values = array_values($data);

        $types = "";
        foreach ($values as $value) {
            if (is_int($value)) {
                $types .= "i";
            } elseif (is_float($value)) {
                $types.= "d";
            } else {
                $types .= "s";
            };
        }

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $conn -> prepare($sql);

        if ($stmt === false) {
            die ("Prepare failed: " . $conn -> error);
        }

        $stmt -> bind_param($types, ...$values);
        
        if ($stmt -> execute()) {
            $stmt -> close();
            return true;
        } else {
            $stmt -> close();
            return false;
        }
        
    }

    function addUnit() {
        parse_str($_POST['formData'], $unitData);
        
        $unitData = [
            'truck_number' => $unitData['truck_number'],
            'truck_type_id' => $unitData['truck_type_id'],
            'status' => $unitData['status'],
        ];

        $result = addRecord('trucks', $unitData);

        if($result === true) {
            echo "success";
        } else {
            echo "error";
        };
    }

    function addUnitType() {
        parse_str($_POST['formData'], $unitTypeData);

        $unitTypeData = [
            'type_name' => $unitTypeData['type_name'],
            'capacity' => $unitTypeData['capacity']
        ];
    
        $result = addRecord('truck_types', $unitTypeData);
    
        if ($result === true) {
            echo "success";
        } else {
            echo "error";
        }
    }
