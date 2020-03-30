<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SI PERMEN - Daftar Akun Baru</title>

  <!-- Custom fonts for this template-->
  <link href="bs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="bs/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img src="bs/img/logo_permen.png"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru</h1>
              </div>
<div class="form-group">
                <div class="form-label-group">
                  <label class="h5" for="name">Nama</label>
                  <input type="text" id="name" class="form-control" placeholder="Masukkan nama Anda" required="required" autofocus="autofocus" name="name">
                
                </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label class="h5" for="inputEmail">Alamat Email</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Masukkan alamat email" required="required" name="email">
              
                </div>
              </div>
               <div class="col-md-2">
                <div class="form-label-group">
                <label class="h5" for="inputnumber2">No. Telp</label>
                <input type="text" id="inputnumber2" class="form-control" placeholder="+62" required="required" name="no_telepon" disabled="">
              </div>
              </div>
              <div class="col-md-4">
                  <div class="form-label-group">
                    <label class="h5" for="inputnumber"> ㅤㅤ </label>
                    <input type="text" id="inputnumber" class="form-control" placeholder="8xxxxxxxxx" required="required" name="no_telepon" onchange="validate()" onkeypress="return hanyaAngka(event)"> 
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label class="h5" for="inputperusahaan">Nama Perusahaan</label>
                  <input type="text" id="inputperusahaan" class="form-control" placeholder="Masukkan nama perusahaan" required="required" name="namapt">

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label class="h5" for="alamat">Alamat Perusahaan</label>
                  <input type="text" id="alamat" class="form-control" placeholder="Masukkan alamat perusahaan" required="required" name="alamat">

                </div>
              </div>
            </div>
          </div>

          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="mitra">Mitra
            </label>
          </div>

          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" value="perusahaan">Perusahaan
            </label>
          </div>

          <div class="form-group">
            <div class="form-label-group">
               <label class="h5" for="password">Password</label>
              <input type="password" id="password" class="form-control" placeholder="Masukkan password" required="required" name="password">
            </div>
          </div>
           <button class="btn btn-primary btn-block" type="submit"  onclick="return confirm('Apakah data sudah benar ?')" name="submit" id="submit">Daftar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Masuk</a>
          <a class="d-block small" href="#">Lupa Password?</a>
        </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="bs/vendor/jquery/jquery.min.js"></script>
  <script src="bs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="bs/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="bs/js/sb-admin-2.min.js"></script>

</body>

</html>
