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

// jika menu pendaftaran dipilih, menu pendaftaran aktif
if ($_GET["module"] == "pendaftaran" || $_GET["module"] == "form_pendaftaran") { ?>
    <li class="active open hover highlight">
        <a href="?module=pendaftaran">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Data Pendaftaran </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
} 
// jika tidak, menu pendaftaran tidak aktif
else {  ?>
     <li class="hover">
        <a href="?module=pendaftaran">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> Data Pendaftaran </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
}

// jika menu wkpl dipilih, menu wkpl aktif
if ($_GET["module"] == "wkpl") { ?>
    <li class="active open hover highlight">
        <a href="?module=wkpl">
            <i class="menu-icon fa fa-clone"></i>
            <span class="menu-text"> Data WKPL </span>
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
            <span class="menu-text"> Data WKPL </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
}

// jika menu laporan dipilih, menu laporan aktif
if ($_GET["module"] == "laporan") { ?>
    <li class="active open hover highlight">
        <a href="?module=laporan">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
} 
// jika tidak, menu laporan tidak aktif
else {  ?>
     <li class="hover">
        <a href="?module=laporan">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>
        </a>

        <b class="arrow"></b>
    </li>
<?php
}
?>
</ul>

