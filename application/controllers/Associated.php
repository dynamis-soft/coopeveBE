<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Associated extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Client system */

    public function getAssociatedAll_post() {
        $data = $this->post();
        $to = $data["to"];
        $from = $data["from"];
        $response = $this->associated->getAll($from, $to);
        $count = $this->associated->getCountAll();
        $message = [
            'type' => "success",
            'data' => $response,
            'cantidad' => $count[0]->cantidad
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function getAssociatedValue_post() {
        $data = $this->post();
        $response = $this->associated->getbyValue($data["value"]);
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
        $result = $this->zoho->consultar($data["id"], "Asociados1");
        $object["associatesname"] = array_key_exists("Name", $result) ? $result["Name"] : '';
        $object["secondname"] = array_key_exists("Segundo_Nombre", $result) ? $result["Segundo_Nombre"] : '';
        $object["lastname"] = array_key_exists("Apellido_Paterno", $result) ? $result["Apellido_Paterno"] : '';
        $object["motherslastname"] = array_key_exists("Apellido_Materno", $result) ? " " . $result["Apellido_Materno"] : '';
        $object["marriedsurname"] = array_key_exists("Apellido_Casada", $result) ? $result["Apellido_Casada"] : '';
        $object["nclient"] = array_key_exists("No_Cliente", $result) ? $result["No_Cliente"] : '';
        $object["nassociated"] = array_key_exists("No_Asociado", $result) ? $result["No_Asociado"] : '';
        $object["sex"] = array_key_exists("Sexo", $result) ? $result["Sexo"] : '';
        $object["birthdate"] = array_key_exists("Fecha_de_Nacimiento", $result) ? $result["Fecha_de_Nacimiento"] : '';
        $object["dateofadmission"] = array_key_exists("Fecha_de_Ingreso", $result) ? $result["Fecha_de_Ingreso"] : '';
        $object["landline"] = array_key_exists("Tel_fono_Fijo", $result) ? $result["Tel_fono_Fijo"] : '';
        $object["mobilephone"] = array_key_exists("Teléfono Movil", $result) ? $result["Teléfono Movil"] : '';
        $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
        $object["branchoffice"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
        $object["company"] = array_key_exists("Empresa", $result) ? $result["Empresa"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ? $result["Ocupaci_n"] : '';
        $object["bruto"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
        $object["neto"] = array_key_exists("Salario_Neto", $result) ? $result["Salario_Neto"] : '';
        $object["coopeveonline"] = array_key_exists("COOPEVE_EN_LINEA", $result) ? $result["COOPEVE_EN_LINEA"] : '';
        $object["funeralComplex"] = array_key_exists("Complejo_Funerario", $result) ? $result["Complejo_Funerario"] : '';
        $object["visa"] = array_key_exists("VISA", $result) ? $result["VISA"] : '';
        $object["key"] = array_key_exists("CLAVE", $result) ? $result["CLAVE"] : '';
        $object["customerproducts"] = array_key_exists("Productos_del_Cliente", $result) ? $result["Productos_del_Cliente"] : '';
        $object["payment"] = array_key_exists("Forma_Pago_Aportaciones", $result) ? $result["Forma_Pago_Aportaciones"] : '';
        $object["monthlyletter"] = array_key_exists("Letra_Mensual", $result) ? $result["Letra_Mensual"] : '';
        $object["typeofincome"] = array_key_exists("Tipo_de_Ingreso", $result) ? $result["Tipo_de_Ingreso"] : '';
        $object["otherincome"] = array_key_exists("Otros_Ingresos", $result) ? $result["Otros_Ingresos"] : '';
        $object["companyphone"] = array_key_exists("Tel_fono_de_Empresa", $result) ? $result["Tel_fono_de_Empresa"] : '';
        $object["companyaddress"] = array_key_exists("Direcci_n_Empresa", $result) ? $result["Direcci_n_Empresa"] : '';
        $object["laborcondition"] = array_key_exists("Condici_n_Laboral", $result) ? $result["Condici_n_Laboral"] : '';
        $object["economicactivity"] = array_key_exists("Actividad_Econ_mica", $result) ? $result["Actividad_Econ_mica"] : '';
        $object["yearsservice"] = array_key_exists("A_os_de_servicio", $result) ? $result["A_os_de_servicio"] : '';
        $object["countrycompany"] = array_key_exists("probar", $result) ? $result["probar"] : '';
        $object["age"] = array_key_exists("Edad", $result) ? $result["Edad"] : '';
        $object["weightperson"] = array_key_exists("Peso", $result) ? $result["Peso"] : '';
        $object["height"] = array_key_exists("Estatura", $result) ? $result["Estatura"] : '';
        $object["bloodtype"] = array_key_exists("Tipo_de_Sangre", $result) ? $result["Tipo_de_Sangre"] : '';
        $object["donor"] = array_key_exists("Donante", $result) ? $result["Donante"] : '';
        $object["levelschooling"] = array_key_exists("Nivel_de_Escolaridad", $result) ? $result["Nivel_de_Escolaridad"] : '';
        $object["countryresidence"] = array_key_exists("Pa_s_de_Residencia", $result) ? $result["Pa_s_de_Residencia"] : '';
        $object["nationality"] = array_key_exists("Nacionalidad", $result) ? $result["Nacionalidad"] : '';
        $object["housingtype"] = array_key_exists("Tipo_Vivienda", $result) ? $result["Tipo_Vivienda"] : '';
        $object["civilstatus"] = array_key_exists("Estado_Civil", $result) ? $result["Estado_Civil"] : '';

        $product = "";
        if (array_key_exists("Productos_del_Cliente", $result)) {
            foreach ($result["Productos_del_Cliente"] as $item) {
                $product .= $item . ",";
            }
        }
        $object["customerproducts"] = $product;
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
        $result = $this->zoho->consultar($data["id"], "Asociados1");
        $object["associatesname"] = array_key_exists("Name", $result) ? $result["Name"] : '';
        $object["secondname"] = array_key_exists("Segundo_Nombre", $result) ? $result["Segundo_Nombre"] : '';
        $object["lastname"] = array_key_exists("Apellido_Paterno", $result) ? $result["Apellido_Paterno"] : '';
        $object["motherslastname"] = array_key_exists("Apellido_Materno", $result) ? " " . $result["Apellido_Materno"] : '';
        $object["marriedsurname"] = array_key_exists("Apellido_Casada", $result) ? $result["Apellido_Casada"] : '';
        $object["nclient"] = array_key_exists("No_Cliente", $result) ? $result["No_Cliente"] : '';
        $object["nassociated"] = array_key_exists("No_Asociado", $result) ? $result["No_Asociado"] : '';
        $object["sex"] = array_key_exists("Sexo", $result) ? $result["Sexo"] : '';
        $object["birthdate"] = array_key_exists("Fecha_de_Nacimiento", $result) ? $result["Fecha_de_Nacimiento"] : '';
        $object["dateofadmission"] = array_key_exists("Fecha_de_Ingreso", $result) ? $result["Fecha_de_Ingreso"] : '';
        $object["landline"] = array_key_exists("Tel_fono_Fijo", $result) ? $result["Tel_fono_Fijo"] : '';
        $object["mobilephone"] = array_key_exists("Teléfono Movil", $result) ? $result["Teléfono Movil"] : '';
        $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
        $object["branchoffice"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
        $object["company"] = array_key_exists("Empresa", $result) ? $result["Empresa"] : '';
        $object["occupation"] = array_key_exists("Ocupaci_n", $result) ? $result["Ocupaci_n"] : '';
        $object["bruto"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
        $object["neto"] = array_key_exists("Salario_Neto", $result) ? $result["Salario_Neto"] : '';
        $object["coopeveonline"] = array_key_exists("COOPEVE_EN_LINEA", $result) ? $result["COOPEVE_EN_LINEA"] : '';
        $object["funeralComplex"] = array_key_exists("Complejo_Funerario", $result) ? $result["Complejo_Funerario"] : '';
        $object["visa"] = array_key_exists("VISA", $result) ? $result["VISA"] : '';
        $object["key"] = array_key_exists("CLAVE", $result) ? $result["CLAVE"] : '';
        $object["customerproducts"] = array_key_exists("Productos_del_Cliente", $result) ? $result["Productos_del_Cliente"] : '';
        $object["payment"] = array_key_exists("Forma_Pago_Aportaciones", $result) ? $result["Forma_Pago_Aportaciones"] : '';
        $object["monthlyletter"] = array_key_exists("Letra_Mensual", $result) ? $result["Letra_Mensual"] : '';
        $object["typeofincome"] = array_key_exists("Tipo_de_Ingreso", $result) ? $result["Tipo_de_Ingreso"] : '';
        $object["otherincome"] = array_key_exists("Otros_Ingresos", $result) ? $result["Otros_Ingresos"] : '';
        $object["companyphone"] = array_key_exists("Tel_fono_de_Empresa", $result) ? $result["Tel_fono_de_Empresa"] : '';
        $object["companyaddress"] = array_key_exists("Direcci_n_Empresa", $result) ? $result["Direcci_n_Empresa"] : '';
        $object["laborcondition"] = array_key_exists("Condici_n_Laboral", $result) ? $result["Condici_n_Laboral"] : '';
        $object["economicactivity"] = array_key_exists("Actividad_Econ_mica", $result) ? $result["Actividad_Econ_mica"] : '';
        $object["yearsservice"] = array_key_exists("A_os_de_servicio", $result) ? $result["A_os_de_servicio"] : '';
        $object["countrycompany"] = array_key_exists("probar", $result) ? $result["probar"] : '';
        $object["age"] = array_key_exists("Edad", $result) ? $result["Edad"] : '';
        $object["weightperson"] = array_key_exists("Peso", $result) ? $result["Peso"] : '';
        $object["height"] = array_key_exists("Estatura", $result) ? $result["Estatura"] : '';
        $object["bloodtype"] = array_key_exists("Tipo_de_Sangre", $result) ? $result["Tipo_de_Sangre"] : '';
        $object["donor"] = array_key_exists("Donante", $result) ? $result["Donante"] : '';
        $object["levelschooling"] = array_key_exists("Nivel_de_Escolaridad", $result) ? $result["Nivel_de_Escolaridad"] : '';
        $object["countryresidence"] = array_key_exists("Pa_s_de_Residencia", $result) ? $result["Pa_s_de_Residencia"] : '';
        $object["nationality"] = array_key_exists("Nacionalidad", $result) ? $result["Nacionalidad"] : '';
        $object["housingtype"] = array_key_exists("Tipo_Vivienda", $result) ? $result["Tipo_Vivienda"] : '';
        $object["civilstatus"] = array_key_exists("Estado_Civil", $result) ? $result["Estado_Civil"] : '';
        $product = "";
        if (array_key_exists("Productos_del_Cliente", $result)) {
            foreach ($result["Productos_del_Cliente"] as $item) {
                $product .= $item . ",";
            }
        }
        $object["customerproducts"] = $product;
        $object["id_zoho"] = $data["id"];
        $response = $this->associated->edit($object);
        $message = [
            'type' => "success",
            'response' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
