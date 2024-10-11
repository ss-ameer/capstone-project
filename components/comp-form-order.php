<!-- comp-form-order.php -->
<form id="order-form" autocomplete="off" class="">
    <div class="container">
        <div class="row g-1">
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="order-form-name" placeholder="Client Name">
                    <label for="order-form-name">Name</label>
                    <ul id="order-form-client-suggestions" class="list-group position-absolute w-100 z-3" style="display:none"><li></li></ul>
                </div>
            </div>

            <div class="col-12">
                <div class="input-group">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="order-form-address_city" placeholder="City">
                        <label for="order-form-address_city">City</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="order-form-address_brgy" placeholder="Barangay">
                        <label for="order-form-address_brgy">Barangay</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="order-form-address_street" placeholder="Street">
                        <label for="order-form-address_street">Street</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="order-form-address_number" placeholder="Number">
                        <label for="order-form-address_number">Number</label>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input type="number" class="form-control" id="order-form-number" placeholder="Contact Number">
                    <label for="order-form-numer">Contact Number</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="order-form-email" placeholder="Email">
                    <label for="order-form-email">Email</label>
                </div>
            </div>

            <div class="col-12 d-none">
                <input type="hidden" id="order-items-total_qty-input" name="total_qty" value="0">
                <input type="hidden" id="order-items-total_price-input" name="total_amount" value="0.00">
            </div>
        </div>
    </div>
</form>