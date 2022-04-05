<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<?php
date_default_timezone_set('Asia/Jakarta');
?>
<div class="container" style="margin-top: 150px;">
    <div class="card">
        <h5 class="card-header">Tabel Data Catatan Perjalanan</h5>
        <div class="card-body">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>isi_catatan" role="button">Isi Catatan
                            Perjalanan <i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-6 text-end">
                        <a target="_blank" class="btn btn-info btn-sm justify-content-end" href="<?= base_url() ?>data_perjalanan/cetak_excel" role="button">Cetak Excel <i class="fas fa-print"></i></a>

                        <a class="btn btn-secondary btn-sm" target="_blank" href="<?= base_url() ?>data_perjalanan/cetak_pdf" role="button">Cetak PDF <i class="fas fa-print"></i></a>
                    </div>
                </div>

            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr class=" text-center">
                        <th width="2%">No</th>
                        <th width="15%">Tanggal</th>
                        <th width="15%">Waktu</th>
                        <th width="30%">Lokasi</th>
                        <th width="20%">Suhu Tubuh</th>
                        <th width="6%">Edit</th>
                        <th width="6%">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $txt_file    = file_get_contents('data/dataPerjalanan.txt');
                    // $rows        = explode("\n", $txt_file);
                    // array_shift($rows);
                    // $no=1;
                    // foreach($rows as $row => $data)
                    // {

                    //         // Explode digunakan untuk memisahkan Item Data dariPemisah |, array pada PHP dimulaipada index ke-0
                    //         $row_data = explode('|', $data);

                    //         $info[$row]['tanggal']           = $row_data[0];
                    //         $info[$row]['waktu']         = $row_data[1];
                    //         $info[$row]['lokasi']          = $row_data[2];
                    //         $info[$row]['suhu']      = $row_data[3];

                    //new tampil data
                    $no = 1;
                    $data = file('data/dataPerjalanan.txt', FILE_IGNORE_NEW_LINES);
                    $user = $_SESSION['nik'] . "|" . $_SESSION['nama'];
                    foreach ($data as $value) {
                        $pecah = explode("|", $value);
                        @$key = $pecah['1'] . "|" . $pecah['2'];
                        if ($key == $user) {
                    ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $pecah['3']; ?></td>
                                <td><?= $pecah['4']; ?></td>
                                <td><?= $pecah['5']; ?></td>
                                <td><?= $pecah['6']; ?> &#176; C</td>
                                <td class="text-center"><a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $pecah['0']; ?>">Edit</a></td>
                                <td class="text-center"><a onclick="return confirm('Yakin Dihapus?');" href="<?= base_url() ?>isi_catatan/hapus_data?id=<?= $pecah['0']; ?>" class="btn btn-danger">Hapus</a></td>
                            </tr>
                </tbody>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $pecah['0']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="<?= base_url() ?>isi_catatan/edit_catatan" method="post">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $pecah['0']; ?>">
                                    <div class="mb-3 row">
                                        <label for="tanggal" class="col-md-3 col-form-label">Tanggal</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $pecah['3']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jam" class="col-md-3 col-form-label">Jam</label>
                                        <div class="col-md-6">
                                            <input type="time" class="form-control" name="jam" id="jam" value="<?= $pecah['4']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="lokasi" class="col-md-3 col-form-label">Lokasi Yang Dikunjungi</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?= $pecah['5']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="suhu" class="col-md-3 col-form-label">Suhu Tubuh</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="suhu" id="suhu" value="<?= $pecah['6']; ?>" required>
                                        </div>
                                        <div class="col-md-1">
                                            <h6>&deg C</h6>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Edit</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
                    } ?>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>