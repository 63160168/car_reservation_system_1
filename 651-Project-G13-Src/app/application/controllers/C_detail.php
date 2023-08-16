<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_detail extends CI_Controller {

   /* public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('user_name')) {
            $this->session->set_flashdata('warning','You must to login first');
			redirect('index.php/C_login/index');
		}
	}*/

    public function __construct(){
		parent::__construct();
		if ($this->session->userdata('user_status')=='Sales' || $this->session->userdata('user_status')=='Manager' ) {
			redirect('index.php/C_login/index');
		}
	}

    public function index($id_car)
	{
        $this->load->model('Car_model');
        $car = $this->Car_model->get_detail_car($id_car);
        if($car){
            $data['cars'] = $this->Car_model->get_detail_car($id_car);
            // prepare data for view
            $data['title'] = 'detail';
            // load view
            $this->load->view('top', $data);
            $this->load->view('detail_car', $data);
            $this->load->view('bottom');
        }else{
            redirect('index.php/C_main/index');
        }
        

	}
   

   

}