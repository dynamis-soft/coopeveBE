<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Afiliate extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Client system */

    public function getAfiliateyAll_post() {
        $response = $this->afiliate->getAll();
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAfiliateId_post() {
        $data = $this->post();
        $response = $this->afiliate->getbyId($data["id"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAfiliateEdit_post() {
        $data = $this->post();
        $response = $this->afiliate->getbyId($data);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAfiliateValue_post() {
        $data = $this->post();
        $response = $this->afiliate->getbyValue($data["value"]);
        $message = [
            'type' => "success",
            'data' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Client zoho */

    public function getAfiliateInsertZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Deals");
        $object["dateaffiliated"] = array_key_exists("Fecha_Afiliar", $result) ? $result["Fecha_Afiliar"] : '';
        $object["branchoffice"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
        $object["typeincome"] = array_key_exists("Tipo_de_Ingreso", $result) ? $result["Tipo_de_Ingreso"] : '';
        $object["firstname"] = array_key_exists("Primer_Nombre", $result) ? $result["Primer_Nombre"] : '';
        $object["secondname"] = array_key_exists("Segundo_Nombre", $result) ? " " . $result["Segundo_Nombre"] : '';
        $object["surname"] = array_key_exists("Primer_Apellido", $result) ? $result["Primer_Apellido"] : '';
        $object["secondsurname"] = array_key_exists("Segundo_Apellido", $result) ? $result["Segundo_Apellido"] : '';
        $object["identificationcard"] = array_key_exists("C_dula", $result) ? $result["C_dula"] : '';
        $object["socialsecuritynumber"] = array_key_exists("N_mero_Seguro_Social", $result) ? $result["N_mero_Seguro_Social"] : '';
        $object["birthdate"] = array_key_exists("Fecha_Nacimiento", $result) ? $result["Fecha_Nacimiento"] : '';
        $object["age"] = array_key_exists("Edad", $result) ? $result["Edad"] : '';
        $object["height"] = array_key_exists("Estatura", $result) ? $result["Estatura"] : '';
        $object["weight"] = array_key_exists("Peso", $result) ? $result["Peso"] : '';
        $object["gender "] = array_key_exists("Genero", $result) ? " " . $result["Genero"] : '';
        $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
        $object["bloodtype"] = array_key_exists("Tipo_de_Sangre", $result) ? $result["Tipo_de_Sangre"] : '';
        $object["donor"] = array_key_exists("Donante", $result) ? $result["Donante"] : '';
        $object["civilstatus"] = array_key_exists("Estado_Civil", $result) ? $result["Estado_Civil"] : '';
        $object["phone"] = array_key_exists("Tel_fono", $result) ? $result["Tel_fono"] : '';
        $object["mobile"] = array_key_exists("Movil", $result) ? $result["Movil"] : '';
        $object["nationality"] = array_key_exists("Nacionalidad", $result) ? $result["Nacionalidad"] : '';
        $object["countryresidence"] = array_key_exists("Pa_s_de_Residencia", $result) ? " " . $result["Pa_s_de_Residencia"] : '';
        $object["typehousing"] = array_key_exists("Tipo_de_Vivienda", $result) ? $result["Tipo_de_Vivienda"] : '';
        $object["levelschooling"] = array_key_exists("Nivel_de_Escolaridad", $result) ? $result["Nivel_de_Escolaridad"] : '';
        $object["paymentcontributions"] = array_key_exists("Pago_de_Aportaciones", $result) ? $result["Pago_de_Aportaciones"] : '';
        $object["monthlyletter"] = array_key_exists("Letra_Mensual", $result) ? $result["Letra_Mensual"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ? $result["Ocupaci_n"] : '';
        $object["economicactivity"] = array_key_exists("Actividad_Econ_mica", $result) ? $result["Actividad_Econ_mica"] : '';
        $object["yearsservice"] = array_key_exists("A_os_de_Servicio", $result) ? $result["A_os_de_Servicio"] : '';
        $object["companyname"] = array_key_exists("Nombre_de_la_Empresa", $result) ? $result["Nombre_de_la_Empresa"] : '';
        $object["companyaddress"] = array_key_exists("Direcci_n_de_la_Empresa", $result) ? $result["Direcci_n_de_la_Empresa"] : '';
        $object["laborcondition"] = array_key_exists("Condici_n_Laboral", $result) ? " " . $result["Condici_n_Laboral"] : '';
        $object["netsalary"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
        $object["otherincome"] = array_key_exists("Otros_Ingresos", $result) ? $result["Otros_Ingresos"] : '';
        $object["countrycompany"] = array_key_exists("Pa_s_de_la_Empresa", $result) ? $result["Pa_s_de_la_Empresa"] : '';
        $object["companyphone"] = array_key_exists("Tel_fono_Empresa", $result) ? $result["Tel_fono_Empresa"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->afiliate->insert($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAfiliateEditZoho_post() {
        $data = $this->post();
        $result = $this->zoho->consultar($data["id"], "Deals");
        $object["name"] = array_key_exists("Deal_Name", $result) ? $result["Deal_Name"] : '';
        $object["dateaffiliated"] = array_key_exists("Fecha_Afiliar", $result) ? $result["Fecha_Afiliar"] : '';
        $object["branchoffice"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
        $object["typeincome"] = array_key_exists("Tipo_de_Ingreso", $result) ? $result["Tipo_de_Ingreso"] : '';
        $object["firstname"] = array_key_exists("Primer_Nombre", $result) ? $result["Primer_Nombre"] : '';
        $object["secondname"] = array_key_exists("Segundo_Nombre", $result) ? " " . $result["Segundo_Nombre"] : '';
        $object["surname"] = array_key_exists("Primer_Apellido", $result) ? $result["Primer_Apellido"] : '';
        $object["secondsurname"] = array_key_exists("Segundo_Apellido", $result) ? $result["Segundo_Apellido"] : '';
        $object["identificationcard"] = array_key_exists("C_dula", $result) ? $result["C_dula"] : '';
        $object["socialsecuritynumber"] = array_key_exists("N_mero_Seguro_Social", $result) ? $result["N_mero_Seguro_Social"] : '';
        $object["birthdate"] = array_key_exists("Fecha_Nacimiento", $result) ? $result["Fecha_Nacimiento"] : '';
        $object["age"] = array_key_exists("Edad", $result) ? $result["Edad"] : '';
        $object["height"] = array_key_exists("Estatura", $result) ? $result["Estatura"] : '';
        $object["weight"] = array_key_exists("Peso", $result) ? $result["Peso"] : '';
        $object["gender "] = array_key_exists("Genero", $result) ? " " . $result["Genero"] : '';
        $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
        $object["bloodtype"] = array_key_exists("Tipo_de_Sangre", $result) ? $result["Tipo_de_Sangre"] : '';
        $object["donor"] = array_key_exists("Donante", $result) ? $result["Donante"] : '';
        $object["civilstatus"] = array_key_exists("Estado_Civil", $result) ? $result["Estado_Civil"] : '';
        $object["phone"] = array_key_exists("Tel_fono", $result) ? $result["Tel_fono"] : '';
        $object["mobile"] = array_key_exists("Movil", $result) ? $result["Movil"] : '';
        $object["nationality"] = array_key_exists("Nacionalidad", $result) ? $result["Nacionalidad"] : '';
        $object["countryresidence"] = array_key_exists("Pa_s_de_Residencia", $result) ? " " . $result["Pa_s_de_Residencia"] : '';
        $object["typehousing"] = array_key_exists("Tipo_de_Vivienda", $result) ? $result["Tipo_de_Vivienda"] : '';
        $object["levelschooling"] = array_key_exists("Nivel_de_Escolaridad", $result) ? $result["Nivel_de_Escolaridad"] : '';
        $object["paymentcontributions"] = array_key_exists("Pago_de_Aportaciones", $result) ? $result["Pago_de_Aportaciones"] : '';
        $object["monthlyletter"] = array_key_exists("Letra_Mensual", $result) ? $result["Letra_Mensual"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ? $result["Ocupaci_n"] : '';
        $object["economicactivity"] = array_key_exists("Actividad_Econ_mica", $result) ? $result["Actividad_Econ_mica"] : '';
        $object["yearsservice"] = array_key_exists("A_os_de_Servicio", $result) ? $result["A_os_de_Servicio"] : '';
        $object["companyname"] = array_key_exists("Nombre_de_la_Empresa", $result) ? $result["Nombre_de_la_Empresa"] : '';
        $object["companyaddress"] = array_key_exists("Direcci_n_de_la_Empresa", $result) ? $result["Direcci_n_de_la_Empresa"] : '';
        $object["laborcondition"] = array_key_exists("Condici_n_Laboral", $result) ? " " . $result["Condici_n_Laboral"] : '';
        $object["netsalary"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
        $object["otherincome"] = array_key_exists("Otros_Ingresos", $result) ? $result["Otros_Ingresos"] : '';
        $object["countrycompany"] = array_key_exists("Pa_s_de_la_Empresa", $result) ? $result["Pa_s_de_la_Empresa"] : '';
        $object["companyphone"] = array_key_exists("Tel_fono_Empresa", $result) ? $result["Tel_fono_Empresa"] : '';
        $object["id_zoho"] = $data["id"];
        $response = $this->afiliate->edit($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
