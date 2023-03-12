<?php 

//Menghubungkan ke dalam database
include '../../../config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$pg = $_GET['pg'];

if ($pg == "proses") {
	$id_pengaduan = $_POST['id_pengaduan'];
	$status = 1;

	mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan=$id_pengaduan");
	header("Location: ../../?pg=tanggapan&pesan=proses");
}

if ($pg == "tanggapan") {
	$id_pengaduan = $_POST['id_pengaduan'];
	$tgl_tanggapan = date('Y-m-d');
	$tanggapan = $_POST['tanggapan'];
	$id_petugas = $_POST['id_petugas'];
	$status = 2;

	mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");
	mysqli_query($koneksi, "UPDATE pengaduan SET status = '$status' WHERE id_pengaduan = '$id_pengaduan'");
	header("Location: ../../?pg=tanggapan&pesan=tanggapi");
}