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
         $this->load->view('admin/dashboard', $data);
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
		$data['kelas'] = $this->m_model->get_data('kelas', $id)->result();
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
      redirect(base_url('admin/siswa/ubah_detail_siswa/' . $this->input->post('id_siswa')));
    }
  }

// untuk menghubungkan guru dengan sql
  public function guru()
	{
		$data['guru'] = $this->m_model->get_data('guru')->result();
		$this->load->view('admin/guru', $data);
	}
	public function tambah_guru()
	{
		$data['guru'] = $this->m_model->get_data('guru')->result();
		$this->load->view('admin/tambah_guru', $data);
	}
	public function aksi_tambah_guru()
	{
		$data = [
			'nama_guru' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'gender' => $this->input->post('gender'),
			'mapel' => $this->input->post('mapel'),
		];
		 $this->m_model->tambah_data('guru', $data);
		 redirect(base_url('admin/guru'));
	}
	public function hapus_guru($id){    
		$this->m_model->delete('guru', 'id_guru', $id);
		redirect(base_url('admin/guru'));
	}
	public function ubah_guru($id)
  {
    $data['title'] = 'Ubah Guru';

    $data['guru'] = $this->m_model->get_by_id('guru', 'id_guru', $id)->result();

    $this->load->view('admin/ubah_guru', $data);
  }
	public function aksi_ubah_guru()
  {
    $data = array(
      'nama_guru' => $this->input->post('nama'),
      'nik' => $this->input->post('nik'),
      'gender' => $this->input->post('gender'),
      'mapel' => $this->input->post('mapel'),
    );

    $eksekusi = $this->m_model->ubah_data
    ('guru', $data, array('id_guru' => $this->input->post('id_guru')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('admin/guru'));
    } else {
      $this->session->set_flashdata('error', 'gagal..');
      redirect(base_url('admin/guru/ubah_guru/' . $this->input->post('id_guru')));
    }
  }

  public function kelas()
  {
	  $data['kelas'] = $this->m_model->get_data('kelas')->result();
	  $this->load->view('admin/kelas', $data);
  }

  public function detail_guru()
  {
	  $data['guru'] = $this->m_model->get_data('guru')->result();
	  $data['mapel'] = $this->m_model->get_data('mapel')->result();
	  $this->load->view('admin/detail_guru', $data);
  }

  public function detail_siswa()
  {
    $data['siswa'] = $this->m_model->get_data('siswa')->result();
    $data['kelas'] = $this->m_model->get_data('kelas')->result();
	  $this->load->view('admin/detail_siswa', $data);
  }

//update detail guru
  public function update_guru($id)
  {
    $data['title'] = 'Update Guru';

	  $data['mapel'] = $this->m_model->get_data('mapel')->result();
    $data['guru'] = $this->m_model->get_by_id('guru', 'id_guru', $id)->result();
    $this->load->view('admin/ubah_detail_guru', $data);
  }
  public function aksi_update_guru()
  {
    $data = array(
      'nama_guru' => $this->input->post('nama_guru'),
      'nik' => $this->input->post('nik'),
      'gender' => $this->input->post('gender'),
      'id_mapel' => $this->input->post('mapel'),
    );
    $eksekusi = $this->m_model->ubah_data(
      'guru',
      $data,
      array('id_guru' => $this->input->post('id_guru'))

    );
    if ($eksekusi) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Berhasil Diubah
    </div>');
} else {
		redirect(base_url('admin/detail_guru'));

      redirect(base_url('admin/ubah_detail_guru/' . $this->input->post('id_guru')));
    }

    $this->load->view('admin/detail_guru');
  }

  public function hapus_detail_guru($id)
  {
	$this->m_model->delete('guru', 'id_guru', $id);
	redirect(base_url('admin/detail_guru'));
  }
  

//update detail siswa
  public function update_siswa($id)
  {
    $data['title'] = 'Update siswa';

    $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
    $data['kelas'] = $this->m_model->get_by_id('kelas', 'id_kelas', $id)->result();
    $this->load->view('admin/ubah_detail_siswa', $data);
  }
  public function aksi_update_siswa()
  {
    $data = array(
      'nama_siswa' => $this->input->post('nama_siswa'),
      'nisn' => $this->input->post('nisn'),
      'gender' => $this->input->post('gender'),
      'id_kelas' => $this->input->post('id_kelas'),
    );
    $eksekusi = $this->m_model->ubah_data(
      'siswa',
      $data,
      array('id_siswa' => $this->input->post('id_siswa'))

    );
    if ($eksekusi) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Berhasil Diubah
    </div>');
    } else {
		redirect(base_url('admin/detail_siswa'));

      redirect(base_url('admin/ubah_detail_siswa/' . $this->input->post('id_siswa')));
    }

    $this->load->view('admin/detail_siswa');
  }

  public function tambah_detail_siswa()
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
  public function hapus_detail_siswa($id)
  {
  $this->m_model->delete('siswa', 'id_siswa', $id);
  redirect(base_url('admin/detail_siswa'));
  }

  //update kelas
  public function update_kelas($id)
  {
    $data['title'] = 'Update kelas';

    $data['kelas'] = $this->m_model->get_by_id('kelas', 'id_kelas', $id)->result();
    $this->load->view('admin/ubah_detail_kelas', $data);
  }
  public function aksi_update_kelas()
  {
    $data = array(
      'id_kelas' => $this->input->post('id_kelas'),
      'tingkat_kelas' => $this->input->post('tingkat_kelas'),
      'jurusan_kelas' => $this->input->post('jurusan_kelas'),
    );
    $eksekusi = $this->m_model->ubah_data(
      'kelas',
      $data,
      array('id_kelas' => $this->input->post('id_kelas'))

    );
    if ($eksekusi) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Berhasil Diubah
    </div>');
} else {
		redirect(base_url('admin/detail_kelas'));

      redirect(base_url('admin/ubah_detail_kelas/' . $this->input->post('id_kelas')));
    }

    $this->load->view('admin/detail_kelas');
  }

  public function tambah_detail_kelas()
	{
    $data = [
      'id_kelas' => $this->input->post('id_kelas'),
			'tingkat_kelas' => $this->input->post('tingkat_kelas'),
			'jurusan_kelas' => $this->input->post('jurusan_kelas'),
		];
    $this->m_model->tambah_data('kelas', $data);
    redirect(base_url('admin/kelas'));
	}
  public function tambah_kelas()
	{
    $data['kelas'] = $this->m_model->get_data('kelas')->result();
    $this->load->view('admin/tambah_kelas');
	}
  public function aksi_tambah_kelas()
	{
    $data = [
      'id_kelas' => $this->input->post('id_kelas'),
			'tingkat_kelas' => $this->input->post('tingkat_kelas'),
			'jurusan_kelas' => $this->input->post('jurusan_kelas'),
		];
    $this->m_model->tambah_data('kelas', $data);
    redirect(base_url('admin/kelas'));
	}
  public function hapus_kelas($id)
  {
  $this->m_model->delete('kelas', 'id_kelas', $id);
  redirect(base_url('admin/kelas'));
  }
//from untuk logout
  function logout_dashboard(){
    $this->session->sess_destroy();
    redirect(base_url('admin/dashboard/'));
  }

}
?>