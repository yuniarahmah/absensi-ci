<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;


class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( 'm_model' );
        $this->load->helper( 'my_helper' );
        $this->load->library( 'upload' );
        if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'role' ) != 'admin' ) {
            redirect( base_url().'auth/login' );
        }
    }

    public function dashboard()
 {
    $data['absensi'] = $this->m_model->get_data('user')->result();
        $this->load->view( 'admin/dashboard', $data );
    }

    public function index()
 {
        $this->load->view( 'admin/index' );
    }

    public function rekap_m() {
        $data[ 'absensi_mingguan' ] = $this->m_model->getAbsensiLast7Days();

        $this->load->view( 'admin/rekap_m', $data );
    }

    public function rekap_b()
 {
        $bulan = $this->input->post( 'bulan' );
        $data[ 'absensi_bulan' ] = $this->m_model->getbulanan( $bulan );
        $this->load->view( 'admin/rekap_b', $data );
    }

    public function rekap_h()
 {
        $hari_ini = date( 'Y-m-d' );
        $data[ 'absensi_harian' ] = $this->m_model->get_harian( $hari_ini );
        $this->load->view( 'admin/rekap_h', $data );
    }

    public function ubah_rekap( $id )
 {
        $data[ 'absen' ] = $this->m_model->get_by_id( 'absen', 'id', $id )->result();
        $this->load->view( 'admin/ubah_rekap', $data );
    }

    public function aksi_rekap()
 {
        $data = array(
            'id'     =>  $this->input->post( 'id' ),
            'kegiatan' => $this->input->post( 'kegiatan' ),
            'keterangan' => $this->input->post( 'keterangan' ),
        );

        $eksekusi = $this->m_model->ubah_data
        ( 'absen', $data, array( 'id' => $this->input->post( 'id' ) ) );
        if ( $eksekusi ) {
            $this->session->set_flashdata( 'sukses', 'berhasil' );
            redirect( base_url( 'admin/dashboard' ) );
        } else {
            $this->session->set_flashdata( 'error', 'gagal..' );
            redirect( base_url( 'admin/ubah_rekap/' . $this->input->post( 'id' ) ) );
        }
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

        $sheet->setCellValue( 'A1', 'REKAP DATA MINGGUAN' );
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
        $data = $this->m_model->getAbsensiLast7Days();

        $no = 1;
        $numrow = 4;
        foreach ( $karyawan as $dataa ) {
            $sheet->setCellValue( 'A'.$numrow, $no );
            $sheet->setCellValue( 'B'.$numrow, $dataa->id );
            $sheet->setCellValue( 'C'.$numrow, $dataa->kegiatan );
            $sheet->setCellValue( 'D'.$numrow, $dataa->keterangan );
            $sheet->setCellValue( 'E'.$numrow, $dataa->date );
            $sheet->setCellValue( 'F'.$numrow, $dataa->jam_masuk );
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

        $sheet->setTitle( 'LAPORAN DATA admin' );

        header( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
        header( 'Content-Disposition: attachment; filename="mingguan.xlsx"' );
        header( 'Cache-Control: max-age=0' );

        $writer = new Xlsx( $spreadsheet );
        $writer->save( 'php://output' );
}

    public function bulanan()
 {
        $this->model->getbulanan( $bulan );
    }

    // public function export_admin_bulanan()
    // {
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    
    //     $style_col = [
    //         'font' => ['bold' => true],
    //         'alignment' => [
    //             'horizontal' => Alignment::HORIZONTAL_CENTER,
    //             'vertical' => Alignment::VERTICAL_CENTER
    //         ],
    //         'borders' => [
    //             'top' => ['borderStyle' => Border::BORDER_THIN],
    //             'right' => ['borderStyle' => Border::BORDER_THIN],
    //             'bottom' => ['borderStyle' => Border::BORDER_THIN],
    //             'left' => ['borderStyle' => Border::BORDER_THIN]
    //         ]
    //     ];
    
    //     $style_row = [
    //         'alignment' => [
    //             'vertical' => Alignment::VERTICAL_CENTER
    //         ],
    //         'borders' => [
    //             'top' => ['borderStyle' => Border::BORDER_THIN],
    //             'right' => ['borderStyle' => Border::BORDER_THIN],
    //             'bottom' => ['borderStyle' => Border::BORDER_THIN],
    //             'left' => ['borderStyle' => Border::BORDER_THIN]
    //         ]
    //     ];
    
    //     $sheet->setCellValue('A1', 'DATA admin');
    //     $sheet->mergeCells('A1:H1');
    //     $sheet->getStyle('A1')->getFont()->setBold(true);
    
    //     // Head
    //     $sheet->setCellValue('A3', 'NO');
    //     $sheet->setCellValue('B3', 'USERNAME');
    //     $sheet->setCellValue('C3', 'KEGIATAN');
    //     $sheet->setCellValue('D3', 'DATE');
    //     $sheet->setCellValue('E3', 'JAM MASUK');
    //     // $sheet->setCellValue('F3', 'JAM PULANG');
    //     // $sheet->setCellValue('G3', 'KETERANGAN IZIN');
    //     // $sheet->setCellValue('H3', 'STATUS');
    
    //     $sheet->getStyle('A3:H3')->applyFromArray($style_col);
    
    //     // Get data from the database
    //     $data = $this->m_model->getDataKaryawan();
    
    //     $no = 1;
    //     $numrow = 4;
    //     foreach ($data as $dataa) {
    //         $sheet->setCellValue('A' . $numrow, $no);
    //         $sheet->setCellValue('B' . $numrow, $dataa->username);
    //         $sheet->setCellValue('C' . $numrow, $dataa->email);
    //         $sheet->setCellValue('D' . $numrow, $dataa->nama_depan);
    //         $sheet->setCellValue('E' . $numrow, $dataa->nama_belakang);
    //         // $sheet->setCellValue('F' . $numrow, $dataa->jam_pulang);
    //         // $sheet->setCellValue('G' . $numrow, $dataa->keterangan);
    //         // $sheet->setCellValue('H' . $numrow, $dataa->status);
    
    //         $sheet->getStyle('A' . $numrow . ':H' . $numrow)->applyFromArray($style_row);
    
    //         $no++;
    //         $numrow++;
    //     }
    
    //     // Set column widths
    //     $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    //     foreach ($columns as $col) {
    //         $sheet->getColumnDimension($col)->setWidth(15);
    //     }
    
    //     // Set row heights
    //     for ($i = 4; $i <= $numrow; $i++) {
    //         $sheet->getRowDimension($i)->setRowHeight(20);
    //     }
    
    //     $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    
    //     $sheet->setTitle('LAPORAN DATA admin');
    
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment; filename="bulanan.xlsx"');
    //     header('Cache-Control: max-age=0');
    
    //     $writer = new Xlsx($spreadsheet);
    //     $writer->save('php://output');
    // }
    public function export_bulanan() 
    {

        // Load autoloader Composer
        require 'vendor/autoload.php';
        
        $spreadsheet = new Spreadsheet();

        // Buat lembar kerja aktif
       $sheet = $spreadsheet->getActiveSheet();
        // Data yang akan diekspor (contoh data)
        $bulan = date('m');; // Ambil nilai bulan yang dipilih dari form
        $data = $this->m_model->getbulanan($bulan);
        
        // Buat objek Spreadsheet
        $headers = ['NO','NAMA KARYAWAN','KEGIATAN','TANGGAL','JAM MASUK', 'JAM PULANG' , 'KETERANGAN IZIN', 'STATUS'];
        $rowIndex = 1;
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($rowIndex, 1, $header);
            $rowIndex++;
        }
        
        // Isi data dari database
        $rowIndex = 2;
        $no = 1;
        foreach ($data as $rowData) {
            $columnIndex = 1;
            $nama_karyawan = '';
            $kegiatan = '';
            $tanggal = '';
            $jam_masuk = '';
            $jam_pulang = '';
            $keterangan = ''; 
            $status = ''; 
            foreach ($rowData as $cellName => $cellData) {
                if ($cellName == 'kegiatan') {
                   $kegiatan = $cellData;
                } else if($cellName == 'id_karyawan') {
                    $nama_karyawan = tampil_karyawan_byid($cellData);
                } elseif ($cellName == 'date') {
                    $tanggal = $cellData;
                } elseif ($cellName == 'jam_masuk') {
                    if($cellData == NULL) {
                        $jam_masuk = '-';
                    }else {
                        $jam_masuk = $cellData;
                    }
                } elseif ($cellName == 'jam_pulang') {
                    if($cellData == NULL) {
                        $jam_pulang = '-';
                    }else {
                        $jam_pulang = $cellData;
                    }
                } elseif ($cellName == 'keterangan') {
                    $keterangan = $cellData;
                } elseif ($cellName == 'status') {
                   $status = $cellData;
                }
        
                // Anda juga dapat menambahkan logika lain jika perlu
                
                // Contoh: $sheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $cellData);
                $columnIndex++;
            }
            // Setelah loop, Anda memiliki data yang diperlukan dari setiap kolom
            // Anda dapat mengisinya ke dalam lembar kerja Excel di sini
            $sheet->setCellValueByColumnAndRow(1, $rowIndex, $no);
            $sheet->setCellValueByColumnAndRow(2, $rowIndex, $nama_karyawan);
            $sheet->setCellValueByColumnAndRow(3, $rowIndex, $kegiatan);
            $sheet->setCellValueByColumnAndRow(4, $rowIndex, $tanggal);
            $sheet->setCellValueByColumnAndRow(5, $rowIndex, $jam_masuk);
            $sheet->setCellValueByColumnAndRow(6, $rowIndex, $jam_pulang);
            $sheet->setCellValueByColumnAndRow(7, $rowIndex, $keterangan);
            $sheet->setCellValueByColumnAndRow(8, $rowIndex, $status);
            $no++;
        
            $rowIndex++;
        }
        // Auto size kolom berdasarkan konten
        foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        
        // Set style header
        $headerStyle =[
            'font'=> ['bold' => true],
            'alignment'=> [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment ::VERTICAL_CENTER
        ]];
        $sheet->getStyle('A1:' . $sheet->getHighestDataColumn() . '1')->applyFromArray($headerStyle);
        
        // Konfigurasi output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = ' REKAP_BULANAN.xlsx'; // Nama file Excel yang akan dihasilkan
        
        // Set header HTTP untuk mengunduh file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        // Outputkan file Excel ke browser
        $writer->save('php://output');
        
    }
    

    function laporan_harian() {
        cek_session_admin();
        $data = $this->model_app->hari_ini();
        $data = array( 'record' => $data );
        $this->template->load( 'app/template', 'app/mod_laporan/view_harian', $data );
    }

    public function profile()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $this->load->view('admin/profile', $data); // Mengirimkan variabel $data ke tampilan
 }
    
 public function upload_img($value)
 {
     $kode = round(microtime(true) * 1000);
     $config['upload_path'] = '../../image/';
     $config['allowed_types'] = 'jpg|png|jpeg';
     $config['max_size'] = '30000';
     $config['file_name'] = $kode;
     
     $this->load->library('upload', $config); // Load library 'upload' with config
     
     if (!$this->upload->do_upload($value)) {
         return array(false, '');
     } else {
         $fn = $this->upload->data();
         $nama = $fn['file_name'];
         return array(true, $nama);
     }
 }

 public function aksi_ubah_profilee()
 {
     $image = $_FILES['foto']['name'];
     $foto_temp = $_FILES['foto']['tmp_name'];
     $password_baru = $this->input->post('password_baru');
     $konfirmasi_password = $this->input->post('konfirmasi_password');
     $email = $this->input->post('email');
     $username = $this->input->post('username');
     $nama_depan = $this->input->post('nama_depan');
     $nama_belakang = $this->input->post('nama_belakang');

     // Jika ada foto yang diunggah
     if ($image) {
         $kode = round(microtime(true) * 100);
         $file_name = $kode . '_' . $image;
         $upload_path = './image/admin/' . $file_name;

         if (move_uploaded_file($foto_temp, $upload_path)) {
             // Hapus image lama jika ada
             $old_file = $this->m_model->get_foto_by_id($this->session->userdata('id'));
             if ($old_file && file_exists('./image/admin/' . $old_file)) {
                 unlink('./image/admin/' . $old_file);
             }

             $data = [
                 'image' => $file_name,
                 'email' => $email,
                 'username' => $username,
                 'nama_depan' => $nama_depan,
                 'nama_belakang' => $nama_belakang,
             ];
         } else {
             // Gagal mengunggah image baru
             redirect(base_url('admin/profile'));
         }
     } else {
         // Jika tidak ada image yang diunggah
         $data = [
             'email' => $email,
             'username' => $username,
             'nama_depan' => $nama_depan,
             'nama_belakang' => $nama_belakang,
         ];
     }

     // Kondisi jika ada password baru
     if (!empty($password_baru)) {
         // Pastikan password baru dan konfirmasi password sama
         if ($password_baru === $konfirmasi_password) {
             // Wadah password baru
             $data['password'] = md5($password_baru);
         } else {
             $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
             redirect(base_url('admin/profile'));
         }
     }

     // Eksekusi dengan model ubah_data
     $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));

     if ($update_result) {
         $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">
     Berhasil Merubah data
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect(base_url('admin/profile'));
     } else {
         redirect(base_url('admin/profile'));
     }
 }
public function hapus_image()
 { 
    $data = array(
        'image' => NULL
    );

    $eksekusi = $this->m_model->ubah_data('user', $data, array('id'=>$this->session->userdata('id')));
    if($eksekusi) {
        
        $this->session->set_flashdata('sukses','<div class="alert alert-dark alert-dismissible fade show" role="alert">
        Berhasil Menghapus Profile
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect(base_url('admin/profile'));
    } else {
        $this->session->set_flashdata('error' , 'gagal...');
        redirect(base_url('admin/profile'));
    }
}

 //function untuk menghapus
 public function hapus_admin( $id ) {
    $this->m_model->delete( 'absen', 'id', $id );
    redirect( base_url( 'admin/dashboard' ) );
}  
public function data_karyawan()
  {
    $data['user'] = $this->m_model->get_data('user')->result();
    $this->load->view('admin/data_karyawan', $data);
}
}
?>