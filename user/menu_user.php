<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid">
           <button class="btn btn-link d-md-flex rounded-circle mr-3" id="menu-toggle"  type="button"><i class="fas fa-bars"></i>
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