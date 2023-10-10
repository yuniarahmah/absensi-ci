<?php

class M_model extends CI_Model {
    function get_data( $table ) {
        return $this->db->get( $table );
    }

    function getwhere( $table, $data )
 {
        return $this->db->get_where( $table, $data );

    }

    public function delete( $table, $field, $id ) {
        $data = $this->db->delete( $table, array( $field => $id ) );
        return $data;
    }

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
    function register($data){
        return $this->db->insert("user", $data);
    }
    public function register_karyawan($email, $username,$nama_depan, $nama_belakang,$role, $password)
    {
        $data = array(
            'email' => $email,
            'username' => $username,
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'role' => $role,
            'password' => $password
        );

        // Simpan data ke dalam tabel pengguna (ganti 'users' sesuai dengan nama tabel Anda)
        $this->db->insert('user', $data);
    }
}
?>

