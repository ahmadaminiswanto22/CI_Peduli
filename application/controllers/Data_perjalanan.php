<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_perjalanan extends CI_Controller {
    function __construct() 
    {
        parent::__construct();
    }
    function index() 
    {
        $data['halaman'] = "Data-Peduli Diri";
        $this->load->view('template/header_v', $data);
        $this->load->view('data_perjalanan_v');
        $this->load->view('template/footer_v');
    }
}