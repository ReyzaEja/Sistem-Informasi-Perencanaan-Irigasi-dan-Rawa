<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
// Panggil library PHPMailer
require '../../lib/PHPMailer/PHPMailerAutoload.php';

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
	if ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			// ambil data dari submit form
			$id_daftar      = $_GET['id'];
			$email_penerima = $_GET['email'];
			$password       = md5('123');

			// $tmp_file = $_FILES['surat']['tmp_name'];
			// $allowed_extensions = array('doc','docx');

			$mail = new PHPMailer;

			$mail->isSMTP();                                   	// Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    	// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            	// Enable SMTP authentication
			$mail->Username = 'disnaker.lampung@gmail.com';   	// SMTP username
			$mail->Password = 'disnakerlampung123456789'; 					   	// SMTP password
			$mail->SMTPSecure = 'tls';                         	// Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 	// TCP port to connect to

			$mail->setFrom('disnaker.lampung@gmail.com', 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung');
			$mail->addReplyTo('disnaker.lampung@gmail.com', 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung');
			$mail->addAddress($email_penerima);   			// Add a recipient
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// $mail->addAttachment($tmp_file, 'Surat Balasan');        // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    	// Optional name

			$mail->isHTML(true);  // Set email format to HTML

			$bodyContent = '<h1>Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung</h1>';
			$bodyContent .= '<p>Terima kasih sudah melalukan pendaftaran akun pada <b>Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung</b>.</p>';
			$bodyContent .= '<p>Akun Anda telah kami verifikasi dan sudah diaktifkan. Silahkan login dan isi form wajib lapor ketenagakerjaan menggunakan email dan password dibawah ini</p>';
			$bodyContent .= '<p><b>Email : '.$email_penerima.'</b></p>';
			$bodyContent .= '<p><b>Password : 123</b></p>';
			$bodyContent .= '<p>Silahkan klik <a href="http://localhost/iStudio/Program/Teknokrat/TI/prog-rizky-aliza/user"><strong>LOGIN DISINI</strong></a>.</p>';

			$mail->Subject = 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung';
			$mail->Body    = $bodyContent;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    // jika berhasil jalankan perintah update status pendaftaran
			    $query = mysqli_query($mysqli, "UPDATE pendaftaran SET status    = 'Data Valid',
																       password  = '$password'
			                                                     WHERE id_daftar = '$id_daftar'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
			    // lalu tampilkan pesan berhasil kirim email
			    header("location: ../../main.php?module=pendaftaran&alert=1");
			}
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			// ambil data dari submit form
			$id_daftar      = $_GET['id'];
			$email_penerima = $_GET['email'];

			// $tmp_file = $_FILES['surat']['tmp_name'];
			// $allowed_extensions = array('doc','docx');

			$mail = new PHPMailer;

			$mail->isSMTP();                                   	// Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    	// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            	// Enable SMTP authentication
			$mail->Username = 'disnaker.lampung@gmail.com';   	// SMTP username
			$mail->Password = 'disnakerlampung123456789'; 					   	// SMTP password
			$mail->SMTPSecure = 'tls';                         	// Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 	// TCP port to connect to

			$mail->setFrom('disnaker.lampung@gmail.com', 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung');
			$mail->addReplyTo('disnaker.lampung@gmail.com', 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung');
			$mail->addAddress($email_penerima);   			// Add a recipient
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// $mail->addAttachment($tmp_file, 'Surat Balasan');        // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    	// Optional name

			$mail->isHTML(true);  // Set email format to HTML

			$bodyContent = '<h1>Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung</h1>';
			$bodyContent .= '<p>Terima kasih sudah melalukan pendaftaran akun pada <b>Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung</b>.</p>';
			$bodyContent .= '<p>Mohon maaf pendaftaran akun Anda kami tolak karena data tidak valid. Silahkan melakukan pendaftaran ulang dengan mengisi data yang benar.</p>';

			$mail->Subject = 'Dinas Tenaga Kerja dan Transmigrasi Provinsi Lampung';
			$mail->Body    = $bodyContent;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    // jika berhasil jalankan perintah update status pendaftaran
			    $query = mysqli_query($mysqli, "UPDATE pendaftaran SET status    = 'Data Tidak Valid'
			                                                     WHERE id_daftar = '$id_daftar'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
			    // lalu tampilkan pesan berhasil kirim email
			    header("location: ../../main.php?module=pendaftaran&alert=2");
			}
		}
	}
}
?>
