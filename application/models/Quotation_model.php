<?php

Class Quotation_model extends CI_Model {

    function insert($data) {
        $this->db->insert('dbo.quotation', $data);
        return "00";
    }

    function delete($id) {
        $this->db->where('id_zoho', $id);
        return $this->db->delete('dbo.quotation');
    }

    function edit($data) {
        $this->db->where('id_zoho', trim($data['id_zoho']));
        return $this->db->update('dbo.quotation', $data);
    }

    function getAll() {
        $sql = "SELECT * FROM dbo.quotation";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM dbo.quotation where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }
    
    
    function getbyValue($value) {
        $sql = "SELECT * FROM dbo.possible_client where listingname like '%$value%' or name like '%$value%' or cellphone like '%$value%' or identificationcard like '%$value%'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }
}

?>
