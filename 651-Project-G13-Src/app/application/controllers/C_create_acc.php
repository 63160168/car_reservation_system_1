<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_create_acc extends CI_Controller {
	

    public function index()
	{
		// prepare data for view
        $data['title'] = 'Create account';
		// load view
		$this->load->view('top', $data);
		$this->load->view('form_create_acc', $data);
		$this->load->view('bottom');
	}

    public function check_E() {
       
        $str = $this->input->post('email');
        $this->load->model('user_model');
        $user = $this->user_model->check_email ($str);
        if ($user == true ) {
            print "This already used";
        } else {
            print "";
        }
    }
    public function check_U() {
       
        $str = $this->input->post('user_name');
        $this->load->model('user_model');
        $user = $this->user_model->check_user_name ($str);
        if ($user == true ) {
            print "This already used";
        } else {
            print "";
        }
    }
    public function check_Iden() {
       
        $str = $this->input->post('identification_card');
        $this->load->model('user_model');
        $user = $this->user_model->check_iden ($str);
        if ($user == true ) {
            print "This already used";
        } else {
            print "";
        }
    }

    public function add() {
        $str1 = $this->input->post('user_name');
        $str2= $this->input->post('email');
        $str3= $this->input->post('identification_card');
       
        $this->load->model('user_model');
        $test1 = $this->user_model->check_user_name ($str1);
        $test2 = $this->user_model->check_email ($str2);
        $test3 = $this->user_model->check_iden ($str3);
        if ($test1 == false && $test2 == false && $test3 == false  ) {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('name_of_user', 'Name of user', 'trim|required|callback_username_check|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('user_name', 'User name', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]|max_length[50]');
            $this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|min_length[2]|max_length[50]|matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('identification_card', 'Identification card', 'trim|required|max_length[13]');
            if ($this->form_validation->run() === FALSE) {
                // prepare data for view
                $data['title'] = 'Create account';
                // load view
                $this->load->view('top', $data);
                $this->load->view('form_create_acc', $data);
                $this->load->view('bottom');
            } else {
                
                $this->load->model('user_model');
                $this->user_model->add();
                //$this->session->set_flashdata('result','saving complete');
                redirect('index.php/C_login/index');
            }
                
        }else{
            if($test1==true){
                $this->session->set_flashdata('error_username','This username already use !');
            }
            if($test2==true){
                $this->session->set_flashdata('error_email','This email already use !');
            }
            if($test3==true){
                    $this->session->set_flashdata('error_iden','This identification card already use !');           
            }
    
            $data['title'] = 'Create account';
            // load view
            $this->load->view('top', $data);
            $this->load->view('form_create_acc', $data);
            $this->load->view('bottom');

        }


    }

    public function username_check($str)
    {

        $this->load->model('user_model');
        $user = $this->user_model->check_user_name ($str);
            if ($user == true )
            {
                    $this->form_validation->set_message('username_check', '! This already used');
                    return FALSE;
            }
            else
            {
                    return TRUE;
            }
    }

  
}