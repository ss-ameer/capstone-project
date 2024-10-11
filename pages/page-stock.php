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
                            <div class="border rounded-5 text-center p-2 shadow" data-bs-toggle="collapse" data-bs-target=".items-table">
                                <a class="fs-5" href="#">Items Table</a>
                            </div>
                        </div>

                        <div class="col-12 collapse items-table">
                            <div class="container p-0 border rounded">
                                <table class="table table-hover align-middle table-bordered" id="table-stocks">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Density</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php getItems(); ?>
                                        <?php foreach ($_SESSION['items'] as $item) : ?>
                                        
                                        <tr class="item" data-id_item="<?= $item['item_id'] ?>">
                                            <td><?= $item['item_id'] ?></td>
                                            <td><?= $item['item_name'] ?></td>
                                            <td><?= $item['category'] ?></td>
                                            <td><?= $item['density'] ?></td>
                                            <td><?= $item['price'] ?></td>
                                            <td><?= $item['description'] ?></td>
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