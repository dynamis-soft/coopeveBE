<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Associated extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Client system */

    public function getAssociatedAll_post() {
        $response = $this->associated->getAll();
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAssociatedId_post() {
        $data = $this->post();
        $response = $this->associated->getbyId($data["id"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAssociatedEdit_post() {
        $data = $this->post();
        $response = $this->associated->getbyId($data);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Client zoho */

    public function getAssociatedInsertZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Asociados");
        $object["associatesname"] = array_key_exists("Name", $result) ? $result["Name"] : '';
        $object["secondname"] = array_key_exists("Segundo_Nombre", $result) ? $result["Segundo_Nombre"] : '';
        $object["lastname"] = array_key_exists("Apellido_Paterno", $result) ? $result["Apellido_Paterno"] : '';
        $object["motherslastname"] = array_key_exists("Apellido_Materno", $result) ?  " " .$result["Apellido_Materno"] : '';
        $object["marriedsurname"] = array_key_exists("Apellido_Casada", $result) ?  $result["Apellido_Casada"] : '';
        $object["nclient"] = array_key_exists("No_Cliente", $result) ?  $result["No_Cliente"] : '';
        $object["nassociated"] = array_key_exists("No_Asociado", $result) ?  $result["No_Asociado"] : '';    
        $object["sex"] = array_key_exists("Sexo", $result) ?  $result["Sexo"] : '';
        $object["birthdate"] = array_key_exists("Fecha_de_Nacimiento", $result) ?  $result["Fecha_de_Nacimiento"] : '';
        $object["dateofadmission"] = array_key_exists("Fecha_de_Ingreso", $result) ?  $result["Fecha_de_Ingreso"] : '';
        $object["landline"] = array_key_exists("Tel_fono_Fijo", $result) ?  $result["Tel_fono_Fijo"] : '';
        $object["mobilephone"] = array_key_exists("Teléfono Movil", $result) ?  $result["Teléfono Movil"] : '';
        $object["email"] = array_key_exists("Email", $result) ?  $result["Email"] : '';
        $object["branchoffice"] = array_key_exists("Sucursal", $result) ?  $result["Sucursal"] : '';
        $object["company"] = array_key_exists("Empresa", $result) ?  $result["Empresa"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ?  $result["Ocupaci_n"] : '';
        $object["bruto"] = array_key_exists("Salario_Bruto", $result) ?  $result["Salario_Bruto"] : '';
        $object["neto"] = array_key_exists("Salario_Neto", $result) ?  $result["Salario_Neto"] : '';
        $object["coopeveonline"] = array_key_exists("COOPEVE_EN_LINEA", $result) ?  $result["COOPEVE_EN_LINEA"] : '';
        $object["funeralComplex"] = array_key_exists("Complejo_Funerario", $result) ?  $result["Complejo_Funerario"] : '';
        $object["visa"] = array_key_exists("VISA", $result) ?  $result["VISA"] : '';
        $object["key"] = array_key_exists("CLAVE", $result) ?  $result["CLAVE"] : '';
        $object["customerproducts"] = array_key_exists("Productos_del_Cliente", $result) ?  $result["Productos_del_Cliente"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->associated->insert($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAssociatedEditZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Asociados");
        $object["associatesname"] = array_key_exists("Name", $result) ? $result["Name"] : '';
        $object["secondname"] = array_key_exists("Segundo_Nombre", $result) ? $result["Segundo_Nombre"] : '';
        $object["lastname"] = array_key_exists("Apellido_Paterno", $result) ? $result["Apellido_Paterno"] : '';
        $object["motherslastname"] = array_key_exists("Apellido_Materno", $result) ?  " " .$result["Apellido_Materno"] : '';
        $object["marriedsurname"] = array_key_exists("Apellido_Casada", $result) ?  $result["Apellido_Casada"] : '';
        $object["nclient"] = array_key_exists("No_Cliente", $result) ?  $result["No_Cliente"] : '';
        $object["nassociated"] = array_key_exists("No_Asociado", $result) ?  $result["No_Asociado"] : '';    
        $object["sex"] = array_key_exists("Sexo", $result) ?  $result["Sexo"] : '';
        $object["birthdate"] = array_key_exists("Fecha_de_Nacimiento", $result) ?  $result["Fecha_de_Nacimiento"] : '';
        $object["dateofadmission"] = array_key_exists("Fecha_de_Ingreso", $result) ?  $result["Fecha_de_Ingreso"] : '';
        $object["landline"] = array_key_exists("Tel_fono_Fijo", $result) ?  $result["Tel_fono_Fijo"] : '';
        $object["mobilephone"] = array_key_exists("Teléfono Movil", $result) ?  $result["Teléfono Movil"] : '';
        $object["email"] = array_key_exists("Email", $result) ?  $result["Email"] : '';
        $object["branchoffice"] = array_key_exists("Sucursal", $result) ?  $result["Sucursal"] : '';
        $object["company"] = array_key_exists("Empresa", $result) ?  $result["Empresa"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ?  $result["Ocupaci_n"] : '';
        $object["bruto"] = array_key_exists("Salario_Bruto", $result) ?  $result["Salario_Bruto"] : '';
        $object["neto"] = array_key_exists("Salario_Neto", $result) ?  $result["Salario_Neto"] : '';
        $object["coopeveonline"] = array_key_exists("COOPEVE_EN_LINEA", $result) ?  $result["COOPEVE_EN_LINEA"] : '';
        $object["funeralComplex"] = array_key_exists("Complejo_Funerario", $result) ?  $result["Complejo_Funerario"] : '';
        $object["visa"] = array_key_exists("VISA", $result) ?  $result["VISA"] : '';
        $object["key"] = array_key_exists("CLAVE", $result) ?  $result["CLAVE"] : '';
        $object["customerproducts"] = array_key_exists("Productos_del_Cliente", $result) ?  $result["Productos_del_Cliente"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->associated->edit($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}


