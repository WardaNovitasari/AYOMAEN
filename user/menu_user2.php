 <?php
 if($_SESSION['riwayat']==1){
  $perusahaan1 = $_SESSION['perusahaan'];
  $formmenara = mysqli_query($config,"SELECT * FROM tb_form_menara JOIN tb_perusahaan ON tb_form_menara.id_perusahaan = tb_perusahaan.id_perusahaan WHERE tb_perusahaan.nm_perusahaan ='$perusahaan1' AND status_form='tidak_lengkap'");
  $countform = mysqli_num_rows($formmenara);
 ?>

 <ul class="menu-sidebar">
      <li><a href="home.php"><i class="fas fa-home"></i> Beranda</a></li>
      <li><a href="map.php"><i class="fas fa-map alt"></i> Lihat Lokasi</a></li>
      <li>
        <input type="checkbox" id="sub-one" class="submenu-toggle">        
        <label class="submenu-label" for="sub-one"><i class="fas fa-clock alt"></i> Riwayat</label>
        <div class="arrow right">&#8250;</div>           
        <ul class="menu-sub">
          <li class="menu-sub-title">
            <label class="submenu-label" for="sub-one">Back</label>
            <div class="arrow left">&#8249;</div>              
          </li>        
          <li><a href="riwayat.php"><i class="fas fa-map"></i> Riwayat Pengajuan Tempat</a></li>
          <li><a href="riwayat_form.php"><i class="fas fa-file danger"></i> <span class="badge badge-danger"><?php echo $countform ?></span> Riwayat Pengajuan Form</a></li>                               
        </ul>
      </li> 

      <li>
        <input type="checkbox" id="sub-two" class="submenu-toggle">        
        <label class="submenu-label" for="sub-two"><i class="fas fa-user-circle"></i> Akun</label>
        <div class="arrow right">&#8250;</div>           
        <ul class="menu-sub">
          <li class="menu-sub-title">
            <label class="submenu-label" for="sub-two">Back</label>
            <div class="arrow left">&#8249;</div>              
          </li>        
          <li><a href="edit_password.php?id=<?php echo $_SESSION['username'] ?>"><i class="fas fa-key"></i> Ubah Password</a></li>
          <!-- <li><a href="#"><i class="fas fa-info-circle"></i> Lihat Akun</a></li>  -->
          <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-door-open danger"></i> Log-Out</a></li>                               
        </ul>
      </li>                                  
    </ul> 
  </li>
</ul>

<?php }else if($_SESSION['riwayat']==2){?>
  <ul class="menu-sidebar">
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
</ul>
<?php } ?>
