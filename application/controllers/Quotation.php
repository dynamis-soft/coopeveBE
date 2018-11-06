<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Quotation extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Client system */

    public function getQuotationAll_post() {
        $response = $this->quotation->getAll();
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getQuotationId_post() {
        $data = $this->post();
        $response = $this->quotation->getbyId($data["id"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getQuotationEdit_post() {
        $data = $this->post();
        $response = $this->quotation->getbyId($data);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
    
    public function getQuotationValue_post() {
        $data = $this->post();
        $response = $this->quotation->getbyValue($data["value"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Client zoho */

    public function getQuotationInsertZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Cotizaciones_de_Prestamos");
        $object["listingname"] = array_key_exists("Name", $result) ? $result["Name"] : '';
        $object["name"] = array_key_exists("Nombre", $result) ? $result["Nombre"] : '';
        $object["lastname"] = array_key_exists("Apellidoe", $result) ? $result["Apellido"] : '';
        $object["identificationcard"] = array_key_exists("C_dula", $result) ?  " " .$result["C_dula"] : '';
        $object["date"] = array_key_exists("Fecha_de_Nacimiento", $result) ?  $result["Fecha_de_Nacimiento"] : '';
        $object["phone"] = array_key_exists("Tel_fono", $result) ?  $result["Tel_fono"] : '';
        $object["cellphone"] = array_key_exists("Celular", $result) ?  $result["Celular"] : '';    
        $object["email"] = array_key_exists("Email", $result) ?  $result["Email"] : '';
        $object["exchangerate"] = array_key_exists("Exchange_Rate", $result) ?  $result["Exchange_Rate"] : '';
        $object["amountrequired"] = array_key_exists("Description", $result) ?  $result["Description"] : '';
        $object["monthlyletter"] = array_key_exists("Monto_Requerido", $result) ?  $result["Monto_Requerido"] : '';
        $object["workplace"] = array_key_exists("Lugar_de_Trabajo", $result) ?  $result["Lugar_de_Trabajo"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ?  $result["Ocupaci_n"] : '';
        $object["yearsofservice"] = array_key_exists("Anos_de_Servicio", $result) ?  $result["Anos_de_Servicio"] : '';
        $object["officephone"] = array_key_exists("Tel_fono_de_Oficina", $result) ?  $result["Tel_fono_de_Oficina"] : '';
        $object["monthlyincome"] = array_key_exists("Ingreso_Mensual", $result) ?  $result["Ingreso_Mensual"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->quotation->insert($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getQuotationEditZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Cotizaciones_de_Prestamos");
        $object["listingname"] = array_key_exists("Name", $result) ? $result["Name"] : '';
        $object["name"] = array_key_exists("Nombre", $result) ? $result["Nombre"] : '';
        $object["lastname"] = array_key_exists("Apellidoe", $result) ? $result["Apellido"] : '';
        $object["identificationcard"] = array_key_exists("C_dula", $result) ?  " " .$result["C_dula"] : '';
        $object["date"] = array_key_exists("Fecha_de_Nacimiento", $result) ?  $result["Fecha_de_Nacimiento"] : '';
        $object["phone"] = array_key_exists("Tel_fono", $result) ?  $result["Tel_fono"] : '';
        $object["cellphone"] = array_key_exists("Celular", $result) ?  $result["Celular"] : '';    
        $object["email"] = array_key_exists("Email", $result) ?  $result["Email"] : '';
        $object["exchangerate"] = array_key_exists("Exchange_Rate", $result) ?  $result["Exchange_Rate"] : '';
        $object["amountrequired"] = array_key_exists("Description", $result) ?  $result["Description"] : '';
        $object["monthlyletter"] = array_key_exists("Monto_Requerido", $result) ?  $result["Monto_Requerido"] : '';
        $object["workplace"] = array_key_exists("Lugar_de_Trabajo", $result) ?  $result["Lugar_de_Trabajo"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ?  $result["Ocupaci_n"] : '';
        $object["yearsofservice"] = array_key_exists("Anos_de_Servicio", $result) ?  $result["Anos_de_Servicio"] : '';
        $object["officephone"] = array_key_exists("Tel_fono_de_Oficina", $result) ?  $result["Tel_fono_de_Oficina"] : '';
        $object["monthlyincome"] = array_key_exists("Ingreso_Mensual", $result) ?  $result["Ingreso_Mensual"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->quotation->edit($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
