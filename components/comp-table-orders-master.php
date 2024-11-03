<!-- comp-table-orders-master.php -->
<table class="table-bordered" id="table-orders">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Client</th>
            <th scope="col">Address</th>
            <th scope="col">Quantity</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $orders = getOrders();
            $dependencies = [
                ['table' => 'order_items', 'column' => 'order_id']
            ];
        ?>
        <?php foreach ($orders as $order) : ?>
            <?php $columns = [
                [
                    'type' => 'text',
                    'data' => ['created_at' => $order['created_at']]
                ],
                [
                    'type' => 'select',
                    'table' => 'addresses',
                    'columns' => 'address_id',
                    'display' => 'address_id',
                    'data' => ['address_id' => $order['address_id']]
                ],
                [
                    'type' => 'select',
                    'table' => 'clients',
                    'columns' => 'client_id',
                    'display' => 'name',
                    'data' => ['client_id' => $order['client_id']]
                ],
                [
                    'type' => 'text',
                    'data' => ['total_qty' => $order['total_qty']]
                ],
                [
                    'type' => 'text',
                    'data' => ['total_amount' => $order['total_amount']]
                ],
                [
                    'type' => 'select manual',
                    'options' => ['available', 'in_use', 'maintenance', 'out_of_service'],
                    'data' => ['status' => $unit['status']]
                ]
            ]; ?>
            <tr class="order-item" data-officer-id="<?= $order['id'] ?>" style="width: 100%;">
                <td><?= str_pad($order['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $order['created_at'] ?></td>
                <td><?= $order['client_id'] ?></td>
                <td><?= $order['address_id'] ?></td>
                <td><?= $order['total_qty'] ?></td>
                <td><?= $order['total_amount'] ?></td>
                <td><?= $order['status'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "orders"
                        data-id-column = "id" 
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $order['id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="orders" 
                        data-id-column="id" 
                        data-id="<?= $order['id'] ?>" 
                        data-name="<?= $order['id'] ?>"
                        data-dependencies='<?= json_encode($dependencies) ?>'
                    >
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>