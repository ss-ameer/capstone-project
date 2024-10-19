<div class="col-2 col-lg-2 col-md-3 col-sm-3 p-0 d-flex flex-column bg-dark shadow border-end" id="nav-side">
    <!-- navigation -->
    <ul class="nav flex-column" style="color: white;">
        <li class="nav-item d-none">
            <a class="nav-link text-reset" href="#" id="side-dashboard">
                <i class="bi bi-speedometer"></i> <span class="ms-3">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-reset" href="#" id="side-orders">
                <i class="bi bi-receipt"></i> <span class="ms-3">Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-reset" href="#" id="side-dispatch">
                <i class="bi bi-send"></i> <span class="ms-3">Dispatch</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-reset" href="#" id="side-stock">
                <i class="bi bi-box2"></i> <span class="ms-3">Items</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-reset" href="#" id="side-trucks">
                <i class="bi bi-truck"></i> <span class="ms-3">Units</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-reset" href="#" id="side-drivers">
                <i class="bi bi-person"></i> <span class="ms-3">Operators</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-reset" href="#" id="side-logs">
                <i class="bi bi-star"></i> <span class="ms-3">Logs</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-reset" href="#" id="side-master">
                <i class="bi bi-star"></i> <span class="ms-3">Master</span>
            </a>
        </li>
    </ul>

    <!-- user info -->
    <div class="mt-auto py-2 px-2 d-flex bg-light">
        <div class="w-100">
            <?= $_SESSION['user_info']['name'] ?>
        </div>
        <div class="btn-group dropup">
            <button class="btn p-0 option" id="btn-options-side" data-bs-toggle="dropdown" data-bs-offset="5, 15" aria-expanded="false">
                <i class="bi bi-gear-fill"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <button class="dropdown-item" type="button" id="logout-button">Logout</button>
                </li>
            </ul>
        </div>
    </div>
</div>
