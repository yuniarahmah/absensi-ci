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
    
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a>Role karyawan</a>
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
            <span id="date_time"></span>
            <script type="text/javascript">
              window.onload = date_time('date_time');
            </script>

    <a href="<?php echo base_url('karyawan/history') ?>">pulang</a>
  </div>
</nav>

<div class="d-flex">
<div class="w3-sidebar w3-bar-block w3-green" style="width:20%">
  <br>
<form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <a href="/absensii/karyawan/history" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline">History</span></a>

  <a href="<?php echo base_url('karyawan/menu_izin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline">menu izin cuti</span></a></a>

  <a href="<?php echo base_url('karyawan/profil_karyawan') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline">profil</span></a></a>
  <a href="<?php echo base_url('auth')?>">home</a>  
</div>
</div>
<?php foreach ($absensi as $data):?>
<form class="card w-50 p-5 " style="margin-left:50%" method="post" enctype="multipart/from-data" action="<?php echo base_url('karyawan/aksi_ubah_karyawan')?>">
  <h5 class="card-title" style="margin-left:23%">Menu Absen</h5>
  <input type="hidden" name="id" value="<?php echo $data->id?>">
  <div class="card-body">
    <div class="card" style="width: 30rem; margin-left:3%;">
    <input type="text" name="kegiatan" value="<?php echo $data->kegiatan?>">
  </div>
  <div class="card-body">
    <h5 style="margin-left:20%;">Menu Izin</h5>
    <div class="card" style="width: 30rem; margin-right:5%;">
    <input type="text" name="keterangan" value="<?php echo $data->keterangan?>">
  </div><br>
  <button type="submit" name= "submit" class="btn btn-primary">ubah</button>
</div>
</form>
<?php endforeach;?>
</body>
</html>