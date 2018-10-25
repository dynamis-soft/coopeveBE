<?php

Class Client_model extends CI_Model {

    function insert($data) {
        $this->db->insert('dbo.possible_client', $data);
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

    function getbyValue($value) {
        $sql = "SELECT * FROM dbo.possible_client where nameclient like '%$value%' or lastname like '%$value%' or phone like '%$value%' or email like '%$value%' or mobile like '%$value%' ";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

}

?>