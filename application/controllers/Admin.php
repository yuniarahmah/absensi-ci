<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( 'm_model' );
        $this->load->helper( 'my_helper' );
        $this->load->library( 'upload' );
        if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'role' ) != 'admin' ) {
            redirect( base_url().'auth' );
        }
    }

    public function dashboard()
 {
    $data['absensi'] = $this->m_model->get_data('absen')->result();
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
        $data = $this->m_model->get_karyawan();

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

    public function export_admin_bulanan()
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

        $sheet->setCellValue( 'A1', 'DATA admin' );
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
        $data = $this->m_model->get_admin();

        $no = 1;
        $numrow = 4;
        foreach ( $data as $dataa ) {
            $sheet->setCellValue( 'A'.$numrow, $no );
            $sheet->setCellValue( 'B'.$numrow, $dataa->id );
            $sheet->setCellValue( 'C'.$numrow, $dataa->username );
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
        header( 'Content-Disposition: attachment; filename="bulanan.xlsx"' );
        header( 'Cache-Control: max-age=0' );

        $writer = new Xlsx( $spreadsheet );
        $writer->save( 'php://output' );
}

    function laporan_harian() {
        cek_session_admin();
        $data = $this->model_app->hari_ini();
        $data = array( 'record' => $data );
        $this->template->load( 'app/template', 'app/mod_laporan/view_harian', $data );
    }

    public function profil_admin()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $this->load->view('admin/profil_admin', $data); // Mengirimkan variabel $data ke tampilan
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

 public function aksi_update_profile()
 {
     $image = $_FILES['foto']['name'];
     $foto_temp = $_FILES['foto']['tmp_name'];
     $username = $this->input->post('username');
     $nama_depan = $this->input->post('nama_depan');
     $nama_belakang = $this->input->post('nama_belakang');
     // $foto = $this->upload_img('foto');
     // Jika ada foto yang diunggah
     if ($image) {
         $kode = round(microtime(true) * 100);
         $file_name = $kode . '_' . $image;
         $upload_path = './image/' . $file_name;

         if (move_uploaded_file($foto_temp, $upload_path)) {
             // Hapus image lama jika ada
             $old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
             if ($old_file && file_exists(' ./image/' . $old_file)) {
                 unlink(' ./image/' . $old_file);
             }

             $data = [
                 'image' => $file_name,
                 'username' => $username,
                 'nama_depan' => $nama_depan,
                 'nama_belakang' => $nama_belakang,
             ];
         } else {
             // Gagal mengunggah image baru
             redirect(base_url('admin/dasboard'));
         }
     } else {
         // Jika tidak ada image yang diunggah
         $data = [
             'username' => $username,
             'nama_depan' => $nama_depan,
             'nama_belakang' => $nama_belakang,
         ];
     }

     // Eksekusi dengan model ubah_data
     $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));

     if ($update_result) {
         $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
     Berhasil Merubah Profile
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect(base_url('admin/profil_admin'));
     } else {
         redirect(base_url('admin/profil_admin'));
     }
}
public function aksi_ubah_password()
{

    $password_baru = $this->input->post('password_baru');
    $password_lama = $this->input->post('password_lama');
    $konfirmasi_password = $this->input->post('konfirmasi_password');
    

        
        if (!empty($password_baru) && strlen($password_baru) >= 8) {
            if ( $password_baru === $konfirmasi_password) {
                $data['password'] = md5($password_baru);
            }
        
        $this->session->set_userdata($data);

        $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));
        $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Merubah Password
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        redirect(base_url('admin/profil_admin'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Password anda kurang dari 8
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
            redirect(base_url('admin/profil_admin'));
        }
}
public function hapus_image()
 { 
    $data = array(
        'image' => NULL
    );

    $eksekusi = $this->m_model->ubah_data('user', $data, array('id'=>$this->session->userdata('id')));
    if($eksekusi) {
        
        $this->session->set_flashdata('sukses' , 'berhasil');
        redirect(base_url('admin/profil_admin'));
    } else {
        $this->session->set_flashdata('error' , 'gagal...');
        redirect(base_url('admin/profil_admin'));
    }
}

   public function aksi_password()
   {
       $password_baru = $this->input->post('password_baru');
       $konfirmasi_password = $this->input->post('konfirmasi_password');
  
          //kondisi jika ada password baru
          if (!empty($password_baru)) {
            // Pastikan password baru dan konfirmasi password sama
            if ($password_baru === $konfirmasi_password) {
                // Enkripsi password baru dengan md5 (harap ganti dengan metode keamanan yang lebih kuat seperti bcrypt)
                $hashed_password = md5($password_baru);
        
                // Perbarui data password pengguna di sesi
                $this->session->set_userdata('password', $hashed_password);
        
                // Perbarui data password pengguna di database
                $data['password'] = $hashed_password;
        
                // Simpan data pengguna ke database
                $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));
        
                if ($update_result) {
                    redirect(base_url('admin/profil_admin'));
                } else {
                    // Handle error jika gagal menyimpan data ke database
                    $this->session->set_flashdata('message', 'Terjadi kesalahan saat menyimpan data ke database.');
                    redirect(base_url('admin/profil_admin'));
                }
            } else {
                $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                redirect(base_url('admin/profil_admin'));
            }
        }
        
  
          //untuk melakukan pembaruan data
          $this->session->set_userdata($data);
          $update_result = $this->m_model->ubah_data( 'user', $data, array( 'id' => $this->session->userdata( 'id' )));
  
          if ($update_result) {
              redirect( base_url( 'admin/profil_admin' ) );
          } else {
              redirect( base_url( 'admin/profil_admin' ) );
          }
 } 
 //function untuk menghapus
 public function hapus_admin( $id ) {
    $this->m_model->delete( 'absen', 'id', $id );
    redirect( base_url( 'admin/dashboard' ) );
}  
}
?>