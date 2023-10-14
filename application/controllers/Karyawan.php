<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Karyawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( 'm_model' );
        $this->load->helper( 'my_helper' );
        // if ( $this->session->userdata( 'loged_in' ) != true ) {
        //     redirect( base_url().'login' );
        // }
        if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'role' ) != 'karyawan' ) {
        	redirect( base_url().'auth' );
        }
    }

    public function menu_absen()
 {
        $this->load->view( 'karyawan/manu_absen' );
    }

    public function menu_izin()
 {
        $this->load->view( 'karyawan/menu_izin' );
    }

    public function history()
 {
        $data['karyawan'] = $this->m_model->get_data('absen')->result();
        $this->load->view( 'karyawan/history', $data );
    }

    public function profil_karyawan()
 {
        $data[ 'user' ] = $this->m_model->get_by_id( 'user', 'id', $this->session->userdata( 'id' ) )->result();
        $this->load->view( 'karyawan/profil_karyawan' );
    }

    public function tambah_karyawan()
 {
        $this->load->view( 'karyawan/history', $data );
    }
public function ubah_kegiatan($id)
	{
		$data['absen'] = $this->m_model->get_by_id('absen', 'id', $id)->result();
         $this->load->view('karyawan/ubah_karyawan', $data);
	}
	
public function aksi_ubah_karyawan()
  {
    $data = array(
        'id'     =>  $this->input->post('id'),
      'kegiatan' => $this->input->post('kegiatan'),
      'keterangan' => $this->input->post('keterangan'),
    );

    $eksekusi = $this->m_model->ubah_data
    ('absen', $data, array('id' => $this->input->post('id')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('karyawan/history'));
    } else {
      $this->session->set_flashdata('error', 'gagal..');
      redirect(base_url('karyawan/ubah_kegiatan/' . $this->input->post('id')));
    }
  }
  
  public function pulang($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $absensi = $this->db->get_where('absen', array('id' => $id))->row();
    if ($absensi) {
        $data = [
            'jam_pulang' => date('H:I:S'),
            'status' => 'done'
        ];
        $this->db->where('id',$id);
        $this->db->update('absen',$data);
        redirect(base_url('karyawan/history '));
    } else {
        echo 'data absensi tidak ditemukan';
    }
    
  }
  public function rekap_mingguan() {
    $data['absensi'] = $this->m_model->getAbsensiLast7Days();        
    $this->load->view('pages/admin/rekap_mingguan', $data);
}
    public function hapus_karyawan( $id ) {
        $this->m_model->delete( 'absen', 'id', $id );
        redirect( base_url( 'karyawan/history' ) );
    }   
}
?>