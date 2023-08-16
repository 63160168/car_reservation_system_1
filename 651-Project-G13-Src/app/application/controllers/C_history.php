<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_history extends CI_Controller {


    public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status') !='Customer') {
			redirect('index.php/C_login/index');
		}
	}


    public function index()
	{

        $user_id = $this->session->userdata('user_id');
        $this->load->model('Booking_model');
        $data['bookings1'] = $this->Booking_model->search_status_active($user_id);
        $data['bookings2'] = $this->Booking_model->search_status_other($user_id);

		// prepare data for view
        $data['title'] = 'History';
		// load view
		$this->load->view('top', $data);
		$this->load->view('history', $data);
		$this->load->view('bottom');
	}



}