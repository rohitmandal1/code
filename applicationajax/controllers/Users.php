<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	
	public function index()
	{     

//print_r($this->session->userdata('id'));
		if ($this->session->userdata('id')){
	      return redirect('Users/welcome');
	      }	
		$this->load->view('user/regristration');

		 
	}
 
	public function insert()
	{
	$this->load->model('Regi_model');
	$this->form_validation->set_rules('username','Email','required|trim');
	$this->form_validation->set_rules('pass','Password','required|trim');
	$this->form_validation->set_rules('name','Name','required|trim');
	$this->form_validation->set_rules('mobile','Mobile','required|trim');
	if (empty($_FILES['userfile']['name']) ) {
		$this->form_validation->set_rules('userfile','Imaged','required');
	}
    $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
	if ($this->form_validation->run()==TRUE) {
			$new_image_name2 = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['userfile']['name']);
                    $image_path = './assets/images/';
                    $config['upload_path'] = $image_path;

                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $new_image_name2;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('userfile')) {
                      $post=$this->input->post();
                        $data = $this->upload->data();
                        $heimg = "assets/images/" . $data['file_name'];
                        $post['userfile'] = $heimg;
                        $this->Regi_model->insert_value($post);
                        

                    } else {
                        $heimg = "";
                    }

                        
	}
	else{
		$this->load->view('user/regristration');
	}

	$username=$this->input->post('username');
	$pass=$this->input->post('pass');
	$login_id=$this->Regi_model->getuser($username,$pass);
	if($login_id){
		$this->session->set_userdata('id',$login_id);
		/*print_r($data);
		print_r($login_id);*/
		redirect('Users/welcome');
		//redirect(base_url()."Users/welcome".$data);
		//$this->load->view('user/dashboard',$data);

	}
	else{
		/*$this->load->view('user/regristration');*/
	}

	}

	public function welcome()
	{   $this->load->model('Regi_model');
		if ($this->session->userdata('id')=='') {
	    return redirect('Users/login');	
	    /*user login with session or not*/	
		}
		 $data['value']=$this->session->userdata('id');
		 /*$ids=$this->session->userdata('id');*/
		 $id=$data['value']->id;
		 $data['all']=$this->Regi_model->all_data($id);
		 //print_r($data['all']);
		$this->load->view('user/dashboard',$data);

		//print_r( $this->session->userdata('id'));
	}

	public function logout()
	{
		$this->load->model('Regi_model');
		$this->session->sess_destroy();
		redirect ('users/login');
	}

	public function login()
	{   $this->load->model('Regi_model');
		
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('pass','Password','required|trim');

		if ($this->form_validation->run()) {
		    $username=$this->input->post('username');
		    $pass=$this->input->post('pass');	
		    $login_id=$this->Regi_model->getuser($username,$pass);
		    /*print_r($login_id);*/
		    if ($login_id) {
		    	$this->session->set_userdata('id',$login_id);
		    redirect('Users/welcome');	
		    }
		    else{
		    	$this->session->set_flashdata('login_failed','Invalid Username/Password');
		       redirect('Users/login');

		    //echo  validation_errors();	
		    }
		}
		else{
		//echo validation_errors();
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			$this->load->view('user/login');
		}
	}

	public function addfrend()
	{
		$this->load->model('Regi_model');
		/*$data=$this->input->post();*/
		$data=array(
         'user_id' => $this->input->post('user_id'),
         'frend_id' => $this->input->post('frend_id'),
         'stauts' => $this->input->post('stauts')
		);
		$da=$this->Regi_model->addfrend_model($data);
		print_r($da);
        redirect(base_url()."Users/welcome");		
		//echo "Frend Request Send";
/*
		$adddata=$this->Regi_model->getstatus();
		print_r($adddata);
		redirect('Users/welcome',$adddata);

  redirect(base_url()."Users/welcome".$adddata);
  redirect(site_url('Users/welcome').'?id='.$adddata);*/

	}

	public function fetchfrend()
	{   $this->load->model('Regi_model');
		$data=$this->Regi_model->all_data();
		echo json_encode($data);
	}

public function showreq()
	{   $this->load->model('Regi_model');
		$data=$this->Regi_model->showlist($this->input->post('cast_id'));
		echo json_encode($data);
	}

}
?>
