<?php

class subscriber extends CI_Model {
	public function select_getService(){
	$query = $this->db->get('service');
	return $query->result();
	}
	public function subscribe_details($name, $address, $email, $phone, $password, $type_of_service, $pet){

		$hashed_password = md5($password);
		$sql2 = $this->db->query('SELECT serviceid FROM service WHERE servicename="'.$type_of_service.'";');

		foreach ($sql2->result_array() as $row){
			$serv_id = $row["serviceid"];
		}

		$sql3 = $this->db->query('SELECT petid FROM pet WHERE petname="'.$pet.'";');

		foreach($sql3->result_array() as $row){
			$pet_id = $row["petid"];
		}

        $sql4 = $this->db->query('SELECT clientid FROM client WHERE email="'.$email.'";');
        
        if($sql4->num_rows()==1){
			foreach($sql4->result_array() as $row){
				$clientid = $row["clientid"];
			}
	    }

        else{
	
		    $data = array('name'=>$name, 'address'=>$address, 'email'=>$email, 'phone'=>$phone, 'password'=>$hashed_password);
			$this->db->insert('client', $data);
			$sql5 = $this->db->query('SELECT clientid FROM client WHERE email="'.$email.'";');
			foreach($sql5->result_array() as $row){
			$clientid = $row["clientid"];
		   }

		}
		$date1 = date('y/m/d');
		$data1=array('clientid'=>$clientid, 'serviceid'=>$serv_id, 'petid'=>$pet_id,'date'=>$date1);
		$this->db->insert('subscription', $data1);
	}
	
public function select_getPet(){
	$query = $this->db->get('pet');
	return $query->result();
	}

}
?>