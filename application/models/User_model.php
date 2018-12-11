<?php

Class User_model extends CI_Model {

    function login($user, $pass) {
        $sql = "SELECT * FROM [coopeve].[dbo].[user] where username = '" . $user . "' and password = '" . $pass . "' and status='1'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return "00";
        }
        return "99";
    }

    function edit($data) {
        $this->db->where('username', trim($data['username']));
        return $this->db->update('dbo.user', $data);
    }

    function insert($data) {
        $this->db->insert('dbo.user', $data);
        return "00";
    }

    function getAll() {
        $sql = "SELECT * FROM [coopeve].[dbo].[user]";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

    function getbyId($id) {
        $sql = "SELECT * FROM [coopeve].[dbo].[user] where id = '$id'";
        $query = $this->db->query($sql);
        $records = $query->result();
        return $records;
    }

}

?>