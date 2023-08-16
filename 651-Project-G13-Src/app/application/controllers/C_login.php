<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('user_name')) {
            if($this->session->userdata('user_status')=='Customer'){
                redirect('index.php/C_main/index');
            }
            else if($this->session->userdata('user_status')=='Manager'){
                redirect('index.php/C_manager/index');
            }
            else if($this->session->userdata('user_status')=='Sales'){
                redirect('index.php/C_sales/index');
            }
			    
		}
	}

    public function index(){

        // prepare data for view
        $data['title'] = 'login by customer';
        // load view
        $this->load->view('top', $data);
        $this->load->view('login_customer', $data);
        $this->load->view('bottom');

    }

    public function index_sales(){

        // prepare data for view
        $data['title'] = 'login by sales';
        // load view
        $this->load->view('top', $data);
        $this->load->view('login_sales', $data);
        $this->load->view('bottom');

    }

    public function index_manager(){

        // prepare data for view
        $data['title'] = 'login by manager';
        // load view
        $this->load->view('top', $data);
        $this->load->view('login_manager', $data);
        $this->load->view('bottom');

    }
    
    public function check_customer(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$username = "Test";
        //$password = "1234";
        $this->load->model('user_model');
        //echo $username;
        $user = $this->user_model->check_login_byCustomer ($username, $password);
        //echo $this->db->last_query();
        if ($user) {
            $this->session->set_userdata('user_name', $user->user_name);
            $this->session->set_userdata('user_id', $user->user_id);
            $this->session->set_userdata('user_status', $user->status);
            redirect('index.php/C_main/index');
            //echo nl2br(".\nlogin success.\n");
            //print_r($user);
        } else {
            $this->session->set_flashdata('error','Invalid username or password');
            //echo "login failed ";
            redirect('index.php/C_login/index');

        }

    } 

    public function check_manager(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$username = "Test";
        //$password = "1234";
        $this->load->model('user_model');
        //echo $username;
        $user = $this->user_model->check_login_byManager ($username, $password);
        //echo $this->db->last_query();
        if ($user) {
            $this->session->set_userdata('user_name', $user->user_manager);
            $this->session->set_userdata('user_status', $user->status);
            redirect('index.php/C_manager/index');
            //echo nl2br(".\nlogin success.\n");
            //print_r($user);
        } else {
            $this->session->set_flashdata('error','Invalid username or password');
            //echo "login failed ";
            redirect('index.php/C_login/index_manager');

        }

    } 

    public function check_sales(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$username = "Test";
        //$password = "1234";
        $this->load->model('user_model');
        //echo $username;
        $user = $this->user_model->check_login_bySales($username, $password);
        //echo $this->db->last_query();
        if ($user) {
            $this->session->set_userdata('user_name', $user->user_sales);
            $this->session->set_userdata('user_status', $user->status);
            redirect('index.php/C_sales/index');
            //echo nl2br(".\nlogin success.\n");
            //print_r($user);
        } else {
            $this->session->set_flashdata('error','Invalid username or password');
            //echo "login failed ";
            redirect('index.php/C_login/index_sales');

        }

    } 


}