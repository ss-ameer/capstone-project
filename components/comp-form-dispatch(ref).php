<!-- comp-form-dispatch(ref).php -->
<div class="container mt-4">
    <!-- <h5 class="mb-3">Create New Dispatch</h5> -->
    <form id="dispatch-form" class="border rounded p-3 shadow-sm row">
        <div class="col-md-6 mb-3">
            <label for="dispatch-driver" class="form-label">Driver</label>
            <select id="dispatch-driver" name="driver_id" class="form-select" required>
                <option selected disabled>Choose a Driver</option>
                <?php foreach ($drivers as $driver) : ?>
                    <option value="<?= $driver['id'] ?>"><?= $driver['driver_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="dispatch-truck" class="form-label">Truck</label>
            <select id="dispatch-truck" name="truck_id" class="form-select" required>
                <option selected disabled>Choose a Truck</option>
                <?php foreach ($trucks as $truck) : ?>
                    <option value="<?= $truck['id'] ?>"><?= $truck['truck_number'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12 mb-3">
            <label for="dispatch-order-item" class="form-label">Order Item</label>
            <select id="dispatch-order-item" name="order_item_id" class="form-select" required>
                <option selected disabled>Select an Order Item</option>
                <?php foreach ($orderItems as $item) : ?>
                    <option value="<?= $item['id'] ?>">
                        Order #<?= $item['order_id'] ?> - <?= $item['item_name'] ?> (<?= $item['quantity'] ?> trucks)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="col-12 btn btn-primary">Dispatch</button>
    </form>
</div>