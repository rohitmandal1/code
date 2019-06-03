<?php

class User_model extends CI_Model {

   public function datashow($id=""){
   		$this->db->select('users.*');
   		$this->db->from('users');
   		$sql = $this->db->get();
   		//echo $this->db->last_query();die;

   		if($sql){

   			return $sql->result();	
   		}
   		else{
   			return false;
   		}
   } 

public function create_user($data) {

	$this->db->insert('users',$data);
}

public function edit($id="") {
      $this->db->select('users.*');
   	$this->db->from('users');
   		if($id){
   			$this->db->where('users.id',$id);
   		}
         
   		$sql = $this->db->get();
   		if($sql){
   			if($id){
   				return $sql->row();
   			}else{
   			return $sql->result();
   		}
   		}else{
   			return false;
   		}

}

public function update_user($id="",$array="") {

	/*$this->db->update('users',$data);*/
	if(!empty($id) && !empty($array)) {
    $this->db->where('id',$id);
	$this->db->update('users',$array);
   	
	}
	else {
		return false;
	}
}

 public function delete_user($id="")
{
	$this->db->where('id',$id);
	$this->db->delete('users');
}

} 

?>