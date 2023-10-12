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
        // if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'roll' ) != 'admin' ) {
        // 	redirect( base_url().'auth' );
        // }
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
    public function export_siswa()
    {
           $spreadsheet = new Spreadsheet();
           $sheet = $spreadsheet->getActiveSheet();
   
           $style_col = [
               'font' => [ 'bold' => true ],
               'alignment' => [
                   'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                   'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
               ],
               'borders' => [
                   'top' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                   'right' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                   'bottom' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                   'left' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ]
               ]
           ];
   
           $style_row = [
               'alignment' => [
                   'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
               ],
               'borders' => [
                   'top' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                   'right' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                   'bottom' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ],
                   'left' => [ 'borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ]
               ]
           ];
   
           $sheet->setCellValue( 'A1', 'DATA SISWA' );
           $sheet->mergeCells( 'A1:E1' );
           $sheet->getStyle( 'A1' )->getFont()->setBold( true );
   
           // Head
           $sheet->setCellValue( 'A3', 'NO' );
           $sheet->setCellValue( 'B3', 'NAMA SISWA' );
           $sheet->setCellValue( 'C3', 'NISN' );
           $sheet->setCellValue( 'D3', 'GENDER' );
           $sheet->setCellValue( 'E3', 'KELAS' );
   
           $sheet->getStyle( 'A3' )->applyFromArray( $style_col );
           $sheet->getStyle( 'B3' )->applyFromArray( $style_col );
           $sheet->getStyle( 'C3' )->applyFromArray( $style_col );
           $sheet->getStyle( 'D3' )->applyFromArray( $style_col );
           $sheet->getStyle( 'E3' )->applyFromArray( $style_col );
   
           // Get data from database
           $data = $this->m_model->get_data( 'siswa' )->result();
   
           $no = 1;
           $numrow = 4;
           foreach ( $data as $dataa ) {
               $sheet->setCellValue( 'A'.$numrow, $id_siswa );
               $sheet->setCellValue( 'B'.$numrow, $dataa->nama_siswa );
               $sheet->setCellValue( 'C'.$numrow, $dataa->nisn );
               $sheet->setCellValue( 'D'.$numrow, $dataa->gender );
               $sheet->setCellValue( 'E'.$numrow, tampil_full_kelas_byid( $dataa->id_kelas ) );
   
               $sheet->getStyle( 'A'.$numrow )->applyFromArray( $style_row );
               $sheet->getStyle( 'B'.$numrow )->applyFromArray( $style_row );
               $sheet->getStyle( 'C'.$numrow )->applyFromArray( $style_row );
               $sheet->getStyle( 'D'.$numrow )->applyFromArray( $style_row );
               $sheet->getStyle( 'E'.$numrow )->applyFromArray( $style_row );
   
               $no++;
               $numrow++;
           }
   
           $sheet->getColumnDimension( 'A' )->setWidth( 5 );
           $sheet->getColumnDimension( 'B' )->setWidth( 25 );
           $sheet->getColumnDimension( 'C' )->setWidth( 25 );
           $sheet->getColumnDimension( 'D' )->setWidth( 20 );
           $sheet->getColumnDimension( 'E' )->setWidth( 30 );
   
           $sheet->getDefaultRowDimension()->setRowHeight( -1 );
   
           $sheet->getPageSetup()->setOrientation( \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE );
   
           $sheet->setTitle( 'LAPORAN DATA SISWA' );
   
           header( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
           header( 'Content-Disposition: attachment; filename="siswa.xlsx"' );
           header( 'Cache-Control: max-age=0' );
   
           $writer = new Xlsx( $spreadsheet );
           $writer->save( 'php://output' );
       }
   
}
?>