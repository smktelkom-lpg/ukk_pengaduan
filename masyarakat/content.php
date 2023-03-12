<?php

if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    if ($pg == 'pengaduan') {
        include "modul/mod_pengaduan/pengaduan.php";
    } elseif ($pg == 'tanggapan') {
        include "modul/mod_tanggapan/tanggapan.php";
    }
}else{
    include "modul/home.php";
}