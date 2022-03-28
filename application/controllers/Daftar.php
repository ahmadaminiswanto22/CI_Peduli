<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        error_reporting(0);
    }
    function index()
    {
        $data['halaman'] = "Daftar-Peduli Diri";
        $this->load->view('registrasi_v', $data);
    }
    function proses_daftar()
    {

        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        // $email = $this->input->post('email');

        //cek sudah ada data pendaftaran
        $data = file("data/dataConfig.txt", FILE_IGNORE_NEW_LINES);
        foreach ($data as $value) {
            $bagi = explode("|", $value);
            if ($nik == $bagi['0']) {
                $cek = true;
            }
        }
        if ($cek) { //jika nik sudah ada 
?>
            <script>
                alert('NIK Sudah Terdaftar!!');
                window.location.assign('<?= base_url() ?>daftar');
            </script>
        <?php } else { //jika data tidak ada
            //membuat file penyimpanan
            $format = "\n$nik|$nama";

            $file = fopen('data/dataConfig.txt', 'a');
            fwrite($file, $format);

            //tutup file
            fclose($file);
        ?>
            <script>
                alert('Pendaftaran Berhasil');
                window.location.assign('<?= base_url() ?>login');
            </script>
<?php
        }
    }
}
