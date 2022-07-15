<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div style="margin-top:10px" class="alert alert-block alert-info">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-user blue"></i>
				Selamat datang
				<strong class="blue"><?php echo $_SESSION['nama_admin']; ?></strong>.
			</div>
			<!-- PAGE CONTENT ENDS -->

			<?php  
			$query1 = mysqli_query($mysqli, "SELECT id_daftar,status FROM pendaftaran WHERE status='Menunggu Verifikasi Data'")
											or die('Ada kesalahan pada query tampil data pendaftaran: '.mysqli_error($mysqli));

            $row1 = mysqli_num_rows($query1);

            if ($row1 > 0) { ?>
            	<div class="row">
					<div class="col-xs-6">
		            	<div style="margin-top:10px" class="alert alert-block alert-info">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
							<a href="?module=pendaftaran">
								<i class="ace-icon fa fa-info blue"></i>
								Anda memiliki <?php echo $row1; ?> pendaftaran akun baru.
							</a>
						</div>
					</div>
				</div>
            <?php
            }

			$query1 = mysqli_query($mysqli, "SELECT no_pendaftaran, status_wkpl FROM wkpl WHERE status_wkpl='Menunggu Verifikasi Data'")
											or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

            $row1 = mysqli_num_rows($query1);

            if ($row1 > 0) { ?>
            	<div class="row">
					<div class="col-xs-6">
		            	<div style="margin-top:10px" class="alert alert-block alert-info">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
							<a href="?module=wkpl">
								<i class="ace-icon fa fa-info blue"></i>
								Anda memiliki <?php echo $row1; ?> Data Wajib Lapor Ketenagakerjaan baru.
							</a>
						</div>
					</div>
				</div>
            <?php
            }
			?>
		</div><!-- /.col -->
	</div><!-- /.row -->

	<hr>

	<div class="row">
		<div class="col-xs-5 center">
			<div style="margin-top:10px">
				<img style="opacity:0.7" src="../assets/img/logopu.png" width="200">
			</div>
		</div><!-- /.col -->
		<div class="col-xs-6">
			<div style="margin-top:40px">
				<h1 class="center">Sistem Informasi Dinas Cipta Karya dan Sumber Daya Air Provinsi Sulawesi Tengah</h1>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->

</div><!-- /.page-content -->