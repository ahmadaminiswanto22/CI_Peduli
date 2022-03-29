<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    function index()
    {
        $data['halaman'] = "Masuk-Peduli Diri";
        $this->load->view('login_v', $data);
    }

    // function login_data()
    // {
    //     $nik = $this->input->post('nik');
    //     $nama = $this->input->post('nama');

    //     $data = array(
    //         'nik' => $nik,
    //         'nama' => $nama
    //     );
    //     // Format data yang akandiparsing
    //     $data = "\n $nik| $nama";

    //     // Buka file mhs.txt, kemudian tuliskan isi variabel di atas kedalam mhs.txt
    //     $fh = fopen("data/dataConfig.txt", "a");
    //     fwrite($fh, $data);

    //     // Tutup file data.txt
    //     fclose($fh);

    //     // Keterangan bila data berhasil di input
    //     // redirect('home');
    //     $data_session = array(
    //         'nama' => $nama,
    //         'status' => "login"
    //     );

    //     $this->session->set_userdata($data_session);

    //     redirect(base_url("home"));
    // }
    function proses_login()
    {
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');

        $format = "$nik|$nama";
        $file = file('data/dataConfig.txt', FILE_IGNORE_NEW_LINES);
        if (in_array($format, $file)) {
            //jika data ada di file
            $_SESSION['nik'] = $nik;
            $_SESSION['nama'] = $nama;
            $data_session = array(
                'nik' => $nik,
                'nama' => $nama,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
?>
            <script>
                alert('Login Berhasil');
                window.location.assign('<?= base_url() ?>home');
            </script>
        <?php
        } else {
        ?>
            <!-- //jika data tidak ada di file -->
            <script>
                alert('NIK dan Nama Salah!!');
                window.location.assign('<?= base_url() ?>login');
            </script>
<?php
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
