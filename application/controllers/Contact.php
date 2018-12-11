<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Contact extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Contact system */

    public function getContactAll_post() {
        $response = $this->contact->getAll();
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getContactId_post() {
        $data = $this->post();
        $response = $this->contact->getbyId($data["id"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getContactEdit_post() {
        $data = $this->post();
        $response = $this->contact->getbyId($data);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
    
    public function getContactValue_post() {
        $data = $this->post();
        $response = $this->contact->getbyValue($data["value"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Client zoho */

    public function getContactInsertZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Contacts");
        $object["datebirthday"] = array_key_exists("Date_of_Birth", $result) ? $result["Date_of_Birth"] : '';
        $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
        $object["lastname"] = array_key_exists("Last_Name", $result) ? $result["Last_Name"] : '';
        $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
        $object["mobile"] = array_key_exists("Mobile", $result) ? $result["Mobile"] : '';
        $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
        $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->contact->insert($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getContactEditZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Contacts");
        $object["datebirthday"] = array_key_exists("Date_of_Birth", $result) ? $result["Date_of_Birth"] : '';
        $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
        $object["lastname"] = array_key_exists("Last_Name", $result) ? $result["Last_Name"] : '';
        $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
        $object["mobile"] = array_key_exists("Mobile", $result) ? $result["Mobile"] : '';
        $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
        $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->contact->edit($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
