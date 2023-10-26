<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

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
        $data['jumlah_izin'] = $this-> m_model->get_izin('absen' , $this->session->userdata('id'))->num_rows();
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
    $this->load->view('karyawan/ubah_karyawan');
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
      $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil Merubah Data
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
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
            'keterangan' => ('pulang'),
            'kegiatan' => ('-'),
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
public function export()
  {

     $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
      'font' => ['bold' => true],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $style_row = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $sheet->setCellValue('A1', "DATA ABSEN KARYAWAN");
    $sheet->mergeCells('A1:E1');
    $sheet->getStyle('A1')->getFont()->setBold(true);

    $sheet->setCellValue('A3', "ID");
    $sheet->setCellValue('B3', "USERNAME");
    $sheet->setCellValue('C3', "NAMA DEPAN");
    $sheet->setCellValue('D3', "NAMA BELAKANG");
    $sheet->setCellValue('E3', "IMAGE");
    $sheet->setCellValue('F3', "EMAIL");

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);

    $karyawan = $this->m_model->getDataKaryawan();

    $no = 1;
    $numrow = 4;
    foreach ($karyawan as $data) {
      $sheet->setCellValue('A' . $numrow, $no);
      $sheet->setCellValue('B' . $numrow, $data->username);
      $sheet->setCellValue('C' . $numrow, $data->nama_depan);
      $sheet->setCellValue('D' . $numrow, $data->nama_belakang);
      $sheet->setCellValue('E' . $numrow, $data->email);

      $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

      $no++;
      $numrow++;
    }

    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(25);
    $sheet->getColumnDimension('C')->setWidth(50);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(30);

    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("LAPORAN DATA ABSEN KARYAWAN");
    header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="data_karyawan.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');

  }

 public function absen()
    {
        $this->load->view('karyawan/absen');
    }

 public function aksi_absen()
    {        
        date_default_timezone_set('Asia/Jakarta');
        $waktu_sekarang = date('H:i:s');
        $id_karyawan = $this->session->userdata('id');
        $tanggal_absensi = date('Y-m-d');

        // Cek apakah karyawan sudah pulang
        $absensi_terakhir = $this->m_model->getlast('absen', array(
            'id_karyawan' => $id_karyawan
        ));

        // Mengecek apakah tanggal terakhir absensi sudah berbeda
        if ($absensi_terakhir && $absensi_terakhir->date !== $tanggal_absensi) {
            $absensi_terakhir = null; // Atur $absensi_terakhir menjadi null jika tanggal berbeda
        }

        if ($absensi_terakhir && $absensi_terakhir->jam_keluar === null) {
            // Karyawan belum pulang, tidak dapat melakukan absensi tambahan
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda tidak dapat melakukan absensi tambahan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(base_url('karyawan/absen'));
        } else {
            // Karyawan sudah pulang atau belum ada catatan absensi
            $data = [
                'id_karyawan' => $id_karyawan,
                'kegiatan' => $this->input->post('kegiatan'),
                'jam_pulang' => '-',
                'jam_masuk' => $waktu_sekarang, 
                'date' => $tanggal_absensi,  
                'keterangan' => '-',
                'status' => 'not'
            ];

            $this->m_model->tambah_data('absen', $data);
            redirect(base_url('karyawan/history'));
        }
    }
public function izin()
    {       
     
        $this->load->view('karyawan/izin');
    }
public function aksi_izin()
{        
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('H:i:s');
    $id_karyawan = $this->session->userdata('id');
    $tanggal = date('Y-m-d');

    
    $izin = $this->m_model->getwhere('absen', array(
        'id' => $id,
        'date' => $tanggal
    ));

    if ($izin->num_rows() > 0) {
        // Karyawan sudah memiliki catatan izin pada tanggal yang sama
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Anda Sudah Mengajukan Izin Hari Ini
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(base_url('karyawan/izin'));
    } else {
    
        
        // Tambahkan pengecekan apakah sudah ada data absen pada tanggal yang sama
        $absen = $this->m_model->getwhere('absen', array(
            'id_karyawan' => $id_karyawan,
            'date' => $tanggal
        ));

        if ($absen->num_rows() > 0) {
            // Karyawan sudah memiliki catatan absen pada tanggal yang sama
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Anda Sudah Melakukan Absen Hari Ini
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect(base_url('karyawan/izin'));
        } else {
            // Karyawan belum memiliki catatan izin atau absen pada tanggal yang sama, bisa melanjutkan
            $data = [
                'id_karyawan' => $id_karyawan,
                'kegiatan' => '-',
                'jam_pulang' => '-',
                'jam_masuk' => '-', 
                'date' => $tanggal,  
                'keterangan' => $this->input->post('izin'),
                'status' => 'done'
            ];
        
            $this->m_model->tambah_data('absen', $data);
            
            redirect(base_url('karyawan/history'));
        }
    }
}

   //untuk menampilkan from profil
   public function profile()
   {
       $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
       $this->load->view('karyawan/profile', $data); // Mengirimkan variabel $data ke tampilan
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
           $upload_path = './image/karyawan/' . $file_name;

           if (move_uploaded_file($foto_temp, $upload_path)) {
               // Hapus image lama jika ada
               $old_file = $this->m_model->get_foto_by_id($this->session->userdata('id'));
               if ($old_file && file_exists('./image/karyawan/' . $old_file)) {
                   unlink('./image/karyawan/' . $old_file);
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
               redirect(base_url('karyawan/profile'));
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
               redirect(base_url('karyawan/profile'));
           }
       }

       // Eksekusi dengan model ubah_data
       $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));

       if ($update_result) {
           $this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       Berhasil Merubah data
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>');
           redirect(base_url('karyawan/profile'));
       } else {
           redirect(base_url('karyawan/profile'));
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
       Berhasil Menghapus foto profile
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>');
       redirect(base_url('karyawan/profile'));
   } else {
       $this->session->set_flashdata('error' , 'gagal...');
       redirect(base_url('karyawan/profile'));
   }
}
    public function hapus_karyawan( $id ) {
        $this->m_model->delete( 'absen', 'id_karyawan', $id );
        redirect( base_url( 'karyawan/history' ) );
    }

}
?>