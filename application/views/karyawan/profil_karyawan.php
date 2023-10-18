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
    <i>Absensi karyawan <hr></i>
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
            <script type="text/javascript">
              window.onload = date_time('date_time');
            </script>
              <button class="btn btn-outline-dark"><a href="<?php echo base_url('karyawan/history') ?>">pulang</a></button>
  </div>
</nav><br>
<br>
<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-green" style="width:15%; position:absolute;"><br>
  <div class="flex">
    <i>karyawan<hr></i>
  </div>
  <a href="/absensii/karyawan/history" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i> History</span></a>

  <a href="<?php echo base_url('karyawan/profil_karyawan') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Profil</span></a></a>

</div>
<hr>
<div style="margin-top:20px; margin-left:20%; margin-right:15%; position:fixed;" class = 'card w-20px p-3 shadow-lg p-3 mb-5 bg-body-primary rounded'>
  <h1 class = 'text-center'><b>Akun <?php echo $this->session->userdata('username'); ?></b></h1>   
  <?php $no=0; foreach ($user as $users): $no++ ?>
  <form  action="<?php echo base_url('karyawan/aksi_profil_karyawan')?>" method="post" enctype="multipart/from-data">
    <div class="row">
    <div class="mb-3 col-6">
      <span class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <?php if (!empty($row->foto)): ?>
          <img src="<?php echo  base_url('./image/karyawan/' . $row->foto) ?>" height="150"
                                                width="150" class="rounded-circle">
                      <?php else: ?>
                      <img class="rounded-circle" height="150" width="150"
                        src="https://w7.pngwing.com/pngs/117/752/png-transparent-computer-icons-user-icon-design-numerous-miscellaneous-logo-computer-wallpaper.png" />
                    <?php endif;?>
                  </span>
                </div>
    <div class="mb-3 col-6">
        <label for="email" class="form-label">email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $users->email?>">
      </div>
      <div class="mb-3 col-6">
     <label for="username" class="form-label">username</label>
     <input type="text" class="form-control" id="username" name="username" value="<?php echo $users->username?>">
    </div>
      <div class="mb-3 col-6">
     <label for="nama_depan" class="form-label">Nama Depan</label>
     <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?php echo $users->nama_depan?>">
    </div>
      <div class="mb-3 col-6">
     <label for="nama_belakang" class="form-label">Nama Belakang</label>
     <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?php echo $users->nama_belakang?>">
    </div>
    <div class="mb-3 col-6">
      <label for="password" class="form-label">password</label>
      <input type="text" class="form-control" id="password_baru" name="password_baru">
    </div>
    <div class="mb-3 col-6">
      <label for="password" class="form-label">konfirmasi password</label>
      <input type="text" class="form-control" id="konfirmasi_password" name="konfirmasi_password" >
    </div>
    <div class="mb-3 col-6">
     <label for="foto" class="form-label">Foto</label>
      <input type="file" class="form-control" id="foto" name="foto">
    </div>
  </div>
  <button style="margin-left: 35%; margin-top: 25px;" type="submit" class="btn btn-primary w-25" name="submit">Ubah</button>

</form>
<?php endforeach ?>
</div>
</body>
</html>