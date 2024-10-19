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
                            <div class="c-section-toggler" data-bs-toggle="collapse" data-bs-target=".logs-table">
                                <a class="fs-5" href="#">Logs Table</a>
                            </div>
                        </div>

                        <div class="col-12 logs-table">
                            <div class="c-table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th scope="col">Entity</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- logs will be dynamically added -->
                                        <?php $logs = getLogs(); ?>
                                        <?php foreach ($logs as $log) :?>
                                            <?php
                                                $paddedId = str_pad($log['id'], 5, '0', STR_PAD_LEFT);
                                                $dateTime = new DateTime($log['timestamp']);
                                                $date = $dateTime->format('Y-m-d');  // Format the date part
                                                $time = $dateTime->format('H:i:s');  // Format the time part
                                            ?>
                                            <td><?= $log['entity_type'] ?></td>
                                            <td><?= $paddedId ?></td>
                                            <td><?= $log['event_type'] ?></td>
                                            <td><?= $log['event_description'] ?></td>
                                            <td><?= $date ?></td>
                                            <td><?= $time ?></td>
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
<footer>

</footer>
</body>
</html>
