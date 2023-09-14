<?php

class M_model extends CI_Model{
 function get_data($table){
    return $this->db->get_data($table);
   }
  function getwhere($table, $data)
   {
       return $this->db->get_where($table, $data);
   
   }
}
?>
