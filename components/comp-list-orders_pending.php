<!-- comp-list-orders_pending.php -->
<?php 
    $columns = ['o.id', 'o.client_id', 'o.created_at', 'c.name', 'o.status'];
    $joins = "JOIN clients c ON o.client_id = c.client_id";
    $where = "o.status = 'pending'";
    $orderBy = "o.created_at ASC";

    $pendingOrders = dbGetTableData('orders o', $columns, $joins, $where, $orderBy);
?>
<ul class="list-group" id="order-list-pending">
    <?php foreach ($pendingOrders as $order): ?>
        <?php
            $orderId = $order['id'];
            $query = "
                SELECT 
                    SUM(status = 'pending') AS pending_count,
                    SUM(status = 'in-queue') AS in_queue_count, 
                    SUM(status = 'in-progress') AS in_progress_count, 
                    SUM(status = 'completed') AS completed_count,
                    SUM(status = 'failed') AS failed_count,
                    SUM(status = 'canceled') AS canceled_count
                FROM order_items
                WHERE order_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $orderId);
            $stmt->execute();
            $stmt->bind_result($pendingCount, $inQueueCount, $inProgressCount, $completedCount, $failedCount, $canceledCount);
            $stmt->fetch();
            $stmt->close();
        ?>

        <li class="order" data-order-id="<?= $order['id'] ?>">
            <div class="d-flex">
                <div class="section">
                    <small class="text-body-secondary"><?= sprintf('%04d', $order['id']) ?></small>
                    <div class="mx-2 text-nowrap overflow-x-auto">
                        <span class="fw-bold"><?= $order['name'] ?></span>
                    </div>
                </div>

                <div class="section">
                    <small id="order-list-pending-date"><?= date("m/d/y", strtotime($order['created_at'])) ?></small>
                    <div>
                        <span class="badge text-bg-secondary"><?= $pendingCount ?></span> <!-- Pending -->
                        <span class="badge text-bg-primary"><?= $inQueueCount ?></span> <!-- Pending -->
                        <span class="badge text-bg-info"><?= $inProgressCount ?></span> <!-- In Progress --><br>
                        <span class="badge text-bg-success"><?= $completedCount ?></span> <!-- Completed -->
                        <span class="badge text-bg-dark"><?= $failedCount ?></span> <!-- Failed -->
                        <span class="badge text-bg-danger"><?= $canceledCount ?></span> <!-- Canceled -->
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach;?>
</ul>