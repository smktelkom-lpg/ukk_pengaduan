<?php 

//Menghubungkan ke dalam database
include '../config/koneksi.php';

$pg = $_GET['pg'];

if ($pg == "login") {
	// mengaktifkan session php
	session_start();
	
	//Menangkap data dari form
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//Query untuk mengambil data dari tabel petugas
	$query = mysqli_query($koneksi, "select * from petugas where username='$username'");

	//Melakukan Pengecekan
	$ceklogin = mysqli_num_rows($query);

	//Menampilkan data
	$user = mysqli_fetch_array($query);

	//Melakukan pengecekan data
	if ($ceklogin == 1) {
		//Melakukan Pengecekan Password
	    if (!password_verify($password, $user['password'])) {
	        //Mengembalikan ke halaman login jika terjadi password salah
	        header("Location: login.php?pesan=gagal");
	    } else {
	    	//Membuat session jika benar
	        $_SESSION['id_petugas'] = $user['id_petugas'];
	        header("Location: index.php");
	    }
	} else {
		//Mengembalikan ke halaman login jika semua kondisi tidak terpenuhi
	    header("Location: login.php?pesan=gagal");
	}
}

?>