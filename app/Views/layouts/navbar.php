<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbarBrand" href="#">.Eazy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item px-3">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/allproducts">All Products</a></li>
            <li><a class="dropdown-item" href="#">Tshirt</a></li>
            <li><a class="dropdown-item" href="#">Pants</a></li>
            <li><a class="dropdown-item" href="#">Jacket</a></li>
          </ul>
        </li>
      </ul>
      <form action="/search" class="d-flex" role="search" method="GET">
        <input class="search-input me-2" name="q" type="text" placeholder="Search" value="<?= old('q'); ?>">
        <button class="btn" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
      <a href="/cart" class="mx-3 text-black text-decoration-none position-relative">
        <i class="fa-solid fa-cart-shopping"></i>
      </a>

      <?php if(!logged_in()) : ?>
        <a href="/login" class="mx-3 p-2 bg-black text-white text-decoration-none" style="font-size: 12px;font-weight: 700;">
          Masuk
        </a>        
        <a href="/register" class="mx-3 text-black text-decoration-none" style="font-size: 12px;font-weight: 700;">
          Daftar
        </a>        
      <?php endif; ?>
      
      <?php if(logged_in()) : ?>
          <a class="mx-3 text-black" href="/profile">
            <i class="fa-solid fa-user"></i>
          </a>
        <?php if(in_groups('admin') || in_groups('staff')) : ?> 
          <a href="/admin" class="mx-3 p-2 bg-black text-white text-decoration-none" style="font-size: 12px;">
            Admin Panel
          </a>
        <?php endif; ?>

        <a href="<?= base_url('logout'); ?>" class="mx-3 text-black text-decoration-none" style="font-size: 12px;">
          Logout
        </a>
      <?php endif; ?>
    </div>
  </div>
</nav>