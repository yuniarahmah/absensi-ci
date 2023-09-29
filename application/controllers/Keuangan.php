<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Keuangan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model( 'm_model' );
        if ( $this->session->userdata( 'loged_in' ) != true && $this->session->userdata( 'role' ) != 'keuangan' ) {
            redirect( base_url().'auth' );
        }

    }

    public function index()
    {
        $this->load->view( 'keuangan/index' );
    }

    public function pembayaran()
    {
        $data[ 'pembayaran' ] = $this->m_model->get_pembayaran();
        $this->load->view( 'keuangan/pembayaran', $data );
    }

    public function ubah_pembayaran( $id )
 {
        $data[ 'pembayaran_id' ] = $this->m_model->get_by_id( 'pembayaran', 'id', $id )->result();
        $data[ 'siswa' ] = $this->m_model->get_data( 'siswa' )->result();
        $this->load->view( 'keuangan/ubah_pembayaran', $data );
    }

    public function aksi_ubah_pembayaran()
    {
        $data = [
            'id_siswa' => $this->input->post( 'id_siswa' ),
            'jenis_pembayaran' => $this->input->post( 'jenis_pembayaran' ),
            'total_pembayaran' => $this->input->post( 'total_pembayaran' ),
        ];
        $eksekusi = $this->m_model->ubah_data
        ( 'pembayaran', $data, [ 'id' => $this->input->post( 'id' ) ] );
        if ( $eksekusi ) {
            $this->session->set_flashdata( 'sukses', 'berhasil' );
            redirect( base_url( 'keuangan/tambah_pemabayaran' ) );
        } else {
            $this->session->set_flashdata( 'sukses', 'berhasil' );
            redirect( base_url( 'keuangan/pembayaran' . $this->input->post( 'id' ) ) );
        }
    }

    public function tambah_pembayaran()
    {
        $data[ 'siswa' ] = $this->m_model->get_data( 'siswa' )->result();
        $this->load->view( 'keuangan/tambah_pembayaran', $data );
    }

    public function aksi_tambah_pembayaran()
    {
        $data = [
            'id_siswa' => $this->input->post( 'nama_siswa' ),
            'jenis_pembayaran' => $this->input->post( 'jenis_pembayaran' ),
            'total_pembayaran' => $this->input->post( 'total_pembayaran' ),
        ];
        $this->m_model->tambah_data( 'pembayaran', $data );
        redirect( base_url( 'keuangan/pembayaran' ) );
    }
}
?>