<!-- comp-content-order-view.php -->
<div id="order-items-section" class="container border shadow-sm p-3 rounded position-relative" style="max-height: 400px; height: 400px; overflow-y: auto;">
    
    <div class="d-flex justify-content-between">
        <span class="lead">Order ID: 0001</span>
        <button type="button" class="btn-close" aria-label="Close"></button>
    </div>

    <hr>

    <div class="card mb-2" id="order-display-client">
        <div class="card-header">
            <h6 class="card-title">Client</h6>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-1">
                <span>name : </span><span class="name"></span>
            </div>
            <div class="d-flex justify-content-between mb-1">
                <span>number : </span><span class="number"></span>
            </div>
            <div class="d-flex justify-content-between">
                <span>email : </span><span class="email"></span>
            </div>
        </div>
    </div>

    <div class="card mb-2" id="order-display-location">
        <div class="card-header">
            <h6 class="card-title">Location</h6>
        </div>
        <div class="card-body">                                    
            <div class="d-flex justify-content-between">
                <span class="location">420, Sibuma Street, Plaridel, Llanera</span>
            </div>
        </div>
    </div>

    <div class="card" id="order-display-items">
        <div class="card-header">
            <h6 class="card-title">Order Items</h6>
        </div>
        <div class="card-body">

            <ul class="list-group mb-2 pending">
                <li class="list-group-item list-group-item-secondary text-center">
                    <span>Pending</span>
                </li>
                <!-- order items will be dynamically generated. -->
                <li class="list-group-item d-flex justify-content-between">
                    <input class="form-check-input" type="radio" name="listGroupRadio" value="" id="firstRadio">
                    <div class="w-50 d-flex justify-content-between">
                        <span>Buhangin</span>
                        <span>Elf</span>
                    </div>
                    <div class="d-flex justify-content-between w-25">
                        <span>2000</span>
                        <span class="">1200</span>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <input class="form-check-input" type="radio" name="listGroupRadio" value="" id="secondRadio">
                    <div class="w-50 text-center d-flex justify-content-between">
                        <span>Gravel</span>
                        <span>Howler</span>
                    </div>
                    <div class="d-flex justify-content-between w-25">
                        <span>100</span>
                        <span class="">3500</span>
                    </div>
                </li>
            </ul>

            <ul class="list-group mb-2 in-progress">
                <li class="list-group-item list-group-item-info text-center">
                    <span>In-progress</span>
                </li>
            </ul>

            <ul class="list-group mb-2 successful">
                <li class="list-group-item list-group-item-success text-center">
                    <span>Successful</span>
                </li>
            </ul>

            <ul class="list-group canceled">
                <li class="list-group-item list-group-item-dark text-center">
                    <span>Canceled</span>
                </li>
            </ul>
        </div>
    </div>

</div>