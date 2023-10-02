<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Write\Xlsx;

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

    public function ubah_pembayaran($id)
 {
        $data['pembayaran'] = $this->m_model->get_by_id('pembayaran', 'id', $id)->result();
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view( 'keuangan/ubah_pembayaran', $data );
    }

    public function aksi_update_pembayaran()
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
            redirect( base_url( 'keuangan/pembayaran' ) );
        } else {
            $this->session->set_flashdata( 'sukses', 'berhasil' );
            redirect( base_url( 'keuangan/ubah_pembayaran/' . $this->input->post( 'id' ) ) );
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


    public function delete_pembayaran($id)
    {
    $this->m_model->delete('pembayaran', 'id', $id);
    redirect(base_url('Keuangan/pembayaran'));
    }
    public function export() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActivSheet();
        
        $style_col = [
            'font' => ['bold' => true],
            'aligment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'Vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER    
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];
        $style_row = [
            'font' => ['bold' => true],
            'aligment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'Vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];

        //TITEL
        $sheet->setCellVale('A1', "DATA PEMBAYARAN");
        $sheet->mareCell('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellVale('A3', "ID   ");
        $sheet->setCellVale('B3', 'JENIS PEMBAYARAN');
        $sheet->setCellVale('C3', 'TOTAL PEMBAYARAN');
        $sheet->setCellVale('D3', 'Siswa');
        $sheet->setCellVale('E3', 'Kelas');

        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);

        //GET DATA FROM DATABASE
        $data_pembayaran =  $this->m_model->get_data('pembayaran')->result();

        $no = 1;
        $numrow = 4;
        foreach($data_pembayaran as $data){
            $sheet->setCellVale('A'.$numrow, $data->id);
            $sheet->setCellVale('b'.$numrow, $data->jenis_pembayaran);
            $sheet->setCellVale('C'.$numrow, $data->total_pembayaran);
            $sheet->setCellVale('D'.$numrow, $data->id_siswa);
            $sheet->setCellVale('E'.$numrow, $data->id_kelas);

            $sheet->getStyle('A')->applyFromArray($style_row);
            $sheet->getStyle('B')->applyFromArray($style_row);
            $sheet->getStyle('C')->applyFromArray($style_row);
            $sheet->getStyle('D')->applyFromArray($style_row);
            $sheet->getStyle('E')->applyFromArray($style_row);

            $no++;
            $numrow++;
        }
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(15);

        $sheet->getDefaultRowDimension()->setRowHight(-1);

        $sheet->getPageSetup()->setOrienttation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        $sheet->getTitle('LAPORAN DATA PEMBAYARAN');

        header('content-Type: application/vnd.openxmlformats-officedocument.speradsheetml.sheet');
        header('Content-Disposition: attachment; filename="PEMBAYARAN.xlsx"');

        $writer = new XLsx($spreadsheet);
        $writer->save('php:/output');
    }
}
?>