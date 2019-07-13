<?php

class Select extends CI_Controller {

public function index()
{
		$this->load->model('User_model','user');
       $data['course_data'] =  $this->user->dropdowndata();
       $data['user_data'] =  $this->user->usergets();
       $data['apply_data'] = $this->user->apply_data();
       $this->load->view('dropdown',$data);
}

public function insert()
{
	   $this->load->model('User_model');
	   $insert=array(
        'user_id' => $this->input->post('user'),
        'course_id' => $this->input->post('course'),
	   );
	   $this->User_model->applyed_course($insert);
	   redirect('Select/index');
}

public function fetch_coursedata()
{      $this->load->model('User_model');
      	if ($this->input->post('user')) {
        $course_name = $this->User_model->fetch_course($this->input->post('user'));

        echo json_encode($course_name);
      	}
       
}

}



 // function fetch_state($country_id)
 // {
 //  $this->db->where('country_id', $country_id);
 //  $this->db->order_by('state_name', 'ASC');
 //  $query = $this->db->get('state');
 //  $output = '<option value="">Select State</option>';
 //  foreach($query->result() as $row)
 //  {
 //   $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
 //  }
 //  return $output;
 // }


?>

