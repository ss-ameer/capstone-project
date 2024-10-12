<!-- page-orders.php -->
<?php 
    include_once ('../configs/config-function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <!--styling -->
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
        <!-- modal -->
        <?php include_once(PATH . 'components/comp-modal-orders-prev.php'); ?>

        <div class="container-fluid vh-100 scrollbar-hidden">
            <!-- header -->
            <?php include_once PATH . 'components/comp-header.php'; ?>
            <div class="row c-main-content">
                <!-- side-nav -->
                <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
                <!-- main -->
                <div class="col mh-100 overflow-auto">
                    <div class="container">
                        <div class="row mt-3 g-3">
                            <div class="col-12">
                                <div class="border rounded-5 text-center p-2 shadow" data-bs-toggle="collapse" data-bs-target=".order-create">
                                    <a class="fs-5" href="#">Create Order</a>
                                </div>
                            </div>

                            <div class="col-6 collapse order-create">
                                <div class="container p-0 border rounded">
                                    <div class="c-section-header">
                                        <div class="c-title-container">
                                            <span class="lead">Client Info</span>
                                        </div>
                                    </div>

                                    <div class="p-3">
                                        <?php include_once('../components/comp-form-order.php'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 collapse order-create">
                                <div class="container p-0 border rounded">
                                    <div class="c-section-header">
                                        <div class="c-title-container">
                                            <span class="lead">Item Search</span>
                                        </div>
                                    </div>

                                    <div class="p-3">
                                        <div class="input-group">
                                            <input type="search" name="item search" autocomplete="off" class="form-control" id="item-search">
                                            <span class="input-group-text"><i class="bi bi-search"> Search</i></span>
                                        </div>
                                        <ul id="item-suggestions" class="list-group mt-2 w-100 mh-100" style="display: none;"></ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 collapse order-create">
                                <div class="border rounded table-responsive bg-primary">
                                    <table class="table align-middle" id="order-items-table">
                                        <thead class="table-primary">
                                            <tr class="text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Unit</th></th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price(m³)</th>
                                                <th scope="col">TPrice</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12 collapse order-create">
                                <div class="p-3 border rounded d-flex justify-content-between">
                                    <div class="">
                                        <button class="btn btn-outline fw-light" id="order-items-total_qty">Total Quantity: <span>00</span></button>
                                        <button class="btn btn-outline fw-light" id="order-items-total_price">Total Price: <span>00.00</span></button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary" id="preview-order-btn" data-bs-toggle="modal" data-bs-target="#orderPreviewModal">Order Preview</button>
                                        <button type="submit" form="order-form" class="btn btn-outline-success">Create Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </main>
    <footer>

    </footer>
</body>
</html>

