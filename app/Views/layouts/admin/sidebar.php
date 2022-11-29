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
            <a href="/admin">Dashboard</a>
        </li>

        <?php if(in_groups('admin')) : ?>
            <p>User Management</p>
            <li>
                <a href="#">Staff List</a>
                <a href="#">Staff Management</a>
            </li>
        <?php endif; ?>

        <p>Products Management</p>
        <li>
            <a href="/products">Products</a>
        </li>
        <li>
            <a href="">Stock</a>
        </li>

        <p>Categories Management</p>
        <li>
            <a href="/categories" class="">Categories</a>
        </li>

        <p>Order Management</p>
        <li>
            <a href="">Order list</a>
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