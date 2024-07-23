<!-- comp-table-officers.php -->
<table class="table table-hover table-borderless caption-top" id="table-officers">
    <caption>Accounts</caption>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Role</th>
            <th scope="col"><i class="bi bi-gear-fill p-1"></i></th>
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
                <button class="btn p-0 m-0 option" style="display: none;" id="btn-options-officers" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li class="dropdown-item">
                        <span><i class="bi bi-pencil-fill pe-2"></i> Edit</span>
                    </li>
                    <li class="dropdown-item delete-account">
                        <span><i class="bi bi-person-x-fill pe-2"></i> Delete</span>
                    </li>
                </ul>
                </div>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>