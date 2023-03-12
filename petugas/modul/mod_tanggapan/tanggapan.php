<?php
if (isset($_GET['pesan'])) {
    $pesan = $_GET['pesan'];

    if ($pesan == "proses") {
        echo '<div class="alert alert-success">Data Pengaduan Berhasil Diproses</div>';
    }else if($pesan == "tanggapi"){
        echo '<div class="alert alert-success">Data Pengaduan Berhasil Ditanggapi</div>';
    }
}
?>

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
                    <th>Action</th>
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
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $pengaduan['id_pengaduan'] ?>">
                          Lihat Detail Pengaduan
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalDetail<?= $pengaduan['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                              <form action="modul/mod_tanggapan/crud_tanggapan.php?pg=proses" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Pengaduan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?php
                                  

                                  // Menentukan nilai id pengaduan yang ingin dilihat detailnya
                                  $id_pengaduan = $pengaduan['id_pengaduan'];

                                  // Membuat query untuk mendapatkan data pengaduan
                                  $query2 = "SELECT * FROM pengaduan LEFT JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan WHERE pengaduan.id_pengaduan = '$id_pengaduan'";
                                  $detail = mysqli_query($koneksi, $query2);

                                  // Mendapatkan hasil query
                                  $row = mysqli_fetch_assoc($detail);
                                ?>
                                <input type="hidden" name="id_pengaduan" value="<?= $pengaduan['id_pengaduan']; ?>">
                                <table class="table table-striped">
                                  <tr>
                                    <td>Tanggal Pengaduan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="<?= $row['tgl_pengaduan']; ?>" readonly></td>
                                  </tr>
                                  <tr>
                                    <td>Nomor Induk Kependudukan (NIK)</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="<?= $row['nik']; ?>" readonly></td>
                                  </tr>
                                  <tr>
                                    <td>Isi Laporan</td>
                                    <td>:</td>
                                    <td><?= $row['isi_laporan']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td><img src="../assets/pengaduan/<?= $row['foto']; ?>" class="img-thumbnail" width="200"></td>
                                  </tr>
                                  <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                      <?php
                                        if ($row['status'] == 0) {
                                          $keterangan = '<span class="badge bg-warning text-dark">Pending</span>';
                                        } elseif ($row['status'] == 1) {
                                          $keterangan = '<span class="badge bg-info text-dark">Proses</span>';
                                        } elseif ($row['status'] == 2) {
                                          $keterangan = '<span class="badge bg-success">Selesai</span>';
                                        } else {
                                          $keterangan = 'Status tidak valid';
                                        }
                                        echo $keterangan;
                                      ?>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                  	<td>Tanggapan</td>
                                  	<td>:</td>
                                  	<td>
                                  		<?php 
		                                  	if ($row['tanggapan'] == null) {
		                                  		echo "Belum Ada Tanggapan";
		                                  	}else{
		                                  		echo $row['tanggapan'];
		                                  	}
		                                ?>
                                  	</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Proses</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <!-- Tombol Tanggapan -->
                        <!-- Button trigger modal -->
                        <?php if ($row['status'] == 2) {
                        ?>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalTanggapan<?= $pengaduan['id_pengaduan'] ?>" disabled>
                          Tanggapi
                        </button>
                        <?php }else{ ?>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalTanggapan<?= $pengaduan['id_pengaduan'] ?>">
                          Tanggapi
                        </button>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="modalTanggapan<?= $pengaduan['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                              <form action="modul/mod_tanggapan/crud_tanggapan.php?pg=tanggapan" method="POST">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tanggapi Pengaduan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <?php
                                  

                                  // Menentukan nilai id pengaduan yang ingin dilihat detailnya
                                  $id_pengaduan = $pengaduan['id_pengaduan'];

                                  // Membuat query untuk mendapatkan data pengaduan
                                  $query2 = "SELECT * FROM pengaduan LEFT JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan WHERE pengaduan.id_pengaduan = '$id_pengaduan'";
                                  $detail = mysqli_query($koneksi, $query2);

                                  // Mendapatkan hasil query
                                  $row = mysqli_fetch_assoc($detail);
                                ?>
                                <table class="table table-striped">
                                  <tr>
                                    <td>ID Pengaduan</td>
                                    <td>:</td>
                                    <td><input type="text" name="id_pengaduan" class="form-control" value="<?= $pengaduan['id_pengaduan']; ?>" readonly></td>
                                  </tr>
                                  <!-- Menampilkan ID Petugas -->
                                  <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas'] ?>">
                                  <tr>
                                    <td>Tanggal Pengaduan</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="<?= $row['tgl_pengaduan']; ?>" readonly></td>
                                  </tr>
                                  <tr>
                                    <td>Nomor Induk Kependudukan (NIK)</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" value="<?= $row['nik']; ?>" readonly></td>
                                  </tr>
                                  <tr>
                                    <td>Isi Laporan</td>
                                    <td>:</td>
                                    <td><?= $row['isi_laporan']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td><img src="../assets/pengaduan/<?= $row['foto']; ?>" class="img-thumbnail" width="200"></td>
                                  </tr>
                                  <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                      <?php
                                        if ($row['status'] == 0) {
                                          $keterangan = '<span class="badge bg-warning text-dark">Pending</span>';
                                        } elseif ($row['status'] == 1) {
                                          $keterangan = '<span class="badge bg-info text-dark">Proses</span>';
                                        } elseif ($row['status'] == 2) {
                                          $keterangan = '<span class="badge bg-success">Selesai</span>';
                                        } else {
                                          $keterangan = 'Status tidak valid';
                                        }
                                        echo $keterangan;
                                      ?>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>Tanggapan</td>
                                    <td>:</td>
                                    <td>
                                      <textarea class="form-control" name="tanggapan" rows="3" required=""></textarea>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <?php if ($row['status'] == 1) { ?>
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>
                                <?php }else{ ?>
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" disabled="">Simpan</button>
                                <?php } ?>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>