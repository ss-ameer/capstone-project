<!-- comp-modal-dispatch.php
<div class="modal fade" id="dispatchModal" tabindex="-1" aria-labelledby="dispatchModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="dispatchModalLabel">Order Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        Order information will be inserted here
        <p><strong>Order ID:</strong> <span id="modal-order-id"></span></p>
        <p><strong>Item Name:</strong> <span id="modal-item-name"></span></p>
        <p><strong>Item Total:</strong> <span id="modal-item-total"></span></p>
        <p><strong>Driver Name:</strong> <span id="modal-driver-name"></span></p>
        <p><strong>Truck Number:</strong> <span id="modal-truck-number"></span></p>
        <p><strong>Officer Name:</strong> <span id="modal-officer-name"></span></p>
        <p><strong>Status:</strong> <span id="modal-status"></span></p>
        <p><strong>Dispatch Date:</strong> <span id="modal-dispatch-date"></span></p>
        <p><strong>Dispatch Time:</strong> <span id="modal-dispatch-time"></span></p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="confirmInTransit">Confirm "In-Transit"</button>
    </div>
    </div>
</div>
</div> -->

<!-- Dispatch Modal -->
<div class="modal fade" id="dispatchModal" tabindex="-1" aria-labelledby="dispatchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dispatchModalLabel">Dispatch Slip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h4>Eslaya Dispatch Services</h4>
                            <p>Palayan City, Philippines<br>Phone: <span id=""></span>+63 912 345 6789</p>
                        </div>
                        <div class="col-6 text-end">
                            <h4>Dispatch Receipt</h4>
                            <p>Date: <span id="modal-dispatch-date"></span><br>Time: <span id="modal-dispatch-time"></span></p>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-6">
                            <h5>Customer Information</h5>
                            <p>Name: <span id="modal-customer-name">John Doe</span><br>Order ID: <span id="modal-order-id"></span></p>
                        </div>
                        <div class="col-6">
                            <h5>Dispatch Information</h5>
                            <p>Driver: <span id="modal-driver-name"></span><br>Truck: <span id="modal-truck-number"></span></p>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Total (Tons)</th>
                                <th>Price (PHP/m³)</th>
                                <th>Total Cost (PHP)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span id="modal-item-name">Gravel</span></td>
                                <td><span id="modal-item-total"></span></td>
                                <td><span id="modal-price"></span></td>
                                <td><span id="modal-total-cost"></span></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row mt-3">
                        <div class="col-6">
                            <p><strong>Dispatch Officer:</strong> <span id="modal-officer-name"></span></p>
                        </div>
                        <div class="col-6 text-end">
                            <p><strong>Status:</strong> <span id="modal-status"></span></p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <p>Please sign below to confirm receipt of the dispatch.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 text-center">
                            <p>________________________<br>Customer Signature</p>
                        </div>
                        <div class="col-6 text-center">
                            <p>________________________<br>Driver Signature</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="confirmInTransit" class="btn btn-primary">Confirm Dispatch</button>
            </div>
        </div>
    </div>
</div>

