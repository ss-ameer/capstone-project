<!-- comp-form-truck.php -->
<div class="container mt-4">
    <h5 class="mb-3">Add New Truck</h5>
    <form id="add-unit-form" class="border p-3 shadow-sm">
        <div class="form-floating mb-2">
            <input type="text" id="unit-add_number" name="truck_number" class="form-control" placeholder="Truck Number" required>
            <label for="unit-add_number">Truck Number</label>
        </div>

        <div class="form-floating mb-2">
            <select id="unit-add-type" name="truck_type_id" class="form-select" required>
                <option selected disabled>Unit Type</option>
                <?php foreach ($unit_types as $type) :?>
                    <option value="<?= $type['id'] ?>"><?= $type['type_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="unit-add_type">Unit Type</label>
        </div>

        <div class="form-floating mb-2">
            <select id="unit-add_status" name="status" class="form-select" required>
                <option value="available" selected>Available</option>
                <option value="in_use">In Use</option>
                <option value="maintenance">Maintenance</option>
                <option value="out_of_service">Out of Service</option>
            </select>
            <label for="unit-add_status">Unit Status</label>
        </div>

        <button type="submit" class="btn btn-primary">Add Unit</button>
    </form>
</div>
