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
        return $this->db->insert("user", $data);
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

    public function ubah_data( $tabel, $data, $where )
 {
        $data = $this->db->update( $tabel, $data, $where );
        return $this->db->affected_rows();
    }

    public function get_by_id( $tabel, $id_column, $id )
 {
        $data = $this->db->where( $id_column, $id )->get( $tabel );
        return $data;
    }

    public function get_foto_by_id( $id_siswa )
 {
        $this->db->select( 'foto' );
        $this->db->from( 'siswa' );
        $this->db->where( 'id_siswa', $id_siswa );
        $query = $this->db->get();

        if ( $query->num_rows() > 0 ) {
            $result = $query->row();
            return $result->foto;
        } else {
            return false;
        }
    }
    function get_karyawan() {
        $this->db->select( 'absensi.*, user.id' );
        $this->db->from( 'absensi' );
        $this->db->join( 'absensi', 'user.id = user.id', 'left' );
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_karyawan($nama_depan){
        $this->db->select('id');
        $this->db->from('absen');
        $this->db->where('nama_depan', $nama_depan);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $result = $query->row();
            return $result->id;
        } else{
            return false;
        }
}
}
?>

