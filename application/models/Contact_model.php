<?php

Class Contact_model extends CI_Model {

    function insert($data) {
        $this->db->insert('dbo.contact', $data);
        return "00";
    }

    function delete($id) {
        $this->db->where('id_zoho', $id);
        return $this->db->delete('dbo.contact');
    }

    function edit($data) {
        $this->db->where('id_zoho', trim($data['id_zoho']));
        return $this->db->update('dbo.contact', $data);
    }

    function getAll($from,$to) {
        $sql = "SELECT * FROM dbo.contact WHERE id >= $to AND id <= $from";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM dbo.contact where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyIdZoho($id) {
        $sql = "SELECT * FROM dbo.contact where id_zoho = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyValue($value) {
        $sql = "SELECT * FROM dbo.contact where nameclient like '%$value%' or name like '%$value%' or phone like '%$value%' or email like '%$value%' or lastname like '%$value%'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }
    function getCountAll() {
        $sql = "SELECT count(*) cantidad FROM dbo.contact";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

}

?>