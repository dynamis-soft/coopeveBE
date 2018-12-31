<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');
class Zoho {

    function consultar($id, $option) {
        $curl = curl_init();
        $url = URL . $option . "?id=" . $id;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: " . TOKEN,
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded",
                "Postman-Token: bf8dc171-5bb7-fa54-7416-56c5cda9bf5c"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "CURL Error #:" . $err;
        } else {
            $responseT = json_decode($response, true);
            $object = null;
            foreach ($responseT["data"] as $item) {
                if ($item["id"] == $id) {
                    $object = $item;
                }
            }
            return $object;
        }
    }

    function all($option, $page) {
        try {
            $curl = curl_init();
            $url = URL . $option . "?page=" . $page;
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: " . TOKEN,
                    "Cache-Control: no-cache",
                    "Content-Type: application/x-www-form-urlencoded",
                    "Postman-Token: bf8dc171-5bb7-fa54-7416-56c5cda9bf5c"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                return "1";
            } else {
                $responseT = json_decode($response, true);
                return $responseT["data"];
            }
        } catch (Exception $ex) {
            return "1";
        }
    }

}
