<?php
// panggil file database.php untuk koneksi ke database
require_once "../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
require_once "../config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module']=='beranda') {
		include "modules/beranda/view.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih pendaftaran, panggil file view pendaftaran
	elseif ($_GET['module']=='pendaftaran') {
		include "modules/pendaftaran/view.php";
	}

	// jika halaman konten yang dipilih form pendaftaran, panggil file form pendaftaran
	elseif ($_GET['module']=='form_pendaftaran') {
		include "modules/pendaftaran/form.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih wkpl, panggil file view wkpl
	elseif ($_GET['module']=='wkpl') {
		include "modules/wkpl/view.php";
	}

	// jika halaman konten yang dipilih form wkpl, panggil file form wkpl
	elseif ($_GET['module']=='form_wkpl') {
		include "modules/wkpl/form.php";
	}

	// jika halaman konten yang dipilih form update, panggil file form update
	elseif ($_GET['module']=='form_update') {
		include "modules/wkpl/update.php";
	}
	// ---------------------------------------------------------------------------------

	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module']=='profil') {
		include "modules/profil/view.php";
	}

	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module']=='password') {
		include "modules/password/view.php";
	}
}
?>