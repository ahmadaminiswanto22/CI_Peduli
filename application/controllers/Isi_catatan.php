<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Isi_catatan extends CI_Controller {
    function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
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
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');
            $lokasi = $this->input->post('lokasi');
            $suhu = $this->input->post('suhu');

            $data = array (
                'tanggal'=> $tanggal,
                'jam'=> $jam,
                'lokasi'=> $lokasi,
                'suhu'=> $suhu
            );
            // Format data yang akandiparsing
            $data = "\n $tanggal| $jam| $lokasi| $suhu";

            // Buka file mhs.txt, kemudian tuliskan isi variabel di atas kedalam mhs.txt
            $fh = fopen("data/dataPerjalanan.txt", "a");
            fwrite($fh, $data);

            // Tutup file data.txt
            fclose($fh);

            // Keterangan bila data berhasil di input
            // print "Data Telah Tersimpan.</br><a href='index.php'>Kembali ke Index >></a>";
            redirect('data_perjalanan');

    }
}