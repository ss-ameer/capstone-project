<!-- comp-table-unit_types-master.php -->
<table class="table-bordered" id="table-unit_types">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Capacity</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $unit_types = getUnitTypes();
            $dependencies = [
                ['table' => 'order_items', 'column' => 'truck_type_id']
            ];
        ?>
        <?php foreach ($unit_types as $unit_type) : ?>
            <?php $columns = [
                [
                    'type' => 'text',
                    'data' => ['type_name' => $unit_type['type_name']]
                ],
                [
                    'type' => 'text',
                    'data' => ['capacity' => $unit_type['capacity']]
                ]
            ]; ?>
            <tr class="unit-type" data-officer-id="<?= $unit_type['id'] ?>" style="width: 100%;">
                <td><?= str_pad($unit_type['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $unit_type['type_name'] ?></td>
                <td><?= $unit_type['capacity'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "unit-types"
                        data-id-column = "id" 
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $unit_type['id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="unit_types" 
                        data-id-column="id" 
                        data-id="<?= $unit_type['id'] ?>" 
                        data-name="<?= $unit_type['type_name'] ?>"
                        data-dependencies='<?= json_encode($dependencies) ?>'
                    >
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>