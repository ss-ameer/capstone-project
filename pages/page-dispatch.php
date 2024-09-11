<!-- page-dispatch.php -->
<?php

    include_once '../configs/config-function.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch</title>

    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'styles/style.css' ?>">
    
    <!-- javascript -->
    <script src="<?php echo ROOT . 'imports/bootstrap/js/bootstrap.bundle.js'?>"></script>
    <script src="<?php echo ROOT . 'imports/jquery/jquery-3.7.1.min.js' ?>"></script>
    <?php include_once(PATH . 'configs/config-script.php'); ?>
</head>
<body>
    <header></header>
    <main>
        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- sidebar -->
                <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
                <!-- main -->
                <div class="col mh-100 overflow-auto border">
                    <div class="container">

                        <div class="row">
                            <div class="col">
                                <span class="lead">Dispatch</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">

                                <h5>Pending Orders</h5>
                                <div id="order-list-container" class="container border shadow-sm p-3 rounded" style="max-height: 400px; height: 400px; overflow-y: auto;">
                                    <!-- pending orders list -->
                                    <?php include(PATH . 'components/comp-list-orders_pending.php'); ?>
                                </div>

                            </div>

                            <div class="col">
                                <div id="order-items-section">
                                    <!-- display here -->
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <?php include(PATH . 'components/comp-form-dispatch.php'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>
</body>
</html>