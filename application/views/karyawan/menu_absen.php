<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Absen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    
<nav class="navbar bg-body-tertiary" style="position:fixed; width:100%;" >
  <div class="container-fluid">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQxjA2k8aeNuFReYdjwIvRzU6S9erT--bKmQ&usqp=CAU" style="width:10%;">       <?php
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
            <span id="date_time"></span>
            <script type="text/javascript">
              window.onload = date_time('date_time');
            </script>

    <a href="<?php echo base_url('auth/login') ?>" id="logout-button">logout</a>
  </div>
</nav><br>
<br>
<div class="d-flex">
<div class="w3-sidebar w3-bar-block w3-black" style="width:20%">
  <br>
  <div class="flex">
    <i>karyawan<hr></i>
  </div>
  <a href="/absensii/karyawan/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i>  Dashboard</span></a>
  
  <a href="<?php echo base_url('karyawan/history')?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i> History</span></a>

<a href="<?php echo base_url('karyawan/profil_karyawan') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Profil</span></a></a>
</div>
</div>
<?php foreach ($absen as $data):?>
<form class="card w-50 p-5 shadow-lg " style="margin-left:23%;" method="post" enctype="multipart/from-data" action="<?php echo base_url('karyawan/aksi_ubah_karyawan')?>">
  <input type="hidden" name="id" value="<?php echo $data->id?>">
  <div class="card-body">
    <b style="margin-left:20%;">ABSEN</b>
    <div class="card" style="width: 30rem; margin-right:5%;">
    <input type="text" name="kegiatan" value="<?php echo $data->kegiatan?>">
  </div><br>
  <button type="submit" name= "submit" class="btn btn-primary">ubah</button>
</div>
</form>
<?php endforeach;?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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