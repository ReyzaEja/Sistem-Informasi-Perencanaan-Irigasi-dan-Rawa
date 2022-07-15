<?php
// panggil file untuk koneksi ke database
require_once "../config/database.php";

// ambil data hasil submit dari form
$email    = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['email'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));


// ambil data dari tabel pendaftaran untuk pengecekan berdasarkan inputan email dan password
$query = mysqli_query($mysqli, "SELECT * FROM pendaftaran WHERE email='$email' AND password='$password'")
								or die('Ada kesalahan pada query pendaftaran: '.mysqli_error($mysqli));
$rows  = mysqli_num_rows($query);

// jika data ada, jalankan perintah untuk membuat session
if ($rows > 0) {
	$data  = mysqli_fetch_assoc($query);

	session_start();
	$_SESSION['id_daftar']     = $data['id_daftar'];
	$_SESSION['user_email']    = $data['email'];
	$_SESSION['user_password'] = $data['password'];
	$_SESSION['nama_pemilik']  = $data['nama'];
	$_SESSION['nama_usaha']    = $data['nama_usaha'];
	
	// lalu alihkan ke halaman admin
	header("Location: main.php?module=beranda");
}

// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
else {
	header("Location: index.php?alert=1");
}
?>