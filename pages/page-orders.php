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
    <header>
        
    </header>
    <main>
        <!-- modal -->
        <?php include_once(PATH . 'components/comp-modal-orders-prev.php'); ?>

        <div class="container-fluid vh-100">
            <!-- header -->
            <?php include_once PATH . 'components/comp-header.php'; ?>
            <div class="row main-content">
                <!-- side-nav -->
                <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
                <!-- main -->
                <div class="col mh-100 overflow-auto border">
                    <div class="container">
                        <div class="row g-3 mt-3">
                            <div class="col-12">
                                <div class="border rounded-5 text-center p-2">
                                    <span class="fs-5">Create Order</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <form id="order-form" class="border p-3 rounded" style="height: 50vh;" autocomplete="off">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control" id="order-form-name" placeholder="Client Name">
                                        <label for="order-form-name">Client Name:</label>
                                        <ul id="order-form-client-suggestions" class="list-group position-absolute w-100 z-3" style="display:none"><li></li></ul>
                                    </div>
                                    <!-- address -->
                                    <div class="input-group mb-1">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_city" placeholder="City">
                                            <label for="order-form-address_city">City</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_brgy" placeholder="Barangay">
                                            <label for="order-form-address_brgy">Barangay</label>
                                        </div>

                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_street" placeholder="Street">
                                            <label for="order-form-address_street">Street</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_number" placeholder="Number">
                                            <label for="order-form-address_number">Number</label>
                                        </div>
                                    </div>
                                    <!-- contact -->
                                    <div class="form-floating mb-1">
                                        <input type="number" class="form-control" id="order-form-number" placeholder="Contact Number">
                                        <label for="order-form-numer">Contact Number</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="order-form-email" placeholder="Email">
                                        <label for="order-form-email">Email</label>
                                    </div>

                                    <div>
                                        <input type="hidden" id="order-items-total_qty-input" name="total_qty" value="0">
                                        <input type="hidden" id="order-items-total_price-input" name="total_amount" value="0.00">
                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
                                <div class="p-3 border rounded overflow-auto" style="height: 50vh;">
                                    <div class="input-group">
                                        <input type="search" name="item search" autocomplete="off" class="form-control" id="item-search">
                                        <span class="input-group-text"><i class="bi bi-search"> Search</i></span>
                                    </div>
                                    <ul id="item-suggestions" class="list-group mt-2 w-100 mh-100" style="display: none;"></ul>
                                </div>
                            </div>
                            <div class="col-12">
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
                            <div class="col-12">
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
        </div>

    </main>
    <footer>

    </footer>
</body>
</html>

