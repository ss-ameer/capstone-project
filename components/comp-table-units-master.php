<!-- comp-table-units-master.php -->
<table class="table-bordered" id="table-trucks">
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
            $initial_limit = 10;
            $units = getUnits(limit: $initial_limit);
            $dependencies = [['table' => 'dispatch', 'column' => 'truck_id']];
        ?>
        <?php foreach ($units as $unit) : ?>
            <?php $columns = [
                [
                    'type' => 'text',
                    'data' => ['truck_number' => $unit['truck_number']]
                ],
                [   
                    'type' => 'select',
                    'table' => 'truck_types',
                    'columns' => 'id',
                    'display' => 'type_name',
                    'data' => ['truck_type_id' => $unit['truck_type']]
                ],
                [
                    'type' => 'select manual',
                    'options' => ['available', 'in_use', 'maintenance', 'out_of_service'],
                    'data' => ['status' => $unit['status']]
                ]
            ]; ?>
            <tr class="unit" data-officer-id="<?= $unit['id'] ?>">
                <td><?= str_pad($unit['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $unit['truck_number'] ?></td>
                <td><?= $unit['truck_type'] ?></td>
                <td><?= $unit['status'] ?></td>
                <td><?= $unit['created_at'] ?></td>
                <td><?= $unit['updated_at'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "trucks"
                        data-id-column = "id"
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $unit['id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="trucks" 
                        data-column="id" 
                        data-id-column="id"
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
    <tfoot>
        <tr>
            <td colspan="8" class="text-center">
                <a href="#" class="show-more-btn" data-table-id="trucks" data-offset="<?= $initial_limit ?>" data-dependencies = '<?= json_encode($dependencies) ?>'>
                    Show More
                </a>
            </td>
        </tr>
    </tfoot>
</table>