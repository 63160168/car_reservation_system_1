<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_main extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('user_status')=='Sales'|| $this->session->userdata('user_status')=='Manager' ) {
			redirect('index.php/C_login/index');
		}
	}

    public function index()
	{
		// prepare data for view
    $data['title'] = 'Home';
		// load view
		$this->load->view('top', $data);
		$this->load->view('main', $data);
		$this->load->view('bottom');
	}

	public function search($kw="")
	{
		// check if this function is called by form submit
		if ($this->input->post('kw')) {
			// load model
			$this->load->model('Car_model');
			// call search() function in song_model
			// prepare data for view
			$data['cars'] = $this->Car_model->search($this->input->post('kw'));
			// echo $this->db->last_query();
		} 
		$data['title'] = 'Home';
		$this->load->view('top', $data);
		$this->load->view('main', $data);
		$this->load->view('bottom');
	
	}

}