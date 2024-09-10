<!-- comp-form-unit_type.php -->
<div class="container mt-4">
    <h5 class="mb-3">Add Unit Type</h5>
    <form id="add-unit_type-form" class="border p-3 shadow-sm rounded">
        <div class="form-floating mb-2">
            <input type="text" id="add-unit_type-name" name="type_name" class="form-control" placeholder="Unit Type Name" required>
            <label for="add-unit_type-name">Unit Type Name</label>
        </div>

        <div class="form-floating mb-2">
            <input type="number" id="add-unit_type-capacity" name="capacity" class="form-control" placeholder="Unit Capacity" required>
            <label for="add-unit_type-capacity">Unit Capacity (in cubic meters)</label>
        </div>

        <button type="submit" class="btn btn-primary">Add Unit Type</button>
    </form>
</div>