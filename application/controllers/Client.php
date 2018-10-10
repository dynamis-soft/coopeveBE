<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Client extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Client system */

    public function getClientAll_post() {
        $response = $this->client->getAll();
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getClientId_post() {
        $data = $this->post();
        $response = $this->client->getbyId($data["id"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getClientEdit_post() {
        $data = $this->post();
        $response = $this->client->getbyId($data);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Client zoho */

    public function getClientInsertZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Leads");
        $object["datebirthday"] = array_key_exists("Fecha_de_Nacimiento", $result) ? $result["Fecha_de_Nacimiento"] : '';
        $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
        $object["name"] = array_key_exists("Last_Name", $result) ? " " . $result["Last_Name"] : '';
        $object["phone"] = array_key_exists("Phone", $result) ? " " . $result["Phone"] : '';
        $object["mobil"] = array_key_exists("Mobile", $result) ? " " . $result["Mobile"] : '';
        $object["email"] = array_key_exists("Email", $result) ? " " . $result["Email"] : '';
        $object["company"] = array_key_exists("Company", $result) ? " " . $result["Company"] : '';
        $object["ocupation"] = array_key_exists("Ocupaci_n", $result) ? " " . $result["Ocupaci_n"] : '';
        $object["years_work"] = array_key_exists("Anos_de_Servicios", $result) ? " " . $result["Anos_de_Servicios"] : '';
        $object["neto"] = array_key_exists("Salario_Neto", $result) ? " " . $result["Salario_Neto"] : '';
        $object["bruto"] = array_key_exists("Salario_Bruto", $result) ? " " . $result["Salario_Bruto"] : '';
        $object["associated"] = array_key_exists("Salario_Bruto", $result) ? " " . $result["Salario_Bruto"] : '';
        $object["date"] = date('Ymd h:m:s');
        $object["client"] = array_key_exists("C_dula", $result) ? " " . $result["C_dula"] : '';
        $object["office"] = array_key_exists("Sucursal", $result) ? " " . $result["Sucursal"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->client->insert($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getClientEditZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Leads");
        $object["datebirthday"] = array_key_exists("Fecha_de_Nacimiento", $result) ? $result["Fecha_de_Nacimiento"] : '';
        $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
        $object["name"] = array_key_exists("Last_Name", $result) ? " " . $result["Last_Name"] : '';
        $object["phone"] = array_key_exists("Phone", $result) ? " " . $result["Phone"] : '';
        $object["mobil"] = array_key_exists("Mobile", $result) ? " " . $result["Mobile"] : '';
        $object["email"] = array_key_exists("Email", $result) ? " " . $result["Email"] : '';
        $object["company"] = array_key_exists("Company", $result) ? " " . $result["Company"] : '';
        $object["ocupation"] = array_key_exists("Ocupaci_n", $result) ? " " . $result["Ocupaci_n"] : '';
        $object["years_work"] = array_key_exists("Anos_de_Servicios", $result) ? " " . $result["Anos_de_Servicios"] : '';
        $object["neto"] = array_key_exists("Salario_Neto", $result) ? " " . $result["Salario_Neto"] : '';
        $object["bruto"] = array_key_exists("Salario_Bruto", $result) ? " " . $result["Salario_Bruto"] : '';
        $object["associated"] = array_key_exists("Salario_Bruto", $result) ? " " . $result["Salario_Bruto"] : '';
        $object["date"] = date('Ymd h:m:s');
        $object["client"] = array_key_exists("C_dula", $result) ? " " . $result["C_dula"] : '';
        $object["office"] = array_key_exists("Sucursal", $result) ? " " . $result["Sucursal"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->client->getbyId($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
