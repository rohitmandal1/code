<?php

class  Ajax_model extends CI_Model {

	public function entry_model($array)
	{
		$this->db->insert('users',$array);
	}

	public function fetch_model()
	{
	    $this->db->select('users.*');
   		$this->db->from('users');
   		$sql = $this->db->get();
if ($sql) {
	return $sql->result();
}

else{
	return false;
	}
}
}
?>