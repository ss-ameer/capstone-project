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

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- side-nav -->
                <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
                <!-- main -->
                <div class="col mh-100 overflow-auto border">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p class="lead">Orders</p>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12 text-center border rounded">
                                <span class="fs-6">Create Order</span>
                            </div>
                            <div class="col-6">
                                <form action="" id="order-form" class="border p-2 rounded">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control" id="order-form-name" placeholder="Client Name">
                                        <label for="order-from-name">Client Name</label>
                                    </div>
                                    <!-- address -->
                                    <div class="input-group mb-1">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_city" placeholder="City">
                                            <label for="order-from-address_city">City</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_brgy" placeholder="Barangay">
                                            <label for="order-from-address_brgy">Barangay</label>
                                        </div>

                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_street" placeholder="Street">
                                            <label for="order-from-address_street">Street</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="order-form-address_number" placeholder="Number">
                                            <label for="order-from-address_number">Number</label>
                                        </div>
                                    </div>
                                    <!-- contact -->
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control" id="order-form-number" placeholder="Contact Number">
                                        <label for="order-form-numer">Contact Number</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="order-form-email" placeholder="Email">
                                        <label for="order-form-email">Email</label>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
                                <div class="input-group p-2 border rounded">
                                    <input type="search" name="item search" autocomplete="off" class="form-control" id="item-search">
                                    <span class="input-group-text"><i class="bi bi-search"> Search</i></span>
                                </div>

                                <ul id="item-suggestions" class="list-group mt-2 w-100" style="display: none; width: 35%">

                                </ul>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" form="order-form" class="btn btn-outline-success">Create Order</button>
                            </div>
                            <div class="col-12 border">
                                <table class="table bg-warning" id="order-items-table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 5%;">ID</th>
                                            <th scope="col" style="width: 25%;">Name</th>
                                            <th scope="col" style="width: 25%;">QTY(cbm)</th>
                                            <th scope="col" style="width: 20%;">Price</th>
                                            <th scope="col" style="width: 20%;">TPrice</th>
                                            <th scope="col" style="width: 5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="mh-100 overflow-y-auto">
                                        
                                    </tbody>
                                </table>
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