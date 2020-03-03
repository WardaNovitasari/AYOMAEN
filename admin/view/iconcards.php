 <!-- Icon Cards ketetapan -->
 <?php
 $nonaktiv = mysqli_query($config,"SELECT * FROM tb_akun WHERE status_akun='terkirim'");
  $count    = mysqli_num_rows($nonaktiv);
  $tempat   = mysqli_query($config,"SELECT * FROM tb_tempat_menara RIGHT JOIN tb_form_menara ON tb_tempat_menara.id_form=tb_form_menara.id_form RIGHT JOIN tb_akun ON tb_form_menara.id_perusahaan=tb_akun.id_akun");
  $count2   = mysqli_num_rows($tempat);
  $tempat3 = mysqli_query($config,"SELECT * FROM tb_tempat_fiber RIGHT JOIN tb_form_fiber ON tb_tempat_fiber.id_form=tb_form_fiber.id_form RIGHT JOIN tb_akun ON tb_form_fiber.id_perusahaan=tb_akun.id_akun");
  $count3=mysqli_num_rows($tempat3);
 ?>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user"></i>
                </div>
                <p><i class="fas fa-user"></i> User Belum Di Aprrove</p>
                <div class="mr-5"><?php echo($count) ?> Pesan!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tables.php">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-map-marker-alt"></i>
                </div>
                <p><i class="fas fa-map-marker-alt"></i> Menara</p>
                <div class="mr-5"><?php echo $count2; ?> Pesan!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tables_tempat.php">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-map-marker-alt"></i>
                </div>
                <p><i class="fas fa-map-marker-alt"></i> Fiber Optik</p>
                <div class="mr-5"><?php echo $count3; ?> Pesan!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tables_tempat2.php">
                <span class="float-left">Lihat Detail</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>