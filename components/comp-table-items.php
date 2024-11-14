<!-- comp-table-items.php -->
<table id="table-stocks">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Density</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        <?php getItems(); ?>
        <?php foreach ($_SESSION['items'] as $item) : ?>
        
        <tr class="item" data-id_item="<?= $item['item_id'] ?>">
            <td data-column="id"><?= str_pad($item['item_id'], 4, '0', STR_PAD_LEFT) ?></td>
            <td data-column="name"><?= $item['item_name'] ?></td>
            <td data-column="category"><?= $item['category'] ?></td>
            <td class="text-center"><?= $item['density'] ?></td>
            <td class="text-center"><?= $item['price'] ?></td>
            <td><?php $description = $item['description'];
                    echo mb_strimwidth($description, 0, 50, '...') ?></td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>