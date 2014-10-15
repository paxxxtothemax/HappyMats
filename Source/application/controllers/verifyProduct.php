<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyProduct extends CI_controller{

	function __construct(){
		
		parent::__construct();
		$this->load->model('model_user','',TRUE);
		
	}

	function index(){

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		// this will index will contain the validation method
		$this->form_validation->set_rules('inputProductName', 'Product Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('inputProductDesc', 'Product Description', 'trim|required');

		if($this->form_validation->run() == FALSE){
			//Field validation failed. User will be redirected to the login page
			$this->load->view('templates/headerDashboard');
			$this->load->view('pages/registerProduct');

		}else{
			$this->load->view('templates/headerDashboard');
			$this->load->view('pages/registerSales');
		}
	}

	function check_database($password){

		//Field validation successful. Validation vs database
		$username = $this -> input -> post('username');
		//quer to the database
		$result = $this->model_user->login($username, $password);

		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row -> id,
					'username' => $row -> username
				);
				$this -> session -> set_userdata('logged_in', $sess_array);
			}

			return TRUE;
		}else{
			$this -> form_validation -> set_message('check_database', 'Invalid username of password');
			return FALSE;
		}

	}
}