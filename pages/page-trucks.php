<!-- page-trucks.php -->
<?php

    include_once '../configs/config-function.php';
    $trucks = getUnits();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trucks</title>

    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'imports/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.css' ?>">
    <link rel="stylesheet" href="<?php echo ROOT . 'styles/style.css' ?>">
    
    <!-- javascript -->
    <script src="<?php echo ROOT . 'imports/bootstrap/js/bootstrap.bundle.js'?>"></script>
    <script src="<?php echo ROOT . 'imports/jquery/jquery-3.7.1.min.js' ?>"></script>
    <?php include_once PATH . 'configs/config-script.php'; ?>
</head>
<body>
    <header></header>
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
                                <!-- <div class="c-section-toggler" data-bs-toggle="collapse" data-bs-target="#units-table">
                                    <a href="#" class="fs-5">Units Table</a>
                                </div> -->
                                <div class="c-section-toggler">
                                    <span href="#" class="fs-5">Units Table</span>
                                </div>
                            </div>
                            
                            <div class="col-12" id="units-table">
                                <div class="c-table-container">
                                    <!-- <div class="c-section-header">
                                        <div class="c-title-container">
                                            <span class="lead">Units Table</span>
                                        </div>
                                    </div> -->

                                    <div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Type</th>
                                                    <th>Number</th>
                                                    <th>Status</th>
                                                    <th>Created</th>
                                                    <th>Updated</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($trucks as $truck): ?>
                                                    <tr>
                                                    <td><?php echo str_pad($truck['id'], 4, '0', STR_PAD_LEFT); ?></td>
                                                        <td><?php echo $truck['truck_type'];?></td>
                                                        <td><?php echo $truck['truck_number'];?></td>
                                                        <td><?php echo htmlspecialchars($truck['status']);?></td>
                                                        <td><?php echo date('Y-m-d', strtotime($truck['created_at']));?></td>
                                                        <td><?php echo date('Y-m-d', strtotime($truck['updated_at']));?></td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
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