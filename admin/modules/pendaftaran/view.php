<div class="page-content">
	<div class="page-header">
		<h1 style="color:#585858">
			<i style="margin-right:7px" class="ace-icon fa fa-user"></i> Data Pendaftaran
		</h1>
	</div><!-- /.page-header -->

	<?php
	// fungsi untuk menampilkan pesan
	// jika alert = "" (kosong)
	// tampilkan pesan "" (kosong)
	if (empty($_GET['alert'])) {
	}
	// jika alert = 1
	// tampilkan pesan "password tidak berhasil diubah"
	elseif ($_GET['alert'] == 1) { ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
			data valid dan akun telah diaktifkan.
			<br>
		</div>
	<?php
	} 
	// jika alert = 2
	// tampilkan pesan "password tidak berhasil diubah"
	elseif ($_GET['alert'] == 2) { ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
			data tidak valid dan pendaftaran akun telah ditolak.
			<br>
		</div>
	<?php
	} 
	?>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<div class="table-header">
						Data Pendaftaran
					</div>
					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal Daftar</th>
									<th>Nama Pemilik Perusahaan/Usaha</th>
									<th>Nama Perusahaan/Usaha</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
							<?php
							$no = 1;
							// fungsi query untuk menampilkan data dari tabel pendaftaran
							$query = mysqli_query($mysqli, "SELECT id_daftar,tanggal_daftar,nama,email,nama_usaha,status FROM pendaftaran ORDER BY id_daftar DESC")
															or die('Ada kesalahan pada query tampil data pendaftaran: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
								$tgl            = substr($data['tanggal_daftar'],0,10);
								$exp            = explode('-',$tgl);
								$tanggal_daftar = $exp[2]."-".$exp[1]."-".$exp[0];
                            ?>
                            	<tr>
									<td width="30" class="center"><?php echo $no; ?></td>
									<td width="100" class="hidden-480 center"><?php echo $tanggal_daftar; ?></td>
									<td width="170"><?php echo $data['nama']; ?></td>
									<td width="200"><?php echo $data['nama_usaha']; ?></td>
									<td width="120"><?php echo $data['status']; ?></td>

									<td width="70" class="center">
										<div class="action-buttons">
											<a data-rel="tooltip" data-placement="top" title="Detail" class="blue tooltip-info" href="?module=form_pendaftaran&form=detail&id=<?php echo $data['id_daftar']; ?>">
												<i class="ace-icon fa fa-search-plus bigger-130"></i>
											</a>

										<?php  
										if ($data['status']=='Data Valid' || $data['status']=='Data Tidak Valid') {
											echo "";
										} else { ?>
											<a data-rel="tooltip" data-placement="top" title="Terima" class="green tooltip-success" href="modules/pendaftaran/mail.php?act=on&id=<?php echo $data['id_daftar'];?>&email=<?php echo $data['email'];?>">
												<i class="ace-icon fa fa-check bigger-130"></i>
											</a>

											<a data-rel="tooltip" data-placement="top" title="Tolak" class="red tooltip-error" href="modules/pendaftaran/mail.php?act=off&id=<?php echo $data['id_daftar'];?>&email=<?php echo $data['email'];?>">
												<i class="ace-icon fa fa-times bigger-130"></i>
											</a>
										<?php
										}
										?>
										</div>
									</td>
								</tr>
							<?php
                            	$no++;
                            } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->