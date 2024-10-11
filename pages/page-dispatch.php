<!-- page-dispatch.php -->
<?php

    include_once '../configs/config-function.php';
    // echo $_SESSION['user_info']['id'];

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
    <main>
        <div class="container-fluid vh-100 scrollbar-hidden">
            <!-- header -->
            <?php include_once PATH . 'components/comp-header.php'; ?>
            <div class="row c-main-content">
                <!-- sidebar -->
                <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
                <!-- main -->
                <div class="col mh-100 overflow-auto border">
                    <div class="container">
                        <div class="row mt-3 g-3">
                            <div class="col-12">
                                <div class="border rounded-5 text-center p-2 shadow">
                                    <span class="fs-5">Create Dispatch</span>
                                </div>
                            </div>
                            <!-- pending orders list -->
                            <div class="col-md-6 col-sm-12">
                                <div id="order-list-container" class="container p-0 border rounded" style="max-height: 400px; height: 400px; overflow-y: auto;">
                                    <!-- header -->
                                    <div class="sticky-top bg-light p-2 border-bottom">
                                        <div class="d-flex justify-content-between">
                                            <span class="lead">Pending Orders</span>
                                        </div>
                                    </div>

                                    <!-- content -->
                                    <div id="pending-orders-container" class="p-3">
                                        <?php include PATH . 'components/comp-list-orders_pending.php'; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <!-- show view -->
                                <div id="dispatch-order-view" class="container p-0 border rounded d-none" style="max-height: 400px; height: 400px; overflow-y: auto;">
                                    <!-- header -->
                                    <div class="sticky-top bg-light p-2 border-bottom">
                                        <div class="d-flex justify-content-between">
                                            <span class="lead">Order ID: <span class="order-id"></span></span>
                                            <button type="button" class="btn-close" aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <!-- content -->
                                    <div class="p-3">
                                        <?php include PATH . 'components/comp-dispatch-order-view.php'; ?>
                                    </div>
                                </div>

                                <!-- no view -->
                                <div id="dispatch-order-view-no_view" class="container d-flex border p-3 rounded" style="max-height: 400px; height: 400px; overflow-y: auto;">
                                    <span class="text-muted text-center m-auto lead">Select an order to view details.</span>
                                </div>
                            </div>

                            <div class="col-12">
                                <!-- show view -->
                                <div class="container border rounded p-0 dispatch-form-active d-none">
                                    
                                    <!-- header -->
                                    <div class="sticky-top bg-light p-2 border-bottom">
                                        <div class="d-flex justify-content-between">
                                            <span class="lead">Order Item</span>
                                            <button type="button" class="btn-close" aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <!-- content -->
                                    <div class="p-3">
                                        <?php include PATH . 'components/comp-form-dispatch.php'; ?>
                                    </div>

                                </div>

                                <!-- no view -->
                                <div class="container border rounded p-0 dispatch-form-inactive">
                                
                                    <div class="d-flex justify-content-center">
                                        <span class="text-muted text-center m-auto lead p-5">Select an order item to view details.</span>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        
                        <!-- dispatch tables -->
                        <div class="row mt-3 g-3">
                            <div class="col-12">
                                <div class="border rounded-5 text-center p-2 shadow">
                                    <span class="fs-5">Dispatch Tables</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="container-fluid border p-0 rounded dispatch-table-container bg-primary">
                                    <!-- header -->
                                    <div class="sticky-top p-3 border-bottom rounded-top bg-primary">
                                        <div class="d-flex justify-content-between">
                                            <span class="lead text-light">In-Queue</span>
                                        </div>
                                    </div>

                                    <!-- content -->
                                    <div class="">
                                        <?php include PATH . 'components/comp-table-dispatch-in-queue.php';?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="container-fluid border p-0 rounded dispatch-table-container bg-info">
                                    <!-- header -->
                                    <div class="sticky-top p-3 border-bottom rounded-top bg-info">
                                        <div class="d-flex justify-content-between">
                                            <span class="lead">In-Transit</span>
                                        </div>
                                    </div>

                                    <!-- content -->
                                    <div class="">
                                        <?php include PATH . 'components/comp-table-dispatch-in-transit.php';?>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="container-fluid border p-0 rounded dispatch-table-container bg-success">
                                    <!-- header -->
                                    <div class="sticky-top p-3 border-bottom rounded-top bg-success">
                                        <div class="d-flex justify-content-between">
                                            <span class="lead text-light">Successful</span>
                                        </div>
                                    </div>

                                    <!-- content -->
                                    <div class="">
                                        <?php include PATH . 'components/comp-table-dispatch-successful.php';?>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="container-fluid border p-0 rounded dispatch-table-container bg-dark">
                                    <!-- header -->
                                    <div class="sticky-top p-3 border-bottom rounded-top bg-dark">
                                        <div class="d-flex justify-content-between">
                                            <span class="lead text-light">Failed</span>
                                        </div>
                                    </div>

                                    <!-- content -->
                                    <div class="">
                                        <?php include PATH . 'components/comp-table-dispatch-failed.php';?>
                                    </div>
                                </div>
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