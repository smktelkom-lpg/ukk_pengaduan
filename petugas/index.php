<?php
session_start();

// cek apakah session login sudah ada
if(!isset($_SESSION['id_petugas'])){
  header("location: login.php?pesan=login");
  exit();
}else{
    include '../config/koneksi.php';
    $id = $_SESSION['id_petugas'];
    $query = mysqli_query($koneksi, "SELECT * From petugas WHERE id_petugas='$id'");
    $petugas = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Judul Aplikasi -->
        <title>Dashboard - Aplikasi Pelaporan Pengaduan Masyarakat</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/toastr/build/toastr.min.css">
        <script src="../assets/toastr/build/toastr.min.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <!-- Load Navbar -->
        <?php include 'partials/navbar.php' ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <!-- Load Sidebar -->
            <?php include 'partials/sidebar.php' ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-4">
                    <!-- Load Konten -->
                    <?php include 'content.php' ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <!-- Load Footer -->
                    <?php include 'partials/footer.php' ?>
                </footer>
            </div>
        </div>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script>toastr.success("Data berhasil disimpan")</script>
    </body>
</html>
