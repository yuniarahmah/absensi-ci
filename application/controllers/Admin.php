<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('m_model');
	$this->load->helper('my_helper');
    // if($this->session->userdata('loged_in')!=true){
    //     redirect(base_url().'login');
    // }
	if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'role' ) != 'admin' ) {
		redirect( base_url().'auth' );
	}
}

	public function dashboard()
	{
    $data['absensi'] = $this->m_model->get_absensi();
         $this->load->view('admin/dashboard', $data);
	}
	public function admin()
	{
		$this->load->view('admin');
	}
	public function ubah_rekap($id)
	{
		$data['absen'] = $this->m_model->get_by_id('absen', 'id', $id)->result();
         $this->load->view('admin/ubah_rekap', $data);
	}
	
public function aksi_rekap()
  {
    $data = array(
        'id'     =>  $this->input->post('id'),
      'kegiatan' => $this->input->post('kegiatan'),
      'keterangan' => $this->input->post('keterangan'),
      'keterangan' => $this->input->post('keterangan'),
    );

    $eksekusi = $this->m_model->ubah_data
    ('absen', $data, array('id' => $this->input->post('id')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('admin/dashboard'));
    } else {
      $this->session->set_flashdata('error', 'gagal..');
      redirect(base_url('karyawan/ubah_rekap/' . $this->input->post('id')));
    }
  }
	public function rekap_mingguan() {
		$data['absensi'] = $this->m_model->getAbsensiLast7Days();        
		$this->load->view('pages/admin/rekap_mingguan', $data);
	}
  public function export_admin_mingguan()
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
 
         $sheet->setCellValue( 'A1', 'DATA KARYAWAN' );
         $sheet->mergeCells( 'A1:E1' );
         $sheet->getStyle( 'A1' )->getFont()->setBold( true );
 
         // Head
         $sheet->setCellValue( 'A3', 'NO' );
         $sheet->setCellValue( 'B3', 'NAMA' );
         $sheet->setCellValue( 'C3', 'KEGIATAN' );
         $sheet->setCellValue( 'D3', 'DATE' );
         $sheet->setCellValue( 'E3', 'JAM MASUK' );
         $sheet->setCellValue( 'F3', 'JAM PULANG' );
         $sheet->setCellValue( 'G3', 'KETERANGAN IZIN' );
         $sheet->setCellValue( 'H3', 'STATUS' );
 
         $sheet->getStyle( 'A3' )->applyFromArray( $style_col );
         $sheet->getStyle( 'B3' )->applyFromArray( $style_col );
         $sheet->getStyle( 'C3' )->applyFromArray( $style_col );
         $sheet->getStyle( 'D3' )->applyFromArray( $style_col );
         $sheet->getStyle( 'E3' )->applyFromArray( $style_col );
         $sheet->getStyle( 'F3' )->applyFromArray( $style_col );
         $sheet->getStyle( 'G3' )->applyFromArray( $style_col );
         $sheet->getStyle( 'H3' )->applyFromArray( $style_col );
 
         // Get data from database
         $data = $this->m_model->get_karyawan();
 
         $no = 1;
         $numrow = 4;
         foreach ( $data as $dataa ) {
             $sheet->setCellValue( 'A'.$numrow, $no );
             $sheet->setCellValue( 'B'.$numrow, $dataa->id );
             $sheet->setCellValue( 'C'.$numrow, $dataa->username  );
             $sheet->setCellValue( 'D'.$numrow, $dataa->keterangan  );
             $sheet->setCellValue( 'E'.$numrow, $dataa->date  );
             $sheet->setCellValue( 'F'.$numrow, $dataa->jam_masuk  );
             $sheet->setCellValue( 'G'.$numrow, $dataa->jam_pulang );
             $sheet->setCellValue( 'H'.$numrow, $dataa->status );
 
             $sheet->getStyle( 'A'.$numrow )->applyFromArray( $style_row );
             $sheet->getStyle( 'B'.$numrow )->applyFromArray( $style_row );
             $sheet->getStyle( 'C'.$numrow )->applyFromArray( $style_row );
             $sheet->getStyle( 'D'.$numrow )->applyFromArray( $style_row );
             $sheet->getStyle( 'E'.$numrow )->applyFromArray( $style_row );
             $sheet->getStyle( 'E'.$numrow )->applyFromArray( $style_row );
             $sheet->getStyle( 'G'.$numrow )->applyFromArray( $style_row );
             $sheet->getStyle( 'H'.$numrow )->applyFromArray( $style_row );
 
             $no++;
             $numrow++;
         }
 
         $sheet->getColumnDimension( 'A' )->setWidth( 5 );
         $sheet->getColumnDimension( 'B' )->setWidth( 25 );
         $sheet->getColumnDimension( 'C' )->setWidth( 25 );
         $sheet->getColumnDimension( 'D' )->setWidth( 20 );
         $sheet->getColumnDimension( 'E' )->setWidth( 10 );
         $sheet->getColumnDimension( 'F' )->setWidth( 25 );
         $sheet->getColumnDimension( 'G' )->setWidth( 25 );
         $sheet->getColumnDimension( 'H' )->setWidth( 15 );
 
         $sheet->getDefaultRowDimension()->setRowHeight( -1 );
 
         $sheet->getPageSetup()->setOrientation( \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE );
 
         $sheet->setTitle( 'LAPORAN DATA KARYAWAN' );
 
         header( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
         header( 'Content-Disposition: attachment; filename="KARYAWAN.xlsx"' );
         header( 'Cache-Control: max-age=0' );
 
         $writer = new Xlsx( $spreadsheet );
         $writer->save( 'php://output' );
     }
     

}
?>