<?php
function tampil_full_kelas_byid($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_kelas', $id)->get('kelas');
    foreach ($result->result() as $c) {
        $stmt = $c->tingkat_kelas . ' ' . $c->jurusan_kelas;
        return $stmt;
    }
}
function tampil_full_mapel($id)
{
    $ci = & get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('mapel');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_mapel;
        return $stmt;
    }
}