<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_logout extends CI_Controller {


    public function logout_c(){
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_status');
        $this->session->unset_userdata('user_id');
        redirect('index.php/C_login/index');
    }
    public function logout_s(){
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_status');
        redirect('index.php/C_login/index_sales');
    }
    public function logout_m(){
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_status');
        redirect('index.php/C_login/index_manager');
    }

}