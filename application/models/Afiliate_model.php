<?php

class Afiliate_model extends CI_Model {

    function insert($data) {
        $this->db->insert('dbo.affiliate', $data);
        return "00";
    }

    function delete($id) {
        $this->db->where('id_zoho', $id);
        return $this->db->delete('dbo.affiliate');
    }

    function edit($data) {
        $this->db->where('id_zoho', trim($data['id_zoho']));
        return $this->db->update('dbo.affiliate', $data);
    }

    function getAll() {
        $sql = "SELECT * FROM dbo.affiliate";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM dbo.affiliate where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyIdZoho($id) {
        $sql = "SELECT * FROM dbo.affiliate where id_zoho = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyValue($value) {
        $sql = "SELECT * FROM dbo.affiliate where firstname like '%$value%' or secondname like '%$value%' or surname like '%$value%' or secondsurname like '%$value%'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

}
