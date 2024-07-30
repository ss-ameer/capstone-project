<!-- page-dashboard.php -->
<?php 

    include_once('../configs/config-function.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!--styling -->
    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'styles/style.css' ?>">
    
    <!-- javascript -->
    <script src="<?php echo ROOT . 'imports/bootstrap/js/bootstrap.bundle.js'?>"></script>
    <script src="<?php echo ROOT . 'imports/jquery/jquery-3.7.1.min.js' ?>"></script>
    <?php include_once(PATH . 'configs/config-script.php'); ?>

</head>
<body>
<header> 
    
</header>
<main>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
        <div class="col mh-100 overflow-auto p-3 border">
            <p class="lead">Dashboard</p>
            <div class="container border rounded p-3">
                #<?= $_SESSION['user_info']['id'] ?>
                <?= $_SESSION['user_info']['name'] ?>
            </div>
            <div class="container rounded border p-3 px-0 d-flex">
                <div class="border rounded p-3">
                    Dispatch:
                </div>
                <div class="border rounded p-3">
                    Trucks:
                </div>
                <div class="border rounded p-3">
                    Drivers:
                </div>
                <div class="border rounded p-3">
                    Deliveries:
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
</body>
</html>