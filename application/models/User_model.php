<?php

class  User_model extends CI_Model {

   public function datashow($id=""){
   		$this->db->select('users.*');
   		$this->db->from('users');
         /*$sql = $this->db->get();*/
         if($id){
            $this->db->where('users.id',$id);            
         }
   		$sql = $this->db->get();
      return $sql->result();
   		
   } 

public function create_user($array) {
  if($array){

	 $insert =  $this->db->insert('users',$array);
     if($insert){
      return true;
     }else{
      return false;
     }
  }
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

public function update_user($array,$id) {

	/*$this->db->update('users',$data);*/
	if(!empty($id) && !empty($array)) {
    $this->db->where('id',$id);
	  $update=$this->db->update('users',$array);
   	return $update;
	}
	else {
		return false;
	}
}

 public function delete_user($id="")
{
	$this->db->where('id',$id);
	$sql =  $this->db->delete('users');
  if($sql){
    return true;
  }else{
    return false;
  }
}

public function apply_course($data)
{   
  $i=0;
 foreach ($data['user_id'] as $user_id) {
   $course = array(
   'user_id' => $user_id,
   );
   $insert=$this->db->insert('apply',$course);
   $i++;
   if ($insert) {
      echo"data insert";
   }
}
   
}

public function dropdowndata($id=""){
         $this->db->select('course.*');
         $this->db->from('course');
         $sql = $this->db->get();
         return $sql->result();  
         //echo $this->db->last_query();die;

   }

   public function usergets($id=""){
         $this->db->select('users.*');
         $this->db->from('users');
         $sql = $this->db->get();
         return $sql->result();  
         //echo $this->db->last_query();die;

   }

   public function applyed_course($data)
    {
       $this->db->insert('apply',$data);
    } 

public function apply_data()
{
   $this->db->join("users","user_id = users.id");
   $this->db->join("course","course_id = course.id");
   $query=$this->db->get("apply");
   return $query->result();
}

public function fetch_course($user)
{
   $this->db->where('user_id', $user);
   $this->db->join("course","course_id = course.id");
   $query = $this->db->get('apply');
   //echo $this->db->last_query();die;
   
  // foreach($query->result() as $row)
  // {
  //  $output = '<input type="text" name="" id="emp_amount_data" value="'.$row->name.'">';
  // }
  return $query->result(); 

}

function fetch_state($country_id)
 {
  $this->db->where('country_id', $country_id);
  $this->db->order_by('state_name', 'ASC');
  $query = $this->db->get('state');
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
  }
  return $output;
 }

} 

?>