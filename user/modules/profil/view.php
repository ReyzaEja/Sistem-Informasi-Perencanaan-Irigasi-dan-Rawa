<?php  
if (isset($_SESSION['id_daftar'])) {
    // fungsi query untuk menampilkan data dari tabel pendaftaran
    $query = mysqli_query($mysqli, "SELECT * FROM pendaftaran WHERE id_daftar='$_SESSION[id_daftar]'") 
    								or die('Ada kesalahan pada query tampil data pendaftaran : '.mysqli_error($mysqli));
    $data  = mysqli_fetch_assoc($query);

    $tgl            = substr($data['tanggal_daftar'],0,10);
	$exp            = explode('-',$tgl);
	$tanggal_daftar = $exp[2]."-".$exp[1]."-".$exp[0];
	}
?>
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right: 7px" class="ace-icon fa fa-user"></i>
				Profil
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<h4 style="font-size:25px;margin-left:13px" class="blue">
					<span class="middle">Data Pemilik Perusahaan/Usaha</span>
				</h4>

				<div style="margin-left:12px" class="hr hr-8 dotted"></div>

				<div style="font-size:14px;" class="profile-user-info">
					<div class="profile-info-row">
						<div style="width:200px" class="profile-info-name"> Nama Pemilik </div>

						<div class="profile-info-value">
							<span><?php echo $data['nama']; ?></span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> No. KTP </div>

						<div class="profile-info-value">
							<span><?php echo $data['no_ktp']; ?></span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Alamat </div>

						<div class="profile-info-value">
							<span><?php echo $data['alamat']; ?></span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> No. Telepon </div>

						<div class="profile-info-value">
							<span><?php echo $data['no_hp']; ?></span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Email </div>

						<div class="profile-info-value">
							<span><?php echo $data['email']; ?></span>
						</div>
					</div>
				</div>

				<div class="hr hr-8 dotted"></div>
				
				<h4 style="font-size:25px;margin-left:13px" class="blue">
					<span class="middle">Data Perusahaan/Usaha</span>
				</h4>

				<div style="margin-left:12px" class="hr hr-8 dotted"></div>

				<div class="profile-user-info">
					<div class="profile-info-row">
						<div style="width:200px" class="profile-info-name"> No. Izin Usaha (SIUP/SITU/TDP) </div>

						<div class="profile-info-value">
							<span><?php echo $data['no_siu']; ?></span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Nama Perusahan/Usaha </div>

						<div class="profile-info-value">
							<span><?php echo $data['nama_usaha']; ?></span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Alamat </div>

						<div class="profile-info-value">
							<span><?php echo $data['alamat_usaha']; ?></span>
						</div>
					</div>
				</div>

				<div class="hr hr-8 dotted"></div>

				<div class="profile-user-info">
					<div class="profile-info-row">
						<div style="width:200px" class="profile-info-name"> Tanggal Daftar </div>

						<div class="profile-info-value">
							<span><?php echo tgl_eng_to_ind($tanggal_daftar); ?></span>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Status </div>

						<div class="profile-info-value">
							<span><?php echo $data['status']; ?></span>
						</div>
					</div>
				</div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
?>