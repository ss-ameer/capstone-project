<!-- page-stock.php -->
<?php 
    include_once('../configs/config-function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>

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
    <div class="container-fluid vh-100">
        <!-- header -->
        <?php include_once PATH . 'components/comp-header.php'; ?>
        <div class="row c-main-content">
            <!-- sidebar -->
            <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
            <!-- main -->
            <div class="col mh-100 overflow-auto">
                <div class="container">
                    <div class="row mt-3 g-3">

                        <div class="col-12">
                            <!-- <div class="border rounded-5 text-center p-2 shadow" data-bs-toggle="collapse" data-bs-target=".items-table">
                                <a class="fs-5" href="#">Items Table</a>
                            </div> -->
                            <div class="c-section-toggler">
                                <span class="fs-5" href="#">Items Table</span>
                            </div>
                        </div>

                        <div class="col-12 items-table">
                            <div class="c-table-container">
                                
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