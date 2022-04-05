<div class="container" style="margin-top: 150px; margin-bottom: 10px;">
    <div class="card">
        <div class="card-header text-center">
            Form Catatan Perjalanan
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url() ?>isi_catatan/simpan_data" method="post">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-md-3 col-form-label">Tanggal</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam" class="col-md-3 col-form-label">Jam</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" name="jam" id="jam" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lokasi" class="col-md-3 col-form-label">Lokasi Yang Dikunjungi</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lokasi" id="lokasi" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="suhu" class="col-md-3 col-form-label">Suhu Tubuh</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="suhu" id="suhu" value="" required>
                        </div>
                        <div class="col-md-1">
                            <h6>&deg C</h6>
                        </div>
                    </div>
                    <div class="m-4 row justify-content-end">
                        <div class="col-md-5">
                            <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                            <input class="btn btn-warning" type="reset" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>