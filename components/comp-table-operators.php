<!-- comp-table-operators.php -->
<table class="align-middle" id="table-drivers">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Lisence</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php $drivers = getDrivers(); ?>
        <?php foreach ($drivers as $driver) : ?>
        
        <tr class="driver" data-id_driver="<?= $driver['id'] ?>">
            <td><?= $driver['id'] ?></td>
            <td><?= $driver['name'] ?></td>
            <td><?= $driver['phone_number'] ?></td>
            <td><?= $driver['license_number'] ?></td>
            <td><?= $driver['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>