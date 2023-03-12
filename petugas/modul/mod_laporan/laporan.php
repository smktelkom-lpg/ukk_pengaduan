<?php 

include '../../../config/koneksi.php';

?>
<link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.min.css">
<center><h2>Laporan Pengaduan Masyarakat</h2></center>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pengaduan</th>
            <th>Tgl. Pengduan</th>
            <th>NIK</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = mysqli_query($koneksi, "SELECT * From pengaduan ORDER BY tgl_pengaduan DESC");
            $no = 1;
            while ($pengaduan = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $pengaduan['id_pengaduan'] ?></td>
            <td><?= $pengaduan['tgl_pengaduan'] ?></td>
            <td><?= $pengaduan['nik'] ?></td>
            <td>
                <?php 
                    // Menentukan nilai status
                    $status = $pengaduan['status'];

                    // Menentukan keterangan status
                    if ($status == 0) {
                        $keterangan = '<span class="badge bg-warning text-dark">Pending</span>';
                    } elseif ($status == 1) {
                        $keterangan = '<span class="badge bg-info text-dark">Proses</span>';
                    } elseif ($status == 2) {
                        $keterangan = '<span class="badge bg-success">Selesai</span>';
                    } else {
                        $keterangan = 'Status tidak valid';
                    }

                    // Menampilkan keterangan status
                    echo $keterangan;

                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
  window.print();
</script>