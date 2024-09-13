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
    <?php include_once PATH . 'configs/config-script.php'; ?>
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
                                <p class="lead">Dispatch</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">

                                <div id="order-list-container" class="container border shadow-sm p-3 rounded" style="max-height: 400px; height: 400px; overflow-y: auto;">
                                    <!-- pending orders list -->
                                    <?php include(PATH . 'components/comp-list-orders_pending.php'); ?>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12">
                                <!-- show view -->
                                <div id="order-items-section" class="container border shadow-sm p-3 rounded position-relative" style="max-height: 400px; height: 400px; overflow-y: auto;">
                                    <!-- <div class="position-absolute top-0 end-0 m-2"> -->
                                        <!-- <i class="bi bi-x-circle"></i> -->
                                    <!-- </div> -->
                                    <div class="d-flex justify-content-between">
                                        <span class="lead">Order ID: 0001</span>
                                        <button type="button" class="btn-close" aria-label="Close"></button>
                                    </div>
                                    <hr>

                                    <div class="card mb-2 d-none">
                                        <div class="card-header">
                                            <h6 class="card-title">Client</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>name : </span><span>Syed Ameer Sibuma</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>number : </span><span>09656304264</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>email : </span><span>sibuma.syedameer@gmail.com</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-2">
                                        <div class="card-header">
                                            <h6 class="card-title">Location</h6>
                                        </div>
                                        <div class="card-body">                                    
                                            <div class="d-flex justify-content-between">
                                                <span>420, Sibuma Street, Plaridel, Llanera</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">Order Items</h6>
                                        </div>
                                        <div class="card-body">

                                            <ul class="list-group mb-2">
                                                <li class="list-group-item list-group-item-secondary text-center">
                                                    <span>Pending</span>
                                                </li>
                                                <!-- order items will be dynamically generated. -->
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <input class="form-check-input" type="radio" name="listGroupRadio" value="" id="firstRadio">
                                                    <div class="w-50 d-flex justify-content-between">
                                                        <span>Buhangin</span>
                                                        <span>Elf</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between w-25">
                                                        <span>2000</span>
                                                        <span class="">1200</span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <input class="form-check-input" type="radio" name="listGroupRadio" value="" id="secondRadio">
                                                    <div class="w-50 text-center d-flex justify-content-between">
                                                        <span>Gravel</span>
                                                        <span>Howler</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between w-25">
                                                        <span>100</span>
                                                        <span class="">3500</span>
                                                    </div>
                                                </li>
                                            </ul>

                                            <ul class="list-group mb-2">
                                                <li class="list-group-item list-group-item-info text-center">
                                                    <span>In-progress</span>
                                                </li>
                                            </ul>

                                            <ul class="list-group mb-2">
                                                <li class="list-group-item list-group-item-success text-center">
                                                    <span>Successful</span>
                                                </li>
                                            </ul>

                                            <ul class="list-group">
                                                <li class="list-group-item list-group-item-dark text-center">
                                                    <span>Canceled</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- nothing is selected -->
                                <div id="dispatch-order-view-no_view" class="container d-flex border shadow-sm p-3 rounded d-none" style="max-height: 400px; height: 400px; overflow-y: auto;">
                                    <span class="text-muted text-center m-auto lead">Select an order to view details.</span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <?php include PATH . 'components/comp-form-dispatch.php'; ?>
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