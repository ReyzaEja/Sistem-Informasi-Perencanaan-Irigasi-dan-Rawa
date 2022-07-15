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

        <title>Sistem Informasi Perencanaan Irigasi dan Rawa</title>

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

        <script language="javascript">
            function getkey(e)
            {
                if (window.event)
                    return window.event.keyCode;
                else if (e)
                    return e.which;
                else
                    return null;
            }

            function goodchars(e, goods, field)
            {
                var key, keychar;
                key = getkey(e);
                if (key == null) return true;
               
                keychar = String.fromCharCode(key);
                keychar = keychar.toLowerCase();
                goods = goods.toLowerCase();
               
                // check goodkeys
                if (goods.indexOf(keychar) != -1)
                    return true;
                // control keys
                if ( key==null || key==0 || key==8 || key==9 || key==27 )
                    return true;
                  
                if (key == 13) {
                    var i;
                    for (i = 0; i < field.form.elements.length; i++)
                        if (field == field.form.elements[i])
                            break;
                    i = (i + 1) % field.form.elements.length;
                    field.form.elements[i].focus();
                    return false;
                    };
                // else return false
                return false;
            }
        </script>
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
                        <strong>SISTEM INFORMASI PERENCANAAN IRIGASI DAN RAWA</strong>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="main.php#home"> BERANDA </a>
                    </li>

                    <li>
                        <a href="main.php#cara"> TATA CARA DAFTAR </a>
                    </li>

                    <li>
                        <a href="main.php#kontak"> KONTAK KAMI </a>
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

        <!-- Page Content -->
        <div style="min-height:540px" class="container">
        
            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <h3 class="page-header">
                                <i style="margin-right:6px" class="fa fa-user"></i>
                                Pendaftaran Akun Baru
                            </h3>
                            <ol class="breadcrumb">
                                <li><a href="?page=home">Beranda</a>
                                </li>
                                <li class="active">Daftar</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php  
                            // fungsi untuk menampilkan pesan
                            // jika alert = "" (kosong)
                            // tampilkan pesan "" (kosong) 
                            if (empty($_GET['alert'])) {
                              echo "";
                            } 
                            // jika alert = 1
                            // tampilkan pesan Gagal "email sudah terdaftar"
                            elseif ($_GET['alert'] == 1) { ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong><i class="glyphicon glyphicon-alert"></i> Gagal!</strong> email sudah terdaftar.
                                </div>
                            <?php
                            } 
                            // jika alert = 2
                            // tampilkan pesan Sukses "pendaftaran Anda berhasil, silahkan login melalui menu Login"
                            elseif ($_GET['alert'] == 2) { ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong><i class="glyphicon glyphicon-ok-circle"></i> Sukses!</strong> pendaftaran akun Anda berhasil, silahkan menunggu proses verifikasi data. Informasi pengaktifan akun akan kami kirimkan ke email Anda.
                                </div>
                            <?php
                            } 
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                      <!-- tampilan form hubungi kami -->
                                    <form class="form-horizontal" method="POST" action="submit.php">
                                        
                                        <div class="form-group">
                                            <label class="col-sm-10"><i style="margin-right:7px" class="fa fa-user"></i> Data Pemilik Perusahaan/Usaha</label>
                                        </div>

                                        <hr style="margin-top:-10px">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Pemilik</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nama_pemilik" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">No. KTP</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="no_ktp" maxlength="16" onKeyPress="return goodchars(event,'0123456789',this)" autocomplete="off" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Alamat</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="alamat_pemilik" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">No. Telepon</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="no_telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-5">
                                                <input type="email" class="form-control" name="email" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label class="col-sm-10"><i style="margin-right:7px" class="fa fa-home"></i> Data Perusahaan/Usaha</label>
                                        </div>

                                        <hr style="margin-top:-10px">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">No. Surat Izin Usaha (SIUP/SITU/TDP)</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="no_siu" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nama Perusahaan/Usaha</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nama_usaha" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Alamat Perusahaan/Usaha</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="alamat_usaha" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <hr/>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <input style="width:150px" type="submit" class="btn btn-primary btn-lg btn-submit" name="daftar" value="Daftar">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

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
