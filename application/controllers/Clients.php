<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Clients extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Client system */

    public function getClientsAll_post() {
        $response = $this->clients->getAll();
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getClientsId_post() {
        $data = $this->post();
        $response = $this->clients->getbyId($data["id"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getClientsEdit_post() {
        $data = $this->post();
        $response = $this->clients->getbyId($data);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
    
    public function getClientsValue_post() {
        $data = $this->post();
        $response = $this->clients->getbyValue($data["value"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Client zoho */

    public function getClientsInsertZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Accounts");
        $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"] : '';
        $object["sex"] = array_key_exists("Sexo", $result) ? $result["Sexo"] : '';
        $object["numclient"] = array_key_exists("Account_Number", $result) ?  " " .$result["Account_Number"] : '';
        $object["phone"] = array_key_exists("Phone", $result) ?  $result["Phone"] : '';
        $object["email"] = array_key_exists("Correo_electr_nico", $result) ?  $result["Correo_electr_nico"] : '';
        $object["type"] = array_key_exists("Account_Type", $result) ?  $result["Account_Type"] : '';
        $product = "";
        if(array_key_exists("Producto_de_Inter_s", $result)){
            foreach($result["Producto_de_Inter_s"] as $item){
                $product.=$item.",";
            }
        }       
        $object["product"] = $product;
        $object["salary"] = array_key_exists("Salario_Mensual", $result) ?  $result["Salario_Mensual"] : '';
        $object["office"] = array_key_exists("Sucursal", $result) ?  $result["Sucursal"] : '';
        $object["source"] = array_key_exists("Fuente_de_Cliente", $result) ?  $result["Fuente_de_Cliente"] : '';
        $object["direction"] = array_key_exists("Shipping_Street", $result) ?  $result["Shipping_Street"] : '';
        $object["description"] = array_key_exists("Description", $result) ?  $result["Description"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->clients->insert($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getClientEditZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Accounts");
        $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"] : '';
        $object["sex"] = array_key_exists("Sexo", $result) ? $result["Sexo"] : '';
        $object["numclient"] = array_key_exists("Account_Number", $result) ?  " " .$result["Account_Number"] : '';
        $object["phone"] = array_key_exists("Phone", $result) ?  $result["Phone"] : '';
        $object["email"] = array_key_exists("Correo_electr_nico", $result) ?  $result["Correo_electr_nico"] : '';
        $object["type"] = array_key_exists("Account_Type", $result) ?  $result["Account_Type"] : '';
        $object["product"] = array_key_exists("Producto_de_Inter_s", $result) ?  $result["Producto_de_Inter_s"] : '';
        $object["salary"] = array_key_exists("Salario_Mensual", $result) ?  $result["Salario_Mensual"] : '';
        $object["office"] = array_key_exists("Sucursal", $result) ?  $result["Sucursal"] : '';
        $object["source"] = array_key_exists("Fuente_de_Cliente", $result) ?  $result["Fuente_de_Cliente"] : '';
        $object["direction"] = array_key_exists("Shipping_Street", $result) ?  $result["Shipping_Street"] : '';
        $object["description"] = array_key_exists("Description", $result) ?  $result["Description"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->clients->edit($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
