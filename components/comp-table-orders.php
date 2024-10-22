<!-- comp-table-orders.php -->
<table>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Client</th>
            <th scope="col">Order Date</th>
            <th scope="col">Items</th>
            <th scope="col">Total Price</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $columns = [
                'o.id', 
                'o.client_id', 
                'o.address_id',  // Fetch address_id
                'c.name AS client_name', 
                'o.created_at', 
                '(SELECT SUM(oi.item_total) FROM order_items oi WHERE oi.order_id = o.id) AS total_price', 
                'o.status',
                'a.house_number', 
                'a.street', 
                'a.barangay', 
                'a.city',
                '(SELECT GROUP_CONCAT(oi.id) FROM order_items oi WHERE oi.order_id = o.id) AS order_item_ids'  // Get all order_item ids
            ];
            $joins = "
                JOIN clients c ON o.client_id = c.client_id 
                JOIN addresses a ON o.address_id = a.address_id
            ";
            $orders = dbGetTableData('orders o', $columns, $joins, '', 'created_at DESC');
        ?>

        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= htmlspecialchars($order['id']) ?></td>
                <td><?= htmlspecialchars($order['client_name']) ?></td>
                <td><?= htmlspecialchars($order['created_at']) ?></td>
                <!-- <td>
                    <?php //htmlspecialchars($order['house_number'] . ' ' . $order['street']) ?><br>
                    <?php //htmlspecialchars('Brgy. ' . $order['barangay'] . ', ' . $order['city']) ?>
                </td> -->
                <td>
                    <?php 
                    // Fetch number of items for each order
                        $items = dbGetTableData('order_items', ['COUNT(*) AS item_count'], '', 'order_id = ' . intval($order['id']));
                        echo $items[0]['item_count'] ?? 0; 
                    ?>
                </td>
                <td><?= htmlspecialchars($order['total_price']) ?></td>
                <td><?= htmlspecialchars($order['status']) ?></td>
                <td class="d-flex justify-content-center">
                    <button class="btn btn-secondary btn-sm view-order-btn"
                        data-order-id="<?= $order['id'] ?>"
                        data-client-name="<?= htmlspecialchars($order['client_name']) ?>"
                        data-order-date="<?= htmlspecialchars($order['created_at']) ?>"
                        data-total-price="<?= htmlspecialchars($order['total_price']) ?>"
                        data-status="<?= htmlspecialchars($order['status']) ?>"
                        data-address="<?= htmlspecialchars($order['house_number'] . ' ' . $order['street'] . ', ' . $order['barangay'] . ', ' . $order['city']) ?>"
                        data-order-item-ids="<?= htmlspecialchars($order['order_item_ids']) ?>"
                        ><i class="bi bi-eye"></i>
                    </button>
                </td>
                <!-- <input type="hidden" name="order_data_<?php //$order['id'] ?>" 
                    data-ids="<?php //htmlspecialchars(json_encode([
                        //'order_item_ids' => explode(',', $order['order_item_ids']),
                        //'address_id' => $order['address_id']
                    //])) ?>"
                > -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>