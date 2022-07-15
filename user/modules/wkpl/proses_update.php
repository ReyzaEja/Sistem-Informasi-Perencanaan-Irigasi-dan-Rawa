<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['user_email']) && empty($_SESSION['user_password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='update1') {
        if (isset($_POST['selanjutnya'])) {
            // ambil data hasil submit dari form
            $no_pendaftaran    = mysqli_real_escape_string($mysqli, trim($_POST['no_pendaftaran']));
            $nama_perusahaan   = mysqli_real_escape_string($mysqli, trim($_POST['nama_perusahaan']));
            $alamat_perusahaan = mysqli_real_escape_string($mysqli, trim($_POST['alamat_perusahaan']));
            $kecamatan         = mysqli_real_escape_string($mysqli, trim($_POST['kecamatan']));
            $kode_pos          = mysqli_real_escape_string($mysqli, trim($_POST['kode_pos']));
            $telp_fax          = mysqli_real_escape_string($mysqli, trim($_POST['telp_fax']));
            $jenis_usaha       = mysqli_real_escape_string($mysqli, trim($_POST['jenis_usaha']));
            $nama_pemilik      = mysqli_real_escape_string($mysqli, trim($_POST['nama_pemilik']));
            $alamat_pemilik    = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pemilik']));
            $nama_pengurus     = mysqli_real_escape_string($mysqli, trim($_POST['nama_pengurus']));
            $alamat_pengurus   = mysqli_real_escape_string($mysqli, trim($_POST['alamat_pengurus']));
            
            $tgl_berdiri       = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_berdiri']));
            $exp               = explode('-',$tgl_berdiri);
            $tanggal_berdiri   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $tgl_pindah        = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_pindah']));
            $exp               = explode('-',$tgl_pindah);
            $tanggal_pindah    = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $alamat_lama       = mysqli_real_escape_string($mysqli, trim($_POST['alamat_lama']));
            $status_perusahaan = mysqli_real_escape_string($mysqli, trim($_POST['status_perusahaan']));
            $status_pemilikan  = mysqli_real_escape_string($mysqli, trim($_POST['status_pemilikan']));
            $status_permodalan = mysqli_real_escape_string($mysqli, trim($_POST['status_permodalan']));

            $query = mysqli_query($mysqli, "UPDATE wkpl SET nama_perusahaan     = '$nama_perusahaan',
                                                            alamat_perusahaan   = '$alamat_perusahaan',
                                                            kecamatan           = '$kecamatan',
                                                            kode_pos            = '$kode_pos',
                                                            telp_fax            = '$telp_fax',
                                                            jenis_usaha         = '$jenis_usaha',
                                                            nama_pemilik        = '$nama_pemilik',
                                                            alamat_pemilik      = '$alamat_pemilik',
                                                            nama_pengurus       = '$nama_pengurus',
                                                            alamat_pengurus     = '$alamat_pengurus',
                                                            tanggal_berdiri     = '$tanggal_berdiri',
                                                            tanggal_pindah      = '$tanggal_pindah',
                                                            alamat_lama         = '$alamat_lama',
                                                            status_perusahaan   = '$status_perusahaan',
                                                            status_pemilikan    = '$status_pemilikan',
                                                            status_permodalan   = '$status_permodalan'
                                                      WHERE no_pendaftaran      = '$no_pendaftaran'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=form_update&form=2&id=$no_pendaftaran");
            }  
        }   
    }

    elseif ($_GET['act']=='update2') {
        if (isset($_POST['selanjutnya'])) {

            $jumlah = COUNT($_POST['cpuh1']);

            for ($i=0; $i < $jumlah; $i++) { 
                $no_pendaftaran  = $_POST['no_pendaftaran'];
                $id_tenaga_kerja = $_POST['id_tenaga_kerja'][$i];
                $cpuh1           = $_POST['cpuh1'][$i];
                $cpubr1          = $_POST['cpubr1'][$i];
                $cpubl1          = $_POST['cpubl1'][$i];
                $cpuh2           = $_POST['cpuh2'][$i];
                $cpubr2          = $_POST['cpubr2'][$i];
                $cpubl2          = $_POST['cpubl2'][$i];
                $total           = $cpuh1 + $cpubr1 + $cpubl1 + $cpuh2 + $cpubr2 + $cpubl2;  

                $query = mysqli_query($mysqli, "UPDATE tenaga_kerja SET cpuh_tetap        = '$cpuh1',
                                                                        cpubr_tetap       = '$cpubr1',
                                                                        cpubl_tetap       = '$cpubl1',
                                                                        cpuh_tidak_tetap  = '$cpuh2',
                                                                        cpubr_tidak_tetap = '$cpubr2',
                                                                        cpubl_tidak_tetap = '$cpubl2',
                                                                        jumlah            = '$total'
                                                                  WHERE id_tenaga_kerja   = '$id_tenaga_kerja'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=form_update&form=3&id=$no_pendaftaran");
                }   
            }
        }   
    }

    elseif ($_GET['act']=='update3') {
        if (isset($_POST['selanjutnya'])) {
            // ambil data hasil submit dari form
            $no_pendaftaran     = mysqli_real_escape_string($mysqli, trim($_POST['no_pendaftaran']));
            $waktu_kerja        = mysqli_real_escape_string($mysqli, trim($_POST['waktu_kerja']));
            $limbah_produksi    = mysqli_real_escape_string($mysqli, trim($_POST['limbah_produksi']));
            $pengolah_limbah    = mysqli_real_escape_string($mysqli, trim($_POST['pengolah_limbah']));
            $amdal              = mysqli_real_escape_string($mysqli, trim($_POST['amdal']));
            $sertifikat         = mysqli_real_escape_string($mysqli, trim($_POST['sertifikat']));
            
            $tgl_sertifikat     = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_sertifikat']));
            $exp                = explode('-',$tgl_sertifikat);
            $tanggal_sertifikat = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $jumlah             = COUNT($_POST['alat_bahan']);

            for ($i=0; $i < $jumlah; $i++) { 
                $alat_bahan = $_POST['alat_bahan'][$i];
            }

            $query = mysqli_query($mysqli, "UPDATE wkpl SET waktu_kerja         = '$waktu_kerja',
                                                            alat_bahan          = '$alat_bahan',
                                                            limbah_produksi     = '$limbah_produksi',
                                                            pengolah_limbah     = '$pengolah_limbah',
                                                            amdal               = '$amdal',
                                                            sertifikat          = '$sertifikat',
                                                            tanggal_sertifikat  = '$tanggal_sertifikat'
                                                      WHERE no_pendaftaran      = '$no_pendaftaran'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: ../../main.php?module=form_update&form=4&id=$no_pendaftaran");
            }  
        }   
    }

    elseif ($_GET['act']=='update4') {
        if (isset($_POST['selanjutnya'])) {
            // ambil data hasil submit dari form
            $no_pendaftaran = mysqli_real_escape_string($mysqli, trim($_POST['no_pendaftaran']));
            $upah_harian    = mysqli_real_escape_string($mysqli, trim($_POST['upah_harian']));
            $upah_bulanan   = mysqli_real_escape_string($mysqli, trim($_POST['upah_bulanan']));
            $upah_borongan  = mysqli_real_escape_string($mysqli, trim($_POST['upah_borongan']));
            $upah_seluruh   = mysqli_real_escape_string($mysqli, trim($_POST['upah_seluruh']));
            $upah_tertinggi = mysqli_real_escape_string($mysqli, trim($_POST['upah_tertinggi']));
            $upah_terendah  = mysqli_real_escape_string($mysqli, trim($_POST['upah_terendah']));
            $pekerja_umr    = mysqli_real_escape_string($mysqli, trim($_POST['pekerja_umr']));
            
            $tunjangan      = mysqli_real_escape_string($mysqli, trim($_POST['tunjangan']));
            $bonus          = mysqli_real_escape_string($mysqli, trim($_POST['bonus']));

            $query = mysqli_query($mysqli, "UPDATE pengupahan SET   upah_harian    = '$upah_harian',
                                                                    upah_bulanan   = '$upah_bulanan',
                                                                    upah_borongan  = '$upah_borongan',
                                                                    upah_seluruh   = '$upah_seluruh',
                                                                    upah_tertinggi = '$upah_tertinggi',
                                                                    upah_terendah  = '$upah_terendah',
                                                                    pekerja_umr    = '$pekerja_umr'
                                                           WHERE    no_pendaftaran = '$no_pendaftaran'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {

                $query2 = mysqli_query($mysqli, "UPDATE wkpl SET tunjangan      = '$tunjangan',
                                                                 bonus          = '$bonus'
                                                           WHERE no_pendaftaran = '$no_pendaftaran'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query2) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=form_update&form=5&id=$no_pendaftaran");
                }
            } 
        }   
    }

    elseif ($_GET['act']=='update5') {
        if (isset($_POST['selanjutnya'])) {
            // ambil data hasil submit dari form
            $no_pendaftaran     = mysqli_real_escape_string($mysqli, trim($_POST['no_pendaftaran']));
            $tgl_jamsostek      = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_jamsostek']));
            $exp                = explode('-',$tgl_jamsostek);
            $tanggal_jamsostek  = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $no_jamsostek       = mysqli_real_escape_string($mysqli, trim($_POST['no_jamsostek']));
            $peserta_jamsostek  = mysqli_real_escape_string($mysqli, trim($_POST['peserta_jamsostek']));
            $jaminan_kecelakaan = mysqli_real_escape_string($mysqli, trim($_POST['jaminan_kecelakaan']));
            $jaminan_kematian   = mysqli_real_escape_string($mysqli, trim($_POST['jaminan_kematian']));
            $jaminan_hari_tua   = mysqli_real_escape_string($mysqli, trim($_POST['jaminan_hari_tua']));
            $jaminan_kesehatan  = mysqli_real_escape_string($mysqli, trim($_POST['jaminan_kesehatan']));
            $program_pensiun    = mysqli_real_escape_string($mysqli, trim($_POST['program_pensiun']));

            $jumlah_kesehatan = COUNT($_POST['kesehatan']);

            for ($i=0; $i < $jumlah_kesehatan; $i++) { 
                $kesehatan = $_POST['kesehatan'][$i];
            }

            $jumlah_kesejahteraan = COUNT($_POST['kesejahteraan']);
            
            for ($i=0; $i < $jumlah_kesejahteraan; $i++) { 
                $kesejahteraan = $_POST['kesejahteraan'][$i];
            }

            $query = mysqli_query($mysqli, "UPDATE jamsostek SET tanggal_jamsostek   = '$tanggal_jamsostek',
                                                                no_jamsostek        = '$no_jamsostek',
                                                                peserta_jamsostek   = '$peserta_jamsostek',
                                                                jaminan_kecelakaan  = '$jaminan_kecelakaan',
                                                                jaminan_kematian    = '$jaminan_kematian',
                                                                jaminan_hari_tua    = '$jaminan_hari_tua',
                                                                jaminan_kesehatan   = '$jaminan_kesehatan'
                                                          WHERE no_pendaftaran      = '$no_pendaftaran'")
                                            or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {

                $query2 = mysqli_query($mysqli, "UPDATE wkpl SET fasilitas_kesehatan        = '$kesehatan',
                                                                 fasilitas_kesejahteraan    = '$kesejahteraan',
                                                                 program_pensiun            = '$program_pensiun'
                                                           WHERE no_pendaftaran             = '$no_pendaftaran'")
                                        or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query2) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=form_update&form=6&id=$no_pendaftaran");
                }
            }  
        }   
    }

    elseif ($_GET['act']=='update6') {
        if (isset($_POST['selanjutnya'])) {
            // ambil data hasil submit dari form
            $no_pendaftaran     = mysqli_real_escape_string($mysqli, trim($_POST['no_pendaftaran']));
            $hubungan_kerja     = mysqli_real_escape_string($mysqli, trim($_POST['hubungan_kerja']));
            $organisasi_kerja   = mysqli_real_escape_string($mysqli, trim($_POST['organisasi_kerja']));
            $rencana_pekerja    = mysqli_real_escape_string($mysqli, trim($_POST['rencana_pekerja']));
            $penerimaan_pekerja = mysqli_real_escape_string($mysqli, trim($_POST['penerimaan_pekerja']));
            $pekerja_berhenti   = mysqli_real_escape_string($mysqli, trim($_POST['pekerja_berhenti']));
            $status_wkpl        = 'Menunggu Verifikasi Data';

            $pelatihan_pekerja  = mysqli_real_escape_string($mysqli, trim($_POST['pelatihan_pekerja']));
            $pemagangan         = mysqli_real_escape_string($mysqli, trim($_POST['pemagangan']));
            $pelatihan          = mysqli_real_escape_string($mysqli, trim($_POST['pelatihan']));
            $pengindonesiaan    = mysqli_real_escape_string($mysqli, trim($_POST['pengindonesiaan']));

            $query = mysqli_query($mysqli, "UPDATE wkpl SET hubungan_kerja      = '$hubungan_kerja',
                                                            organisasi_kerja    = '$organisasi_kerja',
                                                            rencana_pekerja     = '$rencana_pekerja',
                                                            penerimaan_pekerja  = '$penerimaan_pekerja',
                                                            pekerja_berhenti    = '$pekerja_berhenti',
                                                            status_wkpl         = '$status_wkpl'
                                                      WHERE no_pendaftaran      = '$no_pendaftaran'")
                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

            // cek query
            if ($query) {
 
                $query2 = mysqli_query($mysqli, "UPDATE pelatihan SET   pelatihan_pekerja   = '$pelatihan_pekerja',
                                                                        pemagangan          = '$pemagangan',
                                                                        pelatihan           = '$pelatihan',
                                                                        pengindonesiaan     = '$pengindonesiaan'
                                                                  WHERE no_pendaftaran      = '$no_pendaftaran'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query2) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=wkpl&alert=2");
                }
            }  
        }   
    }      
}       
?>