<?php 
 
$koneksi = mysqli_connect("localhost","root","","ukk_pengaduan");
 
// Melakukan Pengecekan Koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>