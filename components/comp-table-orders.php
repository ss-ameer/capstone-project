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
                'o.address_id', 
                'c.name AS client_name', 
                'o.created_at AS created_at',
                'DATE(o.created_at) AS order_date', 
                'TIME(o.created_at) AS order_time',  
                '(SELECT SUM(oi.item_total) FROM order_items oi WHERE oi.order_id = o.id) AS total_price', 
                'o.status',
                'a.house_number', 
                'a.street', 
                'a.barangay', 
                'a.city',
                '(SELECT GROUP_CONCAT(oi.id) FROM order_items oi WHERE oi.order_id = o.id) AS order_item_ids'
                // '(SELECT ct.contact_value FROM contacts ct WHERE ct.client_id = o.client_id AND ct.contact_type = "phone" ORDER BY ct.id DESC LIMIT 1) AS client_phone',
                // '(SELECT ct.contact_value FROM contacts ct WHERE ct.client_id = o.client_id AND ct.contact_type = "email" ORDER BY ct.id DESC LIMIT 1) AS client_email'
            ];
            $joins = "
                JOIN clients c ON o.client_id = c.client_id 
                JOIN addresses a ON o.address_id = a.address_id
            ";
            $orders = dbGetTableData('orders o', $columns, $joins, '', 'created_at DESC');

        ?>

        <?php foreach ($orders as $order) : ?>
            <?php
                $order_items = dbGetTableData(
                    'order_items oi', 
                    ['oi.*', 'i.*'], 
                    'JOIN items i ON oi.item_id = i.item_id', 
                    'oi.order_id = ' . intval($order['id']));
                
                $client_id = intval($order['client_id']);

                $client_phone = dbGetTableData(
                    'contacts ct',
                    ['ct.contact_value'],
                    '',
                    "ct.client_id = $client_id AND ct.contact_type = 'phone'",
                    'ct.id DESC LIMIT 1'
                );

                $client_email = dbGetTableData(
                    'contacts ct',
                    ['ct.contact_value'],
                    '',
                    "ct.client_id = $client_id AND ct.contact_type = 'email'",
                    'ct.id DESC LIMIT 1'
                );

                $client_phone_value = !empty($client_phone) ? $client_phone[0]['contact_value'] : '';
                $client_email_value = !empty($client_email) ? $client_email[0]['contact_value'] : '';

                $_SESSION['order_items'] = $order_items;
            ?>
            <tr>
                <td><?= htmlspecialchars($order['id']) ?></td>
                <td><?= htmlspecialchars($order['client_name']) ?></td>
                <td><?= htmlspecialchars($order['created_at']) ?></td>
                <!-- <td>
                    <?= htmlspecialchars($order['house_number'] . ' ' . $order['street']) ?><br>
                    <?= htmlspecialchars('Brgy. ' . $order['barangay'] . ', ' . $order['city']) ?>
                </td> -->
                <td> <?= count($order_items); ?> </td>
                <td><?= htmlspecialchars($order['total_price']) ?></td>
                <td><?= htmlspecialchars($order['status']) ?></td>
                <td class="d-flex justify-content-center">
                    <button class="btn btn-secondary btn-sm view-order-btn"
                        data-order-id="<?= $order['id'] ?>"
                        data-client-id="<?= $order['client_id'] ?>"
                        data-client-name="<?= htmlspecialchars($order['client_name']) ?>"
                        data-client-phone="<?= htmlspecialchars($client_phone_value) ?>"
                        data-client-email="<?= htmlspecialchars($client_email_value) ?>"
                        data-order-date="<?= htmlspecialchars($order['order_date']) ?>"
                        data-order-time="<?= htmlspecialchars($order['order_time']) ?>"
                        data-total-price="<?= htmlspecialchars($order['total_price']) ?>"
                        data-status="<?= htmlspecialchars($order['status']) ?>"
                        data-address="<?= htmlspecialchars($order['house_number'] . ' ' . $order['street'] . ', ' . $order['barangay'] . ', ' . $order['city']) ?>"
                        data-order-item-ids="<?= htmlspecialchars($order['order_item_ids']) ?>"
                        data-order-items = "<?= htmlspecialchars(json_encode($order_items)); ?>"
                    >
                        <i class="bi bi-eye"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>