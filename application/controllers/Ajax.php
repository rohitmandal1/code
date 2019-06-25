<?php

class Ajax extends CI_Controller {

public function index()
{
		$this->load->model('Ajax_model');
      	$data['fetch_data']=$this->Ajax_model->fetch_model();
	    $this->load->view('ajax_entry',$data);

}

public function entry()
{
		$this->load->model('Ajax_model');
	       $array=array(
		       	'username' =>$this->input->post('name'),
		       	'pass' =>$this->input->post('sur')
	       );

        $result =  $this->Ajax_model->entry_model($array);

        if($result){
        	echo 1;
        }else{
        	echo 0;
        }

}

public function fetch()
{
	$this->load->model('Ajax_model');
	$data['fetch_data']=$this->Ajax_model->fetch_model();
	$this->load->view('ajax_entry',$data);
}

}


?>