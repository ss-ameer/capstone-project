<!-- index.php -->
<?php

    session_start();

    include_once('./configs/config-function.php');

    if (isset($_SESSION['user_info'])) {
        if (isset($_SESSION['sidenav_active']) && isset($_SESSION['sidenav_selected'])) {
            if ($_SESSION['sidenav_active'] != $_SESSION['sidenav_selected']) {
                switch($_SESSION['sidenav_selected']) {
                    case 'master':
                        header('Location: pages/page-master.php');
                        break;
                    default:
                        break;
                }
            }
        }
        else { header('Location: pages/page-master.php'); }
        
    } else if (!isset($_SESSION['user_info'])) {
        header('Location: pages/page-login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <!--styling -->
    <link rel="stylesheet" href="./imports/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./imports/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/style.css">
    
    <!-- javascript -->
    <script src="./imports/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./imports/jquery/jquery-3.7.1.min.js"></script>
    <?php include_once('./configs/config-script.php'); ?>

</head>
<body>
    
<header>
    
</header>
<main>

</main>
<footer>
    <?php 
        if(isset($_SESSION['user_info']['name'])) {
            echo $_SESSION['user_info']['id'] . '<br/>';
            echo $_SESSION['user_info']['name'] . '<br/>';
            echo $_SESSION['user_info']['password'] . '<br/>';
            echo $_SESSION['user_info']['role'] . '<br/>';
            echo $_SESSION['user_info']['created_at'] . '<br/>';
            echo $_SESSION['user_info']['updated_at'] . '<br/>';
        }
    ?>
</footer>

</body>
</html>