<?php 

    $_SESSION['cms'] = [
        'main title' => getContentData('main_title'),
        'sub title' => getContentData('sub_title'),
    ];

    $cms = $_SESSION['cms'];

    if (isset($_POST['cms_action'])) {
        $action = $_POST['cms_action'];

        switch($action) {
            case 'content update':
                $result = setContentData($_POST['column'], $_POST['value']);
                echo json_encode(['status' => $result ? 'success' : 'error']);
                break;
        }
    };

    function getContentData($col) {
        global $conn;

        $stmt = $conn->prepare("SELECT `$col` FROM cms_content LIMIT 1");
        $stmt->execute();
        $stmt->bind_result($value);
        $stmt->fetch();

        return $value;
    };

    function setContentData($col, $value) {
        global $conn;
    
        $stmt = $conn->prepare("UPDATE cms_content SET `$col` = ? WHERE id = 1");
        $stmt->bind_param("s", $value);
        $success = $stmt->execute();
        $stmt->close();
    
        if ($success) {
            $_SESSION['cms'][$col] = $value;
        }
    
        return $success;
    }

?>