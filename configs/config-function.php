<?php 
// config-function.php

    session_start();

    if (isset($_SESSION['user_info'])) {
        $officer_logged_in_id = $_SESSION['user_info']['id'];
        $officer_logged_in_name = $_SESSION['user_info']['name'];
    };

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
    define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/_capstone-project/');

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
                    $units = dbGetTableData('truck_types');
                    echo json_encode($units);
                    break;

                case 'add unit':
                    addUnit();
                    break;

                case 'add unit_type':
                    addUnitType();
                    break;

                case 'add driver':
                    addDriver();
                    break;
                
                case 'dispatch update order view':
                    $order_id = $_POST['order_id'];
                    $order_data = getOrderData($order_id);
                    echo json_encode($order_data);
                    break;
                
                case 'get dispatch form options':
                    $unit_type_id = $_POST['unit_type_id'];
                    $units = getUnitsFiltered($unit_type_id);
                    $drivers = getDrivers();

                    $options = [
                        'units' => $units,
                        'drivers' => $drivers
                    ];

                    echo json_encode($options);
                    break;

                case 'submit dispatch form':

                    $unit_id = $_POST['unit_id'];
                    $operator_id = $_POST['operator_id'];
                    $order_item_id = $_POST['order_item_id'];
                    $officer_id = $officer_logged_in_id;

                    $success = addDispatchRecord($order_item_id, $unit_id, $operator_id, $officer_id);

                    if ($success) {
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Failed to add dispatch record']);
                    }

                    break;

                case 'get dispatch pending orders':
                    
                    error_log("Action received: get dispatch pending orders");
                    echo getDispatchPendingOrdersHtml();
                    break;

                case 'update dispatch table':
                    
                    echo json_encode(getDispatchRecords());
                    break;

                case 'update dispatch status':
                    $dispatch_id = $_POST['dispatch_id'];
                    $new_status = $_POST['new_status'];

                    $results = updateDispatchStatus($dispatch_id, $new_status);
                
                    echo json_encode($results);
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

    $unit_types = dbGetTableData('truck_types');

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

            $insertItemQuery = "INSERT INTO order_items (order_id, item_id, price, item_total, truck_type_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn -> prepare($insertItemQuery);

            foreach($order_items as $item) {
                $item_id = $item['item_id'];
                $quantity = $item['quantity']; 
                $price = $item['price'];
                $unit_capacity = $item['unit_capacity'];
                $total = $price * $unit_capacity;
                $unit_type = $item['unit_type_id'];

                // Loop through each quantity and insert as individual items
                for ($i = 0; $i < $quantity; $i++) {
                    $stmt -> bind_param("iiddi", $order_id, $item_id, $price, $total, $unit_type);
                    $stmt -> execute();
                }
            }

            $stmt -> close();

            mysqli_commit($conn);
            echo json_encode(['status' => 'success', 'message' => 'Order saved successfully.']);

        } catch(Exception $e) {
            mysqli_rollback($conn);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
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

    function dbGetTableData($tableName, $columns = '*', $joins = '', $where = '', $orderBy = '') {
        global $conn;
    
        // Sanitize the table name and columns
        $tableName = mysqli_real_escape_string($conn, $tableName);
        $columns = is_array($columns) ? implode(', ', array_map(fn($col) => mysqli_real_escape_string($conn, $col), $columns)) : $columns;
    
        // Build the SQL query
        $sql = "SELECT $columns FROM $tableName" . 
            (!empty($joins) ? " $joins" : "") . 
            (!empty($where) ? " WHERE $where" : "") . 
            (!empty($orderBy) ? " ORDER BY $orderBy" : "");
    
        // Execute the query and fetch data
        $result = $conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
    
    

    function dbAddRecord($table, $data) {
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

        $result = false;
        
        if ($stmt -> execute()) {
            
            $result = true;
        }
        
        $stmt -> close();
        return $result;
    }

    function addUnit() {
        parse_str($_POST['formData'], $unitData);
        
        $unitData = [
            'truck_number' => $unitData['truck_number'],
            'truck_type_id' => $unitData['truck_type_id'],
            'status' => $unitData['status'],
        ];

        $result = dbAddRecord('trucks', $unitData);

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
    
        $result = dbAddRecord('truck_types', $unitTypeData);
    
        if ($result === true) {
            echo "success";
        } else {
            echo "error";
        }
    }

    function addDriver() {
        // Parse the serialized form data
        parse_str($_POST['formData'], $driverData);
    
        // Prepare data for insertion
        $driverData = [
            'first_name' => $driverData['first_name'],
            'last_name' => $driverData['last_name'],
            'license_number' => $driverData['license_number'],
            'phone_number' => $driverData['phone_number'],
            'status' => $driverData['status'],
        ];
    
        // Add the record to the 'drivers' table
        $result = dbAddRecord('drivers', $driverData);
    
        // Return success or error response
        if ($result === true) {
            echo "success";
        } else {
            echo "error";
        }
    }
    
    function getOrderData($orderId) {
        global $conn;
    
        // Fetch order details including client_id
        $columns = [
            'o.id', 
            'o.client_id', 
            'o.created_at', 
            'c.name AS client_name', 
            'a.city, a.barangay, a.street, a.house_number'
        ];
        $joins = "
            JOIN clients c ON o.client_id = c.client_id
            JOIN addresses a ON o.address_id = a.address_id
        ";
        $where = "o.id = " . intval($orderId);
        $orderDetails = dbGetTableData('orders o', $columns, $joins, $where);
    
        if (empty($orderDetails)) {
            return null; 
        }
    
        // Get the client_id for fetching contacts
        $clientId = $orderDetails[0]['client_id'];
    
        // Fetch phone number
        $phoneQuery = "
            SELECT contact_value 
            FROM contacts 
            WHERE client_id = ? AND contact_type = 'phone' LIMIT 1
        ";
        $stmt = $conn->prepare($phoneQuery);
        $stmt->bind_param('i', $clientId);
        $stmt->execute();
        $stmt->bind_result($phone);
        $stmt->fetch();
        $stmt->close();
        
        // Fetch email
        $emailQuery = "
            SELECT contact_value 
            FROM contacts 
            WHERE client_id = ? AND contact_type = 'email' LIMIT 1
        ";
        $stmt = $conn->prepare($emailQuery);
        $stmt->bind_param('i', $clientId);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->fetch();
        $stmt->close();
    
        $orderDetails[0]['phone'] = $phone;
        $orderDetails[0]['email'] = $email;
    
        $orderDetails[0]['full_address'] = 
            $orderDetails[0]['house_number'] . ', ' . 
            $orderDetails[0]['street'] . ' Street, ' . 
            $orderDetails[0]['barangay'] . ', ' . 
            $orderDetails[0]['city'];
    
        unset($orderDetails[0]['house_number'], $orderDetails[0]['street'], $orderDetails[0]['barangay'], $orderDetails[0]['city']);
    
        // Fetch order items with item name
        $columns = [ 
            'oi.price', 
            'oi.item_total', 
            'oi.status',
            'oi.id',
            'oi.truck_type_id', 
            'tt.type_name', 
            'i.item_name'
        ];
        $joins = "
            JOIN truck_types tt ON oi.truck_type_id = tt.id
            JOIN items i ON oi.item_id = i.item_id"; 
        $where = "oi.order_id = " . intval($orderId); 
        $orderItems = dbGetTableData('order_items oi', $columns, $joins, $where);
    
        // Return the combined result
        return [
            'order' => $orderDetails[0], 
            'items' => $orderItems
        ];
    }

    function getDrivers() {

        global $conn;

        $query = "
            SELECT id, name, status 
            FROM drivers 
            ORDER BY 
            CASE status
                WHEN 'available' THEN 1
                WHEN 'on_trip' THEN 2
                WHEN 'unavailable' THEN 3
            END ASC";
        
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            $drivers = [];
            while ($row = $result->fetch_assoc()) {
                $drivers[] = $row;
            }
            return $drivers; 
        }

        return []; 
    }

    function getUnits() {
        global $conn;

        $query = "SELECT id, truck_number, truck_type_id, status FROM trucks";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $trucks = [];
            while ($row = $result->fetch_assoc()) {
                $trucks[] = $row; 
            }
            return $trucks; 
        }

        return [];

    }

    function getUnitsFiltered($unit_type_id) {
        
        $trucks = getUnits();
    
        $filteredTrucks = array_filter($trucks, function($truck) use ($unit_type_id) {
            return $truck['truck_type_id'] == $unit_type_id; 
        });
    
        usort($filteredTrucks, function($a, $b) {
            $statusOrder = ['available' => 1, 'in_use' => 2, 'maintenance' => 3, 'out_of_service' => 4];
            return $statusOrder[$a['status']] - $statusOrder[$b['status']];
        });
    
        return $filteredTrucks; 
    }

    function addDispatchRecord($order_item_id, $unit_id, $operator_id, $officer_id) {

        $success = false;
        
        $insert_query = "INSERT INTO dispatch (order_item_id, truck_id, driver_id, dispatch_officer_id, status, created_at, updated_at) 
                        VALUES (?, ?, ?, ?, 'in-queue', NOW(), NOW())";
        
        if (dbExecuteQuery($insert_query, $order_item_id, $unit_id, $operator_id, $officer_id)) {
    
            $update_query = "UPDATE order_items SET status = ? WHERE id = ?";
            
            if (dbExecuteQuery($update_query, 'in-queue', $order_item_id)) {
                $success = true;
            }
        }
    
        return $success;
    }
    
    function getDispatchPendingOrdersHtml() {
    
        global $conn;
            $columns = ['o.id', 'o.client_id', 'o.created_at', 'c.name', 'o.status'];
            $joins = "JOIN clients c ON o.client_id = c.client_id";
            $where = "o.status = 'pending'";
            $orderBy = "o.created_at ASC";

            $pendingOrders = dbGetTableData('orders o', $columns, $joins, $where, $orderBy);

            $output = '<ul class="list-group" id="order-list-pending">';
            foreach ($pendingOrders as $order) {
                // Fetch counts for each status of order items
                $orderId = $order['id'];
                $query = "
                    SELECT 
                        SUM(status = 'pending') AS pending_count,
                        SUM(status = 'in-queue') AS in_queue_count, 
                        SUM(status = 'in-progress') AS in_progress_count, 
                        SUM(status = 'completed') AS completed_count,
                        SUM(status = 'failed') AS failed_count,
                        SUM(status = 'canceled') AS canceled_count
                    FROM order_items
                    WHERE order_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $orderId);
                $stmt->execute();
                $stmt->bind_result($pendingCount, $inQueueCount, $inProgressCount, $completedCount, $failedCount, $canceledCount);
                $stmt->fetch();
                $stmt->close();

                // Build the list item
                $output .= '<li class="list-group-item list-group-item-action text-center order" data-order-id="' . $order['id'] . '">
                    <div class="d-flex">
                        <div class="d-flex w-50">
                            <small class="text-body-secondary">' . sprintf('%04d', $order['id']) . '</small>
                            <div class="mx-2 text-nowrap overflow-x-auto">
                                <h6 class="">' . $order['name'] . '</h6>
                            </div>
                        </div>
                        <div class="w-50 d-flex justify-content-between">
                            <small id="order-list-pending-date">' . date("m/d/y", strtotime($order['created_at'])) . '</small>
                            <div>
                                <span class="badge text-bg-secondary">' . $pendingCount . '</span> 
                                <span class="badge text-bg-primary">' . $inQueueCount . '</span> 
                                <span class="badge text-bg-info">' . $inProgressCount . '</span> <br>
                                <span class="badge text-bg-success">' . $completedCount . '</span> 
                                <span class="badge text-bg-dark">' . $failedCount . '</span> 
                                <span class="badge text-bg-danger">' . $canceledCount . '</span> 
                            </div>
                        </div>
                    </div>
                </li>';
            }

        $output .= '</ul>';

        return $output; // Return the generated HTML
    }

    function dbExecuteQuery($query, ...$params) {
        global $conn;
    
        $stmt = $conn->prepare($query);
    
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
    
        if (!empty($params)) {
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i'; // Integer
                } elseif (is_double($param)) {
                    $types .= 'd'; // Double
                } elseif (is_string($param)) {
                    $types .= 's'; // String
                } else {
                    $types .= 'b'; // Blob and other types
                }
            }
    
            $stmt->bind_param($types, ...$params);
        }
    
        $result = $stmt->execute();
    
        $stmt->close();
    
        return $result;
    }
    
    function getDispatchRecords() {
        global $conn;
    
        $query = "SELECT d.*, 
                t.truck_number, 
                dr.id AS driver_id, 
                dr.name AS driver_name, 
                do.id AS officer_id, 
                do.name AS officer_name, 
                oi.item_id, 
                oi.item_total,
                i.item_name,
                o.id AS order_id
                FROM dispatch d
                JOIN trucks t ON d.truck_id = t.id
                JOIN drivers dr ON d.driver_id = dr.id
                JOIN dispatch_officers do ON d.dispatch_officer_id = do.id
                JOIN order_items oi ON d.order_item_id = oi.id
                JOIN items i ON oi.item_id = i.item_id
                JOIN orders o ON oi.order_id = o.id 
                ORDER BY d.created_at DESC";
        
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Initialize arrays for status groups
        $dispatches = [
            'in-queue' => [],
            'in-transit' => [],
            'successful' => [],
            'failed' => []
        ];
    
        // Group the results by their status
        while ($row = $result->fetch_assoc()) {
            $status = $row['status']; 
            if (array_key_exists($status, $dispatches)) {
                $dispatches[$status][] = $row; 
            }
        }
    
        $stmt->close();
    
        return $dispatches;
    }
    

    function updateDispatchStatus($dispatch_id, $new_status) {
        $update_query = "UPDATE dispatch SET status = ?, updated_at = NOW() WHERE id = ?";
        
        if (dbExecuteQuery($update_query, $new_status, $dispatch_id)) {
            
            $dispatch_data = dbGetTableData('dispatch', ['order_item_id', 'truck_id', 'driver_id'], '', "id = $dispatch_id");
            $order_item_id = $dispatch_data[0]['order_item_id'];
            $unit_id = $dispatch_data[0]['truck_id'];
            $driver_id = $dispatch_data[0]['driver_id'];
            
            switch ($new_status) {
                case 'in-queue':
                    $order_item_status = 'in-queue';
                    // $driver_status = 'available';
                    // $unit_status = 'available';

                    updateOrderItemStatus($order_item_id, $order_item_status);
                    // updateUnitStatus($unit_id, $unit_status);
                    // updateDriverStatus($driver_id, $driver_status);
                    break;

                case 'in-transit':
                    $unit_status = dbGetStatus('trucks', 'id', $unit_id);
                    $driver_status = dbGetStatus('drivers', 'id', $driver_id);
                    
                    if ($unit_status !== 'available' || $driver_status !== 'available') {
                        return ['success' => false, 'message' => 'Truck or Driver is not available for transit.'];
                    }

                    $order_item_status = 'in-progress';
                    $driver_status = 'on_trip';
                    $unit_status = 'in_use';

                    updateOrderItemStatus($order_item_id, $order_item_status);
                    updateUnitStatus($unit_id, $unit_status);
                    updateDriverStatus($driver_id, $driver_status);
                    break;

                case 'successful':
                    $order_item_status = 'completed';
                    $driver_status = 'available';
                    $unit_status = 'available';

                    updateOrderItemStatus($order_item_id, $order_item_status);
                    updateUnitStatus($unit_id, $unit_status);
                    updateDriverStatus($driver_id, $driver_status);
                    break;

                case 'failed':
                    $order_item_status = 'failed';
                    $driver_status = 'available';
                    $unit_status = 'available';
                    
                    updateOrderItemStatus($order_item_id, $order_item_status);
                    updateUnitStatus($unit_id, $unit_status);
                    updateDriverStatus($driver_id, $driver_status);
                    break;

                case 'remove':
                    removeDispatchRecord($dispatch_id);
                    break;

                default:
                    break;
            }
            
            return ['success' => true, 'message' => 'Dispatch status updated successfully.'];
        }
    
        return ['success' => false, 'message' => 'Failed to update dispatch status.'];
    }

    function updateOrderItemStatus($order_item_id, $new_status) {
        $update_order_query = "UPDATE order_items SET status = ? WHERE id = ?";
        dbExecuteQuery($update_order_query, $new_status, $order_item_id);
    };

    function updateUnitStatus($unit_id, $unit_status) {
        $update_truck_query = "UPDATE trucks SET status = ? WHERE id = ?";
        dbExecuteQuery($update_truck_query, $unit_status, $unit_id);
    };

    function updateDriverStatus($driver_id, $driver_status) {
        $update_driver_query = "UPDATE drivers SET status = ? WHERE id = ?";
        dbExecuteQuery($update_driver_query, $driver_status, $driver_id);
    };


    function removeDispatchRecord($dispatch_id) {
        $dispatch_data = dbGetTableData('dispatch', ['order_item_id'], '', "id = $dispatch_id");
    
        $order_item_id = $dispatch_data[0]['order_item_id'];
        $reset_order_query = "UPDATE order_items SET status = ? WHERE id = ?";
        dbExecuteQuery($reset_order_query, 'pending', $order_item_id);  

        $delete_dispatch_query = "DELETE FROM dispatch WHERE id = ?";
        dbExecuteQuery($delete_dispatch_query, $dispatch_id);
    };
    
    function dbGetStatus($table, $id_column, $id_value) {
        global $conn;
    
        $query = "SELECT status FROM $table WHERE $id_column = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_value);
        $stmt->execute();
        $stmt->bind_result($status);
        $stmt->fetch();
        $stmt->close();
    
        return $status;
    }
    