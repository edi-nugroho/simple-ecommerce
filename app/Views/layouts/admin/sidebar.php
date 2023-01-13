<nav id="sidebar">
    <div class="sidebar-header">
        <div class="header-logo"></div>
        <div class="header-title">
            <h5><?= user()->username; ?></h5>
            <p><?= $user->description; ?></p>
        </div>
    </div>

    <ul class="list-unstyled components">

        <p>Dashboard</p>
        <li>
            <a href="/dashboard" class="<?= ($request->uri->getSegment(1) === 'dashboard') ? 'active' : ''; ?>">Dashboard</a>
        </li>

        <?php if(in_groups('admin')) : ?>
            <p>User Management</p>
            <li>
                <a href="/staff" class="<?= ($request->uri->getSegment(1) === 'staff') ? 'active' : ''; ?>">Staff</a>
            </li>
        <?php endif; ?>

        <p>Products Management</p>
        <li>
            <a href="/products" class="<?= ($request->uri->getSegment(1) === 'products') ? 'active' : ''; ?>">Products</a>
        </li>
        <li>
            <a href="/options" class="<?= ($request->uri->getSegment(1) === 'options') ? 'active' : ''; ?>">Options</a>
        </li>
        <li>
            <a href="/inventory" class="<?= ($request->uri->getSegment(1) === 'inventory') ? 'active' : ''; ?>">Stock</a>
        </li>

        <p>Categories Management</p>
        <li>
            <a href="/categories" class="<?= ($request->uri->getSegment(1) === 'categories') ? 'active' : ''; ?>">Categories</a>
        </li>

        <p>Order Management</p>
        <li>
            <a href="/orderLists" class="<?= ($request->uri->getSegment(1) === 'orderLists') ? 'active' : ''; ?>">Order list</a>
        </li>

        <hr>

        <li>
            <a href="<?= base_url('logout'); ?>">Logout</a>
        </li>

    <!-- <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li> -->
    </ul>
</nav>