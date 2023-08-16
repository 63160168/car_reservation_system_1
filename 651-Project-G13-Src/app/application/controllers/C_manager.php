<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_manager extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status')!='Manager' ) {
			redirect('index.php/C_login/index_sales');
		}
	}

    public function index()
	{
		// prepare data for view
    	$data['title'] = 'Management';
		// load view
		$this->load->view('top', $data);
		$this->load->view('main_manager', $data);
		$this->load->view('bottom');
	}



}