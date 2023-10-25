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
    
<nav class="navbar bg-body-tertiary" style="width:100%; position:fixed;">
  <div class="container-fluid">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQxjA2k8aeNuFReYdjwIvRzU6S9erT--bKmQ&usqp=CAU" style="width:10%;">     <?php
            date_default_timezone_set("Asia/Jakarta");
            ?>
            <script type="text/javascript">
              function date_time(id) {
                date = new Date;
                year = date.getFullYear();
                month = date.getMonth();
                months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                d = date.getDate();
                day = date.getDay();
                days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
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
            <script type="text/javascript">
                window.onload = date_time('date_time');
                </script>
                <a href="<?php echo base_url('auth/login')?>" id="logout-button"><i class="fa-solid fa-right-from-bracket">Logout<hr></i></a> 
  </div>
</nav>
<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-black" style="width:15%; margin-top:5%"><br>
  <i>karyawan <hr></i>
  <a href="/absensii/karyawan/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-clock-rotate-left"></i>  Dashboard</span></a>
  
  <a href="<?php echo base_url('karyawan/absen') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-regular fa-newspaper"></i> Menu Absen</span></a></a>

  <a href="<?php echo base_url('karyawan/izin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-regular fa-envelope"></i> Menu Izin</span></a></a>

  <a href="<?php echo base_url('karyawan/profile') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Profil</span></a></a>
  
  <a href="<?php echo base_url('karyawan/history')?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i> History</span></a>

</div>


<div class="row container p-3 col-10" style="margin-left:15%;margin-top:5%">
  <div style="width:100%; ">
  <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h1 class="flex justify-center mb-2 md:justify-start md:pl-6">
                    <i class="fa-solid fa-note-sticky"></i> Data Karyawan
                    </h1>
   </div>    
     <div class="row mb-sm-0" style="margin-top: 25px;">
        <div class="col-4" >
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <i>Total Karyawan</i>
            <div class="card-header">
        </div>
            <div class="card-body">  
              <font size="20"><?php echo $absen?>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" style="width:10%;margin-left:65%;"></font> 
            </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <i>Total Absen</i>
            <div class="card-header">
          </div>
            <div class="card-body">
              <font size="15"><?php echo $user?>
                <img src="https://i.pinimg.com/originals/3a/68/9c/3a689c7e5ee4d67ac98240652e8c28c4.png" style="width:10%; margin-left:65%"></font>
            </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <i>Total Izin</i>
            <div class="card-header">
          </div>
            <div class="card-body">
              <font size="15"><?php echo $jumlah_izin;?> 
                <img src="https://i.pinimg.com/originals/3a/68/9c/3a689c7e5ee4d67ac98240652e8c28c4.png" style="width:10%; margin-left:65%"></font>
            </div>
          </div>
        </div>
        
 </div>
</div>
<div class="relative min-h-screen md:flex" data-dev-hint="container" style="margin-left:1%;">
        <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto"> 
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
                            <?php $no=0; foreach ($absenn as $absen): $no++ ?>
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
 </div>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    window.location.href = "<?php echo base_url('karyawan/hapus_karyawan/')?>" + id;
                });
            }
        });
    }
</script>
<script>
    // Function to show SweetAlert confirmation
    function showLogoutConfirmation() {
        swal({
            title: "Logout",
            text: "Are you sure you want to log out?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willLogout) => {
            if (willLogout) {
                // Redirect to the logout URL after the user confirms
                window.location.href = "<?php echo base_url('auth/logout'); ?>";
            }
        });
    }

    // Attach the SweetAlert confirmation to the "Logout" button
    document.getElementById('logout-button').addEventListener('click', function (e) {
        e.preventDefault();
        showLogoutConfirmation();
    });
</script>

</body>
</html>