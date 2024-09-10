<!-- comp-form-driver.php -->
<div class="container mt-4">
    <h5 class="mb-3">Add New Driver</h5>
    <form id="add-driver-form" class="border p-3 shadow-sm rounded">
        <div class="form-floating mb-2">
            <input type="text" id="add-driver-first_name" name="first_name" class="form-control" placeholder="First Name" required>
            <label for="add-driver-first_name">First Name</label>
        </div>

        <div class="form-floating mb-2">
            <input type="text" id="add-driver-last_name" name="last_name" class="form-control" placeholder="Last Name" required>
            <label for="add-driver-last_name">Last Name</label>
        </div>

        <div class="form-floating mb-2">
            <input type="text" id="add-driver-license_number" name="license_number" class="form-control" placeholder="License Number" required>
            <label for="add-driver-license_number">License Number</label>
        </div>

        <div class="form-floating mb-2">
            <input type="text" id="add-driver-phone_number" name="phone_number" class="form-control" placeholder="Phone Number" required>
            <label for="add-driver-phone_number">Phone Number</label>
        </div>

        <div class="form-floating mb-2">
            <select id="add-driver-status" name="status" class="form-select" required>
                <option value="available" selected>Available</option>
                <option value="on_trip">On Trip</option>
                <option value="unavailable">Unavailable</option>
            </select>
            <label for="add-driver-status">Driver Status</label>
        </div>

        <button type="submit" class="btn btn-primary">Add Driver</button>
    </form>
</div>
