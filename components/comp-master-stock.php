<!-- comp-master-stock.php -->
<div class="d-flex">
<!-- left column -->
<div class="w-50 border rounded shadow-sm p-3">
    <!-- items option -->
    <div class="d-grid gap-2 p-3 rounded sticky-top" style="background: white;">
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#item-edit-modal">Edit</button>
        <button class="btn btn-danger btn-sm" id="stock-delete">Delete</button>
    </div>
    <!-- edit item modal -->
    <!-- i want to set the value of these input based on the selected item in the stock preview -->
    <div class="modal fade" id="item-edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <div class="modal-title fs-5">Edit Item</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-floating mb-1">
                            <input name="name" type="text" id="item-edit_id" class="form-control" placeholder="Name">
                            <label for="item-edit_id">ID</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input name="name" type="text" id="item-edit_name" class="form-control" placeholder="Name">
                            <label for="item-edit_name">Name</label>
                        </div>
                        <div class="form-floating mb-1">
                            <select name="category" id="item-edit_category" class="form-select">
                                <option selected>Choose</option>
                                <option value="test">Test</option>
                            </select>
                            <label for="item-edit_category">Category</label>
                        </div>
                        <div class="form-floating mb-1">
                            <select name="uom" id="item-edit_uom" placeholder="oum" class="form-select">
                                <option selected>Choose</option>
                                <option value="test">Test</option>
                            </select>
                            <label for="item-edit_oum">Unit</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input name="price" type="number" id="item-edit_price" class="form-control" placeholder="Price">
                            <label for="item-edit_price">Price</label>
                        </div>
                        <div class="form-floating mb-1">
                            <textarea name="description" id="item-edit_desc" class="form-control" placeholder="Description"></textarea>
                            <label for="item-edit_desc">Description</label>
                        </div>
                    </form>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="mo">Submit</button>
                </div>

            </div>
        </div>
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