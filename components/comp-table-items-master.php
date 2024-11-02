<!-- comp-table-items-master.php -->
<table class="table-bordered" id="table-items">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Density</th>
            <th scope="col">Price</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            getItems();
            $items = $_SESSION['items'];
            $dependencies = [
                ['table' => 'order_items', 'column' => 'item_id']
            ];
        ?>
        <?php foreach ($items as $item) : ?>
            <?php $columns = [
                [
                    'type' => 'text',
                    'data' => ['item_name' => $item['item_name']]
                ],
            ]; ?>
            <tr class="item" data-officer-id="<?= $item['item_id'] ?>" style="width: 100%;">
                <td><?= str_pad($item['item_id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $item['item_name'] ?></td>
                <td><?= $item['description'] ?></td>
                <td><?= $item['category'] ?></td>
                <td><?= $item['density'] ?></td>
                <td><?= $item['price'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "items"
                        data-id-column = "item_id" 
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $item['item_id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="items" 
                        data-id-column="item_id" 
                        data-id="<?= $item['item_id'] ?>" 
                        data-name="<?= $item['item_name'] ?>"
                        data-dependencies='<?= json_encode($dependencies) ?>'
                    >
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>