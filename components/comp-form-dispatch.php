<!-- comp-form-dispatch.php -->
<form action="" id="dispatch-form">
    <div class="container">
        <div class="row g-5" id="dispatch-form-details">

            <!-- Order Details -->
            <div class="col-6 first-column">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Order ID: </span>
                    <span class="order-id"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Item: </span>
                    <span class="item-name"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Unit: </span>
                    <span class="unit-type"></span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Price: </span>
                    <span class="item-total"></span>
                </div>
            </div>

            <!-- Client and Location Details -->
            <div class="col-6">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Date: </span>
                    <span class="order-created"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Client: </span>
                    <span class="client-name"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Phone: </span>
                    <span class="client-phone"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Email: </span>
                    <span class="client-email"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Location: </span>
                    <span class="order-location"></span>
                </div>
            </div>

        </div>

        <!-- Truck and Driver Selection -->
        <div class="row mt-3">
            <div class="col">
                <label for="dispatch-truck" class="form-label">Truck</label>
                <select id="dispatch-truck" name="truck_id" class="form-select" required>
                    <option selected disabled>Choose a Truck</option>
                </select>
            </div>

            <div class="col">
                <label for="dispatch-driver" class="form-label">Driver</label>
                <select id="dispatch-driver" name="driver_id" class="form-select" required>
                    <option selected disabled>Choose a Driver</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-primary h-100 w-100">Add to Queue</button>
            </div>
        </div>

    </div>
</form>
