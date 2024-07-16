<!-- comp-table-officers.php -->
<table class="table table-hover table-borderless" id="table-officers">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Role</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php getAccounts(); ?>
        <?php foreach ($_SESSION['officers'] as $officer) : ?>
        <tr class="officer-account" data-id="<?= $officer['id'] ?>">
            <td><?= $officer['id'] ?></td>
            <td><?= $officer['name'] ?></td>
            <td><?= $officer['created_at'] ?></td>
            <td><?= $officer['updated_at'] ?></td>
            <td><?= $officer['role'] ?></td>
            <td>
                <div class="dropdown">
                <button class="btn" style="display: none;" id="btn-options-officers" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li class="dropdown-item">
                        <span><i class="bi bi-pencil-fill"></i> Edit</span>
                    </li>
                    <li class="dropdown-item">
                        <span><i class="bi bi-person-x-fill"></i> Delete</span>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>