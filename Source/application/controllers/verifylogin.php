<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifylogin extends CI_controller{

	function __construct(){
		
		parent::__construct();
		$this->load->model('model_user','',TRUE);
		
	}

	function index(){

		// this will index will contain the validation method
		$this -> form_validation -> set_rules('userid', 'Username', 'trim|required|xss_clean');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if($this -> form_validation -> run() == FALSE){
			//Field validation failed. User will be redirected to the login page
			$data['title'] = ucfirst('login');
			$this->load->view('templates/headerStart');
			$this->load->view('pages/login', $data);
			$this->load->view('templates/footerStart');
		}else{
			//go to private page
			$data['title'] = ucfirst('flot');
			$this->load->view('templates/headerDashboard');
			$this->load->view('pages/inline', $data);
			//$this->load->view('pages/dashboard', $data);
			$this->load->view('templates/footerDashboard');
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