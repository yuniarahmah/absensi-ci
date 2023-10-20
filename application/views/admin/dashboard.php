<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    
<nav class="navbar bg-body-tertiary" style="position:fixed; width:100%;">
  <div class="container-fluid">
    <a style="text-align-center"><i>FROM ADMIN</i></a>
    <?php
            date_default_timezone_set("Asia/Jakarta");
            ?>
            <script type="text/javascript">
              function date_time(id) {
                date = new Date;
                year = date.getFullYear();
                month = date.getMonth();
                months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
                d = date.getDate();
                day = date.getDay();
                days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                h = date.getHours();
                if (h < 10) {
                  h = "0" + h;
                }
                m = date.getMinutes();
                if (m < 10) {
                  m = "0" + m;
                }
                s = date.getSeconds();
                if (s < 10) {
                  s = "0" + s;
                }
                result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
                document.getElementById(id).innerHTML = result;
                setTimeout('date_time("' + id + '");', '1000');
                return true;
              }
            </script>
            <span id="date_time" style="margin-right: 40%;"></span>
            
            <a href="<?php echo base_url('auth/login')?>"><i class="fa-solid fa-right-from-bracket">Logout<hr></i></a> 
            <script type="text/javascript">
              window.onload = date_time('date_time');
            </script>

  </div>
</nav>
<br>
<br>
<br>

<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-green" style="width:17%;"><br>
   <h2 style="color:black;">Admin <hr></h2>
  <a href="/absensii/admin/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i>  Dashboard</span></a>
  <a href="<?php echo base_url('admin/profil_admin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> profil</span></a></a>
  
  <a href="<?php echo base_url('admin/rekap_b') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-list-check"></i> rekap bulanan</span></a></a>

  <a href="<?php echo base_url('admin/rekap_h') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-list-check"></i> rekap harian </span></a></a>

  <a href="<?php echo base_url('admin/rekap_m') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-list-check"></i> rekap mingguan</span></a></a>
</div>

<div style="width:100%; margin-left:20%">
      <hr>
      <div class="row mb-sm-0" style="margin-top: 25px;">
        <di class="col-3" style="margin-left: 10%;">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header">Daily Report</div><br>
            <div class="card-body">
              <img src="https://static.promediateknologi.id/crop/0x82:1280x850/750x500/webp/photo/2023/05/20/Ilustrasi-Kalender-Jawa-Juni-2023-3877882117.png" style="width: 40%; margin-left:20%">
              <br><br>
              <div class="card text-center">
                <a href="<?php echo base_url('admin/rekap_h')?>" class="btn btn-primary">Go Page</a>
              </div>
            </div>
          </div>
        </di>
        <div class="col-3" style="margin-left: 25px; ">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header">Weekly Report</div><br>
            <div class="card-body">
              <img src="https://static.promediateknologi.id/crop/0x82:1280x850/750x500/webp/photo/2023/05/20/Ilustrasi-Kalender-Jawa-Juni-2023-3877882117.png" style="width: 40%; margin-left:20% ">
              <br><br>
            <div class="card text-center">
                <a href="<?php echo base_url('admin/rekap_m') ?>" class="btn btn-primary">Go Page</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3" style="margin-left: 25px; ">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header">Monthly Report</div><br>
            <div class="card-body">
              <img src="https://static.promediateknologi.id/crop/0x82:1280x850/750x500/webp/photo/2023/05/20/Ilustrasi-Kalender-Jawa-Juni-2023-3877882117.png" style="width: 40%; margin-left:20%">
              <br><br>
              <div class="card text-center ">
              <a href="<?php echo base_url('admin/rekap_b')?>" class="btn btn-primary">Go Page</a>
            </div>
            </div>
          </div>
        </div>
<div class="relative min-h-screen md:flex" data-dev-hint="container" style="margin-left:3%;">
        <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto"> 
                    <div class="flex justify-center mb-2 md:justify-start md:pl-6">
                     
 <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h1 class="flex justify-center mb-2 md:justify-start md:pl-6">
                    <i class="fa-solid fa-note-sticky"></i> Data Karyawan
                    </h1>
   </div>
                    <a href="<?php echo base_url('admin/export_admin_mingguan')?>" class="btn btn-outline-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
                    </div>
                <div class="overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
                    <table class="my-4 w-full divide-y divide-gray-300 text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-xs text-gray-500">NO</th>
                                <th class="px-3 py-2 text-xs text-gray-500">KARYAWAN</th>
                                <th class="px-3 py-2 text-xs text-gray-500">KEGIATAN</th>
                                <th class="px-3 py-2 text-xs text-gray-500">TANGGAL</th>
                                <th class="px-3 py-2 text-xs text-gray-500">JAM MASUK</th>
                                <th class="px-3 py-2 text-xs text-gray-500">JAM PULANG</th>
                                <th class="px-3 py-2 text-xs text-gray-500">KETERANGAN IZIN</th>
                                <th class="px-3 py-2 text-xs text-gray-500">STATUS</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            <?php $no=0; foreach ($absensi as $absen): $no++ ?>
                            <tr class="whitespace-nowrap">
                                <td class="px-3 py-4 text-sm text-gray-500"><?php echo $no ?></td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo tampil_karyawan_byid($absen->id_karyawan); ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen->kegiatan; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen->date; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen->jam_masuk; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen->jam_pulang; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen->keterangan; ?>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $absen->status; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
</div>
</div>
 </div>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  function hapus(id) {
        swal.fire({
            title: 'Yakin untuk menghapus data ini?',
            text: "Data ini akan terhapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 1500,

                }).then(function() {
                    window.location.href = "<?php echo base_url('admin/hapus_admin/')?>" + id;
                });
            }
        });
    }
</script>
</body>
</html>