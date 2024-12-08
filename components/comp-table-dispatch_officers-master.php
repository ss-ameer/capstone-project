<!-- comp-table-dispatch_officers.php -->
<table class="table" id="table-dispatch_officers">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $initial_limit = 10;
            $dispatch_officers = getDispatchOfficers($initial_limit);
            $dependencies = [['table' => 'dispatch', 'column' => 'dispatch_officer_id']];
        ?>
        <?php foreach ($dispatch_officers as $officer) : ?>
            <?php $columns = [
                [
                    'type' => 'text',
                    'data' => ['name' => $officer['name']] 
                ],

                [
                    'type' => 'text',
                    'data' => ['username' => $officer['username']] 
                ],

                [
                    'type' => 'select manual',
                    'options' => ['officer', 'master'],
                    'data' => ['role' => $officer['role']]
                ]
            ]; ?>
            <tr class="officer" data-officer-id="<?= $officer['id'] ?>">
                <td><?= str_pad($officer['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $officer['name'] ?></td>
                <td><?= $officer['username'] ?></td>
                <td><?= $officer['role'] ?></td>
                <td><?= $officer['created_at'] ?></td>
                <td><?= $officer['updated_at'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action="edit"
                        data-table="dispatch_officers"
                        data-id-column="id"
                        data-columns='<?= json_encode($columns) ?>'
                        data-id="<?= $officer['id'] ?>" 
                        >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <span
                        <?php if (getCurrentOfficer('id') == $officer['id']): ?> 
                            class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Can't delete while logged in.">
                        <?php endif; ?>
                        <button class="btn btn-danger btn-sm delete-btn 
                        <?php if (getCurrentOfficer('id') == $officer['id']): ?>
                            disabled
                        <?php endif; ?>"
                            data-action="delete"
                            data-table="dispatch_officers"
                            data-id-column="id"
                            data-id="<?= $officer['id'] ?>"
                            data-name="<?= $officer['name'] ?>" 
                            data-dependencies='<?= json_encode($dependencies) ?>'
                        >
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </span>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" class="text-center">
                <a href="#" class="show-more-btn" data-table-id="dispatch_officers" data-offset="<?= $initial_limit ?>" data-dependencies = '<?= json_encode($dependencies) ?>'>
                    Show More
                </a>
            </td>
        </tr>
    </tfoot>
</table>