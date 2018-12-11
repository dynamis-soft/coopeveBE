<?php

Class Clients_model extends CI_Model {

    function insert($data) {
        $this->db->insert('dbo.client', $data);
        return "00";
    }

    function delete($id) {
        $this->db->where('id_zoho', $id);
        return $this->db->delete('dbo.client');
    }

    function edit($data) {
        $this->db->where('id_zoho', trim($data['id_zoho']));
        return $this->db->update('dbo.client', $data);
    }

    function getAll() {
        $sql = "SELECT * FROM dbo.client";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM dbo.client where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyIdZoho($id) {
        $sql = "SELECT * FROM dbo.client where id_zoho = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyValue($value) {
        $sql = "SELECT * FROM dbo.client where nameclient like '%$value%' or email like '%$value%' or phone like '%$value%'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

}

?>