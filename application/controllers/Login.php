<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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

    function login_data()
    {
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');

            $data = array (
                'nik'=> $nik,
                'nama'=> $nama
            );
            // Format data yang akandiparsing
            $data = "\n $nik| $nama";

            // Buka file mhs.txt, kemudian tuliskan isi variabel di atas kedalam mhs.txt
            $fh = fopen("data/dataConfig.txt", "a");
            fwrite($fh, $data);

            // Tutup file data.txt
            fclose($fh);

            // Keterangan bila data berhasil di input
            // redirect('home');
            $data_session = array(
                'nama' => $nama,
                'status' => "login"
                );
 
            $this->session->set_userdata($data_session);
 
            redirect(base_url("home"));

    }
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
    function daftar()
    {
        $data['halaman'] = "Daftar-Peduli Diri";
        $this->load->view('registrasi_v', $data);
    }
}