<!-- comp-table-addresses-master.php -->
<table class="table-addresses" id="table-addresses">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Client</th>
            <th scope="col">City</th>
            <th scope="col">Barangay</th>
            <th scope="col">Street</th>
            <th scope="col">House Number</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $initial_limit = 10;
            $addresses = getAddresses($initial_limit, 0);
            $dependencies = [
                ['table' => 'orders', 'column' => 'address_id'],
                ['table' => 'addresses', 'column' => 'address_id']
            ];
            ?>
        <?php foreach ($addresses as $address) : ?>
            <?php 
                $columns = [
                    [   
                        'type' => 'select',
                        'table' => 'clients',
                        'columns' => 'client_id',
                        'display' => 'name',
                        'data' => ['client_id' => $address['client_id']]
                    ],
                ];
            ?>
            <tr class="address" style="width: 100%;">
                <td><?= str_pad($address['address_id'], 4, '0', STR_PAD_LEFT) ?></td>
                <td><?= $address['client_id'] ?></td>
                <td><?= $address['city'] ?></td>
                <td><?= $address['barangay'] ?></td>
                <td><?= $address['street'] ?></td>
                <td><?= $address['house_number'] ?></td>
                <td class="c-flex-center g-3">
                    <button class="btn btn-primary btn-sm edit-btn"
                        data-action = "edit"
                        data-table = "addresses"
                        data-id-column = "address_id" 
                        data-columns = '<?= json_encode($columns) ?>'
                        data-id = "<?= $address['address_id'] ?>" >
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <button class="btn btn-danger btn-sm delete-btn"
                        data-action="delete" 
                        data-table="addresses" 
                        data-id-column="address_id" 
                        data-id="<?= $address['address_id'] ?>" 
                        data-name="<?= $address['address_id'] ?>"
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
            <td colspan="7" class="text-center">
                <a href="#" class="show-more-btn" data-table-id="addresses" data-offset="<?= $initial_limit ?>" data-dependencies = '<?= json_encode($dependencies) ?>'>
                    Show More
                </a>
            </td>
        </tr>
    </tfoot>
</table>