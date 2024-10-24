<!-- comp-table-dispatch_officers.php -->
<table class="table-bordered" id="table-users">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $dispatch_officers = getDispatchOfficers(); ?>
        <?php foreach ($dispatch_officers as $officer) : ?>
            <tr class="officer" data-officer-id="<?= $officer['id'] ?>">
                <td><?= str_pad($officer['id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $officer['name'] ?></td>
                <td><?= $officer['created_at'] ?></td>
                <td><?= $officer['updated_at'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-officer-id="<?= $officer['id'] ?>" 
                        data-officer-name="<?= $officer['name'] ?>">
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-officer-id="<?= $officer['id'] ?>" 
                        data-officer-name="<?= $officer['name'] ?>">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>