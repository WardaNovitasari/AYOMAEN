<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIPERMEN</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
   <link rel="shortcut icon" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/ico.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/ico.png">




</head><!--/head-->

<body class="homepage">

    <?php
            include 'nav/header.php';
            include 'nav/nav.php';
        ?>
		
    </header><!--/header-->

<!-- INPUT SEARCH -->
<section id="input-menara">
    <div class="portfolio-filter text-left wow fadeInDown" style="padding-left: 10px; padding-right: 10px">
    <form action="" method="post">
    <div class="row">
        <div class="col-md-3">
        <h3>Latitude</h3>
        <input class="form-control" type="text" name="lat" id="lat" placeholder="contoh : -6.9356788" value="">
        </div>
        <div class="col-md-3">
        <h3>Longitude</h3> 
        <input class="form-control" type="text" name="lon" id="lon" placeholder="contoh : 110.536783" value="">
        </div>
        <div class="col-md-3">
        <h3>Tipe Menara</h3> 
        <select class="form-control" id="tipe" name="">
            <option value="microcell">Microcell</option>
            <option value="">Microcell2</option>
            <option value="">Microcell3</option>
        </select>
        </div>
        <div class="col-md-3" style="padding-top: 45px">
        <input type="submit" class="btn btn-primary" name="submit" value="CARI">
        </div>
    </div>
    </form>
    </div>


<!-- PETA MENARA -->
<div class="container-fluid center wow fadeInUp">
          <p class="text-primary">(Biru) Aktif</p>
          <p class="text-danger">(Merah) Tidak Aktif</p>
        <div id="mapid">
<iframe width="100%" height="700" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=109.95185852050783%2C-7.991917511673448%2C110.71815490722658%2C-7.575563251105656&amp;layer=mapnik" style="border: 1px solid black"></iframe>
        </div>
      </div>
      <!-- /.container-fluid -->
</section>


<section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="widget">
                        <h3>Kontak Kami</h3>
                        <i class="fa fa-phone-square"></i> (0274) 551230<br>
                        <i class="fa fa-phone-square"></i> (0274) 515865<br>
                        <i class="fa fa-phone-square"></i> (0274) 562682<br>
                        Ext. 211<br>
                        Fax. (0247) 520332<br>
                        <i class="fa fa-envelope"></i> kominfosandi@jogjakota.co.id<br>
                        <i class="fa fa-map-marker"></i> Jl. Kenari No. 56 Yogyakarta, Kota Gede<br>

                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-4 col-sm-6">
                    <div class="widget">
                        <h3>Menu Navigasi</h3>
                        <ul>
                            <li><a href="../dashboard">Beranda</a></li>
                            <li><a href="peta_menara.php">Peta Menara</a></li>
                            <li><a href="#">Petunjuk Pengguna</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-4 col-sm-6">
                    <div class="widget">
                        <h3>Lokasi</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.897491328196!2d110.38812781437673!3d-7.800676479594186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5764a3d69075%3A0xb232b7001decd6b!2sDinas%20Komunikasi%20Informatika%20dan%20Persandian%20Kota%20Yogyakarta!5e0!3m2!1sid!2sid!4v1585161404159!5m2!1sid!2sid" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->


    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>