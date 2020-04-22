<style>
  .navbar-nav 
 {
  background-color : #5c6064;
  }

</style>
 <nav class="navbar navbar-expand navbar-dark bg-abu static-top">
<img src="img/logo1.png">
    <!-- <a class="navbar-brand mr-1" href="index.php">Cleon</a> -->

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #d2d2d2;">
          <i class="fas fa-user-circle fa-fw" style="font-size: 30px"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="edit_password.php">Ubah Password<!-- <?php echo $_SESSION['username']; ?> --></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Keluar</a>
        </div>
      </li>
    </ul>

  </nav>