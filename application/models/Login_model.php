<?php

class  Login_model extends CI_Model {


	public function getuser($data=""){
		$this->user = 'users';
		if(!empty($data)){
			$this->db->select($this->user.'.*');
			$this->db->from($this->user);
			$this->db->where($data);
			$sql = $this->db->get();
			if($sql){
				return $sql->row();
			}else{
				return false;
			}
		}else{
			return false;
		}

	}



}
?>
