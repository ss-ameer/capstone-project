<!-- comp-table-units.php -->
<?php $trucks = getUnits(); ?>
<table id="table-units">
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
                <td data-column="id"><?php echo str_pad($truck['id'], 4, '0', STR_PAD_LEFT); ?></td>
                <td data-column="type"><?php echo $truck['truck_type'];?></td>
                <td data-column="number"><?php echo $truck['truck_number'];?></td>
                <td data-column="status"><?php echo htmlspecialchars($truck['status']);?></td>
                <td data-column="created"><?php echo date('Y-m-d', strtotime($truck['created_at']));?></td>
                <td data-column="updated"><?php echo date('Y-m-d', strtotime($truck['updated_at']));?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>