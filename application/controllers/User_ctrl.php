<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_ctrl extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
    }

    public function dashboard(){
        $data = array();
        $data['header'] = $this->load->view('users/common/header',$data,true);
        $data['footer'] = $this->load->view('users/common/footer',$data,true);
        $data['main'] = $this->load->view('users/pages/dashboard',$data,true);
        $this->load->view('users/index',$data);
    }
}