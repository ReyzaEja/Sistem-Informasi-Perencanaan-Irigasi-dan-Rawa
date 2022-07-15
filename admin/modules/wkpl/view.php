
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-clone"></i> Wajib Lapor Ketenagakerjaan
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
			Data WKPL diterima.
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
			Data WKPL ditolak.
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
								<thead>
									<tr>
										<th>No. Pendaftaran</th>
										<th>Tanggal Daftar</th>
										<th>Tanggal Daftar Kembali</th>
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
								$query = mysqli_query($mysqli, "SELECT * FROM wkpl ORDER BY no_pendaftaran DESC")
																or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$tgl            = substr($data['tgl_wkpl'],0,10);
									$exp            = explode('-',$tgl);
									$tgl_wkpl       = $exp[2]."-".$exp[1]."-".$exp[0];
									
									$tahun          = $exp[0] + 1;
									
									if ($data['status_wkpl']=='Data Valid') {
										$tgl_wkpl_ulang = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$tahun);
									}
									else {
										$tgl_wkpl_ulang = '';
									}
	                            ?>
	                            	<tr>
										<td width="50" class="center"><?php echo $data['no_pendaftaran']; ?></td>
										<td width="120" class="center"><?php echo tgl_eng_to_ind($tgl_wkpl); ?></td>
										<td width="120" class="center"><?php echo $tgl_wkpl_ulang; ?></td>
										<td class="hidden-480" width="260"><?php echo $data['nama_perusahaan']; ?></td>
										<td class="hidden-480" width="260"><?php echo $data['alamat_perusahaan']; ?></td>
										<td class="hidden-480" width="130"><?php echo $data['status_wkpl']; ?></td>

										<td width="100" class="center">
											<div class="action-buttons">
												<a data-rel="tooltip" data-placement="top" title="Detail" class="blue tooltip-info" href="?module=form_wkpl&form=detail&id=<?php echo $data['no_pendaftaran']; ?>">
													<i class="ace-icon fa fa-search-plus bigger-130"></i>
												</a>

											<?php  
											if ($data['status_wkpl']=='Data Valid' || $data['status_wkpl']=='Data Tidak Valid') {
												echo "";
											} else { ?>
												<a data-rel="tooltip" data-placement="top" title="Terima" class="green tooltip-success" href="modules/wkpl/mail.php?act=on&id=<?php echo $data['no_pendaftaran'];?>&id_daftar=<?php echo $data['id_daftar'];?>">
													<i class="ace-icon fa fa-check bigger-130"></i>
												</a>

												<a data-rel="tooltip" data-placement="top" title="Tolak" class="red tooltip-error" href="modules/wkpl/mail.php?act=off&id=<?php echo $data['no_pendaftaran'];?>&id_daftar=<?php echo $data['id_daftar'];?>">
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


