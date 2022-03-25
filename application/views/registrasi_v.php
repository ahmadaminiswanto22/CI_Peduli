<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $halaman;?></title>
    <link href="<?= base_url()?>assets/css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header text-center fw-bold">

                                    <div class="row">
                                        <div class="col-2">
                                            <img src="<?=base_url()?>assets/img/logo.png" class="img-thumbnail"
                                                width="60" height="60" alt="logo">
                                        </div>
                                        <div class="col-8">
                                            <?php if(isset($error)) { ?>
                                            <p style="color:red;">Username atau Password Salah</p>
                                            <?php } ?>
                                            <h2 class="text-center font-weight-light my-4">Daftar</h2>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="nik" id="nik" type="number"
                                                placeholder="Masukan NIK" />
                                            <label for="nik">NIK</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="nama" id="nama" type="text"
                                                placeholder="Masukan Nama Lengkap" />
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="email" type="text"
                                                placeholder="Masukan Alamat Email" />
                                            <label for="email">Alamat Email</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="remember" name="remember"
                                                type="checkbox" value="" required />
                                            <label class="form-check-label" for="remember">Saya menerima segala isi
                                                Syarat Penggunaan dan Kebijakan Privasi</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" name="login" class="btn btn-secondary"> Daftar
                                            </button>
                                            <a class="btn btn-primary" href="<?=base_url()?>login" role="button"> Masuk
                                            </a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Login TPG 2 Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="template/js/scripts.js"></script>
</body>

</html>