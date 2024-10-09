<!-- page-master.php -->
<?php 
    include_once '../configs/config-function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master</title>

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

    <div class="container-fluid vh-100 scrollbar-hidden">
        
        <!-- header -->
        <?php include_once(PATH. 'components/comp-header.php') ?>
        <div class="row" style="height: 90%; max-height: 90%;">
            <!-- sidebar -->
            <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
            <!-- main -->
            <div class="col mh-100 overflow-auto">
                <div class="container">
                    <div class="row mt-3 g-3">
                        <div class="col-12">
                            <div class="border rounded-5 text-center p-2 shadow" data-bs-toggle="collapse" data-bs-target=".master-create">
                                <a class="fs-5" href="#">Create</a>
                            </div>
                        </div>

                        <div class="col-12 collapse master-create master-create">
                            <div class="container p-0 border rounded">
                                <div class="sticky-top bg-light p-2 px-3 border-bottom" data-bs-toggle="collapse" data-bs-target="#add-user-container">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- title -->
                                        <span class="lead">Add User</span>
                                    </div>
                                </div>
                                <div class="p-3 collapse" id="add-user-container">
                                    <!-- user form -->
                                    <?php include_once('../components/comp-form-register.php') ?>
                                </div>
                            </div>    
                        </div>

                        <div class="col-12 collapse master-create">
                            <div class="container p-0 border rounded">
                                <div class="sticky-top bg-light p-2 px-3 border-bottom" data-bs-toggle="collapse" data-bs-target="#add-item-container">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- title -->
                                        <span class="lead">Add Item</span>
                                        <!-- icon -->
                                        <i class="bi bi-caret-down"></i>
                                    </div>
                                </div>
                                <div class="p-3 collapse" id="add-item-container">
                                    <!-- user form -->
                                    <?php include_once('../components/comp-form-item.php') ?>
                                </div>
                            </div>    
                        </div>

                        <div class="col-6 collapse master-create">
                            <div class="container p-0 border rounded">
                                <div class="sticky-top bg-light p-2 px-3 border-bottom" data-bs-toggle="collapse" data-bs-target=".units-section">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- title -->
                                        <span class="lead">Add Unit</span>
                                    </div>
                                </div>
                                <div class="p-3 units-section collapse" id="add-unit-container">
                                    <!-- user form -->
                                    <?php include_once('../components/comp-form-unit.php') ?>
                                </div>
                            </div>    
                        </div>

                        <div class="col-6 collapse master-create">
                            <div class="container p-0 border rounded-2">
                                <div class="sticky-top bg-light p-2 px-3 border-bottom" data-bs-toggle="collapse" data-bs-target=".units-section">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- title -->
                                        <span class="lead">Add Unit Type</span>
                                    </div>
                                </div>
                                <div class="p-3 units-section collapse" id="add-unit_type-container">
                                    <!-- user form -->
                                    <?php include_once('../components/comp-form-unit_type.php') ?>
                                </div>
                            </div>    
                        </div>

                        <div class="col-12 collapse master-create">
                            <div class="container p-0 border rounded">
                                <div class="sticky-top bg-light p-2 px-3 border-bottom" data-bs-toggle="collapse" data-bs-target="#add-driver-container">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- title -->
                                        <span class="lead">Add Operator</span>
                                    </div>
                                </div>
                                <div class="p-3 collapse" id="add-driver-container">
                                    <!-- user form -->
                                    <?php include_once('../components/comp-form-driver.php') ?>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

                    <!-- <ul class="list-group">
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div data-bs-toggle="collapse" data-bs-target="#master-view">
                                <a class="" href="#">View Accounts</a>
                            </div>

                            <div class="collapse container" id="master-view">
                                <hr>
                                <?php //include_once('../components/comp-table-officers.php') ?>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div data-bs-toggle="collapse" data-bs-target="#master-stocks">
                                <a href="#" class="">Manage Stocks</a>
                            </div>
                            
                            <div class="collapse container" id="master-stocks">
                                <hr>
                                <?php //include_once('../components/comp-master-stock.php'); ?>
                            </div>
                        </li>
                    </ul> -->
                </div>
                
            </div>
        </div>
    </div>

</main>
<footer>

</footer>
</body>
</html>
