<!-- comp-list-orders_pending.php -->
<?php 
    $columns = ['o.id', 'o.client_id', 'o.created_at', 'c.name', 'o.status'];
    $joins = "JOIN clients c ON o.client_id = c.client_id";
    $where = "o.status = 'pending'";
    $orderBy = "o.created_at ASC";

    $pendingOrders = getTableData('orders o', $columns, $joins, $where, $orderBy);
?>
<ul class="list-group" id="order-list-pending">
    <?php foreach ($pendingOrders as $order): ?>
        <?php
            // Fetch the count of each status for order items of the current order
            $orderId = $order['id'];
            $query = "
                SELECT 
                    SUM(status = 'pending') AS pending_count,
                    SUM(status = 'in-queue') AS in_queue_count, 
                    SUM(status = 'in-progress') AS in_progress_count, 
                    SUM(status = 'completed') AS completed_count, 
                    SUM(status = 'canceled') AS canceled_count
                FROM order_items
                WHERE order_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            $stmt->bind_result($pendingCount, $inQueueCount, $inProgressCount, $completedCount, $canceledCount);
            $stmt->fetch();
            $stmt->close();
        ?>

        <li class="list-group-item list-group-item-action text-center order" data-order-id="<?= $order['id'] ?>">
            <div class="d-flex justify-content-between">
                <small class="text-body-secondary"><?= sprintf('%04d', $order['id']) ?></small>
                <h6 class="mb-1"><?= $order['name'] ?></h6>
                <small><?= date("m/d/y", strtotime($order['created_at'])) ?></small>
                <div>
                    <!-- Display badges dynamically based on the count of order item statuses -->
                    <span class="badge text-bg-secondary"><?= $pendingCount ?></span> <!-- Pending -->
                    <span class="badge text-bg-primary"><?= $inQueueCount ?></span> <!-- Pending -->
                    <span class="badge text-bg-info"><?= $inProgressCount ?></span> <!-- In Progress -->
                    <span class="badge text-bg-success"><?= $completedCount ?></span> <!-- Completed -->
                    <span class="badge text-bg-dark"><?= $canceledCount ?></span> <!-- Canceled -->
                </div>
            </div>
        </li>
    <?php endforeach;?>
</ul>