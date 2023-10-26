<?php
function tampil_karyawan_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('user');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_depan;
        return $stmt;
    }
    // function tampil_full_karyawan_byid($id)
    // {
    //     $ci = &get_instance();
    //     $ci->load->database();
    //     $result = $ci->db->where('id', $id)->get('user');
    //     foreach ($result->result() as $c) {
    //         $stmt = $c->username;
    //         return $stmt;
    //     }
    // }
//     function tampil_id_karyawan($id)
// {
//     $ci = &get_instance();
//     $ci->load->database();
//     $result = $ci->db->select('nama_depan, nama_belakang')
//                     ->where('id', $id)
//                     ->get('user');
    
//     if ($result->num_rows() > 0) {
//         $row = $result->row();
//         $nama_depan = $row->nama_depan;
//         $nama_belakang = $row->nama_belakang;
//         return $nama_depan . ' ' . $nama_belakang;
//     } else {
//         return 'Karyawan Tidak Ditemukan'; // Tambahkan penanganan jika ID tidak ditemukan
//     }
// }
function tampil_id_karyawan($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('user');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_depan.' '.$c->nama_belakang;
        return $stmt;
    }
}
}

?>  