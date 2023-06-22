<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="admin/assets/images/user_img.png" alt="profile">
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <?php if (isset($_SESSION['login'])) : ?>
            <span class="font-weight-bold mb-2"><?= $_SESSION['login'] ?></span>
            <span class="text-secondary text-small"><?= $_SESSION['level'] ?></span>
          <?php endif; ?>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <?php if (isset($_SESSION['level']) && $_SESSION['level'] == "admin") : ?>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <span class="menu-title">User</span>
          <i class="mdi mdi-account-search-outline menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pesanan.php">
          <span class="menu-title">Data Pemesanan</span>
          <i class="mdi mdi-alert-circle-outline menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="layanan.php">
          <span class="menu-title">Data Layanan</span>
          <i class="mdi mdi-alert-circle-outline menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="metode.php">
          <span class="menu-title">Data Metode</span>
          <i class="mdi mdi-alert-circle-outline menu-icon"></i>
        </a>
      </li>
      <?php endif; ?>
  </ul>
</nav>
