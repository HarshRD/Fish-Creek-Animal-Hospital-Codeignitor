<?php

class Ask_the_vet extends CI_Model {
	public function getVet(){
	$sql = $this->db->query('SELECT question, answer FROM questions');
	return $sql->result();
	}
}
?>