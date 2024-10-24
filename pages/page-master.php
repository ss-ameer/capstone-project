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
        <div class="row c-main-content">
            <!-- sidebar -->
            <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
            <!-- main -->
            <div class="col mh-100 overflow-auto">
                <div class="container">
                    <div class="row mt-3 g-3">
                        <div class="col-12">
                            <div class="c-section-toggler" data-bs-toggle="collapse" data-bs-target=".master-create">
                                <a class="fs-5" href="#">Create</a>
                            </div>
                        </div>

                        <div class="col-12 collapse master-create">
                            <div class="c-section">
                                <div class="c-section-header" data-bs-toggle="collapse" data-bs-target="#add-user-container">
                                    <div class="c-title-container">
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
                            <div class="c-section">
                                <div class="c-section-header" data-bs-toggle="collapse" data-bs-target="#add-item-container">
                                    <div class="c-title-container">
                                        <!-- title -->
                                        <span class="lead">Add Item</span>
                                        <!-- icon -->
                                    </div>
                                </div>
                                <div class="p-3 collapse" id="add-item-container">
                                    <!-- user form -->
                                    <?php include_once('../components/comp-form-item.php') ?>
                                </div>
                            </div>    
                        </div>

                        <div class="col-6 collapse master-create">
                            <div class="c-section">
                                <div class="c-section-header" data-bs-toggle="collapse" data-bs-target=".units-section">
                                    <div class="c-title-container">
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
                            <div class="c-section">
                                <div class="c-section-header" data-bs-toggle="collapse" data-bs-target=".units-section">
                                    <div class="c-title-container">
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
                            <div class="c-section">
                                <div class="c-section-header" data-bs-toggle="collapse" data-bs-target="#add-driver-container">
                                    <div class="c-title-container">
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

                    <div class="row g-3 mt-2">
                        <div class="col-12">
                            <div class="c-section-toggler" data-bs-target="collapse">
                                <a class="fs-5" href="#">Views</a>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="c-section">
                                <div class="c-section-header_table" data-bs-toggle="collapse" data-bs-target="">
                                    <div class="c-title-container">
                                        <span class="lead">Users</span>
                                    </div>
                                </div>
                                <div class="c-table-container">
                                    <?php include_once PATH . 'components/comp-table-dispatch_officers.php'; ?>
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
