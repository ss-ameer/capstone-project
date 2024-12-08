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

    <main id="main-dispatch">
        <?php include PATH . 'components/comp-modal-dispatch.php'; ?>
        <?php include PATH . 'components/comp-modal-dispatch-failed.php'; ?>
        <div class="container-fluid vh-100 scrollbar-hidden">
            <!-- header -->
            <?php include PATH . 'components/comp-header.php'; ?>
            <div class="row c-main-content">
                <!-- sidebar -->
                <?php include PATH . 'components/comp-nav-side.php'; ?>
                <!-- main -->
                <div class="col mh-100 overflow-auto border">
                    <div class="container my-3">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="border rounded-5 text-center p-2 shadow">
                                    <span class="fs-5">Create Dispatch</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="container p-3 border rounded">
                                    <div class="d-flex justify-content-center gap-3">
                                        <div class="p-2 fw-bold">
                                            Status Legend:
                                        </div>
                                        <div class="text-body-secondary bg-secondary-subtle p-2 rounded">
                                            <i class="bi bi-circle-fill"></i> Pending
                                        </div>
                                        <div class="text-primary bg-primary-subtle p-2 rounded">
                                            <i class="bi bi-circle-fill"></i> In-Queue
                                        </div>
                                        <div class="text-info bg-info-subtle p-2 rounded">
                                            <i class="bi bi-circle-fill"></i> In-Transit
                                        </div>
                                        <div class="text-success bg-success-subtle p-2 rounded">
                                            <i class="bi bi-circle-fill"></i> Success
                                        </div>
                                        <div class="text-dark bg-dark-subtle p-2 rounded">
                                            <i class="bi bi-circle-fill"></i> Failed
                                        </div>
                                        <div class="text-danger bg-danger-subtle p-2 rounded">
                                            <i class="bi bi-circle-fill"></i> Canceled
                                        </div>
                                    </div>
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
                                <ul class="nav nav-pills nav-fill nav-justified" id="tab-master" role="tablist">    
                                    <li class="nav-item" role="presentation" id="tab-in-queue">
                                        <button class="nav-link active position-relative" id="dispatch-in-queue" data-bs-toggle="tab" data-bs-target="#section-in-queue" type="button" role="tab">
                                            In-Queue
                                            <span class="badge text-bg-secondary in-queue-count">0</span>
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation" id="tab-in-transit">
                                        <button class="nav-link position-relative" id="dispatch-in-transit" data-bs-toggle="tab" data-bs-target="#section-in-transit" type="button" role="tab">
                                            In-Transit 
                                            <span class="badge text-bg-secondary in-transit-count">0</span>
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation" id="tab-success">
                                        <button class="nav-link" id="dispatch-success" data-bs-toggle="tab" data-bs-target="#section-success" type="button" role="tab">Success</button>
                                    </li>

                                    <li class="nav-item" role="presentation" id="tab-failed">
                                        <button class="nav-link" id="dispatch-failed" data-bs-toggle="tab" data-bs-target="#section-failed" type="button" role="tab">Failed</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="tab-content-dispatch">
                                    <div class="tab-pane fade show active" id="section-in-queue" role="tabpanel">
                                        
                                        <div class="c-section bg-primary mt-3">
                                            <!-- header -->
                                            <div class=" bg-primary c-section-header_table">
                                                <div class="d-flex justify-content-between">
                                                    <span class="lead text-light">In-Queue</span>
                                                </div>
                                            </div>

                                            <!-- content -->
                                            <div class="c-table-container">
                                                <?php include PATH . 'components/comp-table-dispatch-in-queue.php';?>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="tab-pane fade show" id="section-in-transit" role="tabpanel">
                                        <div class="c-section bg-info mt-3">
                                            <!-- header -->
                                            <div class="c-section-header_table bg-info">
                                                <div class="d-flex justify-content-between">
                                                    <span class="lead">In-Transit</span>
                                                </div>
                                            </div>

                                            <!-- content -->
                                            <div class="c-table-container">
                                                <?php include PATH . 'components/comp-table-dispatch-in-transit.php';?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show" id="section-success" role="tabpanel">
                                        <div class="c-section bg-success mt-3">
                                            <!-- header -->
                                            <div class="c-section-header_table bg-success">
                                                <div class="d-flex justify-content-between">
                                                    <span class="lead text-light">Successful</span>
                                                </div>
                                            </div>

                                            <!-- content -->
                                            <div class="c-table-container">
                                                <?php include PATH . 'components/comp-table-dispatch-successful.php';?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show" id="section-failed" role="tabpanel">
                                        <div class="c-section bg-dark mt-3">
                                                <!-- header -->
                                                <div class="c-section-header_table bg-dark">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="lead text-light">Failed</span>
                                                    </div>
                                                </div>

                                                <!-- content -->
                                                <div class="c-table-container">
                                                    <?php include PATH . 'components/comp-table-dispatch-failed.php';?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>