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
    <a href="<?php echo base_url('karyawan/history') ?>">pulang</a>
  </div>
</nav>

<div class="d-flex">
<div class="w3-sidebar w3-bar-block w3-green" style="width:20%">
<br>
<p>Tanggal/Waktu: <span id="tanggalwaktu"></span></p>
<script>
var dt = new Date();
document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
</script>

<?php

      date_default_timezone_set("Asia/Jakarta");

      $jam  =  date("H:i:s");  


      echo  "$jam  WIB";

?>
<form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <a href="/absensii/karyawan/history" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline">Histori</span></a>

  <a href="<?php echo base_url('karyawan/menu_absen') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline">menu absen</span></a></a>

  <a href="<?php echo base_url('karyawan/menu_izin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline">menu izin cuti</span></a></a>
  
</div>

<a href="<?php echo base_url('auth')?>">home</a>  
</div>

<div class="row container p-3 col-10" style="margin-left:20%;">
 <div class="col">
  <div class="card text-bg-secondary mb-3" style="max-width: 22rem;">
             <div class="card-header">Rekap Harian</div>
               <div class="card-body">
                 <p class="card-text"> <i class="fa-solid fa-user"></i></p>
                 <div class="card-footer text-muted">
                    <a href="" class="btn btn-primary">info lengkap</a>
                  </div>
             </div>
        </div>            
        </div>
        <div class="col">
        <div class="card text-bg-secondary mb-3" style="max-width: 22rem;">
             <div class="card-header">Rekap Mingguan</div>
               <div class="card-body">
                 <p class="card-text"><i class="fa-solid fa-door-closed"></i></p>
                 <div class="card-footer text-muted">
                    <a href="" class="btn btn-primary">info lengkap</a>
                  </div>
             </div>
        </div>            
        </div>
        <div class="col">
        <div class="card text-bg-secondary mb-3" style="max-width: 22rem;">
             <div class="card-header">Rekap Bulanan</div>
               <div class="card-body">
                 <p class="card-text"><i class="fa-solid fa-user-tie"></i></p>
                 <div class="card-footer text-muted">
                    <a href="<?php echo base_url('admin/detail_guru')?>" class="btn btn-primary">info lengkap</a>
                  </div>
             </div>
        </div>            
        </div>
        <div class="how" style="widht:40vh; height:35vh;">
        <table class="table table-striped-columns">
   <thead>
   <tr class="table-success">
       <th style="width:3%;">NO</th>
       <th style="width:5%;">Nama Depan</th>
       <th style="width:5%;">Nama Belakang</th>
       <th style="width:3%;">Email</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <th scope="row" class="table-light">1</th>
       <td class="table-light">Satria Candra Pamungkas</td>
       <td class="table-light">Satria</td>
       <td  class="table-light">@candra</td>
     </tr>
     <tr>
       <th scope="row" class="table-light">2</th>
       <td class="table-light">Wahyu Yulianto</td>
       <td class="table-light">Yuya</td>
       <td class="table-light">@elena</td>
     </tr>
     <tr>
       <th scope="row" class="table-light">3</th>
       <td class="table-light">Andi Saputro</td>
       <td class="table-light">Andi</td>
       <td class="table-light">@andi</td>
     </tr>
   </tbody>
 </table>
  </div>
      </div>
<script src="jquery-1.4.js"></script>
   <script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}

</script>
</body>
</html>