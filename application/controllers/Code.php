<?php


class Code extends CI_Controller {

public function Index()
{
       	 $this->load->model('User_model','user');
        $data['fetch_record'] =  $this->user->datashow();
	    $this->load->view('code_view',$data);
}


public function insert()
{
	$this->load->model('User_model');
	$data= $this->input->post();
	$this->User_model->apply_course($data);
	 redirect('Code/Index');
}
}

?>