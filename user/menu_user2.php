 <?php
 if($_SESSION['riwayat']==1){
  $perusahaan1 = $_SESSION['perusahaan'];
  $formmenara = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_perusahaan ON tb_form_menara.id_perusahaan = tb_perusahaan.id_perusahaan WHERE tb_perusahaan.nm_perusahaan ='$perusahaan1' AND status_form='tidak_lengkap'");
  $countform = mysqli_num_rows($formmenara);
 ?>
<style >
  .menu-sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #2c3e50;
  position: fixed;
  height: 100%;
  overflow: auto;
  }
</style>
 <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">        
<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php"><i class="fas fa-home"></i> Beranda</a>
  <a href="map.php"><i class="fas fa-map alt"></i> Lihat Lokasi</a>
  <a href="javascript:void(0)" onclick="subMenu()"><i class="fas fa-clock alt" ></i> Riwayat</a>
  <div class="sidemenu" id="mySubmenu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSub()">&times;</a>
    <a href="riwayat.php"><i class="fas fa-map"></i> Riwayat Pengajuan Tempat</a>
    <a href="riwayat_form.php"><i class="fas fa-file danger"></i> <span class="badge badge-danger"><?php echo $countform ?></span> Riwayat Pengajuan Form</a>
</div>
       
</div>
        <div class="container-fluid">
           <button class="btn openbtn d-md-flex mr-3" id="menu-toggle"  type="button" onclick="openNav()">
          <i class="fas fa-bars">
           </i>
           </button>
            <h1 class="d-md-flex" style="font-size: 24px;font-weight: bold;color: #4e73df;">CLEON</h1>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                 
                </li>
                <li class="nav-item dropdown no-arrow" role="presentation">
                    <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">

                      <span class="d-md-flex text-gray-600 small">
                        <i class="typcn typcn-th-large-outline" style="font-size: 32px;color: #2c3e50;">
                        </i></span></a>
                        <div
                            class="dropdown-menu shadow dropdown-menu-right animated--grow-in force-scroll" role="menu" style="width: 250px;"><i class="far fa-user-circle d-flex d-lg-flex justify-content-center justify-content-lg-center" style="font-size: 49px;padding-top: 18px;padding-bottom: 10px;color: #4e73df;"></i>
                            <h1 class="d-flex d-lg-flex justify-content-center justify-content-lg-center"
                                style="color: #2c3e50;font-size: 12px;"><?php echo $_SESSION['username'] ?></h1>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#logoutModal" style="color: rgb(78,115,223);font-weight: bold;"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;"></i>&nbsp;SIGN OUT</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#tambahperusahaan" style="color: rgb(78,115,223);font-weight: bold;"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;"></i>&nbsp;Tambah Perusahaan</a>
                            <?php
                                $query=mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun = tb_akun.id_akun WHERE tb_akun.username = '$username' AND status_aktif='diterima'");
                                while($tempat=mysqli_fetch_array($query)){ ?>
                            <form action="../aksi/user/beranda.php" method="post">
                            <div class="dropdown-divider"></div>
                              <input type="text" name="nmperusahaan" value="<?php echo $tempat['nm_perusahaan'] ?>" hidden>
                              <!-- <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;font-size: 15px;">&nbsp; -->
                              <input type="submit" name="submit" value="<?php echo $tempat['nm_perusahaan'] ?>" class="dropdown-item" role="presentation"  style="color: #2c3e50;font-weight: bold;font-size: 15px; padding-left: 18px">
                                
                              </input>
                            </form>
                              <?php } ?>
                              </div>
          </li>
        </li>
        </ul>
        </div>
    </nav>
<?php }else if($_SESSION['riwayat']==2){?>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">        
<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.php"><i class="fas fa-home"></i> Beranda</a>
  <a href="map.php"><i class="fas fa-map alt"></i> Lihat Lokasi</a>
  <a href="riwayat_fo.php"><i class="fas fa-clock alt"></i> Riwayat</a>
       
</div>
        <div class="container-fluid">
           <button class="btn openbtn d-md-flex mr-3" id="menu-toggle"  type="button" onclick="openNav()">
          <i class="fas fa-bars">
           </i>
           </button>
            <h1 class="d-md-flex" style="font-size: 24px;font-weight: bold;color: #4e73df;">CLEON</h1>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                 
                </li>
                <li class="nav-item dropdown no-arrow" role="presentation">
                    <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">

                      <span class="d-md-flex text-gray-600 small">
                        <i class="typcn typcn-th-large-outline" style="font-size: 32px;color: #2c3e50;">
                        </i></span></a>
                        <div
                            class="dropdown-menu shadow dropdown-menu-right animated--grow-in force-scroll" role="menu" style="width: 250px;"><i class="far fa-user-circle d-flex d-lg-flex justify-content-center justify-content-lg-center" style="font-size: 49px;padding-top: 18px;padding-bottom: 10px;color: #4e73df;"></i>
                            <h1 class="d-flex d-lg-flex justify-content-center justify-content-lg-center"
                                style="color: #2c3e50;font-size: 12px;"><?php echo $_SESSION['username'] ?></h1>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#logoutModal" style="color: rgb(78,115,223);font-weight: bold;"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;"></i>&nbsp;SIGN OUT</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" role="presentation" href="#" data-toggle="modal" data-target="#tambahperusahaan" style="color: rgb(78,115,223);font-weight: bold;"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;"></i>&nbsp;Tambah Perusahaan</a>
                            <?php
                                $query=mysqli_query($config,"SELECT * FROM tb_perusahaan JOIN tb_akun ON tb_perusahaan.id_akun = tb_akun.id_akun WHERE tb_akun.username = '$username' AND status_aktif='diterima'");
                                while($tempat=mysqli_fetch_array($query)){ ?>
                            <form action="../aksi/user/beranda.php" method="post">
                            <div class="dropdown-divider"></div>
                              <input type="text" name="nmperusahaan" value="<?php echo $tempat['nm_perusahaan'] ?>" hidden>
                              <!-- <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400" style="color: #4e73df;font-size: 15px;">&nbsp; -->
                              <input type="submit" name="submit" value="<?php echo $tempat['nm_perusahaan'] ?>" class="dropdown-item" role="presentation"  style="color: #2c3e50;font-weight: bold;font-size: 15px; padding-left: 18px">
                                
                              </input>
                            </form>
                              <?php } ?>
                              </div>
          </li>
        </li>
        </ul>
        </div>
    </nav>


  <!-- <ul class="menu-sidebar">
      <li><a href="home.php"><i class="fas fa-home"></i> Beranda</a></li>
      <li><a href="mapfo.php"><i class="fas fa-map alt"></i> Lihat Lokasi</a></li>
      <li><a href="riwayat_fo.php"><i class="fas fa-clock alt"></i> Riwayat</a></li>

      <li>
        <input type="checkbox" id="sub-one" class="submenu-toggle">        
        <label class="submenu-label" for="sub-one"><i class="fas fa-user-circle"></i> Akun</label>
        <div class="arrow right">&#8250;</div>           
        <ul class="menu-sub">
          <li class="menu-sub-title">
            <label class="submenu-label" for="sub-one">Back</label>
            <div class="arrow left">&#8249;</div>              
          </li>        
          <li><a href="edit_password.php?id=<?php echo $_SESSION['username'] ?>"><i class="fas fa-key"></i> Ubah Password</a></li>
          <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-door-open danger"></i> Log-Out</a></li>                               
        </ul>
      </li>                                  
    </ul> 
  </li>
</ul> -->
<?php } ?>


  
    <style type="text/css">
      .nonaktiv{
        pointer-events: none;
      }

    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=9cbc0924ce97a7266bf70ef7dd6f47d4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css?h=03ab36d1dde930b7d44a712f19075641">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=caf0e66302acd59bc37078e71bfa5f04">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">

      /* The sidepanel menu */
.sidepanel {
  height: 100%; /* Specify a height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: white; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
}

/* The sidepanel links */
.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidepanel a:hover {
  color: blue;
}

/* Position and style the close button (top right corner) */
.sidepanel .closebtn {
  position: absolute;
  top: 0;
  color: blue;
  right: 25px;
  font-size: 40px;
  margin-left: 50px;
  cursor: pointer;
}


/* Style the button that is used to open the sidepanel */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  color: blue;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  color: black;
}

.sidemenu {
  height: 100%; /* Specify a height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color: white; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
}

/* The sidepanel links */
.sidemenu a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidemenu a:hover {
  color: blue;
}

/* Position and style the close button (top right corner) */
.sidemenu .closebtn {
  position: absolute;
  top: 0;
  color: blue;
  right: 25px;
  font-size: 40px;
  margin-left: 50px;
  cursor: pointer;
}


/* Style the button that is used to open the sidepanel */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  color: blue;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  color: black;
}
    </style>




    <script type="text/javascript">
      /* Set the width of the sidebar to 250px (show it) */
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeSub() {
  document.getElementById("mySubmenu").style.width = "0px";
  document.getElementById("mySidepanel").style.width = "0";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

function subMenu() {
  document.getElementById("mySubmenu").style.width = "500px";
}
function buka(){
  $('.collapse').collapse()
}
    </script>