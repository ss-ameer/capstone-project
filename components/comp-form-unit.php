<!-- comp-unit-truck.php -->
<form id="add-unit-form">
    <div class="container">
        <div class="row g-1">
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" id="unit-add_number" name="truck_number" class="form-control" placeholder="Truck Number" required>
                    <label for="unit-add_number">Truck Number</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <select id="unit-add-type" name="truck_type_id" class="form-select" required>
                        <option selected disabled>Unit Type</option>
                        <?php foreach ($unit_types as $type) :?>
                            <option value="<?= $type['id'] ?>"><?= $type['type_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="unit-add_type">Unit Type</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-2">Add Unit</button>
            </div>
        </div>
    </div>

</form>
