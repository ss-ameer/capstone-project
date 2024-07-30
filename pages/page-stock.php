<!-- page-stock.php -->
<?php 
    include_once('../configs/config-function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>

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
<main>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
        </div>
    </div>
</main>
</body>
</html>