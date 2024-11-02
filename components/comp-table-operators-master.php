<!-- comp-table-operators-master.php -->
<table class="table-bordered" id="table-operators">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">License</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $operators = getOperators();
            $dependencies = [
                ['table' => 'dispatch', 'column' => 'driver_id']
            ];
        ?>
        <?php foreach ($operators as $operator) : ?>
            <?php $columns = [
                [
                    'type' => 'text',
                    'data' => ['name' => $operator['name']]
                ],
                [
                    'type' => 'text',
                    'data' => ['license_number' => $operator['license_number']]
                ],
                [
                    'type' => 'text',
                    'data' => ['phone_number' => $operator['phone_number']]
                ],
                [
                    'type' => 'select manual',
                    'options' => ['available', 'on_trip', 'unavailable'], 
                    'data' => ['status' => $operator['status']]
                ],
            ]; ?>
            <tr class="operator" data-officer-id="<?= $operator['id'] ?>" style="width: 100%;">
                <td><?= str_pad($operator['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $operator['name'] ?></td>
                <td><?= $operator['license_number'] ?></td>
                <td><?= $operator['phone_number'] ?></td>
                <td><?= $operator['status'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "drivers"
                        data-id-column = "id" 
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $operator['id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="operators" 
                        data-id-column="id" 
                        data-id="<?= $operator['id'] ?>" 
                        data-name="<?= $operator['name'] ?>"
                        data-dependencies='<?= json_encode($dependencies) ?>'
                    >
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>