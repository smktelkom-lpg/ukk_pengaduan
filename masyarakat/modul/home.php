<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <?php 

                    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$masyarakat[nik]'");
                    $count = mysqli_num_rows($query);
                    echo $count;

                ?>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span>Jumlah Pengaduan Saya</span>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <?php

                    // Menentukan nilai nik dan status
                    $nik = $masyarakat['nik'];
                    $status = 1;
                    // Membuat query dan Menjalankan query untuk menghitung jumlah baris
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM pengaduan WHERE nik='$nik' AND status='$status'");
                    // Mendapatkan hasil query
                    $row = mysqli_fetch_assoc($query);
                    // Menampilkan jumlah baris
                    echo $row['jumlah'];

                ?>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span>Sedang Di Proses</span>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <?php
                
                    // Menentukan nilai nik dan status
                    $nik = $masyarakat['nik'];
                    $status = 2;
                    // Membuat query dan Menjalankan query untuk menghitung jumlah baris
                    $query = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM pengaduan WHERE nik='$nik' AND status='$status'");
                    // Mendapatkan hasil query
                    $row = mysqli_fetch_assoc($query);
                    // Menampilkan jumlah baris
                    echo $row['jumlah'];

                ?>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span>Sudah Selesai</span>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Pengaduan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
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
                    //Ambil data nik
                    $nik = $masyarakat['nik'];
                    $query = mysqli_query($koneksi, "SELECT * From pengaduan WHERE nik='$nik' ORDER BY tgl_pengaduan DESC");
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
    </div>
</div>