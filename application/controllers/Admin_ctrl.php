<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ctrl extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('ion_auth');
        if(!$this->ion_auth->is_admin()){
            redirect(base_url());
        }
    }

    


}