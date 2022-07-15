<?php
session_start();
ob_start();

// panggil file database.php untuk koneksi ke database
require_once "../../../config/database.php";
// panggil fungsi untuk format tanggal
require_once "../../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
require_once "../../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

$query = mysqli_query($mysqli, "SELECT * FROM wkpl
                                WHERE no_pendaftaran='$_GET[id]'")
                                or die('Ada kesalahan pada query tampil data wkpl: '.mysqli_error($mysqli));

$rows = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);

$tgl            = substr($data['tgl_wkpl'],0,10);
$exp            = explode('-',$tgl);
$tgl_wkpl       = $exp[2]."-".$exp[1]."-".$exp[0];
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>WKPL</title>
        <link rel="stylesheet" type="text/css" href="../../../admin/assets/css/laporan.css" />
    </head>
    <body>
        <div id="title-perusahaan">
            DAFTAR PERUSAHAAN / USAHA
        </div>
        <div id="title-perusahaan">
            WAJIB BAYAR JAMINAN KECELAKAAN KERJA
        </div>

        <br>

        <div id="isi">
            <table border="0.15">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td height="18" valign="middle">DISNAKER</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle">PROVINSI LAMPUNG</td>
                            </tr>
                        </table> 
                    </td>
                    <td width="300">
                        <table>
                            <tr>
                                <td height="18" valign="middle">NO. PENDAFTARAN</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $data['no_pendaftaran']; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="355">
                        <table>
                            <tr>
                                <td height="18" valign="middle">1.</td>
                                <td height="18" valign="middle">NAMA DAN ALAMAT PERUSAHAAN / USAHA</td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle">2.</td>
                                <td height="18" valign="middle">NAMA DAN ALAMAT PIMPINAN PERUSAHAAN / USAHA</td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle">3.</td>
                                <td height="18" valign="middle">NOMOR TELEPON</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td width="360" height="18" valign="middle"><?php echo $data['nama_perusahaan']; ?> / <?php echo $data['alamat_perusahaan']; ?></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"><?php echo $data['nama_pemilik']; ?> / <?php echo $data['alamat_pemilik']; ?></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"><?php echo $data['telp_fax']; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table>
                            <tr>
                                <td height="18" valign="middle">4.</td>
                                <td height="18" valign="middle">JUMLAH TENAGA KERJA</td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                                <td height="18" valign="middle">JUMLAH</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                        <?php  
                        $query1 = mysqli_query($mysqli, "SELECT SUM(cpuh_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$data[no_pendaftaran]'")
                                                        or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                        $data1 = mysqli_fetch_assoc($query1);
                        $jumlah_cpuh_tetap = $data1['jumlah'];

                        $query1 = mysqli_query($mysqli, "SELECT SUM(cpubr_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$data[no_pendaftaran]'")
                                                        or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                        $data1 = mysqli_fetch_assoc($query1);
                        $jumlah_cpubr_tetap = $data1['jumlah'];

                        $query1 = mysqli_query($mysqli, "SELECT SUM(cpubl_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$data[no_pendaftaran]'")
                                                        or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                        $data1 = mysqli_fetch_assoc($query1);
                        $jumlah_cpubl_tetap = $data1['jumlah'];

                        $query1 = mysqli_query($mysqli, "SELECT SUM(cpuh_tidak_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$data[no_pendaftaran]'")
                                                        or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                        $data1 = mysqli_fetch_assoc($query1);
                        $jumlah_cpuh_tidak_tetap = $data1['jumlah'];

                        $query1 = mysqli_query($mysqli, "SELECT SUM(cpubr_tidak_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$data[no_pendaftaran]'")
                                                        or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                        $data1 = mysqli_fetch_assoc($query1);
                        $jumlah_cpubr_tidak_tetap = $data1['jumlah'];

                        $query1 = mysqli_query($mysqli, "SELECT SUM(cpubl_tidak_tetap) as jumlah FROM tenaga_kerja WHERE no_pendaftaran='$data[no_pendaftaran]'")
                                                        or die('Ada kesalahan pada query tampil data jumlah: '.mysqli_error($mysqli));

                        $data1 = mysqli_fetch_assoc($query1);
                        $jumlah_cpubl_tidak_tetap = $data1['jumlah'];

                        $harian = $jumlah_cpuh_tetap + $jumlah_cpuh_tidak_tetap;
                        if ($harian=='0') {
                            $jumlah_harian = '';
                        } else {
                            $jumlah_harian = $jumlah_cpuh_tetap + $jumlah_cpuh_tidak_tetap;
                        }

                        $bulanan = $jumlah_cpubl_tetap + $jumlah_cpubl_tidak_tetap;
                        if ($bulanan=='0') {
                            $jumlah_bulanan = '';
                        } else {
                            $jumlah_bulanan = $jumlah_cpubl_tetap + $jumlah_cpubl_tidak_tetap;
                        }

                        $borongan = $jumlah_cpubr_tetap + $jumlah_cpubr_tidak_tetap;
                        if ($borongan=='0') {
                            $jumlah_borongan = '';
                        } else {
                            $jumlah_borongan = $jumlah_cpubr_tetap + $jumlah_cpubr_tidak_tetap;
                        }

                        $total = $jumlah_harian + $jumlah_bulanan + $jumlah_borongan;
                        ?>
                            <tr>
                                <td height="18" valign="middle">HARIAN</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $jumlah_harian; ?></td>
                                <td height="18" valign="middle">ORANG</td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle">BULANAN</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $jumlah_bulanan; ?></td>
                                <td height="18" valign="middle">ORANG</td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle">BORONGAN</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $jumlah_borongan; ?></td>
                                <td height="18" valign="middle">ORANG</td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $total; ?></td>
                                <td height="18" valign="middle">ORANG</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table>
                            <tr>
                                <td height="18" valign="middle">5.</td>
                                <td height="18" valign="middle">BESARNYA UPAH DARI MASING-MASING TENAGA KERJA</td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                                <td height="18" valign="middle">JUMLAH</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                        <?php  
                        $query1 = mysqli_query($mysqli, "SELECT * FROM pengupahan WHERE no_pendaftaran='$data[no_pendaftaran]'")
                                                        or die('Ada kesalahan pada query tampil data upah: '.mysqli_error($mysqli));

                        $data1 = mysqli_fetch_assoc($query1);

                        if ($data1['upah_harian']=='0') {
                            $upah_harian = '';
                        } else {
                            $upah_harian = "Rp. ".format_rupiah_nol($data1['upah_harian']);
                        }

                        if ($data1['upah_bulanan']=='0') {
                            $upah_bulanan = '';
                        } else {
                            $upah_bulanan = "Rp. ".format_rupiah_nol($data1['upah_bulanan']);
                        }

                        if ($data1['upah_borongan']=='0') {
                            $upah_borongan = '';
                        } else {
                            $upah_borongan = "Rp. ".format_rupiah_nol($data1['upah_borongan']);
                        }
                        ?>
                            <tr>
                                <td height="18" valign="middle">HARIAN</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $upah_harian; ?></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle">BULANAN</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $upah_bulanan; ?></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle">BORONGAN</td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle"><?php echo $upah_borongan; ?></td>
                            </tr>
                            <tr>
                                <td height="18" valign="middle"></td>
                                <td height="18" valign="middle">:</td>
                                <td height="18" valign="middle">Rp. <?php echo format_rupiah_nol($data1['upah_seluruh']); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div style="margin:20px 0 0 400px">
                <table>
                    <tr>
                        <td>DIBUAT DEGAN SESUNGGUHNYA DI </td>
                        <td>:</td>
                        <td>PROVINSI LAMPUNG</td>
                    </tr>
                    <tr>
                        <td>PADA TANGGAL </td>
                        <td>:</td>
                        <td><?php echo tgl_eng_to_ind($tgl_wkpl); ?></td>
                    </tr>
                </table>
            </div>

            <div style="margin-left:400px;border:0.5px solid #555"></div>

            <div style="margin:2px 0 0 400px;text-align:center">
                <table>
                    <tr>
                        <td width="300">PIMPINAN PERUSAHAAN / USAHA </td>
                    </tr>
                    <tr>
                        <td height="50"></td>
                    </tr>
                    <tr>
                        <td>(................................................)</td>
                    </tr>
                </table>
            </div>

            <div style="border:0.5px solid #555"></div>

            <div style="margin:5px 0 0 400px">
                <table>
                    <tr>
                        <td>TELAH DITERIMA </td>
                        <td>:</td>
                        <td>KANTOR DINAS TENAGA KERJA</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td>PROVINSI LAMPUNG</td>
                    </tr>
                    <tr>
                        <td>PADA TANGGAL </td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <div style="margin-left:400px;border:0.5px solid #555"></div>

            <div style="margin:2px 0 0 0;text-align:center">
                <table>
                    <tr>
                        <td width="300">Mengetahui </td>
                        <td width="410"></td>
                    </tr>
                    <tr>
                        <td width="300">AN. KEPALA DINAS TENAGA KERJA </td>
                        <td width="410">PENGAWAS KETENAGAKERJAAN </td>
                    </tr>

                    <tr>
                        <td width="300">PROVINSI LAMPUNG</td>
                    </tr>
                    <tr>
                        <td height="50"></td>
                    </tr>
                    <tr>
                        <td width="300">(................................................)</td>
                        <td width="300">(................................................)</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="WKPL.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
require_once('../../../admin/assets/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(8, 10, 8, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>