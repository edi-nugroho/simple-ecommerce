<nav id="sidebar">
    <div class="sidebar-header">
        <div class="header-logo"></div>
        <div class="header-title">
            <h5>Edie</h5>
            <p>Super Admin</p>
        </div>
    </div>

    <ul class="list-unstyled components">

        <?php if(in_groups('admin')) : ?>
            <p>User Management</p>
            <li>
                <a href="#">Staff List</a>
                <a href="#">Staff Management</a>
            </li>
        <?php endif; ?>

        <p>Products Management</p>
        <li>
            <a href="#">Portfolio</a>
        </li>

        <p>Category Management</p>
        <li>
            <a href="#">Contact</a>
        </li>

        <hr>

        <li>
            <a href="">Logout</a>
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