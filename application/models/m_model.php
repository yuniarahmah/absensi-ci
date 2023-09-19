<?php

class M_model extends CI_Model {
    function get_data( $table ) {
        return $this->db->get( $table );
    }

    function getwhere( $table, $data )
    {
        return $this->db->get_where( $table, $data );

    }

    function register($data){
        return $this->db->insert("admin", $data);
    }
    public function delete( $table, $field, $id )
     {
        $data = $this->db->delete( $table, array( $field => $id ) );
        return $data;
    }
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
    public function ubah_data($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }


    function get_data_guru( $table ) {
        return $this->projek1->get( $table );
    }

    function getwere( $table, $data )
    {
        return $this->projek1->get_where( $table, $data );

    }

    public function hapus( $table, $field, $id )
     {
        $data = $this->projek1->delete( $table, array( $field => $id ) );
        return $data;
    }
    public function tambah_guru( $table, $data )
     {
        $this->projek1->insert( $table, $data );
        return $this->projek1->insert_id( $table );
    }
    public function get_by_id_guru($tabel, $id_column, $id)
    {
        $data=$this->projek1->where($id_column, $id)->get($tabel);
        return $data;
    }
    public function ubah_guru($tabel, $data, $where)
    {
        $data=$this->projek1->update($tabel, $data, $where);
        return $this->projek1->affected_rows();
    }
}
?>

