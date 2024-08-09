<!-- page-master.php -->
<?php 
    include_once('../configs/config-function.php');
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

<div class="container-fluid vh-100">
<div class="row h-100">
<!-- sidebar -->
<?php include_once(PATH . 'components/comp-nav-side.php'); ?>
<!-- master list -->
<div class="col mh-100 overflow-auto p-3 border">
    <p class="lead">Master</p>
    <ul class="list-group">
    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-register">
            <a class="" href="#">Create an Account</a>
        </div>

        <div class="collapse container" id="master-register">
            <hr>
            <!-- register form -->
            <?php include_once('../components/comp-form-register.php') ?>
        </div>        
    </li>

    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-view">
            <!-- account view -->
            <a class="" href="#">View Accounts</a>
        </div>

        <div class="collapse container" id="master-view">
            <hr>
            <!-- officers table -->
            <?php include_once('../components/comp-table-officers.php') ?>
        </div>
    </li>

    <li class="list-group-item">
        <div data-bs-toggle="collapse" data-bs-target="#master-stocks">
            <!-- manage stocks -->
            <a href="#" class="">Manage Stocks</a>
        </div>
        
        <div class="collapse container" id="master-stocks">
            <hr>
            <div class="d-flex">
            <!-- left column -->
            <div class="w-50 border rounded shadow-sm p-3">
                <!-- items option -->
                <div class="d-grid gap-2 p-3 rounded bg-light sticky-top">
                    <button class="btn btn-primary btn-sm w-20">Edit</button>
                    <button class="btn btn-danger btn-sm w-20" id="stock-delete">Delete</button>
                </div>
                <!-- stock preview table -->
                <table class="table table-hover table-borderless" id="master-stock-preview">
                    <thead class="">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php getStocks(); ?>
                    <?php foreach ($_SESSION['items'] as $item) : ?>
                    <tr class="item" data-id_item="<?= $item['item_id'] ?>">
                        <td><?= $item['item_id'] ?></td>
                        <td><?= $item['item_name'] ?></td>
                        <td><?= $item['category'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td class="text-center"><?= $item['quantity_in_stock'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- right column -->
            <div class="ms-3 w-50">
                <!-- add item form -->
                <form class="border rounded p-3 mb-3 shadow-sm" id="item-add">
                <label class="form-label">Add Item</label>
                <div class="form-floating mb-1">
                    <input name="name" type="text" id="item-add_name" class="form-control" placeholder="Name">
                    <label for="item-add_name">Name</label>
                </div>
                <div class="form-floating mb-1">
                    <select name="category" id="item-add_category" class="form-select">
                        <option selected>Choose</option>
                        <option value="test">Test</option>
                    </select>
                    <label for="item-add_category">Category</label>
                </div>
                <div class="form-floating mb-1">
                    <select name="uom" id="item-add_uom" placeholder="oum" class="form-select">
                        <option selected>Choose</option>
                        <option value="test">Test</option>
                    </select>
                    <label for="item-add_oum">Unit</label>
                </div>
                <div class="form-floating mb-1">
                    <input name="price" type="number" id="item-add_price" class="form-control" placeholder="Price">
                    <label for="item-add_price">Price</label>
                </div>
                <div class="form-floating mb-1">
                    <textarea name="description" id="item-add_desc" class="form-control" placeholder="Description"></textarea>
                    <label for="item-add_desc">Description</label>
                </div>
                <button class="btn btn-success ms-auto" type="submit">Add</button>
                </form>
                <!-- --- -->
                <form class="border rounded p-3 shadow-sm" id="stock-add">
                <label class="form-label">Add Stocks</label>
                <div class="input-group mb-1">
                    <span class="input-group-text">ID</span>
                    <input type="number" id="stock-add_id" class="form-control">
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text">Name</span>
                    <input type="text" id="stock-add_name" class="form-control" value="placeholder" disabled>
                </div>
                <div class="input-group mb-1">
                    <span class="input-group-text">Quantity</span>
                    <input type="number" id="stock-add_qty" class="form-control" value="placeholder">
                </div>
                <button class="btn btn-success ms-auto" type="submit">Add</button>
                </form>
            </div>
            </div>
        </div>
    </li>

    </ul>
</div>
</div>
</div>

</main>
<footer>

</footer>
</body>
</html>
