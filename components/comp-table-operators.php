<!-- comp-table-operators.php -->
<table id="table-operators" class="align-middle">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">License</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php $drivers = getDrivers(); ?>
        <?php foreach ($drivers as $driver) : ?>
        
        <tr class="driver" data-id_driver="<?= $driver['id'] ?>">
            <td data-column="id"><?= $driver['id'] ?></td>
            <td data-column="name"><?= $driver['name'] ?></td>
            <td data-column="phone"><?= $driver['phone_number'] ?></td>
            <td data-column="license"><?= $driver['license_number'] ?></td>
            <td data-column="status"><?= $driver['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>