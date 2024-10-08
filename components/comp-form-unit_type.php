<!-- comp-form-unit_type.php -->
<form id="add-unit_type-form" class="">
    <div class="container">
        <div class="row g-1">
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" id="add-unit_type-name" name="type_name" class="form-control" placeholder="Unit Type Name" required>
                    <label for="add-unit_type-name">Unit Type Name</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input type="number" step="0.1" id="add-unit_type-capacity" name="capacity" class="form-control" placeholder="Unit Capacity" required>
                    <label for="add-unit_type-capacity">Unit Capacity (in cubic meters)</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Unit Type</button>
            </div>
        </div>
    </div>

</form>