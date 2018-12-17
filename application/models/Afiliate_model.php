<?php

class Afiliate_model extends CI_Model {

    function insert($data) {
        $this->db->insert('dbo.associated', $data);
        return "00";
    }

    function delete($id) {
        $this->db->where('id_zoho', $id);
        return $this->db->delete('dbo.associated');
    }

    function edit($data) {
        $this->db->where('id_zoho', trim($data['id_zoho']));
        return $this->db->update('dbo.associated', $data);
    }

    function getAll() {
        $sql = "SELECT * FROM dbo.associated";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM dbo.associated where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }
}

    function getbyValue($value) {
        $sql = "SELECT * FROM dbo.possible_client where associatesname like '%$value%' or secondname like '%$value%' or lastname like '%$value%' or mobilephone like '%$value%'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }
