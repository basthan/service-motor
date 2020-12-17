<?php
class m_user extends CI_Model{
       
    function cekUser($username,$password){
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        return $this->db->get("user");
    }
}

?>