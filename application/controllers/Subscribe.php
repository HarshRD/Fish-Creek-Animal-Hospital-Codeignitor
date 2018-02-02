<?php
	class Subscribe extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('Subscriber');
		}
		public function index(){
			$details['query1'] = $this->Subscriber->select_getService();
			$details['query2'] = $this->Subscriber->select_getPet();
			if(isset($_POST["Submit"])){


			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|regex_match[/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/]');
			$this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/]');
			$this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/]');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('subscribe', $details);
			}
			else{
				$data['name'] = $this->input->post('name');
				$data['address'] = $this->input->post('address');
				$data['email'] = $this->input->post('email');
				$data['phone'] = $this->input->post('phone');
				$data['password'] = $this->input->post('password');
				$data['type_of_service'] = $this->input->post('select1');
				$data['pet'] = $this->input->post('select');

				$this->Subscriber->subscribe_details($data['name'], $data['address'], $data['email'], $data['phone'], $data['password'], $data['type_of_service'], $data['pet']);


				$this->load->view('subscribe', $details);
			}
		}
		else{
			$this->load->view('subscribe', $details);
		}
		}
	}
?>