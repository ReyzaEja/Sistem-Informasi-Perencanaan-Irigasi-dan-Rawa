<?php
// Panggil koneksi database.php untuk koneksi database
require_once "config/database.php";

if (isset($_POST['daftar'])) {
	// ambil data hasil submit dari form
	$nama_pemilik   = mysqli_real_escape_string($mysqli, trim($_POST['nama_pemilik']));
	$no_ktp         = mysqli_real_escape_string($mysqli, trim($_POST['no_ktp']));
	$alamat_pemilik = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pemilik']));
	$no_telepon     = mysqli_real_escape_string($mysqli, trim($_POST['no_telepon']));
	$email          = mysqli_real_escape_string($mysqli, trim($_POST['email']));
	$no_siu         = mysqli_real_escape_string($mysqli, trim($_POST['no_siu']));
	$nama_usaha     = mysqli_real_escape_string($mysqli, trim($_POST['nama_usaha']));
	$alamat_usaha   = mysqli_real_escape_string($mysqli, trim($_POST['alamat_usaha']));

	// perintah query untuk pengecekan email pada tabel pelanggan
	$query_email = mysqli_query($mysqli, "SELECT email FROM pendaftaran WHERE email='$email'")
										  or die('Ada kesalahan pada query cek email : '.mysqli_error($mysqli));    
	$row_email   = mysqli_num_rows($query_email);

	// jika data email sudah ada
	if ($row_email > 0) {
		// maka alihkan ke halaman form pendaftaran
		header("location: daftar.php?alert=1");
	}
	// jika data email belum ada
	else {
		// maka jalankan perintah query untuk menyimpan data ke tabel pelanggan
		$query = mysqli_query($mysqli, "INSERT INTO pendaftaran(	no_ktp,
																	nama,
																	alamat,
																	no_hp,
																	email,
																	no_siu,
																	nama_usaha,
																	alamat_usaha)
															VALUES(	'$no_ktp',
																	'$nama_pemilik',
																	'$alamat_pemilik',
																	'$no_telepon',
																	'$email',
																	'$no_siu',
																	'$nama_usaha',
																	'$alamat_usaha')")	
										or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
		// cek query
		if ($query) {
			// jika berhasil tampilkan pesan berhasil simpan data
			header("location: daftar.php?alert=2");
		}	
	}
}	
?>