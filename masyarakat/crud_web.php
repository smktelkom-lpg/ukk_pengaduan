<?php 

//Menghubungkan ke dalam database
include '../config/koneksi.php';

$pg = $_GET['pg'];

if ($pg == "register") {
	$nik 		= $_POST['nik'];
	$nama 		= $_POST['nama'];
	$username 	= $_POST['username'];
	$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT);
	$telp 		= $_POST['telp'];

	mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('','$nik','$nama','$username','$password','$telp')");

	header("Location: login.php?pesan=sukses");

}

if ($pg == "login") {
	// mengaktifkan session php
	session_start();
	
	//Menangkap data dari form
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//Query untuk mengambil data dari tabel masyarakat
	$query = mysqli_query($koneksi, "select * from masyarakat where username='$username'");

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
	        exit;
	    } else {
	    	//Membuat session jika benar
	        $_SESSION['id_masyarakat'] = $user['id_masyarakat'];
	        header("Location: index.php");
	        exit;
	    }
	} else {
		//Mengembalikan ke halaman login jika semua kondisi tidak terpenuhi
	    header("Location: login.php?pesan=gagal");
	    exit;
	}
}

?>