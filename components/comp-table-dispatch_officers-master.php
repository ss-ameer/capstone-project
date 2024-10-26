<!-- comp-table-dispatch_officers.php -->
<table class="table" id="table-users">
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
            $dispatch_officers = getDispatchOfficers();
            $dependencies = [['table' => 'dispatch', 'column' => 'dispatch_officer_id']];
        ?>
        <?php foreach ($dispatch_officers as $officer) : ?>
            <tr class="officer" data-officer-id="<?= $officer['id'] ?>">
                <td><?= str_pad($officer['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $officer['name'] ?></td>
                <td><?= $officer['role'] ?></td>
                <td><?= $officer['created_at'] ?></td>
                <td><?= $officer['updated_at'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-officer-id="<?= $officer['id'] ?>" 
                        data-officer-name="<?= $officer['name'] ?>">
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
                            data-column="id"
                            data-id="<?= $officer['id'] ?>"
                            data-name="<?= $officer['name'] ?>" >
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </span>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>