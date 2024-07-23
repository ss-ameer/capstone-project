<div class="col-2 col-lg-2 col-md-3 col-sm-3 p-0 d-flex flex-column h-100 bg-dark" id="nav-side">

<div class="bg-light p-3 text-center">
    <i class="bi bi-truck"></i>
    <span>Dispatch</span>
</div>

<!-- navigation -->
<ul class="nav bg-warning">
<li class="nav-item">
    <a class="nav-link text-reset" href="#" id="side-dashboard">
        <i class="bi bi-speedometer"></i> Dashboard
    </a>
</li>
<li class="nav-item">
    <a class="nav-link text-reset" href="#" id="side-master">
        <i class="bi bi-star"></i> Master
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
