<!-- comp-table-logs.php -->
<table>
    <thead>
        <tr>
            <th scope="col">Entity</th>
            <th scope="col">ID</th>
            <th scope="col">Event</th>
            <th scope="col">Note</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
        </tr>
    </thead>
    <tbody>
        <!-- logs will be dynamically added -->
        <?php $logs = getLogs(); ?>
        <?php foreach ($logs as $log) :?>
            <?php
                $paddedId = str_pad($log['entity_id'], 4, '0', STR_PAD_LEFT);
                $entity = ucfirst($log['entity_type']);
                $event = ucfirst($log['event_type']);
                $dateTime = new DateTime($log['timestamp']);
                $date = $dateTime->format('Y-m-d'); 
                $time = $dateTime->format('H:i:s'); 
            ?>
            <tr>
                <td><?= $entity ?></td>
                <td><?= $paddedId ?></td>
                <td><?= $event ?></td>
                <td><?= $log['event_description'] ?></td>
                <td><?= $date ?></td>
                <td><?= $time ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>