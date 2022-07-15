<ul class="nav nav-list">
<?php 
// fungsi untuk pengecekan menu aktif
// jika menu beranda dipilih, menu beranda aktif
if ($_GET["module"] == "beranda") { ?>
    <li class="active open hover highlight">
        <a href="?module=beranda">
            <i class="menu-icon fa fa-home"></i>
            <span class="menu-text"> Beranda </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
} 
// jika tidak, menu beranda tidak aktif
else {  ?>
     <li class="hover">
        <a href="?module=beranda">
            <i class="menu-icon fa fa-home"></i>
            <span class="menu-text"> Beranda </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
}
// panggil file database.php untuk koneksi ke database
require_once "../config/database.php";

$query = mysqli_query($mysqli, "SELECT id_daftar FROM wkpl WHERE id_daftar='$_SESSION[id_daftar]'")
                                or die('Ada kesalahan pada query tampil data guru: '.mysqli_error($mysqli));

$row = mysqli_num_rows($query);

if ($row > 0) {
    // jika menu wkpl dipilih, menu wkpl aktif
    if ($_GET["module"] == "wkpl" || $_GET["module"] == "form_wkpl" || $_GET["module"] == "form_update") { ?>
        <li class="active open hover highlight">
            <a href="?module=wkpl">
                <i class="menu-icon fa fa-clone"></i>
                <span class="menu-text"> WKPL </span>
            </a>

            <b class="arrow"></b>
        </li>
    <?php
    } 
    // jika tidak, menu wkpl tidak aktif
    else {  ?>
         <li class="hover">
            <a href="?module=wkpl">
                <i class="menu-icon fa fa-clone"></i>
                <span class="menu-text"> WKPL </span>
            </a>

            <b class="arrow"></b>
        </li>
    <?php
    }
} else {
    // jika menu wkpl dipilih, menu wkpl aktif
    if ($_GET["module"] == "wkpl" || $_GET["module"] == "form_wkpl" || $_GET["module"] == "form_update") { ?>
        <li class="active open hover highlight">
            <a href="?module=form_wkpl">
                <i class="menu-icon fa fa-clone"></i>
                <span class="menu-text"> WKPL </span>
            </a>

            <b class="arrow"></b>
        </li>
    <?php
    } 
    // jika tidak, menu wkpl tidak aktif
    else {  ?>
         <li class="hover">
            <a href="?module=form_wkpl">
                <i class="menu-icon fa fa-clone"></i>
                <span class="menu-text"> WKPL </span>
            </a>

            <b class="arrow"></b>
        </li>
    <?php
    }
}
?>
</ul>

