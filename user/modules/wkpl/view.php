
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-clone"></i> Wajib Lapor Ketenagakerjaan
				<a href="?module=form_wkpl">
	                <button class="btn btn-primary pull-right">
						<i class="ace-icon fa fa-plus"></i> Tambah
					</button>
	            </a>			
			</h1>
		</div><!-- /.page-header -->

	<?php
	// fungsi untuk menampilkan pesan
	// jika alert = "" (kosong)
	// tampilkan pesan "" (kosong)
	if (empty($_GET['alert'])) {
	}
	// jika alert = 1
	// tampilkan pesan "Data WKPL berhasil disimpan"
	elseif ($_GET['alert'] == 1) { ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
			Data WKPL berhasil disimpan.
			<br>
		</div>
	<?php
	} 
	// jika alert = 2
	// tampilkan pesan Sukses "Data WKPL berhasil diubah"
	elseif ($_GET['alert'] == 2) { ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
			Data WKPL berhasil diubah.
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
							Data Wajib Lapor Ketenagakerjaan
						</div>
						<!-- div.table-responsive -->

						<!-- div.dataTables_borderWrap -->
						<div>
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<?php  
							$query_status = mysqli_query($mysqli, "SELECT status_wkpl FROM wkpl WHERE id_daftar='$_SESSION[id_daftar]'")
																or die('Ada kesalahan pada query tampil data status: '.mysqli_error($mysqli));

	                        $data_status = mysqli_fetch_assoc($query_status);
							?>
								<thead>
									<tr>
										<th>No. Pendaftaran</th>
										<th>Tanggal Daftar</th>
									<?php  
									if ($data_status['status_wkpl']=='Data Valid') { ?>
										<th>Tanggal Daftar Kembali</th>
									<?php
									}
									?>
										<th>Nama Perusahaan</th>
										<th>Alamat Perusahaan</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel wkpl
								$query = mysqli_query($mysqli, "SELECT * FROM wkpl WHERE id_daftar='$_SESSION[id_daftar]'")
																or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$tgl            = substr($data['tgl_wkpl'],0,10);
									$exp            = explode('-',$tgl);
									$tgl_wkpl       = $exp[2]."-".$exp[1]."-".$exp[0];
									
									$tahun          = $exp[0] + 1;
									
									$tgl_wkpl_ulang = $exp[2]."-".$exp[1]."-".$tahun;
	                            ?>
	                            	<tr>
	                            	<?php  
									if ($data['status_wkpl']=='Data Valid') { ?>
										<td width="50" class="center"><?php echo $data['no_pendaftaran']; ?></td>
									<?php
									} else { ?>
										<td width="130" class="center"><?php echo $data['no_pendaftaran']; ?></td>
									<?php
									}
									?>
										<td width="120" class="center"><?php echo tgl_eng_to_ind($tgl_wkpl); ?></td>
									<?php  
									if ($data['status_wkpl']=='Data Valid') { ?>
										<td width="120" class="center"><?php echo tgl_eng_to_ind($tgl_wkpl_ulang); ?></td>
									<?php
									}
									?>
										<td class="hidden-480" width="260"><?php echo $data['nama_perusahaan']; ?></td>
										<td class="hidden-480" width="260"><?php echo $data['alamat_perusahaan']; ?></td>
										<td class="hidden-480" width="130"><?php echo $data['status_wkpl']; ?></td>

										<td width="100" class="center">
											<div class="action-buttons">
												<a data-rel="tooltip" data-placement="top" title="Detail" class="blue tooltip-info" href="?module=form_wkpl&form=detail&id=<?php echo $data['no_pendaftaran']; ?>">
													<i class="ace-icon fa fa-search-plus bigger-130"></i>
												</a>

												<a data-rel="tooltip" data-placement="top" title="Update" class="blue tooltip-info" href="?module=form_update&id=<?php echo $data['no_pendaftaran']; ?>">
													<i class="ace-icon fa fa-edit bigger-130"></i>
												</a>

											<?php  
											if ($data['status_wkpl']=='Data Valid') { ?>
												<a data-rel="tooltip" data-placement="top" title="Cetak" class="blue tooltip-info" href="modules/wkpl/cetak.php?id=<?php echo $data['no_pendaftaran']; ?>" target="_blank">
													<i class="ace-icon fa fa-print bigger-130"></i>
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


