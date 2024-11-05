<!-- comp-table-clients-master.php -->
<table class="table-clients" id="table-clients">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $clients = getClients();
            $dependencies = [
                ['table' => 'orders', 'column' => 'client_id'],
                ['table' => 'addresses', 'column' => 'client_id']
            ];
        ?>
        <?php foreach ($clients as $client) : ?>
            <?php $columns = [
                [
                    'type' => 'text',
                    'data' => ['name' => $client['name']]
                ]
            ]; ?>
            <tr class="client" style="width: 100%;">
                <td><?= str_pad($client['client_id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $client['name'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "clients"
                        data-id-column = "client_id" 
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $client['client_id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="clients" 
                        data-id-column="client_id" 
                        data-id="<?= $client['client_id'] ?>" 
                        data-name="<?= $client['client_id'] ?>"
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
            <td colspan="3" class="text-center">
                <a href="#" class="show-more-btn" data-table-id="clients" data-offset="<?= $initial_limit ?>" data-dependencies = '<?= json_encode($dependencies) ?>'>
                    Show More
                </a>
            </td>
        </tr>
    </tfoot>
</table>