<?php

class service extends CI_Model {
	public function getService(){
	$query = $this->db->get('service');
	return $query->result();
	}
}
?>