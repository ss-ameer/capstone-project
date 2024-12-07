<!-- Order Details Modal -->
<?php 
    
?>
<div class="modal fade" id="order-details-modal" tabindex="-1" aria-labelledby="order-details-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="order-details-modal-label">Order Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="c-section">
                                <div class="c-section-header bg-light">
                                    <div class="c-title-container">
                                        <span class="lead text-center">Order Details</span>
                                    </div>
                                </div>
                                <div class="container p-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <div class="container border py-2 rounded">
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Order ID:</strong> <span id="modal-order-id"></span>
                                                        </span>
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Date:</strong> <span id="modal-order-date"></span> 
                                                        </span>
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Time:</strong> <span id="modal-order-time"></span>
                                                        </span>
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Status:</strong> <span id="modal-status"></span>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="container border py-2 rounded">
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Client ID:</strong> <span id="modal-client-id"></span>
                                                        </span>
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Name:</strong> <span id="modal-client-name"></span>
                                                        </span>
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Phone:</strong> <span id="modal-client-phone"></span>
                                                        </span>
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Email:</strong> <span id="modal-client-email"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="container border py-2 rounded">
                                                        <span class="d-flex justify-content-between">
                                                            <strong>Address:</strong> <span id="modal-address"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="c-section bg-light">
                                <div class="c-section-header_table bg-light">
                                    <div class="c-title-container">
                                        <span class="lead">Order Items</span>
                                    </div>
                                </div>
                                <div class="c-table-container">
                                    <table id="modal-order-items-table">
                                        <thead>
                                            <th scope="col">ID</th>
                                            <th scope="col">Item ID</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Unit Type</th>
                                            <th scope="col">Status</th>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php foreach ($_SESSION['order_items'] as $order_item): ?>
                                                <tr>
                                                    <td><?= $order_item['id'] ?></td>
                                                    <td><?= $order_item['item_id'] ?></td>
                                                    <td><?= formatPrice($order_item['price']) ?></td>
                                                    <td><?= formatPrice($order_item['item_total']) ?></td>
                                                    <td><?= $order_item['truck_type_id'] ?></td>
                                                    <td><?= $order_item['status'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="d-flex justify-content-between w-100">
                                                        <strong>Total Price:</strong> <span id="modal-total-price"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
