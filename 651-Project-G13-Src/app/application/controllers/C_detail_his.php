<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_detail_his extends CI_Controller {

   public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name') || $this->session->userdata('user_status') !='Customer' ){
            $this->session->set_flashdata('warning','You must to login first');
			redirect('index.php/C_login/index');
		}
	}

   
	
    public function index($id)
    {
        
        $this->load->model('Booking_model');
        //echo $username;
        $book = $this->Booking_model->get_data_booking ($id);
        //echo $this->db->last_query();
        if ($book) {
            $this->load->model('Booking_model');
            $data['bookings'] = $this->Booking_model->get_data_booking ($id);
            $data['title'] = 'detail';
            // load view
            $this->load->view('top', $data);
            $this->load->view('detail_booking', $data);
            $this->load->view('bottom');
            //print_r($book);
        } else {
    
            echo "failed ";
           

        }

    }

   

}