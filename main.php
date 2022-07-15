<?php
session_start();      // memulai session
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistem Informasi Perencanaan Irigasi dan Rawa - Dinas CIKASDA SULTENG Berbasis Web">
        <meta name="author" content="Dinas Cipta Karya dan Sumber Daya Air Provinsi Sulawesi Tengah">

        <title>SI-PRIA</title>

        <!-- favicon -->
        <link rel="shortcut icon" href="assets/img/logopu.png">

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="assets/css/modern-business.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?page=home">
                        <img src="assets/img/logopu.png" align="left" style="width:40px;height:40px;"> &nbsp
                        <strong>SISTEM INFORMASI PERENCANAAN IRIGASI DAN RAWA</strong>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#home"> BERANDA </a>
                    </li>

                    <li>
                        <a href="#cara"> TATA CARA MENDAFTAR </a>
                    </li>

                    <li>
                        <a href="#kontak"> KONTAK KAMI </a>
                    </li>

                    <li>
                        <a href="user"> LOGIN </a>
                    </li>
                </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    
        <header id="myCarousel" class="carousel slide">
            <!-- Wrapper for slides -->
            <div id="home" class="carousel-inner">
                <div class="item active">
                    <div class="fill" style="background-image:url('assets/img/home.jpg');"></div>
                    <div class="carousel-caption">
                        <h2></h2>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div style="min-height:540px" class="container">
        
            <br>

            <div id="cara" class="row">
                <div class="col-lg-12">
                    <h3 style="padding-bottom: 20px" class="page-header center">TATA CARA SISTEM INFORMASI PERENCANAAN IRIGASI DAN RAWA</h3>
                    
                    <h4 class="center">
                        Untuk lebih jelas tata cara sistem informasi perencanaan irigasi dan rawa silahkan download buku panduan 
                        <a href="download/prosedur_wajib_lapor_ketenagakerjaan_online.pdf"><strong>disini</strong></a>
                    </h4>
                    <h4 class="center">
                        Jika belum mempunyai akun klik 
                        <a href="daftar.php"><strong>Daftar disini</strong></a>
                    </h4>
                    <h4 class="center">
                        Jika sudah mempunyai akun klik 
                        <a href="user"><strong>Login disini</strong></a>
                    </h4>
                </div>
            </div>

            <br>

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header center"></h3>
                </div>


                <div class="col-lg-4 daftar center">
                    <i class="fa fa-user"></i>
                    <h3>DAFTAR</h3>
                    <p>Membuat akun dan mengisi biodata. Akun Anda akan diverifikasi dan sementara belum aktif.</p>
                </div>

                <div class="col-lg-4 verifikasi center">
                    <i class="fa fa-desktop"></i>
                    <h3>VERIFIKASI DATA</h3>
                    <p>Admin perencanaan akan melakukan pengecekan dan verifikasi data Anda. Jika data valid maka akun Anda akan diaktfikan.</p>
                </div>

                <div class="col-lg-4 wkpl center">
                    <i class="fa fa-file-text"></i>
                    <h3>MENGAKSES SISTEM</h3>
                    <p>Akun Anda sudah diaktfikan dan bisa login ke sistem.</p>
                </div>

            </div>

            <hr><br>

            <div id="kontak" class="row">
                <div class="col-lg-12">
                    <h3 style="padding-bottom: 20px" class="page-header center">KONTAK KAMI</h3>
                    
                    <br>

                    <div style="padding: 0 10px;text-align:justify" class="row">
                        <div class="col-lg-6">
                            <i style="margin-right:7px" class="fa fa-map-marker"></i> Jalan Prof. Dr. Moh. Yamin No. 33 Palu 941114 Sulawesi Tengah
                        </div>
                        <div class="col-lg-3">
                            <i style="margin-right:7px" class="fa fa-envelope"></i> cikasda@sultengprov.go.id
                        </div>
                        <div class="col-lg-3">
                            <i style="margin-right:7px" class="fa fa-phone"></i> (0451) 4015509
                        </div>
                    </div>
                    
                    <br><br>

                    <div style="padding: 0 5px;text-align:justify"> 
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.309993292412!2d119.88835901427302!3d-0.9146128355904525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8bee03749cffbb%3A0x55044f1af01d1ca!2sDInas%20Cipta%20Karya%20Prov%20Sulawesi%20Tengah!5e0!3m2!1sid!2sid!4v1603336818157!5m2!1sid!2sid" width="1087" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer style="margin-bottom:0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; 2020 - <a href="?module=home">Dinas Cipta Karya dan Sumber Daya Air Provinsi Sulawesi Tengah</a></p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
