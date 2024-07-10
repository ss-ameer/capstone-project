<?php 
    session_start();

    include_once('../configs/config-function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
    <div class="container">
    <form id="login-form">
    <div class="">
        <label for="login-name" class="form-label">Name</label>
        <input type="text" id="login-name" class="form-control">
    </div>
    <div class="">
        <lable for="login-password" class="form-label">Password</lable>
        <input type="text" id="login-password" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Login</button>
    </form>
    <div id="feedback">
        <!-- where feedback will display -->
    </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>