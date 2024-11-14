<!-- page-dashboard.php -->
<?php 

    include_once('../configs/config-function.php');
    $officer_id = getCurrentOfficer('id');
    $officer_info = dbGetTableData('dispatch_officers', '*', '', "id = $officer_id")[0];
    $officer_latest_login = getLatestLoginEvent($officer_info['id']);

    $create_time = date("h:i A", strtotime($officer_info['created_at']));
    $create_date = date("M d, Y", strtotime($officer_info['created_at']));

    $updated_time = date("h:i A", strtotime($officer_info['updated_at']));
    $updated_date = date("M d, Y", strtotime($officer_info['updated_at']));
    
    $login_time = date("h:i A", strtotime($officer_latest_login['timestamp']));
    $login_date = date("M d, Y", strtotime($officer_latest_login['timestamp']));

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
                        <div class="row g-3 c-row-align-stretch">

                            <div class="col-12">
                                <div class="c-sec-con">
                                    <div class="c-sec flex-fill align-content-center">
                                        <div class="h5"><?= $officer_info['name']; ?></div>
                                        <div><strong>Role: </strong> <?= $officer_info['role']; ?></div>
                                    </div>
                                    <div class="c-sec flex-grow-1">
                                        <div class="c-flex-between">
                                            <strong class="w-50">Created: </strong>
                                            <div class="c-flex-between flex-fill">
                                                <span class=""><?= $create_date ?></span> <span><?= $create_time ?></span>  
                                            </div>
                                        </div>
                                        <div class="c-flex-between">
                                            <strong class="w-50">Updated: </strong> 
                                            <div class="c-flex-between flex-fill">
                                                <span class="text-start"><?= $updated_date ?></span> <span><?= $updated_time ?></span>
                                            </div>
                                        </div>
                                        <div class="c-flex-between">
                                            <strong class="w-50">Last Login: </strong> 
                                            <div class="c-flex-between flex-fill">
                                                <span class="text-start"><?= $login_date ?></span> <span><?= $login_time ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="c-sec-con">
                                    <div class="c-sec flex-fill">
                                        <ul class="nav nav-pills nav-fill nav-justified" id="tab-tables-dashboard" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button id="items-tab" data-table-id="table-stocks" class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-table-items" type="button" role="tab">Items</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button id="operators-tab" data-table-id="table-operators" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-table-operators" type="button" role="tab">Operators</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button id="units-tab" data-table-id="table-units" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-table-units" type="button" role="tab">Units</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="c-sec-con">
                                    <div class="c-sec flex-fill">
                                        <?php include PATH . 'components/comp-dispatch-search.php'; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                
                                <div class="tab-content" id="tab-content-tables-dispatch">

                                    <div class="tab-pane fade show active" id="tab-table-items" role="tabpanel">
                                        <div class="c-section">
                                            <div class="c-section-header_table">
                                                <div class="d-flex justify-content-between">
                                                    <span class="lead">Items Table</span>
                                                </div>
                                            </div>

                                            <div class="c-table-container">
                                                <?php include PATH . 'components/comp-table-items.php'; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show" id="tab-table-operators" role="tabpanel">
                                        <div class="c-section">
                                            <div class="c-section-header_table">
                                                <div class="d-flex justify-content-between">
                                                    <span class="lead">Operators Table</span>
                                                </div>
                                            </div>

                                            <div class="c-table-container">
                                                <?php include PATH . 'components/comp-table-operators.php'; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade show" id="tab-table-units" role="tabpanel">
                                        <div class="c-section">
                                            <div class="c-section-header_table">
                                                <div class="d-flex justify-content-between">
                                                    <span class="lead">Units Table</span>
                                                </div>
                                            </div>

                                            <div class="c-table-container">
                                                <?php include PATH . 'components/comp-table-units.php'; ?>
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