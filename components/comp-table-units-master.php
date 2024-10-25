<!-- comp-table-units-master.php -->
<table class="table-bordered" id="table-units">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Unit Number</th>
            <th scope="col">Unit Type</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $units = getUnits();
            $dependencies = [['table' => 'dispatch', 'column' => 'truck_id']];
        ?>
        <?php foreach ($units as $unit) : ?>
            <tr class="unit" data-officer-id="<?= $unit['id'] ?>">
                <td><?= str_pad($unit['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $unit['truck_number'] ?></td>
                <td><?= $unit['truck_type'] ?></td>
                <td><?= $unit['status'] ?></td>
                <td><?= $unit['created_at'] ?></td>
                <td><?= $unit['updated_at'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-unit-id="<?= $unit['id'] ?>" 
                        data-unit-number="<?= $unit['truck_number'] ?>">
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="trucks" 
                        data-column="id" 
                        data-id="<?= $unit['id'] ?>" 
                        data-name="<?= $unit['truck_number'] ?>"
                        data-dependencies='<?= json_encode($dependencies) ?>'
                        >
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>