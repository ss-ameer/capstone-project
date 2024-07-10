<!-- page-master.php -->
<?php 
    session_start();
    include_once('../configs/config-function.php')
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
<?php include_once(PATH . 'components/comp-nav-side.php'); ?>
<!-- master list -->
<div class="col"> 
    <ul class="list-group">
    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-register">
            <a class="" href="#">Create an Account</a>
        </div>

        <div class="collapse" id="master-register">
            <hr>
            <!-- register form -->
            <?php include_once('../components/comp-form-register.php') ?>
        </div>        
    </li>

    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-view">
            <a class="" href="#">View Accounts</a>
        </div>

        <div class="collapse" id="master-view">
            <hr>
            <!-- view master list -->
            <?php // include_once('../components/comp-list-master.php') ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>test id</td>
                        <td>test name</td>
                        <td>test created</td>
                        <td>test updated</td>
                        <td>test role</td>
                    </tr>
                </tbody>
            </table>
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
