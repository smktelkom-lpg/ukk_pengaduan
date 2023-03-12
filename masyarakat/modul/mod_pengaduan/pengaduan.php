<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];

    if ($pesan == "sukses") {
        echo '<div class="alert alert-success">Data Pengaduan Berhasil Ditambahkan</div>';
    } else if ($pesan == "gagal") {
        echo '<div class="alert alert-danger">Data Gagal Ditambahkan</div>';
    } else if ($pesan == "error") {
        echo '<div class="alert alert-danger">Terjadi kesalahan saat mengupload file</div>';
    } else if ($pesan == "ukuran") {
        echo '<div class="alert alert-danger">Ekstensi file tidak diizinkan atau ukuran file terlalu besar, maksimal ukuran file adalah 2Mb</div>';
    }
}
?>

<div class="card">
  <h5 class="card-header">Tambah Pengaduan</h5>
  <div class="card-body">
    <!-- Form -->
    <form action="modul/mod_pengaduan/crud_pengaduan.php?pg=tambah" method="POST" enctype="multipart/form-data">
    	<!-- Membuat Fungsi Tanggal Hari ini -->
    	<?php 
    		//Untuk mendapatkan zona waktu Asia/Jakarta dalam PHP
    		date_default_timezone_set('Asia/Jakarta');
    		//untuk menampilkan tanggal hari ini
    		$date = date('Y-m-d');
    	?>
    	<div class="mb-3">
		  <label for="tgl_pengaduan" class="form-label">Tanggal Pengaduan</label>
		  <input name="tgl_pengaduan" type="text" class="form-control" id="tgl_pengaduan" value="<?= $date; ?>" readonly="">
		</div>
		<div class="mb-3">
		  <label for="nik" class="form-label">NIK</label>
		  <input name="nik" type="number" class="form-control" id="nik" value="<?= $masyarakat['nik'] ?>" readonly="">
		</div>
		<div class="mb-3">
		  <label for="isi_laporan" class="form-label">Isi Laporan</label>
		  <textarea name="isi_laporan" class="form-control" id="isi_laporan" rows="3"></textarea>
		</div>
		<div class="mb-3">
		  <label for="foto" class="form-label">Foto</label>
		  <input name="foto" class="form-control" type="file" id="foto">
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</div>
    </form>
  </div>
</div>