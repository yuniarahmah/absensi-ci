<?php

class M_model extends CI_Model {
    function get_data( $table ) {
        return $this->db->get( $table );
    }
//untuk menghubungkan data ke sql
    function getwhere( $table, $data )
    {
        return $this->db->get_where( $table, $data );

    }
//untuk menghubungkan register ke sql
    function register($data){
        return $this->db->insert("admin", $data);
    }
    //untuk menghapus data di dalam from juga sql
    public function delete( $table, $field, $id )
     {
        $data = $this->db->delete( $table, array( $field => $id ) );
        return $data;
    }
    //untuk menambahkan data di dalam from dan sql
    public function tambah_data( $table, $data )
     {
        $this->db->insert( $table, $data );
        return $this->db->insert_id( $table );
    }
    public function get_by_id($tabel, $id_column, $id)
    {
        $data=$this->db->where($id_column, $id)->get($tabel);
        return $data;
    }
}