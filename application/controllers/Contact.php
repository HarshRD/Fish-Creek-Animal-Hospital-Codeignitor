<?php
	class Contact extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('contacts');
		}
		public function index(){
			
			$this->load->helper('form');
			$this->load->library('form_validation');

			if(isset($_POST["Submit"])){

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
			$this->form_validation->set_rules('comments', 'Comments', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('contact');
			}
			else{
				$this->contacts->getContact();
				$data['name'] = $this->input->post('name');
				$data['email'] = $this->input->post('email');
				$data['comments'] = $this->input->post('comments');
				$this->load->view('contact');
			}
		}
		else{
			$this->load->view('contact');
		}
		}
	}
?>