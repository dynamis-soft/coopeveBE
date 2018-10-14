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

    function getAll() {
        $sql = "SELECT * FROM dbo.contact";
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
}

?>