<?php
	class Askvet extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('Ask_the_vet');
		}
		public function index(){
			
			$data['records'] = $this->Ask_the_vet->getVet();
			
			$this->load->view('askvet', $data);
		}
	}
?>