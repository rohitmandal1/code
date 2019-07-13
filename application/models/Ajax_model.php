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

	public function fetch_id_model($users)
	{
        $this->db->select('users.*');
    	$this->db->from('users');
   		if($users){
   			$this->db->where('users.id',$users);
   		}
   		$sql = $this->db->get();
   		if($sql){
   			if($users){
   				return $sql->row();
   			}else{
   			return $sql->result();
   		}
   		}else{
   			return false;
   		}

}

public function update_user($array_data,$cast_id)
{
	 $da=$this->db->where('id',$cast_id);
	 $this->db->update('users',$array_data);
	 //print_r($da);
     /*$str = $this->db->last_query();
	 print_r($str);*/
}
}
?>