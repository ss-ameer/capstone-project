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
                                
                                <div class="c-section-toggler">
                                    <span class="fs-5" href="#">Logs Table</span>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="c-sec-con">
                                    <div class="c-sec flex-fill">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group" id="logs-filter-entity">
                                                        <label for="logs-filter-entity" class="input-group-text">Entity</label>
            
                                                        <select name="" id="logs-select-entity" class="form-select">
                                                            <option value="all">All</option>
                                                            <option value="address">Address</option>
                                                            <option value="client">Client</option>
                                                            <option value="contact">Contact</option>
                                                            <option value="dispatch_officers">Dispatch Officers</option>
                                                            <option value="order">Orders</option>
                                                            <option value="order_item">Order Items</option>
                                                            <option value="truck">Truck</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="input-group" id="logs-filter-event">
                                                        <label for="logs-filter-event" class="input-group-text">Event</label>
            
                                                        <select name="" id="logs-select-event" class="form-select">
                                                            <option value="all">All</option>
                                                            <option value="create">Create</option>
                                                            <option value="reuse">Reuse</option>
                                                            <option value="update">Update</option>
                                                            <option value="delete">Delete</option>
                                                            <option value="login">Login</option>
                                                            <option value="logout">Logout</option>
                                                            <option value="print">Print</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="input-group">
                                                        <label for="" class="input-group-text">ID</label>
                                                        <input class="form-control" type="text" name="" id="logs-search-input" placeholder="Search...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 logs-table">
                                <div class="c-table-container">
                                    <?php include PATH . 'components/comp-table-logs.php' ?>
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
