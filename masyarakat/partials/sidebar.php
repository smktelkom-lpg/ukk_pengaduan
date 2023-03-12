<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href=".">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Menu Utama</div>
            <a class="nav-link" href="?pg=pengaduan">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Pengaduan
            </a>
            <a class="nav-link" href="?pg=tanggapan">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Data Pengaduan
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Anda login sebagai :</div>
        <?= $masyarakat['nama']; ?>
    </div>
</nav>