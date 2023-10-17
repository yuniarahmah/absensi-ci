<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORY</title>
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
            
  <a href="<?php echo base_url('auth')?>"><i class="fa- fa-right-from-bracket">Logout<hr></i></a> 
            <script type="text/javascript">
              window.onload = date_time('date_time');
            </script>

  </div>
</nav>
<br>
<br>

<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-green" style="width:17%"><br>
   <h2 styl="color:black;">Admin <hr></h2>
  <a href="/absensii/admin/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i>  Dashboard</span></a>

  <a href="<?php echo base_url('admin/account') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-book-open"></i> Profile Admin</span></a></a>

  <a href="<?php echo base_url('karyawan/history') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Karyawan</span></a></a>

</div>

<div style="width:100%; margin-left:20%">
      <div class="text-center m-4">
        <h1><b>Selamat Datang <?php echo $this->session->userdata('username') ?></b></h1>
      </div>
      <hr>
      <div class="row mb-sm-0" style="margin-top: 25px;">
        <di class="col-3" style="margin-left: 10%;">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header">Daily Report</div>
            <div class="card-body">
              <img src="https://static.promediateknologi.id/crop/0x82:1280x850/750x500/webp/photo/2023/05/20/Ilustrasi-Kalender-Jawa-Juni-2023-3877882117.png" style="width: 40%; margin-left:20%">
              <br>
              <div class="card text-center">
                <a href="<?php echo base_url('admin/rekap_h')?>" class="btn btn-primary">Go Page</a>
              </div>
            </div>
          </div>
        </di>
        <div class="col-3" style="margin-left: 25px; ">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header">Weekly Report</div>
            <div class="card-body">
              <img src="https://static.promediateknologi.id/crop/0x82:1280x850/750x500/webp/photo/2023/05/20/Ilustrasi-Kalender-Jawa-Juni-2023-3877882117.png" style="width: 40%; margin-left:20% ">
              <br>
            <div class="card text-center">
                <a href="<?php echo base_url('admin/rekap_m') ?>" class="btn btn-primary">Go Page</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3" style="margin-left: 25px; ">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header">Monthly Report</div>
            <div class="card-body">
              <img src="https://static.promediateknologi.id/crop/0x82:1280x850/750x500/webp/photo/2023/05/20/Ilustrasi-Kalender-Jawa-Juni-2023-3877882117.png" style="width: 40%; margin-left:20%">
              <br>
              <div class="card text-center ">
              <a href="<?php echo base_url('admin/rekap_b')?>" class="btn btn-primary">Go Page</a>
            </div>
            </div>
          </div>
        </div>
        </div>
</body>
</html>