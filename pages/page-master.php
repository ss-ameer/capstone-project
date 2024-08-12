<!-- page-master.php -->
<?php 
    include_once('../configs/config-function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master</title>

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
<!-- sidebar -->
<?php include_once(PATH . 'components/comp-nav-side.php'); ?>
<!-- master list -->
<div class="col mh-100 overflow-auto p-3 border">
    <p class="lead">Master</p>
    <ul class="list-group">
    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-register">
            <a class="" href="#">Create an Account</a>
        </div>

        <div class="collapse container" id="master-register">
            <hr>
            <!-- register form -->
            <?php include_once('../components/comp-form-register.php') ?>
        </div>        
    </li>

    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-view">
            <!-- account view -->
            <a class="" href="#">View Accounts</a>
        </div>

        <div class="collapse container" id="master-view">
            <hr>
            <!-- officers table -->
            <?php include_once('../components/comp-table-officers.php') ?>
        </div>
    </li>

    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-stocks">
            <!-- manage stocks -->
            <a href="#" class="">Manage Stocks</a>
        </div>
        
        <div class="collapse container" id="master-stocks">
            <hr>
            <?php include_once('../components/comp-master-stock.php'); ?>
        </div>
    </li>

    </ul>
</div>
</div>
</div>

</main>
<footer>

</footer>
</body>
</html>
