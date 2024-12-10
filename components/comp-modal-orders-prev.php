<!-- comp-modal-order-prev.php -->
<div class="modal fade" id="orderPreviewModal" tabindex="-1" aria-labelledby="orderPreviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderPreviewLabel">Order Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="orderPreviewMain">
                    <div class="container-fluid">
                        <!-- client info -->

                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <h3 class="mt-3"><?= $cms['main title'] ?></h3>
                                <p>
                                    <?= $cms['address'] ?> <br>
                                    Phone: <span id="contact-number"><?= $cms['contact'] ?></span>
                                </p>
                            </div>
                        </div>
                    
                    </div>

                    <div class="container-fluid border rounded mt-3 p-4">
                        <div class="row">
                            <div class="col-6">
                                <h6>Client Informations</h6>
                                <p id="preview-client-name">Name: </p>
                                <p id="preview-client-address">Address: </p>
                                <p id="preview-client-phone">Phone: </p>
                                <p id="preview-client-email">Email: </p>
                            </div>
                        </div>
                        <!-- order items section -->
                        <div class="row">
                            <div class="col">
                                <h6>Order Items</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="preview-order-items">
                                        <!-- orders will be dynamically added -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- totals section -->
                        <div class="row">
                            <div class="col-6">
                                <p id="preview-total-qty">Total Quantity: </p>
                                <p id="preview-total-price">Total Price: </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="orderPreviewPrint">Print</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>