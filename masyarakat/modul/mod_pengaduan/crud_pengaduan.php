<?php 

//Menghubungkan ke dalam database
include '../../../config/koneksi.php';

$pg = $_GET['pg'];

if ($pg == "tambah") {
	//Untuk mendapatkan zona waktu Asia/Jakarta dalam PHP
    date_default_timezone_set('Asia/Jakarta');

	// Mendapatkan waktu saat ini
	$timestamp = time();

	// Mendapatkan format tanggal
	$tanggal = date("Ymd", $timestamp);

	// Mendapatkan id terakhir dari tabel pengaduan
	$query = mysqli_query($koneksi, "SELECT max(id_pengaduan) as id_terakhir FROM pengaduan");
	$row = mysqli_fetch_assoc($query);
	$id_terakhir = $row['id_terakhir'];

	// Membuat id baru dengan increment 1
	$id_baru = $id_terakhir + 1;

	// Mendapatkan nama file yang diupload
	$nama_file = $_FILES['foto']['name'];

	// Mendapatkan ekstensi file
	$ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

	// Mendefinisikan nama file baru
	$nama_file_baru = $tanggal . "_" . $id_baru . "." . $ekstensi;

	// Menentukan lokasi penyimpanan file
	$target_dir = '../../../assets/pengaduan/';
	$target_file = $target_dir . $nama_file_baru;

	// Mendapatkan ukuran file
	$file_size = $_FILES['foto']['size'];

	// Mendapatkan tipe file
	$file_type = $_FILES['foto']['type'];

	// Mendapatkan data dari form
	$tgl_pengaduan = $_POST['tgl_pengaduan'];
	$nik = $_POST['nik'];
	$isi_laporan = $_POST['isi_laporan'];
	$status = 0;

	// Memeriksa apakah file yang diupload sesuai dengan ekstensi yang diizinkan dan ukuran maksimal yang diperbolehkan
	if (in_array($ekstensi, array("jpg", "jpeg", "png")) && $file_size <= 2097152) {

	  // Memindahkan file ke direktori tujuan
	  if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {

	    // Menyimpan data ke dalam tabel pengaduan
	    $query = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, status, foto) VALUES ('$tgl_pengaduan', '$nik', '$isi_laporan', '$status', '$nama_file_baru')";
	    $result = mysqli_query($koneksi, $query);

	    // Memeriksa apakah data berhasil disimpan
	    if ($result) {
	      header("Location: ../../?pg=pengaduan&pesan=sukses");
	    } else {
	      header("Location: ../../?pg=pengaduan&pesan=gagal");
	    }

	  } else {
	    header("Location: ../../?pg=pengaduan&pesan=error");
	  }

	} else {
	  header("Location: ../../?pg=pengaduan&pesan=ukuran");
	}
}