<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if (empty($_GET['form'])) { 
	$query = mysqli_query($mysqli, "SELECT * FROM wkpl WHERE no_pendaftaran='$_GET[id]'")
									or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

	$data = mysqli_fetch_assoc($query);

	$tgl_berdiri     = $data['tanggal_berdiri'];
	$exp             = explode('-',$tgl_berdiri);
	$tanggal_berdiri = $exp[2]."-".$exp[1]."-".$exp[0];
	
	$tgl_pindah      = $data['tanggal_pindah'];

	if ($tgl_pindah=='0000-00-00') {
		$tanggal_pindah = '';
	} else {
		$exp             = explode('-',$tgl_pindah);
		$tanggal_pindah  = $exp[2]."-".$exp[1]."-".$exp[0];
	}
?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-edit"></i>
				Form Wajib Lapor Ketenagakerjaan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/wkpl/proses_update.php?act=update1" method="POST" />
					<input type="hidden" name="no_pendaftaran" value="<?php echo $data['no_pendaftaran']; ?>" />
					
					<h3 style="color:#585858">
						Keadaan Perusahaan / Usaha
					</h3>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Nama Perusahaan / Usaha</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_perusahaan" autocomplete="off" value="<?php echo $data['nama_perusahaan']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Alamat Perusahaan / Usaha</label>

						<div class="col-sm-5">
							<textarea class="form-control" name="alamat_perusahaan" rows="2" required><?php echo $data['alamat_perusahaan']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Kode Pos / Kecamatan</label>

						<div class="col-sm-2">
							<input type="text" class="form-control" name="kode_pos" maxlength="12" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['kode_pos']; ?>" required />
						</div>

						<div class="col-sm-3">
							<input type="text" class="form-control" name="kecamatan" autocomplete="off" value="<?php echo $data['kecamatan']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">No. Telp. Fax</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="telp_fax" maxlength="12" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['telp_fax']; ?>" required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jenis Usaha</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="jenis_usaha" autocomplete="off" value="<?php echo $data['jenis_usaha']; ?>" required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Nama Pemilik Perusahaan / Usaha</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_pemilik" autocomplete="off" value="<?php echo $data['nama_pemilik']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Alamat Pemilik Perusahaan / Usaha</label>

						<div class="col-sm-5">
							<textarea class="form-control" name="alamat_pemilik" rows="2" required><?php echo $data['alamat_pemilik']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Nama Pengurus Perusahaan / Usaha</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama_pengurus" autocomplete="off" value="<?php echo $data['nama_pengurus']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Alamat Pengurus Perusahaan / Usaha</label>

						<div class="col-sm-5">
							<textarea class="form-control" name="alamat_pengurus" rows="2" required><?php echo $data['alamat_pengurus']; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Pendirian Perusahaan / Usaha</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tanggal_berdiri" autocomplete="off" value="<?php echo $tanggal_berdiri; ?>" required />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Perpindahan Perusahaan / Usaha</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tanggal_pindah" value="<?php echo $tanggal_pindah; ?>" autocomplete="off" />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Alamat Lama</label>

						<div class="col-sm-5">
							<textarea class="form-control" name="alamat_lama" rows="2"><?php echo $data['alamat_lama']; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Status Perusahaan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="status_perusahaan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data['status_perusahaan']; ?>"><?php echo $data['status_perusahaan']; ?></option>
								<option value="Pusat">Pusat</option>
								<option value="Cabang">Cabang</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Status Pemilikan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="status_pemilikan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data['status_pemilikan']; ?>"><?php echo $data['status_pemilikan']; ?></option>
								<option value="Swasta">Swasta</option>
								<option value="Persero">Persero</option>
								<option value="Patungan Dengan Asing">Patungan Dengan Asing</option>
								<option value="Asing">Asing</option>
								<option value="Perum">Perum</option>
								<option value="Perusahaan Daerah">Perusahaan Daerah</option>
								<option value="Yayasan">Yayasan</option>
								<option value="Koperasi">Koperasi</option>
								<option value="Perseorangan">Perseorangan</option>
								<option value="Badan Usaha Lainnya">Badan Usaha Lainnya</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Status Pemodalan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="status_permodalan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data['status_permodalan']; ?>"><?php echo $data['status_permodalan']; ?></option>
								<option value="Penanaman Modal Dalam Negeri">Penanaman Modal Dalam Negeri</option>
								<option value="Penanaman Modal Asing">Penanaman Modal Asing</option>
								<option value="Swasta Nasional">Swasta Nasional</option>
								<option value="Joint Venture">Joint Venture</option>
							</select>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="btn btn-primary" name="selanjutnya" value="Selanjutnya" />
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
elseif ($_GET['form']=='2') { ?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-edit"></i>
				Form Wajib Lapor Ketenagakerjaan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/wkpl/proses_update.php?act=update2" method="POST" />
					
					<input type="hidden" name="no_pendaftaran" value="<?php echo $_GET['id']; ?>" />

					<h3 style="color:#585858">
						Keadaan Ketenagaan Kerja
					</h3>

					<div class="hr hr-16 dotted"></div>

					<div class="row">
						<div class="col-xs-12">
							<!-- div.table-responsive -->

							<!-- div.dataTables_borderWrap -->
							<div>
								<table id="simple-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th rowspan="3" colspan="2">Tenaga Kerja</th>
											<th rowspan="3">Kelompok Umur</th>
											<th colspan="6">Hubungan Kerja</th>
										</tr>
										<tr>
											<th colspan="3">Tetap</th>
											<th colspan="3">Tidak Tetap</th>
										</tr>
										<tr>
											<th>CPUH</th>
											<th>CPUBR</th>
											<th>CPUBL</th>
											<th>CPUH</th>
											<th>CPUBR</th>
											<th>CPUBL</th>
										</tr>
									</thead>

									<tbody>
										<?php  
										$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																		ORDER BY id_tenaga_kerja ASC LIMIT 3")
																		or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

                        				while ($data1 = mysqli_fetch_assoc($query1)) { 
                        					if ($data1['cpuh_tetap']=='0') {
	                            				$cpuh_tetap = '';
                        					} else {
                        						$cpuh_tetap = $data1['cpuh_tetap'];
                        					}

                        					if ($data1['cpubr_tetap']=='0') {
                        						$cpubr_tetap = '';
                        					} else {
                        						$cpubr_tetap = $data1['cpubr_tetap'];
                        					}

                        					if ($data1['cpubl_tetap']=='0') {
                        						$cpubl_tetap = '';
                        					} else {
                        						$cpubl_tetap = $data1['cpubl_tetap'];
                        					}

                        					if ($data1['cpuh_tidak_tetap']=='0') {
                        						$cpuh_tidak_tetap = '';
                        					} else {
                        						$cpuh_tidak_tetap = $data1['cpuh_tidak_tetap'];
                        					}

                        					if ($data1['cpubr_tidak_tetap']=='0') {
                        						$cpubr_tidak_tetap = '';
                        					} else {
                        						$cpubr_tidak_tetap = $data1['cpubr_tidak_tetap'];
                        					}

                        					if ($data1['cpubl_tidak_tetap']=='0') {
                        						$cpubl_tidak_tetap = '';
                        					} else {
                        						$cpubl_tidak_tetap = $data1['cpubl_tidak_tetap'];
                        					}

                        					if ($data1['jumlah']=='0') {
                        						$jumlah = '';
                        					} else {
                        						$jumlah = $data1['jumlah'];
                        					}
										?>
		                            	<tr>
											<td style="vertical-align:middle" width="80" class="center">WNI</td>
											<td style="vertical-align:middle" width="140" class="center">Laki-laki</td>
											<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
											<td class="center">
												<input type="hidden" name="id_tenaga_kerja[]" value="<?php echo $data1['id_tenaga_kerja']; ?>" />

												<input style="border:none" type="text" name="cpuh1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpuh2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tidak_tetap; ?>" />
											</td>
										<?php  
										}
										?>
										</tr>

										<?php  
										$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																		ORDER BY id_tenaga_kerja ASC LIMIT 3 OFFSET 3")
																		or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

                        				while ($data1 = mysqli_fetch_assoc($query1)) { 
                        					if ($data1['cpuh_tetap']=='0') {
	                            				$cpuh_tetap = '';
                        					} else {
                        						$cpuh_tetap = $data1['cpuh_tetap'];
                        					}

                        					if ($data1['cpubr_tetap']=='0') {
                        						$cpubr_tetap = '';
                        					} else {
                        						$cpubr_tetap = $data1['cpubr_tetap'];
                        					}

                        					if ($data1['cpubl_tetap']=='0') {
                        						$cpubl_tetap = '';
                        					} else {
                        						$cpubl_tetap = $data1['cpubl_tetap'];
                        					}

                        					if ($data1['cpuh_tidak_tetap']=='0') {
                        						$cpuh_tidak_tetap = '';
                        					} else {
                        						$cpuh_tidak_tetap = $data1['cpuh_tidak_tetap'];
                        					}

                        					if ($data1['cpubr_tidak_tetap']=='0') {
                        						$cpubr_tidak_tetap = '';
                        					} else {
                        						$cpubr_tidak_tetap = $data1['cpubr_tidak_tetap'];
                        					}

                        					if ($data1['cpubl_tidak_tetap']=='0') {
                        						$cpubl_tidak_tetap = '';
                        					} else {
                        						$cpubl_tidak_tetap = $data1['cpubl_tidak_tetap'];
                        					}

                        					if ($data1['jumlah']=='0') {
                        						$jumlah = '';
                        					} else {
                        						$jumlah = $data1['jumlah'];
                        					}
										?>
		                            	<tr>
											<td style="vertical-align:middle" width="80" class="center">WNI</td>
											<td style="vertical-align:middle" width="140" class="center">Wanita</td>
											<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
											<td class="center">
												<input type="hidden" name="id_tenaga_kerja[]" value="<?php echo $data1['id_tenaga_kerja']; ?>" />

												<input style="border:none" type="text" name="cpuh1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpuh2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tidak_tetap; ?>" />
											</td>
										<?php  
										}
										?>
										</tr>

										<?php  
										$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																		ORDER BY id_tenaga_kerja ASC LIMIT 1 OFFSET 6")
																		or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

                        				while ($data1 = mysqli_fetch_assoc($query1)) { 
                        					if ($data1['cpuh_tetap']=='0') {
	                            				$cpuh_tetap = '';
                        					} else {
                        						$cpuh_tetap = $data1['cpuh_tetap'];
                        					}

                        					if ($data1['cpubr_tetap']=='0') {
                        						$cpubr_tetap = '';
                        					} else {
                        						$cpubr_tetap = $data1['cpubr_tetap'];
                        					}

                        					if ($data1['cpubl_tetap']=='0') {
                        						$cpubl_tetap = '';
                        					} else {
                        						$cpubl_tetap = $data1['cpubl_tetap'];
                        					}

                        					if ($data1['cpuh_tidak_tetap']=='0') {
                        						$cpuh_tidak_tetap = '';
                        					} else {
                        						$cpuh_tidak_tetap = $data1['cpuh_tidak_tetap'];
                        					}

                        					if ($data1['cpubr_tidak_tetap']=='0') {
                        						$cpubr_tidak_tetap = '';
                        					} else {
                        						$cpubr_tidak_tetap = $data1['cpubr_tidak_tetap'];
                        					}

                        					if ($data1['cpubl_tidak_tetap']=='0') {
                        						$cpubl_tidak_tetap = '';
                        					} else {
                        						$cpubl_tidak_tetap = $data1['cpubl_tidak_tetap'];
                        					}

                        					if ($data1['jumlah']=='0') {
                        						$jumlah = '';
                        					} else {
                        						$jumlah = $data1['jumlah'];
                        					}
										?>
		                            	<tr>
											<td style="vertical-align:middle" width="80" class="center">WNA</td>
											<td style="vertical-align:middle" width="140" class="center">Laki-laki</td>
											<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
											<td class="center">
												<input type="hidden" name="id_tenaga_kerja[]" value="<?php echo $data1['id_tenaga_kerja']; ?>" />

												<input style="border:none" type="text" name="cpuh1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpuh2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tidak_tetap; ?>" />
											</td>
										<?php  
										}
										?>
										</tr>
										
										<?php  
										$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																		ORDER BY id_tenaga_kerja ASC LIMIT 1 OFFSET 7")
																		or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

                        				while ($data1 = mysqli_fetch_assoc($query1)) { 
                        					if ($data1['cpuh_tetap']=='0') {
	                            				$cpuh_tetap = '';
                        					} else {
                        						$cpuh_tetap = $data1['cpuh_tetap'];
                        					}

                        					if ($data1['cpubr_tetap']=='0') {
                        						$cpubr_tetap = '';
                        					} else {
                        						$cpubr_tetap = $data1['cpubr_tetap'];
                        					}

                        					if ($data1['cpubl_tetap']=='0') {
                        						$cpubl_tetap = '';
                        					} else {
                        						$cpubl_tetap = $data1['cpubl_tetap'];
                        					}

                        					if ($data1['cpuh_tidak_tetap']=='0') {
                        						$cpuh_tidak_tetap = '';
                        					} else {
                        						$cpuh_tidak_tetap = $data1['cpuh_tidak_tetap'];
                        					}

                        					if ($data1['cpubr_tidak_tetap']=='0') {
                        						$cpubr_tidak_tetap = '';
                        					} else {
                        						$cpubr_tidak_tetap = $data1['cpubr_tidak_tetap'];
                        					}

                        					if ($data1['cpubl_tidak_tetap']=='0') {
                        						$cpubl_tidak_tetap = '';
                        					} else {
                        						$cpubl_tidak_tetap = $data1['cpubl_tidak_tetap'];
                        					}

                        					if ($data1['jumlah']=='0') {
                        						$jumlah = '';
                        					} else {
                        						$jumlah = $data1['jumlah'];
                        					}
										?>
		                            	<tr>
											<td style="vertical-align:middle" width="80" class="center">WNA</td>
											<td style="vertical-align:middle" width="140" class="center">Wanita</td>
											<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
											<td class="center">
												<input type="hidden" name="id_tenaga_kerja[]" value="<?php echo $data1['id_tenaga_kerja']; ?>" />

												<input style="border:none" type="text" name="cpuh1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl1[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpuh2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpuh_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubr2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubr_tidak_tetap; ?>" />
											</td>
											<td class="center">
												<input style="border:none" type="text" name="cpubl2[]" class="input-sm col-xs-12 col-sm-12 center" maxlength="5" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $cpubl_tidak_tetap; ?>" />
											</td>
										<?php  
										}
										?>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div>
						<strong>Keterangan</strong>
						<table>
							<tr>
								<td width="80">CPUH</td>
								<td width="10">:</td>
								<td>Cara Pembayaran Upah Harian</td>
							</tr>
							<tr>
								<td>CPUBR</td>
								<td>:</td>
								<td>Cara Pembayaran Upah Borongan</td>
							</tr>
							<tr>
								<td>CPUBR</td>
								<td>:</td>
								<td>Cara Pembayaran Upah Bulanan</td>
							</tr>
						</table>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-0 col-md-10">
							<input type="submit" class="btn btn-primary" name="selanjutnya" value="Selanjutnya" />
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
elseif ($_GET['form']=='3') { 
	$query = mysqli_query($mysqli, "SELECT * FROM wkpl WHERE no_pendaftaran='$_GET[id]'")
									or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

	$data = mysqli_fetch_assoc($query);

	$tgl_sertifikat      = $data['tanggal_sertifikat'];

	if ($tgl_sertifikat=='0000-00-00') {
		$tanggal_sertifikat = '';
	} else {
		$exp                = explode('-',$tgl_sertifikat);
		$tanggal_sertifikat = $exp[2]."-".$exp[1]."-".$exp[0];
	}
?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-edit"></i>
				Form Wajib Lapor Ketenagakerjaan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/wkpl/proses_update.php?act=update3" method="POST" />

					<input type="hidden" name="no_pendaftaran" value="<?php echo $_GET['id']; ?>" />

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Waktu Kerja</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="waktu_kerja" data-placeholder="Pilih..." required>
								<option value="<?php echo $data['waktu_kerja']; ?>"><?php echo $data['waktu_kerja']; ?></option>
								<option value="7 Jam / hari dan 40 Jam / minggu">7 Jam / Hari dan 40 Jam / minggu</option>
								<option value="8 Jam / hari dan 40 Jam / minggu">8 Jam / hari dan 40 Jam / minggu</option>
								<option value="12 Jam / hari dan 40 Jam / minggu">12 Jam / hari dan 40 Jam / minggu</option>
								<option value="12 Jam / hari selama 10 hari terus menerus">12 Jam / hari selama 10 hari terus menerus</option>
								<option value="12 Jam / hari selama 4 hari terus menerus">12 Jam / hari selama 4 hari terus menerus</option>
								<option value="Lebih lama dari 7 jam atau 8 jam / hari dan 40 jam / minggu kurang dari 12 jam per hari">Lebih lama dari 7 jam atau 8 jam / hari dan 40 jam / minggu kurang dari 12 jam per hari</option>
								<option value="Kurang atau sama dengan 24 jam / minggu">Kurang atau sama dengan 24 jam / minggu</option>
								<option value="Kurang atau sama dengan 20 jam / minggu">Kurang atau sama dengan 20 jam / minggu</option>
							</select>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Penggunaan Alat dan Bahan</label>

						<div class="col-sm-4">
							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Pesawat Uap" />
									<span class="lbl"> Pesawat Uap</span>
								</label>
							</div>
							
							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Pesawat Angkat" />
									<span class="lbl"> Pesawat Angkat</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Pesawat Angkut" />
									<span class="lbl"> Pesawat Angkut</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="pesawat_lain" value="Pesawat Lainnya" />
									<span class="lbl"> Pesawat Lainnya</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Alat-alat berat" />
									<span class="lbl"> Alat-alat berat</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="motor" value="Motor" />
									<span class="lbl"> Motor</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Instalasi Listrik" />
									<span class="lbl"> Instalasi Listrik</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Instalasi Pemadam Kebakaran" />
									<span class="lbl"> Instalasi Pemadam Kebakaran</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Penyalur Petir" />
									<span class="lbl"> Penyalur Petir</span>
								</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Pembangkit Listrik" />
									<span class="lbl"> Pembangkit Listrik</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Lift" />
									<span class="lbl"> Lift</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Benjana Tekan" />
									<span class="lbl"> Benjana Tekan</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Bahan Beracun dan Berbahaya" />
									<span class="lbl"> Bahan Beracun dan Berbahaya</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Turbin" />
									<span class="lbl"> Turbin</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Botol Baja" />
									<span class="lbl"> Botol Baja</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Perancah" />
									<span class="lbl"> Perancah</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="alat_bahan[]" value="Bahan Radio Aktif" />
									<span class="lbl"> Bahan Radio Aktif</span>
								</label>
							</div>
						</div>
					</div>
					
					<div class="hr hr-16 dotted"></div>
					
					<h3 style="color:#585858">
						Limbah Produksi
					</h3>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Limbah Produksi</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="limbah_produksi" data-placeholder="Pilih...">
								<option value="<?php echo $data['limbah_produksi']; ?>"><?php echo $data['limbah_produksi']; ?></option>
								<option value="Padat">Padat</option>
								<option value="Cair">Cair</option>
								<option value="Gas">Gas</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Instalasi Pengolah Limbah</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="pengolah_limbah" data-placeholder="Pilih...">
								<option value="<?php echo $data['pengolah_limbah']; ?>"><?php echo $data['pengolah_limbah']; ?></option>
								<option value="Ada">Ada</option>
								<option value="Tidak Ada">Tidak Ada</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Amdal</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="amdal" data-placeholder="Pilih...">
								<option value="<?php echo $data['amdal']; ?>"><?php echo $data['amdal']; ?></option>
								<option value="Pernah Ada">Pernah Ada</option>
								<option value="Tidak Pernah">Tidak Pernah</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Sertifikat No</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="sertifikat" maxlength="6" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['sertifikat']; ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tanggal</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tanggal_sertifikat" autocomplete="off" value="<?php echo $tanggal_sertifikat; ?>" />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="btn btn-primary" name="selanjutnya" value="Selanjutnya" />
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
elseif ($_GET['form']=='4') { 
	$query_upah = mysqli_query($mysqli, "SELECT * FROM pengupahan WHERE no_pendaftaran='$_GET[id]'")
										or die('Ada kesalahan pada query tampil data upah: '.mysqli_error($mysqli));

    $data_upah = mysqli_fetch_assoc($query_upah);
?>
	<script type="text/javascript">
	function total() {
	        bil1 = document.frm4.upah_harian.value;
	        bil2 = document.frm4.upah_bulanan.value;
	        bil3 = document.frm4.upah_borongan.value;

	        if (bil1=='' && bil2=='' && bil3=='') {
	            var hasil = 0;
	        } 
	        else if (bil1!='' && bil2=='' && bil3=='') {
	            var hasil = eval(bil1);
	        } 
	        else if (bil1=='' && bil2!='' && bil3=='') {
	            var hasil = eval(bil2);
	        }  
	        else if (bil1=='' && bil2=='' && bil3!='') {
	            var hasil = eval(bil3);
	        } 
	        else if (bil1!='' && bil2!='' && bil3=='') {
	            var hasil = eval(bil1) + eval(bil2);
	        } 
	        else if (bil1!='' && bil2=='' && bil3!='') {
	            var hasil = eval(bil1) + eval(bil3);
	        } 
	        else if (bil1=='' && bil2!='' && bil3!='') {
	            var hasil = eval(bil2) + eval(bil3);
	        } 
	        else {
	            var hasil = eval(bil1) + eval(bil2) + eval(bil3);
	        };
	        document.frm4.upah_seluruh.value=(Math.round(hasil));
	    }
	</script>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-edit"></i>
				Form Wajib Lapor Ketenagakerjaan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/wkpl/proses_update.php?act=update4" method="POST" name="frm4" />
					
					<input type="hidden" name="no_pendaftaran" value="<?php echo $_GET['id']; ?>" />

					<h3 style="color:#585858">
						Pengupahan
					</h3>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jumlah Upah Pekerja Harian</label>

						<div class="col-sm-5">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="upah_harian" name="upah_harian" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="total(this)" value="<?php echo $data_upah['upah_harian']; ?>" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jumlah Upah Pekerja Bulanan</label>

						<div class="col-sm-5">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="upah_bulanan" name="upah_bulanan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="total(this)" value="<?php echo $data_upah['upah_bulanan']; ?>" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jumlah Upah Pekerja Borongan</label>

						<div class="col-sm-5">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="upah_borongan" name="upah_borongan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="total(this)" value="<?php echo $data_upah['upah_borongan']; ?>" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jumlah Upah Seluruh Pekerja</label>

						<div class="col-sm-5">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="upah_seluruh" name="upah_seluruh" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_upah['upah_seluruh']; ?>" readonly required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tingkat Upah Tertinggai</label>

						<div class="col-sm-5">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="upah_tertinggi" name="upah_tertinggi" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_upah['upah_tertinggi']; ?>" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tingkat Upah Terendah</label>

						<div class="col-sm-5">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="upah_terendah" name="upah_terendah" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_upah['upah_terendah']; ?>" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jumlah Pekerja Penerima UMR</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="pekerja_umr" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_upah['pekerja_umr']; ?>" required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>
					
					<?php  
					$query = mysqli_query($mysqli, "SELECT tunjangan, bonus FROM wkpl WHERE no_pendaftaran='$_GET[id]'")
									or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

					$data = mysqli_fetch_assoc($query);

					?>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Tunjangan Hari Raya Keagamaan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="tunjangan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_upah['tunjangan']; ?>"><?php echo $data['tunjangan']; ?></option>
								<option value="1 Bulan Upah">1 Bulan Upah</option>
								<option value="> 1 Bulan Upah">> 1 Bulan Upah</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Bonus / Gratifikasi</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="bonus" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_upah['bonus']; ?>"><?php echo $data['bonus']; ?></option>
								<option value="1 Bulan Upah"> 1 Bulan Upah</option>
								<option value="> 1 Bulan Upah"> > 1 Bulan Upah</option>
								<option value="< 1 Bulan Upah"> < 1 Bulan Upah</option>
							</select>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="btn btn-primary" name="selanjutnya" value="Selanjutnya" />
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
elseif ($_GET['form']=='5') { ?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-edit"></i>
				Form Wajib Lapor Ketenagakerjaan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/wkpl/proses_update.php?act=update5" method="POST" />
					
					<input type="hidden" name="no_pendaftaran" value="<?php echo $_GET['id']; ?>" />

					<h3 style="color:#585858">
						Fasilitas Perusahaan
					</h3>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Fasilitas Keselamatan dan Kesehatan Kerja</label>

						<div class="col-sm-4">
							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesehatan[]" value="P3K" />
									<span class="lbl"> P3K</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesehatan[]" value="Poliklinik" />
									<span class="lbl"> Poliklinik</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesehatan[]" value="Dokter" />
									<span class="lbl"> Dokter</span>
								</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesehatan[]" value="Ahli / Petugas K3" />
									<span class="lbl"> Ahli / Petugas K3</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesehatan[]" value="Pemeriksa Paramedis" />
									<span class="lbl"> Pemeriksa Paramedis</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesehatan[]" value="Regu Pemadam Kebakaran" />
									<span class="lbl"> Regu Pemadam Kebakaran</span>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Fasilitas Kesejahteraan</label>

						<div class="col-sm-4">
							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesejahteraan[]" value="Koperasi Karyawan" />
									<span class="lbl"> Koperasi Karyawan</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesejahteraan[]" value="Unit KB Perusahaan" />
									<span class="lbl"> Unit KB Perusahaan</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesejahteraan[]" value="Sarana Ibadah" />
									<span class="lbl"> Sarana Ibadah</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesejahteraan[]" value="Perumahan Karyawan" />
									<span class="lbl"> Perumahan Karyawan</span>
								</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesejahteraan[]" value="Olahraga dan Kesenian" />
									<span class="lbl"> Olahraga dan Kesenian</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesejahteraan[]" value="Kantin" />
									<span class="lbl"> Kantin</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="checkbox" class="ace" name="kesejahteraan[]" value="TPA" />
									<span class="lbl"> TPA</span>
								</label>
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<h3 style="color:#585858">
						Jaminan Sosial Tenaga Kerja
					</h3>

					<div class="hr hr-16 dotted"></div>

					<?php  
					$query_jamsostek = mysqli_query($mysqli, "SELECT * FROM jamsostek WHERE no_pendaftaran='$_GET[id]'")
													or die('Ada kesalahan pada query tampil data jamsostek: '.mysqli_error($mysqli));

    				$data_jamsostek = mysqli_fetch_assoc($query_jamsostek);

    				$tgl_jamsostek = $data_jamsostek['tanggal_jamsostek'];

					if ($tgl_jamsostek=='0000-00-00') {
						$tanggal_jamsostek = '';
					} else {
						$exp               = explode('-',$tgl_jamsostek);
						$tanggal_jamsostek = $exp[2]."-".$exp[1]."-".$exp[0];
					}
					?>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Mulai Menjadi Peserta</label>
						
						<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tanggal_jamsostek" autocomplete="off" value="<?php echo $tanggal_jamsostek; ?>" />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Nomor Pendaftaran</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="no_jamsostek" maxlength="10" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_jamsostek['no_jamsostek']; ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jumlah Peserta</label>

						<div class="col-sm-5">
							<input type="text" class="form-control" name="peserta_jamsostek" maxlength="10" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_jamsostek['peserta_jamsostek']; ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jaminan Kecelakaan Kerja</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="jaminan_kecelakaan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_jamsostek['jaminan_kecelakaan']; ?>"><?php echo $data_jamsostek['jaminan_kecelakaan']; ?></option>
								<option value="Badan Penyelenggara adalah PT ASTEK">Badan Penyelenggara adalah PT ASTEK</option>
								<option value="Badan Penyelenggara adalah selain PT ASTEK">Badan Penyelenggara adalah selain PT ASTEK</option>
								<option value="Ditanggung Sendiri">Ditanggung Sendiri</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jaminan Kematian</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="jaminan_kematian" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_jamsostek['jaminan_kematian']; ?>"><?php echo $data_jamsostek['jaminan_kematian']; ?></option>
								<option value="Badan Penyelenggara adalah PT ASTEK">Badan Penyelenggara adalah PT ASTEK</option>
								<option value="Badan Penyelenggara adalah selain PT ASTEK">Badan Penyelenggara adalah selain PT ASTEK</option>
								<option value="Ditanggung Sendiri">Ditanggung Sendiri</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jaminan Hari Tua</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="jaminan_hari_tua" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_jamsostek['jaminan_hari_tua']; ?>"><?php echo $data_jamsostek['jaminan_hari_tua']; ?></option>
								<option value="Badan Penyelenggara adalah PT ASTEK">Badan Penyelenggara adalah PT ASTEK</option>
								<option value="Badan Penyelenggara adalah selain PT ASTEK">Badan Penyelenggara adalah selain PT ASTEK</option>
								<option value="Ditanggung Sendiri">Ditanggung Sendiri</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Jaminan Pemeliharaan Kesehatan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="jaminan_kesehatan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_jamsostek['jaminan_kesehatan']; ?>"><?php echo $data_jamsostek['jaminan_kesehatan']; ?></option>
								<option value="Badan Penyelenggara adalah PT ASTEK">Badan Penyelenggara adalah PT ASTEK</option>
								<option value="Badan Penyelenggara adalah selain PT ASTEK">Badan Penyelenggara adalah selain PT ASTEK</option>
								<option value="Ditanggung Sendiri">Ditanggung Sendiri</option>
							</select>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>
					
					<?php  
					$query = mysqli_query($mysqli, "SELECT program_pensiun FROM wkpl WHERE no_pendaftaran='$_GET[id]'")
									or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

					$data = mysqli_fetch_assoc($query);

					?>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Program Pensiun</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="program_pensiun" data-placeholder="Pilih..." required>
								<option value="<?php echo $data['program_pensiun']; ?>"><?php echo $data['program_pensiun']; ?></option>
								<option value="Dilaksanakan oleh Dana Pensiun Pembeli Kerja">Dilaksanakan oleh Dana Pensiun Pembeli Kerja</option>
								<option value="Dilaksanakan oleh Dana Pensiun Lembaga Keuangan">Dilaksanakan oleh Dana Pensiun Lembaga Keuangan</option>
							</select>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="btn btn-primary" name="selanjutnya" value="Selanjutnya" />
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
elseif ($_GET['form']=='6') { ?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-edit"></i>
				Form Wajib Lapor Ketenagakerjaan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/wkpl/proses_update.php?act=update6" method="POST" />
					
					<input type="hidden" name="no_pendaftaran" value="<?php echo $_GET['id']; ?>" />

					<h3 style="color:#585858">
						Perangkat Hubungan Industrial
					</h3>

					<div class="hr hr-16 dotted"></div>
					
					<?php  
					$query = mysqli_query($mysqli, "SELECT hubungan_kerja,organisasi_kerja,rencana_pekerja,penerimaan_pekerja,pekerja_berhenti,status_wkpl FROM wkpl WHERE no_pendaftaran='$_GET[id]'")
									or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

					$data = mysqli_fetch_assoc($query);

					?>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Perangkat Hubungan Kerja</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="hubungan_kerja" data-placeholder="Pilih..." required>
								<option value="<?php echo $data['hubungan_kerja']; ?>"><?php echo $data['hubungan_kerja']; ?></option>
								<option value="Perjanjian Kerja">Perjanjian Kerja</option>
								<option value="Peraturan Perusahaan">Peraturan Perusahaan</option>
								<option value="Kesepakatan Kerja Bersama">Kesepakatan Kerja Bersama</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Perangkat Organisasi Ketenagakerjaan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="organisasi_kerja" data-placeholder="Pilih..." required>
								<option value="<?php echo $data['organisasi_kerja']; ?>"><?php echo $data['organisasi_kerja']; ?></option>
								<option value="Bipartit">Bipartit</option>
								<option value="Serikat Pekerja Tingkat Perusahaan">Serikat Pekerja Tingkat Perusahaan</option>
								<option value="Unit Kerja Serikat Pekerja Seluruh Indonesia">Unit Kerja Serikat Pekerja Seluruh Indonesia</option>
								<option value="Panitia Pembina Keselamatan dan Kesehatan Kerja">Panitia Pembina Keselamatan dan Kesehatan Kerja</option>
								<option value="Asosiasi Perusahaan Indonesia">Asosiasi Perusahaan Indonesia</option>
							</select>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-5 control-label no-padding-right">Rencana Pekerja yang dibutuhkan dalam 12 bulan yang akan datang</label>

						<div class="col-sm-3">
							<input type="text" class="form-control" name="rencana_pekerja" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['rencana_pekerja']; ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-5 control-label no-padding-right">Jumlah Penerimaan Pekerja Selama 12 Bulan Terakhir</label>

						<div class="col-sm-3">
							<input type="text" class="form-control" name="penerimaan_pekerja" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['penerimaan_pekerja']; ?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-5 control-label no-padding-right">Jumlah Pekerja yang Berhenti Selama 12 Bulan Terakhir</label>

						<div class="col-sm-3">
							<input type="text" class="form-control" name="pekerja_berhenti" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['pekerja_berhenti']; ?>" />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<h3 style="color:#585858">
						Program Pelatihan
					</h3>

					<div class="hr hr-16 dotted"></div>
					
					<?php  
					$query_pelatihan = mysqli_query($mysqli, "SELECT * FROM pelatihan WHERE no_pendaftaran='$_GET[id]'")
													or die('Ada kesalahan pada query tampil data pelatihan: '.mysqli_error($mysqli));

    				$data_pelatihan = mysqli_fetch_assoc($query_pelatihan);
					?>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Program Pelatihan bagi Pekerja</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="pelatihan_pekerja" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_pelatihan['pelatihan_pekerja']; ?>"><?php echo $data_pelatihan['pelatihan_pekerja']; ?></option>
								<option value="Ada">Ada</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Program Pemagangan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="pemagangan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_pelatihan['pemagangan']; ?>"><?php echo $data_pelatihan['pemagangan']; ?></option>
								<option value="Ada">Ada</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Program Pelatihan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="pelatihan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_pelatihan['pelatihan']; ?>"><?php echo $data_pelatihan['pelatihan']; ?></option>
								<option value="Ada">Ada</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right">Program Pengindonesiaan</label>

						<div class="col-sm-5">
							<select class="chosen-select" name="pengindonesiaan" data-placeholder="Pilih..." required>
								<option value="<?php echo $data_pelatihan['pengindonesiaan']; ?>"><?php echo $data_pelatihan['pengindonesiaan']; ?></option>
								<option value="Ada">Ada</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<input type="submit" class="btn btn-primary" name="selanjutnya" value="Selesai" />
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}

elseif ($_GET['form']=='detail') { 
	$query = mysqli_query($mysqli, "SELECT * FROM wkpl WHERE no_pendaftaran='$_GET[id]'")
									or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

	$data = mysqli_fetch_assoc($query);

	$tgl             = substr($data['tgl_wkpl'],0,10);
	$exp             = explode('-',$tgl);
	$tgl_wkpl        = $exp[2]."-".$exp[1]."-".$exp[0];
	
	$tahun           = $exp[0] + 1;
	
	$tgl_wkpl_ulang  = $exp[2]."-".$exp[1]."-".$tahun;
	
	$tgl_berdiri     = $data['tanggal_berdiri'];
	$exp             = explode('-',$tgl_berdiri);
	$tanggal_berdiri = $exp[2]."-".$exp[1]."-".$exp[0];
	
	$tgl_pindah      = $data['tanggal_pindah'];

	if ($tgl_pindah=='0000-00-00') {
		$tanggal_pindah = '';
	} else {
		$exp             = explode('-',$tgl_pindah);
		$tanggal_pindah  = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
	}

	$tgl_sertifikat      = $data['tanggal_sertifikat'];

	if ($tgl_sertifikat=='0000-00-00') {
		$tanggal_sertifikat = '';
	} else {
		$exp                = explode('-',$tgl_sertifikat);
		$tanggal_sertifikat = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
	}
?>
 	<!-- tampilkan form add data -->
	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right:5px" class="ace-icon fa fa-edit"></i>
				Wajib Lapor Ketenagakerjaan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<div class="tabbable">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#hal1">
								<i class="ace-icon fa fa-user bigger-120"></i>
								Halaman 1
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#hal2">
								<i class="ace-icon fa fa-user bigger-120"></i>
								Halaman 2
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#hal3">
								<i class="ace-icon fa fa-home bigger-120"></i>
								Halaman 3
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#hal4">
								<i class="ace-icon fa fa-home bigger-120"></i>
								Halaman 4
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#hal5">
								<i class="ace-icon fa fa-home bigger-120"></i>
								Halaman 5
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#hal6">
								<i class="ace-icon fa fa-home bigger-120"></i>
								Halaman 6
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div id="hal1" class="tab-pane fade in active">
							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> No. Pendaftaran </div>

									<div class="profile-info-value">
										<span><?php echo $data['no_pendaftaran']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Tanggal Pendaftaran </div>

									<div class="profile-info-value">
										<span><?php echo tgl_eng_to_ind($tgl_wkpl); ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Kewajiban Mendaftar Kembali </div>

									<div class="profile-info-value">
										<span><?php echo tgl_eng_to_ind($tgl_wkpl_ulang); ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Nama Perusahaan / Usaha </div>

									<div class="profile-info-value">
										<span><?php echo $data['nama_perusahaan']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Alamat Perusahaan / Usaha </div>

									<div class="profile-info-value">
										<span><?php echo $data['alamat_perusahaan']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Kode Pos / Kecamatan </div>

									<div class="profile-info-value">
										<span><?php echo $data['kode_pos']; ?> / <?php echo $data['kecamatan']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> No. Telp. Fax. </div>

									<div class="profile-info-value">
										<span><?php echo $data['telp_fax']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-16 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Jenis Usaha </div>

									<div class="profile-info-value">
										<span><?php echo $data['jenis_usaha']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Nama Pemilik Perusahaan / Usaha </div>

									<div class="profile-info-value">
										<span><?php echo $data['nama_pemilik']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Alamat Pemilik Perusahaan / Usaha</div>

									<div class="profile-info-value">
										<span><?php echo $data['alamat_pemilik']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Nama Pengurus Perusahaan / Usaha </div>

									<div class="profile-info-value">
										<span><?php echo $data['nama_pengurus']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Alamat Pengurus Perusahaan / Usaha</div>

									<div class="profile-info-value">
										<span><?php echo $data['alamat_pengurus']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Pendirian Perusahaan / Usaha </div>

									<div class="profile-info-value">
										<span><?php echo tgl_eng_to_ind($tanggal_berdiri); ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Perpindahan Perusahaan / Usaha</div>

									<div class="profile-info-value">
										<span><?php echo $tanggal_pindah; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="text-align:left" class="profile-info-name"> Alamat Lama </div>

									<div class="profile-info-value">
										<span><?php echo $data['alamat_lama']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Status Perusahaan </div>

									<div class="profile-info-value">
										<span><?php echo $data['status_perusahaan']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Status Pemilikan </div>

									<div class="profile-info-value">
										<span><?php echo $data['status_pemilikan']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Status Permodalan </div>

									<div class="profile-info-value">
										<span><?php echo $data['status_permodalan']; ?></span>
									</div>
								</div>
							</div>
						</div>

						<div id="hal2" class="tab-pane fade">
							<h4 style="color:#585858">
								Keadaan Ketenagaan Kerja
							</h4>

							<div class="hr hr-16 dotted"></div>

							<div class="row">
								<div class="col-xs-12">
									<!-- div.table-responsive -->

									<!-- div.dataTables_borderWrap -->
									<div>
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th rowspan="3" colspan="2">Tenaga Kerja</th>
													<th rowspan="3">Kelompok Umur</th>
													<th colspan="6">Hubungan Kerja</th>
													<th rowspan="3">Jumlah</th>
												</tr>
												<tr>
													<th colspan="3">Tetap</th>
													<th colspan="3">Tidak Tetap</th>
												</tr>
												<tr>
													<th>CPUH</th>
													<th>CPUBR</th>
													<th>CPUBL</th>
													<th>CPUH</th>
													<th>CPUBR</th>
													<th>CPUBL</th>
												</tr>
											</thead>

											<tbody>
												<?php  
												$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																				ORDER BY id_tenaga_kerja ASC LIMIT 3")
																				or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

	                            				while ($data1 = mysqli_fetch_assoc($query1)) { 
												?>
				                            	<tr>
													<td style="vertical-align:middle" width="80" class="center">WNI</td>
													<td style="vertical-align:middle" width="140" class="center">Laki-laki</td>
													<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['jumlah']; ?></td>
												<?php  
												}
												?>
												</tr>

												<?php  
												$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																				ORDER BY id_tenaga_kerja ASC LIMIT 3 OFFSET 3")
																				or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

	                            				while ($data1 = mysqli_fetch_assoc($query1)) { 
												?>
				                            	<tr>
													<td style="vertical-align:middle" width="80" class="center">WNI</td>
													<td style="vertical-align:middle" width="140" class="center">Wanita</td>
													<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['jumlah']; ?></td>
												<?php  
												}
												?>
												</tr>

												<?php  
												$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																				ORDER BY id_tenaga_kerja ASC LIMIT 1 OFFSET 6")
																				or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

	                            				while ($data1 = mysqli_fetch_assoc($query1)) { 
												?>
				                            	<tr>
													<td style="vertical-align:middle" width="80" class="center">WNA</td>
													<td style="vertical-align:middle" width="140" class="center">Laki-laki</td>
													<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['jumlah']; ?></td>
												<?php  
												}
												?>
												</tr>
												
												<?php  
												$query1 = mysqli_query($mysqli, "SELECT * FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'
																				ORDER BY id_tenaga_kerja ASC LIMIT 1 OFFSET 7")
																				or die('Ada kesalahan pada query tampil data tenaga kerja: '.mysqli_error($mysqli));

	                            				while ($data1 = mysqli_fetch_assoc($query1)) { 
												?>
				                            	<tr>
													<td style="vertical-align:middle" width="80" class="center">WNA</td>
													<td style="vertical-align:middle" width="140" class="center">Wanita</td>
													<td width="160"><?php echo $data1['kelompok_umur']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpuh_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubr_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['cpubl_tidak_tetap']; ?></td>
													<td width="160" class="center"><?php echo $data1['jumlah']; ?></td>
												<?php  
												}
												?>
												</tr>

												<tr>
													<td style="vertical-align:middle" class="center" colspan="3">jumlah</td>
												<?php  
												$query1 = mysqli_query($mysqli, "SELECT SUM(cpuh_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'")
																				or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

	                            				$data1 = mysqli_fetch_assoc($query1);
	                            				$jumlah_cpuh_tetap = $data1['jumlah'];

	                            				$query1 = mysqli_query($mysqli, "SELECT SUM(cpubr_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'")
																				or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

	                            				$data1 = mysqli_fetch_assoc($query1);
	                            				$jumlah_cpubr_tetap = $data1['jumlah'];

	                            				$query1 = mysqli_query($mysqli, "SELECT SUM(cpubl_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'")
																				or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

	                            				$data1 = mysqli_fetch_assoc($query1);
	                            				$jumlah_cpubl_tetap = $data1['jumlah'];

	                            				$query1 = mysqli_query($mysqli, "SELECT SUM(cpuh_tidak_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'")
																				or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

	                            				$data1 = mysqli_fetch_assoc($query1);
	                            				$jumlah_cpuh_tidak_tetap = $data1['jumlah'];

	                            				$query1 = mysqli_query($mysqli, "SELECT SUM(cpubr_tidak_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'")
																				or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

	                            				$data1 = mysqli_fetch_assoc($query1);
	                            				$jumlah_cpubr_tidak_tetap = $data1['jumlah'];

	                            				$query1 = mysqli_query($mysqli, "SELECT SUM(cpubl_tidak_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'")
																				or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

	                            				$data1 = mysqli_fetch_assoc($query1);
	                            				$jumlah_cpubl_tidak_tetap = $data1['jumlah'];

	                            				$query1 = mysqli_query($mysqli, "SELECT SUM(jumlah) as total FROM tenaga_kerja WHERE no_pendaftaran='$_GET[id]'")
																				or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

	                            				$data1 = mysqli_fetch_assoc($query1);
	                            				$total = $data1['total'];
												?>
													<td width="160" class="center"><?php echo $jumlah_cpuh_tetap; ?></td>
													<td width="160" class="center"><?php echo $jumlah_cpubr_tetap; ?></td>
													<td width="160" class="center"><?php echo $jumlah_cpubl_tetap; ?></td>
													<td width="160" class="center"><?php echo $jumlah_cpuh_tidak_tetap; ?></td>
													<td width="160" class="center"><?php echo $jumlah_cpubr_tidak_tetap; ?></td>
													<td width="160" class="center"><?php echo $jumlah_cpubl_tidak_tetap; ?></td>
													<td width="160" class="center"><?php echo $total; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div>
								<strong>Keterangan</strong>
								<table>
									<tr>
										<td width="80">CPUH</td>
										<td width="10">:</td>
										<td>Cara Pembayaran Upah Harian</td>
									</tr>
									<tr>
										<td>CPUBR</td>
										<td>:</td>
										<td>Cara Pembayaran Upah Borongan</td>
									</tr>
									<tr>
										<td>CPUBR</td>
										<td>:</td>
										<td>Cara Pembayaran Upah Bulanan</td>
									</tr>
								</table>
							</div>
						</div>

						<div id="hal3" class="tab-pane fade">
							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Waktu Kerja </div>

									<div class="profile-info-value">
										<span><?php echo $data['waktu_kerja']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Penggunaan Alat dan Bahan </div>

									<div class="profile-info-value">
										<span><?php echo $data['alat_bahan']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>
							
							<h4 style="color:#585858">
								Limbah Produksi
							</h4>

							<div class="hr hr-10 dotted"></div>
								
							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Limbah Produksi </div>

									<div class="profile-info-value">
										<span><?php echo $data['limbah_produksi']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Instalasi Pengolah Limbah </div>

									<div class="profile-info-value">
										<span><?php echo $data['pengolah_limbah']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Amdal </div>

									<div class="profile-info-value">
										<span><?php echo $data['amdal']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Sertifikat No. </div>

									<div class="profile-info-value">
										<span><?php echo $data['sertifikat']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:280px;text-align:left" class="profile-info-name"> Tanggal </div>

									<div class="profile-info-value">
										<span><?php echo $tanggal_sertifikat; ?></span>
									</div>
								</div>
							</div>
						</div>
						

						<?php  
						$query_upah = mysqli_query($mysqli, "SELECT * FROM pengupahan WHERE no_pendaftaran='$_GET[id]'")
														or die('Ada kesalahan pada query tampil data upah: '.mysqli_error($mysqli));

        				$data_upah = mysqli_fetch_assoc($query_upah);
						?>
						<div id="hal4" class="tab-pane fade">
							<div style="font-size:14px;" class="profile-user-info">
								<h4 style="color:#585858">
									Pengupahan
								</h4>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Upah Pekerja Harian </div>

									<div class="profile-info-value">
										<span>Rp. <?php echo format_rupiah_nol($data_upah['upah_harian']); ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Upah Pekerja Bulanan </div>

									<div class="profile-info-value">
										<span>Rp. <?php echo format_rupiah_nol($data_upah['upah_bulanan']); ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Upah Pekerja Borongan </div>

									<div class="profile-info-value">
										<span>Rp. <?php echo format_rupiah_nol($data_upah['upah_borongan']); ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Upah Seluruh Pekerja yang Dibayarkan </div>

									<div class="profile-info-value">
										<span>Rp. <?php echo format_rupiah_nol($data_upah['upah_seluruh']); ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Tingkat Upah Tertinggai </div>

									<div class="profile-info-value">
										<span>Rp. <?php echo format_rupiah_nol($data_upah['upah_tertinggi']); ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Tingkat Upah Terendah </div>

									<div class="profile-info-value">
										<span>Rp. <?php echo format_rupiah_nol($data_upah['upah_terendah']); ?></span>
									</div>
								</div>
							</div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Pekerja Penerima UMR </div>

									<div class="profile-info-value">
									<?php  
									$persen_umr = ($data_upah['pekerja_umr'] * 100) / $total;
									?>
										<span><?php echo $data_upah['pekerja_umr']; ?> Orang &nbsp; (<?php echo number_format($persen_umr,2); ?>%)</span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>
								
							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Tunjangan Hari Raya Keagamaan </div>

									<div class="profile-info-value">
										<span><?php echo $data['tunjangan']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>
								
							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Bonus / Gratifikasi </div>

									<div class="profile-info-value">
										<span><?php echo $data['bonus']; ?></span>
									</div>
								</div>
							</div>
						</div>

						<div id="hal5" class="tab-pane fade">
							<h4 style="color:#585858">
								Fasilitas Perusahaan
							</h4>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Fasilitas Keselamatan dan Kesehatan Kerja </div>

									<div class="profile-info-value">
										<span><?php echo $data['fasilitas_kesehatan']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Fasilitas Kesejahteraan </div>

									<div class="profile-info-value">
										<span><?php echo $data['fasilitas_kesejahteraan']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<h4 style="color:#585858">
								Jaminan Sosial Tenaga Kerja
							</h4>

							<div class="hr hr-10 dotted"></div>
							
							<?php  
							$query_jamsostek = mysqli_query($mysqli, "SELECT * FROM jamsostek WHERE no_pendaftaran='$_GET[id]'")
															or die('Ada kesalahan pada query tampil data jamsostek: '.mysqli_error($mysqli));

	        				$data_jamsostek = mysqli_fetch_assoc($query_jamsostek);

	        				$tgl_jamsostek = $data_jamsostek['tanggal_jamsostek'];

							if ($tgl_jamsostek=='0000-00-00') {
								$tanggal_jamsostek = '';
							} else {
								$exp               = explode('-',$tgl_jamsostek);
								$tanggal_jamsostek = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
							}
							?>
							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Mulai Menjadi Peserta </div>

									<div class="profile-info-value">
										<span><?php echo $tanggal_jamsostek; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Nomor Pendaftaran </div>

									<div class="profile-info-value">
										<span><?php echo $data_jamsostek['no_jamsostek']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Peserta </div>

									<div class="profile-info-value">
										<span><?php echo $data_jamsostek['peserta_jamsostek']; ?> Orang</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jaminan Kecelakaan Kerja </div>

									<div class="profile-info-value">
										<span><?php echo $data_jamsostek['jaminan_kecelakaan']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jaminan Kematian </div>

									<div class="profile-info-value">
										<span><?php echo $data_jamsostek['jaminan_kematian']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jaminan Hari Tua </div>

									<div class="profile-info-value">
										<span><?php echo $data_jamsostek['jaminan_hari_tua']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jaminan Pemeliharaan Kesehatan </div>

									<div class="profile-info-value">
										<span><?php echo $data_jamsostek['jaminan_kesehatan']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Program Pensiun </div>

									<div class="profile-info-value">
										<span><?php echo $data['program_pensiun']; ?></span>
									</div>
								</div>
							</div>
						</div>

						<div id="hal6" class="tab-pane fade">
							<h4 style="color:#585858">
								Perangkat Hubungan Industrial
							</h4>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Perangkat Hubungan Kerja </div>

									<div class="profile-info-value">
										<span><?php echo $data['hubungan_kerja']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Perangkat Organisasi Ketenagakerjaan </div>

									<div class="profile-info-value">
										<span><?php echo $data['organisasi_kerja']; ?></span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Rencana Pekerja yang dibutuhkan dalam 12 bulan yang akan datang </div>

									<div class="profile-info-value">
										<span><?php echo $data['rencana_pekerja']; ?> Orang</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Penerimaan Pekerja Selama 12 Bulan Terakhir </div>

									<div class="profile-info-value">
										<span><?php echo $data['penerimaan_pekerja']; ?> Orang</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Jumlah Pekerja yang Berhenti Selama 12 Bulan Terakhir </div>

									<div class="profile-info-value">
										<span><?php echo $data['pekerja_berhenti']; ?> Orang</span>
									</div>
								</div>
							</div>

							<div class="hr hr-10 dotted"></div>

							<?php  
							$query_pelatihan = mysqli_query($mysqli, "SELECT * FROM pelatihan WHERE no_pendaftaran='$_GET[id]'")
															or die('Ada kesalahan pada query tampil data pelatihan: '.mysqli_error($mysqli));

	        				$data_pelatihan = mysqli_fetch_assoc($query_pelatihan);
							?>
							<div style="font-size:14px;" class="profile-user-info">
								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Program Pelatihan bagi Pekerja </div>

									<div class="profile-info-value">
										<span><?php echo $data_pelatihan['pelatihan_pekerja']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Program Pemagangan </div>

									<div class="profile-info-value">
										<span><?php echo $data_pelatihan['pemagangan']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Program Pelatihan </div>

									<div class="profile-info-value">
										<span><?php echo $data_pelatihan['pelatihan']; ?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div style="width:350px;text-align:left" class="profile-info-name"> Program Pengindonesiaan </div>

									<div class="profile-info-value">
										<span><?php echo $data_pelatihan['pengindonesiaan']; ?></span>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="clearfix form-actions">
					<div class="col-md-offset-0 col-md-12">
						<a style="width:100px" href="?module=wkpl" class="btn">Kembali</a>
					</div>
				</div>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div>
	</div><!--/.page-content-->
<?php
}
?>