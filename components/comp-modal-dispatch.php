<!-- comp-modal-dispatch.php -->
<div class="modal fade" id="dispatch-modal" tabindex="-1" aria-labelledby="dispatch-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <link rel="stylesheet" href="<?php echo ROOT . 'styles/style.css' ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="dispatch-modal-label">Dispatch Slip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid fs-6">
                    <!-- header -->
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <h3>Eslaya Quarrying</h3>
                            <p>
                                Palayan City, Philippines <br>
                                Phone: <span id="contact-number">(+63) 912 345 6789</span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="pt-2">
                                <hr>
                                <h5 class="">Dispatch Slip</h5>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- main content -->
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="container p-2 d-flex flex-column align-items-center">
                                <div>
                                    <strong>Order : </strong>
                                    <span id="order-id"></span>
                                    <strong> : </strong>
                                    <span id="order-date"></span>
                                </div>

                                <div>
                                    <strong>Dispatch : </strong>
                                    <span id="dispatch-id"></span>
                                    <strong> : </strong>
                                    <span id="dispatch-date"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="border text-center pt-2">
                                <h6 class="">Dispatch Details</h6>
                            </div>

                            <div class="container-fluid border">
                                <div class="container py-3">
                                    <div class="c-flex-between">
                                        <strong>D. Officer: </strong>
                                        <span id="officer-name"></span>
                                    </div>

                                    <div class="c-flex-between">
                                        <strong class="">Driver: </strong>
                                        <span class="" id="driver-name">John Doe</span>
                                    </div>

                                    <div class="c-flex-between">
                                        <strong>Unit: </strong>
                                        <span id="truck-number">ABC-1234</span>
                                    </div>
                                </div>    
                            </div>      
                        </div>

                        <div class="col-6">
                            <div class="border text-center pt-2">
                                <h6 class="">Client Information</h6>
                            </div>
                            <div class="container-fluid py-3 border">
                                <div class="container">
                                    <div class="c-flex-between">
                                        <strong>Name:</strong> 
                                        <span id="client-name">John Doe</span>
                                    </div>

                                    <div class="c-flex-between">
                                        <strong class="">Number: </strong>
                                        <span class="" id="client-phone">09978714671</span>
                                    </div>

                                    <div class="c-flex-between">
                                        <strong>Email: </strong>
                                        <span id="client-email">sample@gmail.com</span>
                                    </div>
                                </div>
                            </div>      
                        </div>

                        <!-- Dispatch Address -->
                        <div class="col-12">
                            <div class="border text-center pt-2">
                                <h6>Address</h6>
                            </div>
                            <div class="container-fluid border">
                                <div class="text-center pt-3">
                                    <p id="dispatch-address"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Table -->
                        <div class="col-12">
                            <div class="border text-center pt-2">
                                <h6>Order Table</h6>
                            </div>
                            <div class="">
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
                                            <td><span id="item-name"></span></td>
                                            <td><span id="truck-capacity"></span></td>
                                            <td><span id="item-price"></span></td>
                                            <td><span id="item-total"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <hr>
                            <p class="fine-print" style="font-size: x-small">I hereby confirm that the dispatch details, as well as the order listed above, have been reviewed and found accurate in terms of type, price, and quantity. I acknowledge that it is my responsibility to inspect the items upon receipt. Once acknowledged, Eslaya Quarrying is not liable for any discrepancies related to type, pricing, quantity, or detail variations, including any issues that arise after acceptance of the delivery.</p>
                            <hr>
                        </div>

                        <div class="col-6 text-center">
                            <p>______________________________<br>Recieved By</p>
                        </div>

                        <div class="col-6 text-center">
                            <p>______________________________<br>Delivered By</p>
                        </div>

                        <div class="col-6 text-center">
                            <p>______________________________<br>Prepared By</p>
                        </div>

                        <div class="col-6 text-center">
                            <p>______________________________<br>Dispatched By</p>
                        </div>
                    </div>
                </div>
                <!-- <script src="../imports/bootstrap/js/bootstrap.bundle.js"></script> -->
            </div>

            <div class="modal-footer">
                <div class="container-fluid d-flex justify-content-center">
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="print-dispatch-slip" class="btn btn-success">Print Dispatch Slip</button>
                        <button type="button" id="confirm-in-transit" class="btn btn-primary">Confirm Dispatch</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
