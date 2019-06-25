<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Fetch extends REST_Controller {

function __construct() {

	parent::__construct();

$this->load->model('User_model');
     $this->post = $_REQUEST;
        /*$this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->library('session');*/

        $this->vehicle = "vehicle";
        $this->dispatch = "dispatch";
        $this->bkexp = "booking_expenses";
        $this->billexp = "bill_expenses";
        $this->realexp = "real_expenses";
        $this->vehicle_model = "vehicle_model";
        $this->depo = "depo";
        $this->color = "color";
        $this->account = "account";
        $this->driver = "jockey_driver";
        $this->bill = "bill";
        $this->disloc = "dispatch_location";
        $this->customer = "customer";
        $this->pumpdsl = "pump_dsl";
        /* new  */
        $this->employee = "employee";
        $this->company = "company";
        $this->branch = "branch";
        $this->oem = "oem";
        $this->trackinglocation = "trackinglocation";
        $this->tracking_express = "tracking_express";
        $this->track_location = "jockey_tracking_location_vehicle";
	
}
public function user_get($id = 0)
{
        $params = json_decode(file_get_contents('php://input'), true);

        $data =  $this->User_model->datashow($id);
        //echo"heelo Anroid";
        echo json_encode($data);
        if (!empty($data)) {
                        $response = array('status' => '1', 'message' => ResponseMessages::getStatusCodeMessage(200));
                    } else {
                        $response = array('status' => '0', 'message' => ResponseMessages::getStatusCodeMessage(109));
                    }
}

public function user_post()
{
    
$params = json_decode(file_get_contents('php://input'), true);

if($params){
        // $id =$params['id'];
        $array = array(
                   'username' => $params['username'],
                   'pass'     => $params['pass']
               );     
       // $array = array(
       //             'username' => $this->input->post('username'),
       //             'pass'     => $this->input->post("pass")
       //         );
       $data=$this->User_model->create_user($array);
       echo json_encode($data);
        if (!empty($data)) {
                        $response = array('status' => '1', 'message' => ResponseMessages::getStatusCodeMessage(200));
                    } else {
                        $response = array('status' => '0', 'message' => ResponseMessages::getStatusCodeMessage(109));
                    }
        }else{
            $response = array('status' => '0', 'message' => ResponseMessages::getStatusCodeMessage(109));
        }            
}

public function userupdate_put()
{

$params = json_decode(file_get_contents('php://input'), true);
        $id =$params['id'];
        $array = array(
                   'username' => $params['username'],
                   'pass'     => $params['pass']
               );

        $data=$this->User_model->update_user($array,$id);
        echo json_encode($data);
        if (!empty($data)) {
                        $response = array('status' => '1', 'message' => ResponseMessages::getStatusCodeMessage(200));
                    } else {
                        $response = array('status' => '0', 'message' => ResponseMessages::getStatusCodeMessage(109));
                    }
}


 public function deleteuser_delete($id = 0)
{        

    $params = json_decode(file_get_contents('php://input'), true);
         $id =$id;
         $data= $this->User_model->delete_user($id);
         if (!empty($data)) {
                        $response = array('status' => '1', 'message' => ResponseMessages::getStatusCodeMessage(200));
                    } else {
                        $response = array('status' => '0', 'message' => ResponseMessages::getStatusCodeMessage(109));
                    }
       }

}
?>