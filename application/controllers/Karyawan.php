<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Karyawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( 'm_model' );
        $this->load->helper( 'my_helper' );
        $this->load->library( 'upload' );
        // if ( $this->session->userdata( 'loged_in' ) != true ) {
        //     redirect( base_url().'login' );
        // }
        if ( $this->session->userdata( 'loged_in' ) != true || $this->session->userdata( 'role' ) != 'karyawan' ) {
        	redirect( base_url().'auth' );
        }
    }

    public function dashboard()
 {
        $data['absen'] = $this->m_model->get_data('absen')->num_rows();
        $data['user'] = $this->m_model->get_data('user')->num_rows();
        $data['absenn'] = $this->m_model->get_data('absen')->result();
        $this->load->view( 'karyawan/dashboard', $data);
    }
    public function history()
 {
        $data[ 'user' ] = $this->m_model->get_data( 'user' )->num_rows();
        $data[ 'absen' ] = $this->m_model->get_data( 'absen' )->num_rows();
        $data['karyawan'] = $this->m_model->get_data('absen')->result();
        $this->load->view( 'karyawan/history', $data );
    }
    public function tambah_karyawan()
 {
        $this->load->view( 'karyawan/history', $data );
    }
	//untuk memunculkan from menu izin dan absen 
    public function ubah_karyawan($id)
{
    $data['absen'] = $this->m_model->get_by_karyawan('absen', 'id', $id)->result();
    $this->load->view('karyawan/ubah_karyawan', $data);
    }
public function aksi_ubah_karyawan()
  {
    $data = array(
        'id'     =>  $this->input->post('id'),
      'kegiatan' => $this->input->post('kegiatan'),
    );

    $eksekusi = $this->m_model->ubah_data
    ('absen', $data, array('id' => $this->input->post('id')));
    if ($eksekusi) {
      $this->session->set_flashdata('sukses', 'berhasil');
      redirect(base_url('karyawan/history'));
    } else {
      $this->session->set_flashdata('error', 'gagal..');
      redirect(base_url('karyawan/ubah_karyawan/' . $this->input->post('id')));
    }
  }
  //function untuk waktu pulang
  public function pulang($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $absensi = $this->db->get_where('absen', array('id' => $id))->row();
    if ($absensi) {//validasi disini berisi jika button pulang di tekan maka status akan otomatis done dan jam pulang terisi
        $data = [
            'jam_pulang' => date('H.i.s'),
            'jam_masuk' => date('00:00:00'),
            'kegiatan' => date('-'),
            'status' => 'done'
        ];
        $this->db->where('id',$id);
        $this->db->update('absen',$data);
        redirect(base_url('karyawan/history '));
    } else {
        echo 'data absensi tidak ditemukan';
    }
  }
  //function untuk rekap mingguan
  public function rekap_mingguan() {
    $data['absensi'] = $this->m_model->getAbsensiLast7Days();        
    $this->load->view('pages/karyawan/rekap_mingguan', $data);
}
//function untuk menghapus
    public function hapus_karyawan( $id ) {
        $this->m_model->delete( 'absen', 'id', $id );
        redirect( base_url( 'karyawan/history' ) );
    }  
    public function export_data_karyawan()
    {
      $spreadsheet = new Spreadsheet();
          $sheet = $spreadsheet->getActiveSheet();
  
          $style_col = [
              'font' => ['bold' => true ],
              'alignment' => [
                  'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                  'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
              ],
              'borders' => [
                  'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                  'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                  'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                  'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
              ]
              ];
          $style_row = [
              'alignment' => [
                  'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
              ],
              'borders' => [
                  'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                  'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                  'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                  'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
              ]
          ];
  
          $sheet->setCellValue('A1', "DATA KARYAWAN");
          $sheet->mergeCells('A1:E1');
          $sheet->getStyle('A1')->getFont()->setBold(true);
  
          $sheet->setCellValue('A3', "NO");
          $sheet->setCellValue('B3', "ID KARYAWAN");
          $sheet->setCellValue('C3', "date");
  
         
          $sheet->getStyle('A3')->applyFromArray($style_col);
          $sheet->getStyle('B3')->applyFromArray($style_col);
          $sheet->getStyle('C3')->applyFromArray($style_col);
  
          $data_karyawan= $this->m_model->getDataKaryawan();
        
          $no= 1;
          $numrow = 4;
          foreach($data_karyawan as $data) {
              
          $sheet->setCellValue('A'.$numrow,$no);
          $sheet->setCellValue('B'.$numrow,$data->username);
          $sheet->setCellValue('C'.$numrow,$data->date); 
  
          $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
  
          $no++;
          $numrow++;
  
          }
  
          $sheet->getColumnDimension('A')->setWidth(5);
          $sheet->getColumnDimension('B')->setWidth(25);
          $sheet->getColumnDimension('C')->setWidth(25);
  
  
          $sheet->getDefaultRowDimension()->setRowHeight(-1);
  
          $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
  
          $sheet->SetTitle("LAPORAN DATA KARYAWAN");
  
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="DATA KARYAWAN.xlsx"');
          header('Cache-Control: max-age=0');
          $writer = new Xlsx($spreadsheet);
          $writer->save('php://output');
    }

   //untuk menampilkan from profil
    public function profil_karyawan()
    {
        $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
        $this->load->view('karyawan/profil_karyawan', $data); // Mengirimkan variabel $data ke tampilan
 }
    
 public function upload_img($value)
 {
     $kode = round(microtime(true) * 1000);
     $config['upload_path'] = '../../image/karyawan';
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
    //  $password_lama = $this->input->post('password_lama');
    //  $password_baru = $this->input->post('password_baru');
    //  $konfirmasi_password = $this->input->post('konf$konfirmasi_password');
     // $foto = $this->upload_img('foto');
     // Jika ada foto yang diunggah
     if ($image) {
         $kode = round(microtime(true) * 100);
         $file_name = $kode . '_' . $image;
         $upload_path = './image/karyawan' . $file_name;

         if (move_uploaded_file($foto_temp, $upload_path)) {
             // Hapus image lama jika ada
             $old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
             if ($old_file && file_exists(' .image/karyawan' . $old_file)) {
                 unlink(' ./image/karyawan' . $old_file);
             }

             $data = [
                 'image' => $file_name,
                 'username' => $username,
                 'nama_depan' => $nama_depan,
                 'nama_belakang' => $nama_belakang,
                //  'password_lama' => $password_lama,
                //  'password_baru' => $password_baru,
                //  'konfirmasi_password' => $konfirmasi_password,
             ];
         } else {
             // Gagal mengunggah image baru
             redirect(base_url('karyawan/history'));
         }
     } else {
         // Jika tidak ada image yang diunggah
         $data = [
             'username' => $username,
             'nama_depan' => $nama_depan,
             'nama_belakang' => $nama_belakang,
            //  'password_lama' => $password_lama,
            //  'password_baru' => $password_baru,
            //  'konfirmasi_password' => $konfirmasi_password,
         ];
     }

     // Eksekusi dengan model ubah_data
     $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));

     if ($update_result) {
         $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
     Berhasil Merubah Profile
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
         redirect(base_url('karyawan/profil_karyawan'));
     } else {
         redirect(base_url('karyawan/profil_karyawan'));
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
        redirect(base_url('karyawan/profil_karyawan'));
    } else {
        $this->session->set_flashdata('error' , 'gagal...');
        redirect(base_url('karyawan/profil_karyawan'));
    }
}

public function aksi_ubah_password()
{

    $password_baru = $this->input->post('password_baru');
    $konfirmasi_password = $this->input->post('konfirmasi_password');
    

        
        if (!empty($password_baru) && strlen($password_baru) >= 8) {
            if ($password_baru === $konfirmasi_password) {
                $data['password'] = md5($password_baru);
            }
        
        $this->session->set_userdata($data);

        $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));
        $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Merubah Password
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        redirect(base_url('karyawan/profil_karyawan'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Password anda kurang dari 8
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
            redirect(base_url('karyawan/profil_karyawan'));
        }
    

    
    }
    public function aksi_password()
   {
      $password_baru = $this->input->post('password_baru');
      $password_lama = $this->input->post('password_lama');
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
                    redirect(base_url('karyawan/profil_karyawan'));
                } else {
                    // Handle error jika gagal menyimpan data ke database
                    $this->session->set_flashdata('message', 'Terjadi kesalahan saat menyimpan data ke database.');
                    redirect(base_url('karyawan/profil_karyawan'));
                }
            } else {
                $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                redirect(base_url('karyawan/profil_karyawan'));
            }
        }
        
  
          //untuk melakukan pembaruan data
        //   $this->session->set_userdata($data);
 } 
 public function menu_absen()
 {
    $data['absen'] = $this->m_model->get_by_karyawan('absen', 'kegiatan', $id)->result();
        $this->load->view( 'karyawan/menu_absen');
    }
 public function menu_izin()
 {
        $this->load->view( 'karyawan/menu_izin');
    }
}
?>