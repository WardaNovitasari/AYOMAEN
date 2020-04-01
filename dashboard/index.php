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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

    <header id="header">
        <?php
            include 'nav/header.php';
            include 'nav/nav.php';
        ?>
		
    </header><!--/header-->

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/twr4.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Selamat datang di Website<br> SI PERMEN</h1>
                                </div>
                            </div>

<!--                             <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" class="img-responsive">
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/twr5.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">SIPERMEN</h1>
                                    <h2 class="animation animated-item-2">Sistem Pelayanan Rekomendasi Infrastruktur Pasif Telekomunikasi</h2>
                                </div>
                            </div>

                           <!--  <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img2.png" class="img-responsive">
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div><!--/.item-->

            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Selamat Datang di Website SI PERMEN</h2>
                <p class="lead">Sistem Pelayanan Rekomendasi Infrastruktur</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fas fa-broadcast-tower"></i>
                            <h2>Perijinan Pembangunan Menara</h2>
                            <h3>Dapat mengajukan perijinan pembangunan menara secara online.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-ethernet"></i>
                            <h2>Perijinan Pemasangan Fiber Optik</h2>
                            <h3>Dapat mengajukan perijinan pemasangan fiber optik secara online.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-map-o"></i>
                            <h2>Melihat Pemetaan Map Menara</h2>
                            <h3>Dapat melihat pemetaan menara yang sudah dibangun.</h3>
                        </div>
                    </div><!--/.col-md-4-->
                
                    
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>SI PERMEN</h2>
                <p class="lead">Sistem Pelayanan Rekomendasi Infrastruktur Pasif Telekomunikasi</p>
            </div>

                        <div class="row">
                <div class="col-sm-6 wow fadeInDown">
                    <div class="skill">
                        
                        <p style="color: #fff; text-align: justify; font-size: 20px">SIPERMEN merupakan sistem pelayanan rekomendasi infrastruktur pasif telekomunikasi. Sistem pelayanan yang dibuat untuk mempermudah administrasi  pembangunan infrastruktur. Dimana pemohon dapat mengajukan perijinan pembangunan menara online dan perijinan pemasangan fiber optik secara online, serta dapat melihat pemetaan map menara.</p>
                    <!-- <a class="btn btn-primary readmore" href="blog-item.html">Selengkapnya <i class="fa fa-angle-right"></i></a> -->
                    </div>

                </div><!--/.col-sm-6-->

                <div class="col-sm-6 wow fadeInDown">
                    <div class="accordion">
                        <img class="img-responsive" src="images/twr1.jpg"></img>
                        </div><!--/#accordion1-->
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<!--  -->
    
<!--  -->
    <section id="middle">
        <div class="container">
            <div class="row">
                    <div class="center wow fadeInDown">
                <h2>Ijin Mendirikan Menara Telekomunikasi</h2>
                <p class="lead">Menjadi Mudah dengan SI PERMEN (Sistem Pelayanan Rekomendasi Infrastruktur Pasif Telekomunikasi) Online</p>
                        </div>
                <div class="col-sm-6 wow fadeInLeft">
                    <div class="skill">
                       <img class="img-responsive" src="images/twr6.jpg" style="margin-left: 80px;"></img>
                    </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                <div class="fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-user"></i>
                            <h2>Daftar ke SI PERMEN (Sistem Pelayanan Rekomendasi Infrastruktur Pasif Telekomunikasi)</h2>
                            <h3>Pilih Tombol Login untuk mendaftar.</h3>
                        </div>
                        <div class="feature-wrap">
                            <i class="fa fa-file-text-o"></i>
                            <h2>Menyiapkan Berkas - Berkas yang dibutuhkan</h2>
                            <h3>Dibutuhkan untuk diupload pada saat pengajuan perijinan.</h3>
                        </div>
                        <div class="feature-wrap">
                            <i class="fa fa-bullhorn"></i>
                            <h2>Menerima Hasil Laporan setelah pengajuan ijin di setujui oleh admin verifikator</h2>
                            <h3>Dengan informasi yang ter-update</h3>
                        </div>
                    </div>
                    </div>

            </div>
        </div>
    </section>

    
    <section id="bottom">
        <div class="container wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="600ms">
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
                            <li><a href="#">Microcell</a></li>
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