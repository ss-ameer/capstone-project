<!-- config-function.php -->
<?php 

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

// account controlls

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'register' && $dbstatus == true) { 
            echo 'reached register';
            register(); 
        }
        else if ($_POST['action'] == 'login' && $dbstatus == true) {
            echo 'reached login';
            login(); 
        }
        else if ($_POST['action'] == 'logout' && $dbstatus == true) {
            echo 'reached logout';
            logout();
        }
    }

    function register() {

        global $conn;

        $name = $_POST['name'];
        $password = $_POST['password'];
        $password_rep = $_POST['password_rep'];
        $acc_type = $_POST['acc_type'] ? 1 : 0;

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
        
        $acc_type = $acc_type ? 'master' : 'regular';

        $stmt = $conn -> prepare ("INSERT INTO dispatch_officers (name, password, role) VALUES (?, ?, ?)");
        $stmt -> bind_param("sss", $name, $hashed_password, $acc_type);

        $stmt -> execute();

        echo 'Registered successfully.';

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

    // function getAccounts () {
        
    //     global $conn;

    //     $stmt = $conn -> prepare("SELECT id, name, role, created_at, updated_at FROM dispatch_officers");
    //     $stmt -> execute();
    //     $stmt -> bind_result($db_id, $db_name, $db_role, $db_created_at, $db_updated_at);

    // }

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

?>