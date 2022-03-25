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
                        <a class="btn btn-primary btn-sm" href="<?=base_url()?>isi_catatan" role="button">Isi Catatan
                            Perjalanan <i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-6 text-end">
                        <a target="_blank" class="btn btn-info btn-sm justify-content-end" href="cetakExcelBuku.php"
                            role="button">Cetak Excel <i class="fas fa-print"></i></a>

                        <a class="btn btn-secondary btn-sm" href="#" role="button">Cetak PDF <i
                                class="fas fa-print"></i></a>
                    </div>
                </div>

            </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr class=" text-center">
                        <th width="2%">No</th>
                        <th width="20%">Tanggal</th>
                        <th width="20%">Waktu</th>
                        <th width="30%">Lokasi</th>
                        <th width="20%">Suhu Tubuh</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>1</td>
                        <td><?=date('d-m-Y');?></td>
                        <td><?=date('H:i:s');?></td>
                        <td>Bekasi</td>
                        <td>36 C</td>
                    </tr> -->
                    <?php
                    $txt_file    = file_get_contents('data/dataPerjalanan.txt');
                    $rows        = explode("\n", $txt_file);
                    array_shift($rows);
                    // echo '<h3>Data Mahasiswa</h3>';
                    // echo '<a href="form.php">Tambah Data</a></br></br>';
                    $no=1;

                    foreach($rows as $row => $data)
                    {

                            // Explode digunakan untuk memisahkan Item Data dariPemisah |, array pada PHP dimulaipada index ke-0
                            $row_data = explode('|', $data);

                            $info[$row]['tanggal']           = $row_data[0];
                            $info[$row]['waktu']         = $row_data[1];
                            $info[$row]['lokasi']          = $row_data[2];
                            $info[$row]['suhu']      = $row_data[3];
                    
                    ?>
                    <!-- // Menampilkan Data -->
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $info[$row]['tanggal']; ?></td>
                        <td><?= $info[$row]['waktu']; ?></td>
                        <td><?= $info[$row]['lokasi']; ?></td>
                        <td><?= $info[$row]['suhu']; ?>&deg C</td>
                    </tr>
                    <?php } ?>
                </tbody>
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