<!-- comp-table-units.php -->
<?php $trucks = getUnits(); ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Number</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($trucks as $truck): ?>
            <tr>
            <td><?php echo str_pad($truck['id'], 4, '0', STR_PAD_LEFT); ?></td>
                <td><?php echo $truck['truck_type'];?></td>
                <td><?php echo $truck['truck_number'];?></td>
                <td><?php echo htmlspecialchars($truck['status']);?></td>
                <td><?php echo date('Y-m-d', strtotime($truck['created_at']));?></td>
                <td><?php echo date('Y-m-d', strtotime($truck['updated_at']));?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>