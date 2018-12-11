<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Opportunity extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Client system */

    public function getOpportunityAll_post() {
        $response = $this->opportunity->getAll();
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getOpportunityId_post() {
        $data = $this->post();
        $response = $this->opportunity->getbyId($data["id"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getOpportunityEdit_post() {
        $data = $this->post();
        $response = $this->opportunity->getbyId($data);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
    
    public function getOpportunityValue_post() {
        $data = $this->post();
        $response = $this->opportunity->getbyValue($data["value"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Client zoho */

    public function getOpportunityInsertZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Deals");
        $object["name"] = array_key_exists("Deal_Name", $result) ? $result["Deal_Name"] : '';
        $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"]["name"] : '';
        $object["source"] = array_key_exists("Lead_Source", $result) ? $result["Lead_Source"] : '';
        $object["salary"] = array_key_exists("Salario_Mensual", $result) ?  " " .$result["Salario_Mensual"] : '';
        $object["amount"] = array_key_exists("Amount", $result) ?  $result["Amount"] : '';
        $object["dateclose"] = array_key_exists("Closing_Date", $result) ?  $result["Closing_Date"] : '';
        $object["phase"] = array_key_exists("Stage", $result) ?  $result["Stage"] : '';    
        $object["description"] = array_key_exists("Description", $result) ?  $result["Description"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->opportunity->insert($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getOpportunityEditZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Deals");
        $object["name"] = array_key_exists("Deal_Name", $result) ? $result["Deal_Name"] : '';
        $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"]["name"] : '';
        $object["source"] = array_key_exists("Lead_Source", $result) ? $result["Lead_Source"] : '';
        $object["salary"] = array_key_exists("Salario_Mensual", $result) ?  " " .$result["Salario_Mensual"] : '';
        $object["amount"] = array_key_exists("Amount", $result) ?  $result["Amount"] : '';
        $object["dateclose"] = array_key_exists("Closing_Date", $result) ?  $result["Closing_Date"] : '';
        $object["phase"] = array_key_exists("Stage", $result) ?  $result["Stage"] : '';    
        $object["description"] = array_key_exists("Description", $result) ?  $result["Description"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->opportunity->edit($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
