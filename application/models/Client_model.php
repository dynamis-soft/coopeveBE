<?php

Class Client_model extends CI_Model {

    function insert($data) {
        $object = array(
            'datebirthday' => $data['datebirthday'],
            'name' => trim($data['name']),
            'phone' => trim($data['phone']),
            'mobil' => trim($data['mobil']),
            'email' => trim($data['email']),
            'company' => trim($data['company']),
            'ocupation' => trim($data['ocupation']),
            'years_work' => trim($data['years_work']),
            'neto' => trim($data['neto']),
            'bruto' => trim($data['bruto']),
            'associated' => trim($data['associated']),
            'date' => trim($data['date']),
            'client' => trim($data['client']),
            'office' => trim($data['office']),
            'id_zoho' => trim($data['id_zoho'])
        );
        $this->db->insert('dbo.possible_client', $object);
        return "00";
    }

    function delete($id) {
        $this->db->where('id_zoho', $id);
        return $this->db->delete('dbo.possible_client');
    }

    function edit($data) {
        $this->db->where('id_zoho', trim($data['id_zoho']));
        return $this->db->update('dbo.possible_client', $data);
    }

    function getAll() {
        $sql = "SELECT * FROM dbo.possible_client";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM dbo.possible_client where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }
}

?>