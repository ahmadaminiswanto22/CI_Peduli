<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() 
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }
    function index() 
    {   
        
        $data['halaman'] = "Home-Peduli Diri";
        $this->load->view('template/header_v', $data);
        $this->load->view('template/index_v');
        $this->load->view('template/footer_v');
    }
}