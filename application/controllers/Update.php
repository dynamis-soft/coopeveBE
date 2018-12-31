<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Update extends REST_Controller {

    public function updateAssociated_post() {
        /* Associated */
        $total = 100;
        $validador = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($validador == 0) {
                $data = $this->zoho->all("Asociados1", $i);
                if (is_array($data)) {
                    foreach ($data as $result) {
                        $response = $this->associated->getbyIdZoho($result["id"]);
                        if (empty($response)) {
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
                            $object["id_zoho"] = $result["id"];
                            $response = $this->associated->insert($object);
                        } else {
                            $object = array();
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
                            $object["id_zoho"] = $result["id"];
                            $response = $this->associated->edit($object);
                        }
                    }
                } else {
                    $validador = 1;
                }
            }
        }


        $message = [
            'type' => "success",
            'response' => "Se actualizo correctamente"
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function updatePossibleClient_post() {
        /* Possible Client */
        $validador = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($validador == 0) {
                $data = $this->zoho->all("Leads", $i);
                if (is_array($data)) {
                    foreach ($data as $result) {
                        $response = $this->client->getbyIdZoho($result["id"]);
                        if (empty($response)) {
                            $object = array();
                            $object["datebirthday"] = array_key_exists("Fecha_de_Nacimiento", $result) ? $result["Fecha_de_Nacimiento"] : '';
                            $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
                            $object["name"] = array_key_exists("Last_Name", $result) ? " " . $result["Last_Name"] : '';
                            $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
                            $object["mobil"] = array_key_exists("Mobile", $result) ? $result["Mobile"] : '';
                            $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
                            $object["company"] = array_key_exists("Company", $result) ? $result["Company"] : '';
                            $object["ocupation"] = array_key_exists("Ocupaci_n", $result) ? $result["Ocupaci_n"] : '';
                            $object["years_work"] = array_key_exists("Anos_de_Servicios", $result) ? $result["Anos_de_Servicios"] : '';
                            $object["neto"] = array_key_exists("Salario_Neto", $result) ? $result["Salario_Neto"] : '';
                            $object["bruto"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
                            $object["associated"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
                            $object["date"] = date('Ymd h:m:s');
                            $object["client"] = array_key_exists("C_dula", $result) ? $result["C_dula"] : '';
                            $object["office"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->client->insert($object);
                        } else {
                            $object = array();
                            $object["datebirthday"] = array_key_exists("Fecha_de_Nacimiento", $result) ? $result["Fecha_de_Nacimiento"] : '';
                            $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
                            $object["name"] = array_key_exists("Last_Name", $result) ? " " . $result["Last_Name"] : '';
                            $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
                            $object["mobil"] = array_key_exists("Mobile", $result) ? $result["Mobile"] : '';
                            $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
                            $object["company"] = array_key_exists("Company", $result) ? $result["Company"] : '';
                            $object["ocupation"] = array_key_exists("Ocupaci_n", $result) ? $result["Ocupaci_n"] : '';
                            $object["years_work"] = array_key_exists("Anos_de_Servicios", $result) ? $result["Anos_de_Servicios"] : '';
                            $object["neto"] = array_key_exists("Salario_Neto", $result) ? $result["Salario_Neto"] : '';
                            $object["bruto"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
                            $object["associated"] = array_key_exists("Salario_Bruto", $result) ? $result["Salario_Bruto"] : '';
                            $object["date"] = date('Ymd h:m:s');
                            $object["client"] = array_key_exists("C_dula", $result) ? $result["C_dula"] : '';
                            $object["office"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->client->edit($object);
                        }
                    }
                } else {
                    $validador = 1;
                }
            }
        }
        $message = [
            'type' => "success",
            'response' => "Se actualizo correctamente"
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function updateClients_post() {
        /* Client */
        $validador = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($validador == 0) {
                $data = $this->zoho->all("Accounts", $i);
                if (is_array($data)) {
                    foreach ($data as $result) {
                        $response = $this->clients->getbyIdZoho($result["id"]);
                        if (empty($response)) {
                            $object = array();
                            $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"] : '';
                            $object["sex"] = array_key_exists("Sexo", $result) ? $result["Sexo"] : '';
                            $object["numclient"] = array_key_exists("Account_Number", $result) ? " " . $result["Account_Number"] : '';
                            $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
                            $object["email"] = array_key_exists("Correo_electr_nico", $result) ? $result["Correo_electr_nico"] : '';
                            $object["type"] = array_key_exists("Account_Type", $result) ? $result["Account_Type"] : '';
                            $product = "";
                            if (array_key_exists("Producto_de_Inter_s", $result)) {
                                foreach ($result["Producto_de_Inter_s"] as $item) {
                                    $product .= $item . ",";
                                }
                            }
                            $object["product"] = $product;
                            $object["salary"] = array_key_exists("Salario_Mensual", $result) ? $result["Salario_Mensual"] : '';
                            $object["office"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
                            $object["source"] = array_key_exists("Fuente_de_Cliente", $result) ? $result["Fuente_de_Cliente"] : '';
                            $object["direction"] = array_key_exists("Shipping_Street", $result) ? $result["Shipping_Street"] : '';
                            $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->clients->insert($object);
                        } else {
                            $object = array();
                            $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"] : '';
                            $object["sex"] = array_key_exists("Sexo", $result) ? $result["Sexo"] : '';
                            $object["numclient"] = array_key_exists("Account_Number", $result) ? " " . $result["Account_Number"] : '';
                            $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
                            $object["email"] = array_key_exists("Correo_electr_nico", $result) ? $result["Correo_electr_nico"] : '';
                            $object["type"] = array_key_exists("Account_Type", $result) ? $result["Account_Type"] : '';
                            $product = "";
                            if (array_key_exists("Producto_de_Inter_s", $result)) {
                                foreach ($result["Producto_de_Inter_s"] as $item) {
                                    $product .= $item . ",";
                                }
                            }
                            $object["product"] = $product;
                            $object["salary"] = array_key_exists("Salario_Mensual", $result) ? $result["Salario_Mensual"] : '';
                            $object["office"] = array_key_exists("Sucursal", $result) ? $result["Sucursal"] : '';
                            $object["source"] = array_key_exists("Fuente_de_Cliente", $result) ? $result["Fuente_de_Cliente"] : '';
                            $object["direction"] = array_key_exists("Shipping_Street", $result) ? $result["Shipping_Street"] : '';
                            $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->clients->edit($object);
                        }
                    }
                } else {
                    $validador = 1;
                }
            }
        }
        $message = [
            'type' => "success",
            'response' => "Se actualizo correctamente"
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function updateContacts_post() {
        /* Client */
        $validador = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($validador == 0) {
                $data = $this->zoho->all("Contacts", $i);
                if (is_array($data)) {
                    foreach ($data as $result) {
                        $response = $this->contact->getbyIdZoho($result["id"]);
                        if (empty($response)) {
                            $object = array();
                            $object["datebirthday"] = array_key_exists("Date_of_Birth", $result) ? $result["Date_of_Birth"] : '';
                            $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
                            $object["lastname"] = array_key_exists("Last_Name", $result) ? $result["Last_Name"] : '';
                            $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
                            $object["mobile"] = array_key_exists("Mobile", $result) ? $result["Mobile"] : '';
                            $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
                            $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->contact->insert($object);
                        } else {
                            $object = array();
                            $object["datebirthday"] = array_key_exists("Date_of_Birth", $result) ? $result["Date_of_Birth"] : '';
                            $object["name"] = array_key_exists("First_Name", $result) ? $result["First_Name"] : '';
                            $object["lastname"] = array_key_exists("Last_Name", $result) ? $result["Last_Name"] : '';
                            $object["phone"] = array_key_exists("Phone", $result) ? $result["Phone"] : '';
                            $object["mobile"] = array_key_exists("Mobile", $result) ? $result["Mobile"] : '';
                            $object["email"] = array_key_exists("Email", $result) ? $result["Email"] : '';
                            $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->contact->edit($object);
                        }
                    }
                } else {
                    $validador = 1;
                }
            }
        }
        $message = [
            'type' => "success",
            'response' => "Se actualizo correctamente"
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    /* Deals */

    public function updateDeals_post() {

        $validador = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($validador == 0) {
                $data = $this->zoho->all("Deals", $i);
                if (is_array($data)) {
                    foreach ($data as $result) {
                        $response = $this->opportunity->getbyIdZoho($result["id"]);
                        if (empty($response)) {
                            $object = array();
                            $object["name"] = array_key_exists("Deal_Name", $result) ? $result["Deal_Name"] : '';
                            $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"]["name"] : '';
                            $object["source"] = array_key_exists("Lead_Source", $result) ? $result["Lead_Source"] : '';
                            $object["salary"] = array_key_exists("Salario_Mensual", $result) ? " " . $result["Salario_Mensual"] : '';
                            $object["amount"] = array_key_exists("Amount", $result) ? $result["Amount"] : '';
                            $object["dateclose"] = array_key_exists("Closing_Date", $result) ? $result["Closing_Date"] : '';
                            $object["phase"] = array_key_exists("Stage", $result) ? $result["Stage"] : '';
                            $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->opportunity->insert($object);
                        } else {
                            $object = array();
                            $object["name"] = array_key_exists("Deal_Name", $result) ? $result["Deal_Name"] : '';
                            $object["nameclient"] = array_key_exists("Account_Name", $result) ? $result["Account_Name"]["name"] : '';
                            $object["source"] = array_key_exists("Lead_Source", $result) ? $result["Lead_Source"] : '';
                            $object["salary"] = array_key_exists("Salario_Mensual", $result) ? " " . $result["Salario_Mensual"] : '';
                            $object["amount"] = array_key_exists("Amount", $result) ? $result["Amount"] : '';
                            $object["dateclose"] = array_key_exists("Closing_Date", $result) ? $result["Closing_Date"] : '';
                            $object["phase"] = array_key_exists("Stage", $result) ? $result["Stage"] : '';
                            $object["description"] = array_key_exists("Description", $result) ? $result["Description"] : '';
                            $object["id_zoho"] = $result["id"];
                            $this->opportunity->edit($object);
                        }
                    }
                } else {
                    $validador = 1;
                }
            }
        }
        $message = [
            'type' => "success",
            'response' => "Se actualizo correctamente"
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function updateAfiliate_post() {

        $validador = 0;
        for ($i = 0; $i < $total; $i++) {
            if ($validador == 0) {
                $data = $this->zoho->all("Afiliate", $i);
                if (is_array($data)) {
                    foreach ($data as $result) {
                        $response = $this->afiliate->getbyIdZoho($result["id"]);
                        if (empty($response)) {
                            $object = array();
                            $result = $this->zoho->consultar($result["id"], "Afiliate");
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
                            $object["id_zoho"] = $result["id"];
                            $this->afiliate->insert($object);
                        } else {
                            $object = array();
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
                            $object["id_zoho"] = $result["id"];
                            $this->afiliate->edit($object);
                        }
                    }
                } else {
                    $validador = 1;
                }
            }
        }
        $message = [
            'type' => "success",
            'response' => "Se actualizo correctamente"
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

}
