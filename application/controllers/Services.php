<?php
	class Services extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('service');
		}
		public function index(){
			$data['records'] = $this->service->getService();
			
			$this->load->view('services', $data);
		}
	}
?>