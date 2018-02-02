<?php

class contacts extends CI_Model {
	public function getContact(){
	$name=$this->input->post('name');
	$email=$this->input->post('email');
	$comments=$this->input->post('comments');
	$data=array('name'=>$name, 'email'=>$email, 'comments/questions'=>$comments);
	$this->db->insert('contact', $data);
}
}
?>