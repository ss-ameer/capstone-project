<!-- page-stock.php -->
<?php 
    include_once('../configs/config-function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks</title>

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
        <div class="row h-100">
            <?php include_once(PATH . 'components/comp-nav-side.php'); ?>
            <div class="col mh-100 overflow-auto p-3 border">
                <p class="lead">Stocks</p>
                <div class="container border rounded">
                    <table class="table table-hover table-borderless" id="table-stocks">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">UoM</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php getStocks(); ?>
                            <?php foreach ($_SESSION['items'] as $item) : ?>
                            
                            <tr class="item" data-id_item="<?= $item['item_id'] ?>">
                                <td><?= $item['item_id'] ?></td>
                                <td><?= $item['item_name'] ?></td>
                                <td><?= $item['category'] ?></td>
                                <td><?= $item['unit_of_measure'] ?></td>
                                <td><?= $item['quantity_in_stock'] ?></td>
                                <td><?= $item['price'] ?></td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>