<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_model');
	$this->load->helper('my_helper');
    if($this->session->userdata('loged_in')!=true){
        redirect(base_url().'login');
    }
}

	public function index()
	{
		$data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
		$data['kelas'] = $this->m_model->get_data('kelas')->num_rows();
		$data['guru'] = $this->m_model->get_data('guru')->num_rows();
         $this->load->view('admin/indek', $data);
	}
	public function siswa()
	{
		$data['siswa'] = $this->m_model->get_data('siswa')->result();
		$this->load->view('admin/siswa', $data);
	}
	public function tambah_siswa()
	{
		$data['kelas'] = $this->m_model->get_data('kelas')->result();
		$this->load->view('admin/tambah_siswa', $data);
	}
	
	public function aksi_tambah_siswa()
	{
		$data = [
			'nama_siswa' => $this->input->post('nama'),
			'nisn' => $this->input->post('nisn'),
			'gender' => $this->input->post('gender'),
			'id_kelas' => $this->input->post('id_kelas'),
		];
		 $this->m_model->tambah_data('siswa', $data);
		 redirect(base_url('admin/siswa'));
	}
	public function hapus_siswa($id){
		$this->m_model->delete('siswa', 'id_siswa', $id);
		redirect(base_url('admin/siswa'));
	}
	public function ubah_siswa($id)
	{
		$data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
		$data['kelas'] = $this->m_model->get_data('kelas')->result();
         $this->load->view('admin/ubah_siswa', $data);
	}
	
	public function aksi_ubah_siswa()
  {
    $data = array(
      'nama_siswa' => $this->input->post('nama'),
      'nisn' => $this->input->post('nisn'),
      'gender' => $this->input->post('gender'),
      'id_kelas' => $this->input->post('kelas'),
    );

    $eksekusi = $this->m_model->ubah_data
    ('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('admin/siswa'));
    } else {
      $this->session->set_flashdata('error', 'gagal..');
      redirect(base_url('admin/siswa/update_siswa/' . $this->input->post('id_siswa')));
    }
  }


  public function guru()
	{
		$data['guru'] = $this->m_model->get_data('guru')->result();
		$this->load->view('admin/guru', $data);
	}
	
	public function aksi_tambah_guru()
	{
		$data = [
			'nama_guru' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'gender' => $this->input->post('gender'),
			'mapel' => $this->input->post('mapel'),
		];
		 $this->m_model->tambah_guru('guru', $data);
		 redirect(base_url('admin/guru'));
	}
	public function hapus_guru($id){
		$this->m_model->delete('guru', 'id_guru', $id);
		redirect(base_url('admin/guru'));
	}
	public function aksi_ubah_guru()
  {
    $data = array(
      'nama_guru' => $this->input->post('nama'),
      'nik' => $this->input->post('nik'),
      'gender' => $this->input->post('gender'),
      'mapel' => $this->input->post('mapel'),
    );

    $eksekusi = $this->m_model->ubah_guru
    ('guru', $data, array('id_guru' => $this->input->post('id_guru')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('admin/guru'));
    } else {
      $this->session->set_flashdata('error', 'gagal..');
      redirect(base_url('admin/guru/ubah_guru/' . $this->input->post('id_guru')));
    }
  }
  
}
?>