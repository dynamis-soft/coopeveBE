<?php

Class User_model extends CI_Model {

    function login($user, $pass) {
        $sql = "SELECT * FROM [coopeve].[dbo].[user] where username = '" . $user . "' and password = '" . $pass . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return "00";
        }
        return "99";
    }

}

?>