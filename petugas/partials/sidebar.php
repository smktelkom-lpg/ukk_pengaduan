<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href=".">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu Utama</div>
            <a class="nav-link" href="?pg=tanggapan">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Data Pengaduan
            </a>
            <?php if ($petugas['level'] == "admin") {
            ?>
            <a class="nav-link" href="modul/mod_laporan/laporan.php" target="_blank">
                <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
                Laporan Pengaduan
            </a>
            <a class="nav-link" href="?pg=petugas">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Data Petugas
            </a>
            <?php } ?>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Anda login sebagai :</div>
        <?= $petugas['nama_petugas']; ?>
    </div>
</nav>