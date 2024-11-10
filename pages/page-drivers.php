<!-- page-drivers.php -->
<?php 
    include_once('../configs/config-function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>

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
                                <!-- <div class="border rounded-5 text-center p-2 shadow" data-bs-toggle="collapse" data-bs-target=".drivers-table">
                                    <a class="fs-5" href="#">Drivers Table</a>
                                </div> -->
                                <div class="c-section-toggler">
                                    <span class="fs-5" href="#">Drivers Table</span>
                                </div>
                            </div>

                            <div class="col-12 drivers-table">
                                <div class="container p-0 border rounded">
                                    <table class="table table-hover align-middle table-bordered" id="table-drivers">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Lisence</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $drivers = getDrivers(); ?>
                                            <?php foreach ($drivers as $driver) : ?>
                                            
                                            <tr class="driver" data-id_driver="<?= $driver['id'] ?>">
                                                <td><?= $driver['id'] ?></td>
                                                <td><?= $driver['name'] ?></td>
                                                <td><?= $driver['phone_number'] ?></td>
                                                <td><?= $driver['license_number'] ?></td>
                                                <td><?= $driver['status'] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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