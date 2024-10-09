<!-- comp-form-driver.php -->
<form id="add-driver-form">
    <div class="container">
        <div class="row g-1">
            <div class="col-md-6 col-sm-12">
                <div class="form-floating mb-2">
                    <input type="text" id="add-driver-name" name="name" class="form-control" placeholder="Name" required>
                    <label for="add-driver-name">Name</label>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-floating mb-2">
                    <input type="text" id="add-driver-license_number" name="license_number" class="form-control" placeholder="License Number" required>
                    <label for="add-driver-license_number">License Number</label>
                </div>            
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-floating mb-2">
                    <input type="text" id="add-driver-phone_number" name="phone_number" class="form-control" placeholder="Phone Number" required>
                    <label for="add-driver-phone_number">Phone Number</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating mb-2">
                    <select id="add-driver-status" name="status" class="form-select" required>
                        <option value="available" selected>Available</option>
                        <option value="on_trip">On Trip</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                    <label for="add-driver-status">Driver Status</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Driver</button>
            </div>
        </div>
    </div>
</form>