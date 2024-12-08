<?php 
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
    <div class="container-fluid vh-100 d-flex flex-column align-items-center justify-content-center">

        <div class="title-section w-25 border rounded p-3 shadow d-flex justify-content-center">
            <div class="me-2">
                <img src="../icon.png" class="img-thumbnail" alt="logo" style="height: 65px; width: 75px">
            </div>
            <div>
                <h3>Eslaya</h3>
                <small>Truck Dispatch System</small>
            </div>
        </div>
            
        <form id="login-form" class="border shadow rounded p-3 w-25 mt-3">
            <div class="container">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="login-username" class="form-label">Username</label>
                        <input type="text" id="login-username" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <lable for="login-password" class="form-label">Password</lable>
                        <input type="password" id="login-password" class="form-control">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                    <div class="col-12">
                        <div id="feedback">
                        </div>
                    </div>
                </div>
            </div>


        </form>
        
    </div>
</main>
<footer>

</footer>
</body>
</html>