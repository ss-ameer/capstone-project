<!-- page-dashboard.php -->
<?php 

    include_once('../configs/config-function.php');
    $officer_id = getCurrentOfficer('id');
    $officer_info = dbGetTableData('dispatch_officers', '*', '', "id = $officer_id")[0];


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!--styling -->
    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'styles/style.css' ?>">
    
    <!-- javascript -->
    <script src="<?php echo ROOT . 'imports/bootstrap/js/bootstrap.bundle.js'?>"></script>
    <script src="<?php echo ROOT . 'imports/jquery/jquery-3.7.1.min.js' ?>"></script>
    <?php include PATH . 'configs/config-script.php'; ?>

</head>
<body>

    <main>
        <div class="container-fluid vh-100 scrollbar-hidden">
            <!-- header -->
            <?php include_once PATH . 'components/comp-header.php'; ?>
            <div class="row c-main-content">
                <!-- sidebar -->
                <?php include PATH . 'components/comp-nav-side.php'; ?>
                <!-- main -->
                <div class="col mh-100 overflow-auto border">
                    <div class="container my-3">
                        <div class="row g-3">

                            <div class="col-12">
                                <div class="container">

                                    <div class="user-info-card my-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $officer_info['name']; ?></h5>
                                                <p class="card-text">
                                                    <strong>Role:</strong> <?php echo $officer_info['role']; ?><br>
                                                    <!-- <strong>Last Login:</strong> <?php //echo date("M d, Y - h:i A", strtotime($user_info['last_login'])); ?><br> -->
                                                </p>
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