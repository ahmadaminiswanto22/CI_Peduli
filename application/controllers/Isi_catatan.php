<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Isi_catatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        error_reporting(0);
    }
    function index()
    {
        $data['halaman'] = "Form-Peduli Diri";
        $this->load->view('template/header_v', $data);
        $this->load->view('isi_catatan_v');
        $this->load->view('template/footer_v');
    }

    function simpan_data()
    {
        // $tanggal = $this->input->post('tanggal');
        // $jam = $this->input->post('jam');
        // $lokasi = $this->input->post('lokasi');
        // $suhu = $this->input->post('suhu');

        // $data = array (
        //     'tanggal'=> $tanggal,
        //     'jam'=> $jam,
        //     'lokasi'=> $lokasi,
        //     'suhu'=> $suhu
        // );
        // // Format data yang akandiparsing
        // $data = "\n $tanggal| $jam| $lokasi| $suhu";

        // // Buka file mhs.txt, kemudian tuliskan isi variabel di atas kedalam mhs.txt
        // $fh = fopen("data/dataPerjalanan.txt", "a");
        // fwrite($fh, $data);

        // // Tutup file data.txt
        // fclose($fh);

        // // Keterangan bila data berhasil di input
        // // print "Data Telah Tersimpan.</br><a href='index.php'>Kembali ke Index >></a>";
        // redirect('data_perjalanan');

        // new simpan data
        $nik = $_SESSION['nik'];
        $nama = $_SESSION['nama'];
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $lokasi = $this->input->post('lokasi');
        $suhu = $this->input->post('suhu');
        $id = rand(0, 1000000);

        $data = "\n$id|$nik|$nama|$tanggal|$jam|$lokasi|$suhu";

        $file = fopen('data/dataPerjalanan.txt', 'a');
        fwrite($file, $data);

        //tutup file
        fclose($file);
?>
        <script>
            alert('Data Berhasil Disimpan');
            window.location.assign('<?= base_url() ?>data_perjalanan');
        </script>
    <?php
    }
    function edit_catatan()
    {
        $nik = $_SESSION['nik'];
        $nama = $_SESSION['nama'];
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $lokasi = $this->input->post('lokasi');
        $suhu = $this->input->post('suhu');
        $id = $this->input->post('id');

        $format = "\n$id|$nik|$nama|$tanggal|$jam|$lokasi|$suhu";
        $no = 0;
        $data = file('data/dataPerjalanan.txt', FILE_IGNORE_NEW_LINES);
        foreach ($data as $value) {
            $no++;
            $pecah = explode("|", $value);
            if ($pecah['0'] == $id) {
                $line = $no - 1; //mencari urutan baris ke n
            }
        }
        $data[$line] = $format;
        $data = implode("\n", $data);
        file_put_contents('data/dataPerjalanan.txt', $data);
    ?>
        <script>
            alert('Data Berhasil Diedit');
            window.location.assign('<?= base_url() ?>data_perjalanan');
        </script>
    <?php
    }
    function hapus_data()
    {
        $id = $this->input->get('id');

        $no = 0;
        $data = file('data/dataPerjalanan.txt', FILE_IGNORE_NEW_LINES);
        foreach ($data as $value) {
            $no++;
            $pecah = explode("|", $value);
            if ($pecah['0'] == $id) {
                $line = $no - 1; //mencari urutan baris ke n
            }
        }

        $buka_file = file('data/dataPerjalanan.txt'); //membaca isi file
        unset($buka_file[$line]);
        file_put_contents('data/dataPerjalanan.txt', implode("", $buka_file));
    ?>
        <script>
            alert('Data Berhasil Dihapus');
            window.location.assign('<?= base_url() ?>data_perjalanan');
        </script>
<?php
    }
}
