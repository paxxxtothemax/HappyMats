<?php

class Pages extends CI_Controller {

	public function view($page = 'registerProduct')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->model('model_aggregate');
		$data['tests'] = $this->model_aggregate->getSensorData();
		$data['UringArsenicSafeValue'] = $this->model_aggregate->getUrineArsenicSafeValue();
		$data['UrineArsenicFailValue'] = $this->model_aggregate->getUrineArsenicFailValue();
		//$data['result'] = $this->model_aggregate->getSensorData();
		$data['title'] = ucfirst($page); // Capitalize the first letter

		//$this->load->view('templates/headerStart');
		//$this->load->view('pages/'.$page, $data);.$page, $data
		//$this->load->view('templates/footerStart');


		$this->load->view('templates/headerDashboard');
		$this->load->view('pages/'.$page, $data);


		

	}
}
