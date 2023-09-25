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
    //untuk mengubah data didalam from dan juga sql
    public function ubah_data($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

        //untuk menghubungkan data ke sql 
    function get_data_guru( $table ) {
        return $this->projek1->get( $table );
    }

    function getwere( $table, $data )
    {
        return $this->projek1->get_where( $table, $data );

    }
//untuk menghapusdata guru didalam sql dan tampilan 
    public function hapus( $table, $field, $id )
     {
        $data = $this->projek1->delete( $table, array( $field => $id ) );
        return $data;
    }
    //untuk menambah data guru didalam sql dan tampilan
    public function tambah_guru( $table, $data )
     {
        $this->projek1->get( $table, $data );
        return $this->projek1->insert_id( $table );
    }
    //untuk menghubungkan semua data guru ditampilan ke sql
    public function get_by_id_guru($tabel, $id_column, $id)
    {
        $data=$this->projek1->where($id_column, $id)->get($tabel);
        return $data;
    }

        //untuk menghubungkan data kelas ke sql kelas
    function get_data_kelas( $table ) {
        return $this->projek1->get( $table );
    }
//fungsinya sama dengan getwhere di baris atas
    function getwre( $table, $data )
    {
        return $this->projek1->get_where( $table, $data );

    }
//untuk menghapus data kelas didalam tampilan dan didalam sql
    public function buang( $table, $field, $id )
     {
        $data = $this->projek1->delete( $table, array( $field => $id ) );
        return $data;
    }
    // untuk menambahkan data kelas di tampilan juga sql
    public function tambah_kelas( $table, $data )
     {
        $this->projek1->get( $table, $data );
        return $this->projek1->insert_id( $table );
    }
    //fungsinya sama seperti getbyid guru
    public function get_by_id_kelas($tabel, $id_column, $id)
    {
        $data=$this->projek1->where($id_column, $id)->get($tabel);
        return $data;
    }
}
?>

