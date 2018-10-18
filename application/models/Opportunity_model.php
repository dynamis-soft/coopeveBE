<?php

Class Opportunity_model extends CI_Model {

    function insert($data) {
        $this->db->insert('dbo.opportunity', $data);
        return "00";
    }

    function delete($id) {
        $this->db->where('id_zoho', $id);
        return $this->db->delete('dbo.opportunity');
    }

    function edit($data) {
        $this->db->where('id_zoho', trim($data['id_zoho']));
        return $this->db->update('dbo.opportunity', $data);
    }

    function getAll() {
        $sql = "SELECT * FROM dbo.opportunity";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM dbo.opportunity where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }
}

?>
