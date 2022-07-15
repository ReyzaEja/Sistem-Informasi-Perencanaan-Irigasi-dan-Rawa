<?php
session_start();
ob_start();

// panggil file database.php untuk koneksi ke database
require_once "../../../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");

// ambil data dari submit form
if (isset($_GET['bulan'])) {
    if ($_GET['bulan']=='1') {
        $bulan = "Januari";
    } elseif ($_GET['bulan']=='2') {
        $bulan = "Februari";
    } elseif ($_GET['bulan']=='3') {
        $bulan = "Maret";
    } elseif ($_GET['bulan']=='4') {
        $bulan = "April";
    } elseif ($_GET['bulan']=='5') {
        $bulan = "Mei";
    } elseif ($_GET['bulan']=='6') {
        $bulan = "Juni";
    } elseif ($_GET['bulan']=='7') {
        $bulan = "Juli";
    } elseif ($_GET['bulan']=='8') {
        $bulan = "Agustus";
    } elseif ($_GET['bulan']=='9') {
        $bulan = "September";
    } elseif ($_GET['bulan']=='10') {
        $bulan = "Oktober";
    } elseif ($_GET['bulan']=='11') {
        $bulan = "November";
    } elseif ($_GET['bulan']=='12') {
        $bulan = "Desember";
    }

    $tahun = $_GET['tahun'];
} else {
    $bulan = "";
    $tahun = "";
}

$query = mysqli_query($mysqli, "SELECT * FROM wkpl
                                WHERE EXTRACT(MONTH FROM tgl_wkpl)='$_GET[bulan]' AND EXTRACT(YEAR FROM tgl_wkpl)='$_GET[tahun]'
                                ORDER BY no_pendaftaran ASC")
                                or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

$rows = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN WKPL</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title-perusahaan">
            DINAS TENAGA KERJA DAN TRANSMIGRASI
        </div>
        <div id="title-perusahaan">
            PROVINSI LAMPUNG
        </div>

        <div id="title-alamat">
            Jl. Jend. Gatot Subroto No.28, Pahoman, Engal, Kota Bandar Lampung, Lampung  
        </div>

        <div style="margin:-65px 0 0 200px">
            <img src="../../assets/img/logo.png" height="55">
        </div>

        <hr><br>

        <div id="title">
            LAPORAN WKPL
        </div>

        <div id="title">
            Bulan <?php echo $bulan; ?> <?php echo $tahun; ?>
        </div>

        <br>

        <div id="isi">
            <table width="100%" border="0.5" cellpadding="0" cellspacing="0">
                <tr class="tr-title">
                    <th height="25" align="center" valign="middle">No.</th>
                    <th height="25" align="center" valign="middle">No. Pendaftaran</th>
                    <th height="25" align="center" valign="middle">Tanggal Daftar</th>
                    <th height="25" align="center" valign="middle">Tanggal Daftar Kembali</th>
                    <th height="25" align="center" valign="middle">Nama Perusahaan</th>
                    <th height="25" align="center" valign="middle">Alamat Perusahaan</th>
                    <th height="25" align="center" valign="middle">Nama Pemilik Perusahaan</th>
                    <th height="25" align="center" valign="middle">Jenis Usaha</th>
                </tr>

                <?php
                for($i=1; $i<=$rows; $i++) {
                    $data = mysqli_fetch_assoc($query);

                    $tgl            = substr($data['tgl_wkpl'],0,10);
                    $exp            = explode('-',$tgl);
                    $tgl_wkpl       = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$exp[0]);
                    
                    $tahun          = $exp[0] + 1;
                    
                    $tgl_wkpl_ulang = tgl_eng_to_ind($exp[2]."-".$exp[1]."-".$tahun);
                ?>  
                <tr>
                    <td width="30" height="14" align="center" valign="middle"><?=$i?></td>
                    <td width="95" height="14" align="center" valign="middle"><?=$data['no_pendaftaran']?></td>
                    <td width="90" height="14" align="center" valign="middle"><?=$tgl_wkpl?></td>
                    <td width="140" height="14" align="center" valign="middle"><?=$tgl_wkpl_ulang?></td>
                    <td style="padding-left:5px;" width="160" height="14" valign="middle"><?=$data['nama_perusahaan']?></td>
                    <td style="padding-left:5px;" width="195" height="14" valign="middle"><?=$data['alamat_perusahaan']?></td>
                    <td style="padding-left:5px;" width="160" height="14" valign="middle"><?=$data['nama_pemilik']?></td>
                    <td style="padding-left:5px;" width="110" height="14" valign="middle"><?=$data['jenis_usaha']?></td>
                </tr>
                <?php 
                } 
                ?>
            </table>
        </div>

        <div id="footer-tanggal">
            Bandar Lampung, <?php echo tgl_eng_to_ind($hari_ini); ?>
        </div>
        
        <div id="footer-nama">
            ..................................................
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN WKPL.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
require_once('../../assets/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(8, 10, 8, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>