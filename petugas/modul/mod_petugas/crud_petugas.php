<?php 

//Menghubungkan ke dalam database
include '../../../config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$pg = $_GET['pg'];

if ($pg == "tambah") {
	$nama = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    // Query untuk menyimpan data ke database
    $query = "INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES ('$nama', '$username', '$password', '$telp', '$level')";
    $result = mysqli_query($koneksi, $query);

    header("Location: ../../?pg=petugas&pesan=sukses");
}

if($pg == "edit") {
    // ambil data dari formulir
    $id = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];

    // cek apakah password baru diinputkan atau tidak
    if(empty($password)) {
        // jika password kosong, gunakan password lama
        $query = "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', telp='$telp', level='$level' WHERE id_petugas='$id'";
    } else {
        // jika password diinputkan, gunakan password baru
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', telp='$telp', level='$level' WHERE id_petugas='$id'";
    }

    // eksekusi query untuk update data
    if(mysqli_query($koneksi, $query)) {
        // redirect ke halaman data petugas dengan pesan sukses
        header("Location: ../../?pg=petugas&pesan=edit");
    } else {
        // redirect ke halaman data petugas dengan pesan gagal
        header("Location: ../../?pg=petugas&pesan=gagal");
    }
}

if($pg == "hapus") {
    //mengambil nilai id dari parameter URL
    $id_petugas = $_GET['id'];

    //mengeksekusi query untuk menghapus petugas dengan id tersebut
    $query = "DELETE FROM petugas WHERE id_petugas = $id_petugas";
    $result = mysqli_query($koneksi, $query);

    //jika query berhasil dieksekusi
    if($result) {
        //redirect ke halaman daftar petugas dengan pesan sukses
        header("Location: ../../?pg=petugas&pesan=hapus");
    }
}