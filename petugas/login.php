<?php
session_start();

// cek apakah session login petugas sudah ada
if(isset($_SESSION['id_petugas'])){
  header("location: index.php");
  exit();
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
        <title>Login - Petugas Aplikasi Pelaporan Pengaduan Masyarakat</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <!-- Menampilkan Pesan Notifikasi Pendaftaran -->
                                        <?php 
                                            if(isset($_GET['pesan'])){
                                                if($_GET['pesan'] == "sukses"){
                                        ?>
                                        <div class="alert alert-info">
                                            Pendaftaran berhasil, silahkan login.
                                        </div>
                                        <?php }else if($_GET['pesan'] == "gagal"){ ?>
                                        <div class="alert alert-danger">
                                            Username atau Password yang anda masukan salah!
                                        </div>
                                        <?php }else if($_GET['pesan'] == "login"){ ?>
                                        <div class="alert alert-warning">
                                            Anda harus login terlebih dahulu!
                                        </div>
                                        <?php }} ?>
                                        <form action="crud_web.php?pg=login" method="POST">
                                            <div class="form-floating mb-3">
                                                <input name="username" class="form-control" id="username" type="text" placeholder="Masukan username" / required="">
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="password" type="password" placeholder="Masukan password" / required="">
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Aplikasi Pelaporan Pengaduan Masyarakat</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
