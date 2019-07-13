<?php

class Login extends CI_Controller {

public function index()
{ 

	$this->load->model('Login_model', 'login');
    $data['error']="";
	if($this->input->post()){ 

		$this->form_validation->set_rules('usernamr', 'User Name' , 'trim|required');
		$this->form_validation->set_rules('pass', 'Password' , 'trim|required');

		if($this->form_validation->run() == FALSE){
			$data['error'] = validation_errors(); 
		}else{

			$user = $this->input->post('usernamr');
			$pass = $this->input->post('pass');

			$array = array(
				'username' => $user,
				'pass' => $pass,
			);

			$result = $this->login->getuser($array);
			//print_r($result);
			if($result){
				$this->session->set_userdata('login_user',$result);
				//print_r($login_user);
				redirect("Login/logins");
			}else{
               $data['error'] ="bhains ki tang";
			}

		}

	}

	$this->load->view('login',$data);

}


public function logins()
{ 
	if ($this->session->userdata('login_user')=='') {
		redirect('Login/index');
	}
	else{
	$data['value'] =$this->session->userdata('login_user');
	$this->load->model('Login_model');
	$this->load->view('dashboard',$data);

			}

	/*redirect("logins/dasboard");*/
}

public function logout()
{ 
	$this->load->model('Login_model');
	$this->session->sess_destroy();
	redirect('Login');

}

}
?>