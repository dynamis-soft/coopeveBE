<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_controller.php';

class Admin extends REST_Controller {

    function __construct() {
        parent::__construct();
    }

    public function login_post() {
        $data = $this->post();
        $response = $this->user->login($data['username'], $data['password']);
        $message = "Error en usuario o clave.";
        if ($response == "00") {
            $message = "Login exitoso";
        }
        $message = [
            'type' => "success",
            'message' => $message,
            'status' => $response
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
}
