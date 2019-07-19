<?php

class  Users extends CI_Controller {

       /*public function show() {

       $this->load->model('User_model');

      $data = $this->user_model->all_users();
      print_r($data);die;

      echo $data->username; 



       }*/


       public function index(){

          redirect(site_url('Users/datashow'));   

       } 


       public function datashow(){
         $this->load->model('User_model','user');
       $data['all_data'] =  $this->user->datashow();
       $data['random_data'] =  $this->user->random();
       // print_r($data['random_data']);
       $this->load->view('Showuser',$data);
  
       }

       public function insert() { 
        $this->load->model('User_model');
        /*
        $new_image_name2 = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['userfile']['name']);
                    $image_path = './assets/images/';
                    $config['upload_path'] = $image_path;

                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $new_image_name2;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('userfile')) {
                      $post=$this->input->post();
                      unset($post['submit']);
                        $data = $this->upload->data();
                        $heimg = "assets/images/" . $data['file_name'];
                        $post['userfile'] = $heimg;
                        print_r($post);

                    } else {
                        $heimg = "";
                    }
                    $this->User_model->create_user($post);*/
                    //redirect('Users/datashow');

/*Muliple Imgaes Uplode*/
                   $img = sizeof($_FILES['images']['tmp_name']);
                for ($i = 0; $i < $img; $i++) {
                    $_FILES['file']['name'] = $_FILES['images']['name'][$i]/*Input Type name"images"*/;
                    $_FILES['file']['type'] = $_FILES['images']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['images']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['images']['size'][$i];

                    // File upload configuration
                    $empimage = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['file']['name']);
                    $uploadPath = 'assets/images'; // image upload path.....!
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $empimage;

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $array[$i]['img'] = "assets/images/" . $fileData['file_name'];

                        $array = array(
                            
                            'username' => $this->input->post('username'),
                            'pass' => $this->input->post('pass'), // 
                            'img' => "assets/images/" . $fileData['file_name'],
                        );
                       /* print_r($array);*/
                        
                    $this->User_model->create_user($array);
                    //redirect('Users/datashow');
                    }
                }


       }

       public function edit() { 

        if($this->input->get()){
        $this->load->model('User_model','user'); 
        $iddcode = $this->input->get('id');
         $id = base64_decode($iddcode);
        $data['getdata'] = $this->user->edit($id);
        $this->load->view('edit_user',$data);
    }else{

    }
       } 

       public function update() {
        $this->load->model('User_model'); 
        if($this->input->post()){
          $update_array =array(

               'username' => $this->input->post('username'),
               'pass'     => $this->input->post("pass"),
               

          );
          $this->User_model->update_user($this->input->post('id'),$update_array);
          echo "update done";
          redirect(site_url('Users/datashow'));
        }
        else{
          redirect(site_url('Users/edit'));
        }
       }

        public function deleteuser()
       {
        $this->load->model('User_model','user');
        $iddcode = $this->input->get('id');
         $id = base64_decode($iddcode);
         $data['getdata'] = $this->user->delete_user($id);
         redirect(site_url('Users/datashow'));
       }
}
?>


 