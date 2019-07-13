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

public function fetch_id()
{
	$this->load->model('Ajax_model');
	$data=$this->Ajax_model->fetch_id_model($this->input->post('cast_id'));
 echo	json_encode($data);
 
if($_POST["action"] == "Edit")  
           {    
                $array_data= array(

                    'username' =>$this->input->post('update_category_name'),
                    'pass' => $this->input->post('update_pass')
                  );  
                $this->load->model('Ajax_model');  
                $datas=$this->Ajax_model->update_user($this->input->post('cast_id'),$array_data); 
                echo 'Data Updated';  
           }
}

}


?>