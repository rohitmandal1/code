<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regi_model extends CI_Model{
	public function insert_value($post)
	{
		$this->db->insert('users',$post);
	}

	public function getuser($username,$pass)
	{/*this way you can login in facebook way or with mobile no 
	 or password*/
		              $this->db->select('
                users.id,
                users.username,
                users.mobile,
                users.userfile,
                users.pass')
              ->from('users')
              ->where("(users.pass = '$pass' OR users.mobile = '$pass')")
              ->where('username', $username);
    $query = $this->db->get();
		              /*$data=$this->db->last_query();
		              print_r($data);*/
		              if ($query->num_rows()) {
		              	return $query->row();
		              }
		              else{
		              	return FALSE;
		              }
	}

	public function all_data($id)
	{   
		$this->db->where('id !=', $id);
		$sql=$this->db->get('users');
	    return	$sql->result();
		/*$data=$this->db->last_query();*/
		/*print_r($data);*/
	}

	public function addfrend_model($data)
	{
		$this->db->insert('addfrend',$data);
		$d=$this->db->last_query();
		//print_r($d);
	}

	public function getstatus()
	{
		$sql=$this->db->get('addfrend');
        /*$q=$this->db->last_query();
        print_r($q);*/
		return $sql->result();
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

    public function showlist($title)
    {
    	$this->db->select('stauts');
    	$this->db->from('addfrend');
   		if($title){
   			$this->db->where('addfrend.user_id',$title);
   		}
   		$sql = $this->db->get();
   		/*$tyr=$this->db->last_query();
   		print_r($tyr);*/
   		foreach($sql->result() as $row)
   		{
   		$output='<button  type="button" name="add" id="add">'.$row->stauts.'
                                       </button>';
   }
         return $output;                              

    }
  /*  $this->db->where('state_id', $state_id);
  $this->db->order_by('city_name', 'ASC');
  $query = $this->db->get('city');
  $output = '<option value="">Select City</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
  }
  return $output;
 }*/
 /*
 if($sql){
   			if($title){
   				return $sql->row();
   				print_r($sql);
$output='<button  type="button" name="add" id="add">'.$sql->stauts.'
                                       </button>';

   			}else{
   			return $sql->result();
   		}
   		}else{
   			return false;
   		}
 */
}
?>