<!-- comp-table-order_items-master.php -->
<table class="table-bordered" id="table-order_items">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Order</th>
            <th scope="col">Item</th>
            <th scope="col">Unit Type</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $order_items = getOrderItems();
            $dependencies = [
                ['table' => 'order_items', 'column' => 'truck_type_id']
            ];
        ?>
        <?php foreach ($order_items as $order_item) : ?>
            <?php $columns = [
                [
                    'type' => 'select',
                    'table' => 'orders',
                    'columns' => 'id',
                    'display' => 'id',
                    'data' => ['order_id' => $order_item['order_id']]
                ],
                [
                    'type' => 'select',
                    'table' => 'items',
                    'columns' => 'item_id',
                    'display' => 'item_name',
                    'data' => ['item_id' => $order_item['item_id']]
                ],
                [
                    'type' => 'select',
                    'table' => 'truck_types',
                    'columns' => 'id',
                    'display' => 'type_name',
                    'data' => ['truck_type_id' => $order_item['truck_type_id']]
                ],
                [
                    'type' => 'text',
                    'data' => ['price' => $order_item['price']]
                ],
                [
                    'type' => 'text',
                    'data' => ['item_total' => $order_item['item_total']]
                ],
                [
                    'type' => 'select manual',
                    'options' => ['pending', 'in-queue', 'in-progress', 'failed', 'completed', 'canceled'],
                    'data' => ['status' => $order_item['status']]
                ]
            ]; ?>
            <tr class="order-item" data-officer-id="<?= $order_item['id'] ?>" style="width: 100%;">
                <td><?= str_pad($order_item['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $order_item['order_id'] ?></td>
                <td><?= $order_item['item_id'] ?></td>
                <td><?= $order_item['truck_type_id'] ?></td>
                <td><?= $order_item['price'] ?></td>
                <td><?= $order_item['item_total'] ?></td>
                <td><?= $order_item['status'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "drivers"
                        data-id-column = "id" 
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $order_item['id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="order_items" 
                        data-id-column="id" 
                        data-id="<?= $order_item['id'] ?>" 
                        data-name="<?= $order_item['id'] ?>"
                        data-dependencies='<?= json_encode($dependencies) ?>'
                    >
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>