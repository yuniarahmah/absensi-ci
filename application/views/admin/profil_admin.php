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
  <a style="text-align-center"><i>FROM ADMIN</i></a>    <?php
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
</nav><br><br><br> 

<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-green" style="width:15%; position:absolute;"><br>
  <div class="flex">
  <h2 style="color:black;">Admin <hr></h2>
  </div> <a href="/absensii/admin/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i>  Dashboard</span></a>


<a href="<?php echo base_url('admin/profil_admin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> profil</span></a></a>
<a href="<?php echo base_url('admin/rekap_b') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-list-check"></i> rekap bulanan</span></a></a>
<a href="<?php echo base_url('admin/rekap_h') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-list-check"></i> rekap harian </span></a></a>
<a href="<?php echo base_url('admin/rekap_m') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-list-check"></i> rekap mingguan</span></a></a>
</div>
</div>
<hr>
<div style="margin-top:20px; margin-left:20%; margin-right:15%; position:fixed;" class = 'card w-20px p-3 shadow-lg p-3 mb-5 bg-body-primary rounded'>
  <?php $no=0; foreach ($user as $users): $no++ ?>
  <form  action="<?php echo base_url('admin/aksi_profil_admin')?>" method="post" enctype="multipart/from-data">
    <div class="row">
      <div class="mb-3 col-6" style="margin-left:30%;">
        <button class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <?php if (!empty($row->image)): ?>
            <img src="<?php echo base_url('./images/karyawan/'. $row->image) ?>" height="150"
            width="150" class="rounded-circle">
            <?php else: ?>
              <img style="width:50%; border-radius:50%;" src="https://vsbattles.com/data/avatars/h/10/10859.jpg?1694648797" alt="">
              <?php endif;?>
            </button>
          </div>
          <h1 class = 'text-center'><b>Akun <?php echo $this->session->userdata('username'); ?></b></h1>   
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
        <label for="password_baru" class="form-label">Password Baru</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password_baru" name="password_baru">
          <div class="input-group-append">
            <span class="input-group-text">
              <input type="checkbox" id="showPasswordBaru"> Show
            </span>
          </div>
        </div>
      </div>
      <div class="mb-3 col-6">
        <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
        <div class="input-group">
          <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
          <div class="input-group-append">
            <span class="input-group-text">
              <input type="checkbox" id="showKonfirmasiPassword"> Show
            </span>
          </div>
        </div>
      </div>
    <div class="mb-3 col-6">
     <label for="image" class="form-label">Foto</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
  </div>
  <button style="margin-left: 35%; margin-top: 25px;" type="submit" class="btn btn-primary w-25" name="submit">Ubah</button>

</form>
<?php endforeach ?>
</div>
<script>
  // Function to toggle password visibility
  function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }

  // Attach event listeners to the "Show" checkboxes
  document.getElementById("showPasswordBaru").addEventListener("change", function () {
    togglePasswordVisibility("password_baru");
  });
  document.getElementById("showKonfirmasiPassword").addEventListener("change", function () {
    togglePasswordVisibility("konfirmasi_password");
  });
</script>
</body>
</html>