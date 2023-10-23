<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Profile</title>
</head>
<style>
/* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root {
    /* ===== Colors ===== */
    --panel-color: #FFF;
    --text-color: #000;
    --black-light-color: #707070;
    --border-color: #e6e5e5;
    --toggle-color: #DDD;
    --box1-color: #4DA3FF;
    --box2-color: #FFE6AC;
    --box3-color: #E7D1FC;
    --title-icon-color: #fff;

    /* ====== Transition ====== */
    --tran-05: all 0.5s ease;
    --tran-03: all 0.3s ease;
    --tran-03: all 0.2s ease;
}

body {
    min-height: 100vh;
}

body.dark {
    --panel-color: #242526;
    --text-color: #CCC;
    --black-light-color: #CCC;
    --border-color: #4D4C4C;
    --toggle-color: #FFF;
    --box1-color: #3A3B3C;
    --box2-color: #3A3B3C;
    --box3-color: #3A3B3C;
    --title-icon-color: #CCC;
}

/* === Custom Scroll Bar CSS === */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    border-radius: 12px;
    transition: all 0.3s ease;
}

::-webkit-scrollbar-thumb:hover {
    background: #0b3cc1;
}

body.dark::-webkit-scrollbar-thumb:hover,
body.dark .activity-data::-webkit-scrollbar-thumb:hover {
    background: #3A3B3C;
}

nav {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
    background-color: var(--panel-color);
    border-right: 1px solid var(--border-color);
    transition: var(--tran-05);
}

nav.close {
    width: 73px;
}

nav .logo-name {
    display: flex;
    align-items: center;
}

nav .logo-image {
    display: flex;
    justify-content: center;
    min-width: 45px;
}

nav .logo-image img {
    width: 40px;
    object-fit: cover;
    border-radius: 50%;
}

nav .logo-name .logo_name {
    font-size: 22px;
    font-weight: 600;
    color: var(--text-color);
    margin-left: 14px;
    transition: var(--tran-05);
}

nav.close .logo_name {
    opacity: 0;
    pointer-events: none;
}

nav .menu-items {
    margin-top: 40px;
    height: calc(100% - 90px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.menu-items li {
    list-style: none;
}

.menu-items li a {
    display: flex;
    align-items: center;
    height: 50px;
    text-decoration: none;
    position: relative;
}

.nav-links li a:hover:before {
    content: "";
    position: absolute;
    left: -7px;
    height: 5px;
    width: 5px;
    border-radius: 50%;
}

body.dark li a:hover:before {
    background-color: var(--text-color);
}

.menu-items li a i {
    font-size: 24px;
    min-width: 45px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--black-light-color);
}

.menu-items li a .link-name {
    font-size: 18px;
    font-weight: 400;
    color: var(--black-light-color);
    transition: var(--tran-05);
}

nav.close li a .link-name {
    opacity: 0;
    pointer-events: none;
}



.menu-items .logout-mode {
    padding-top: 10px;
    border-top: 1px solid var(--border-color);
}



.menu-items .mode-toggle {
    position: absolute;
    right: 14px;
    height: 50px;
    min-width: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.mode-toggle .switch {
    position: relative;
    display: inline-block;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
}

.switch:before {
    content: "";
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
    height: 15px;
    width: 15px;
    background-color: var(--panel-color);
    border-radius: 50%;
    transition: var(--tran-03);
}

body.dark .switch:before {
    left: 40px;
}

.dashboard {
    position: relative;
    left: 250px;
    background-color: var(--panel-color);
    min-height: 100vh;
    width: calc(100% - 250px);
    padding: 10px 14px;
    transition: var(--tran-05);
}

nav.close~.dashboard {
    left: 73px;
    width: calc(100% - 73px);
}

.dashboard .top {
    position: fixed;
    top: 0;
    left: 250px;
    display: flex;
    width: calc(100% - 250px);
    justify-content: space-between;
    align-items: center;
    padding: 10px 14px;
    background-color: var(--panel-color);
    transition: var(--tran-05);
    z-index: 10;
}

nav.close~.dashboard .top {
    left: 73px;
    width: calc(100% - 73px);
}

.dashboard .top .sidebar-toggle {
    font-size: 26px;
    color: var(--text-color);
    cursor: pointer;
}

.dashboard .top .search-box {
    position: relative;
    height: 45px;
    max-width: 600px;
    width: 100%;
    margin: 0 30px;
}



.top img {
    width: 40px;
    border-radius: 50%;
}

.dashboard .dash-content {
    padding-top: 50px;
}

.dash-content .title {
    display: flex;
    align-items: center;
    margin: 60px 0 30px 0;
}

.dash-content .title i {
    position: relative;
    height: 35px;
    width: 35px;
    border-radius: 6px;
    color: var(--title-icon-color);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.dash-content .title .text {
    font-size: 24px;
    font-weight: 500;
    color: dark;
    margin-left: 10px;
}

.dash-content .boxes {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.dash-content .boxes .box {
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 12px;
    width: calc(100% / 3 - 15px);
    padding: 15px 20px;
    background-color: var(--box1-color);
    transition: var(--tran-05);
}

.boxes .box i {
    font-size: 35px;
    color: var(--text-color);
}

.boxes .box .text {
    white-space: nowrap;
    font-size: 18px;
    font-weight: 500;
    color: var(--text-color);
}

.boxes .box .number {
    font-size: 40px;
    font-weight: 500;
    color: var(--text-color);
}

.boxes .box.box2 {
    background-color: var(--box2-color);
}

.boxes .box.box3 {
    background-color: var(--box3-color);
}

.dash-content .activity .activity-data {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.activity .activity-data {
    display: flex;
}

.activity-data .data {
    display: flex;
    flex-direction: column;
    margin: 0 15px;
}

.activity-data .data-title {
    font-size: 20px;
    font-weight: 500;
    color: var(--text-color);
}

.activity-data .data .data-list {
    font-size: 18px;
    font-weight: 400;
    margin-top: 20px;
    white-space: nowrap;
    color: var(--text-color);
}

@media (max-width: 1000px) {
    nav {
        width: 73px;
    }

    nav.close {
        width: 250px;
    }

    nav .logo_name {
        opacity: 0;
        pointer-events: none;
    }

    nav.close .logo_name {
        opacity: 1;
        pointer-events: auto;
    }

    nav li a .link-name {
        opacity: 0;
        pointer-events: none;
    }

    nav.close li a .link-name {
        opacity: 1;
        pointer-events: auto;
    }

    nav~.dashboard {
        left: 73px;
        width: calc(100% - 73px);
    }

    nav.close~.dashboard {
        left: 250px;
        width: calc(100% - 250px);
    }

    nav~.dashboard .top {
        left: 73px;
        width: calc(100% - 73px);
    }

    nav.close~.dashboard .top {
        left: 250px;
        width: calc(100% - 250px);
    }

    .activity .activity-data {
        overflow-X: scroll;
    }
}

@media (max-width: 780px) {
    .dash-content .boxes .box {
        width: calc(100% / 2 - 15px);
        margin-top: 15px;
    }
}

@media (max-width: 560px) {
    .dash-content .boxes .box {
        width: 100%;
    }
}

@media (max-width: 400px) {
    nav {
        width: 0px;
    }

    nav.close {
        width: 73px;
    }

    nav .logo_name {
        opacity: 0;
        pointer-events: none;
    }

    nav.close .logo_name {
        opacity: 0;
        pointer-events: none;
    }

    nav li a .link-name {
        opacity: 0;
        pointer-events: none;
    }

    nav.close li a .link-name {
        opacity: 0;
        pointer-events: none;
    }

    nav~.dashboard {
        left: 0;

        width: 100%;
    }

    nav.close~.dashboard {
        left: 73px;
        width: calc(100% - 73px);
    }

    nav~.dashboard .top {
        left: 0;
        width: 100%;
    }

    nav.close~.dashboard .top {
        left: 0;
        width: 100%;
    }
}
</style>

<body>
<nav class="navbar bg-body-tertiary" style=" width:100%;">
  <div class="container-fluid">
<i style="margin-bottom:3%">Absensi karyawan </i>
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
<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-black" style="width:15%"><br>
  <i>karyawan <hr></i>
  <a href="/absensii/karyawan/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i>  Dashboard</span></a>
  
  <a href="<?php echo base_url('karyawan/history')?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i> History</span></a>

<a href="<?php echo base_url('karyawan/profil_karyawan') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Profil</span></a></a>

</div>
<hr>
<div style="margin-left:20%; margin-right:15%; position:fixed" class = 'card w-20px p-3 shadow-lg p-3 mb-5  rounded'>
               <div class="container">
                    <div class="row">
                                <?php $no = 0;
                            foreach ($user as $row) : $no++; ?>
                            <div class="w-100 m-auto p-3">
                                    <br>
                                    <div><?php echo $this->session->flashdata('message'); ?></div>
                                    <div><?php echo $this->session->flashdata('sukses'); ?></div>
                                    <div class="row " style="text-align:center;">
                                        <input name="id" type="hidden" value="<?php echo $row->id ?>">
                                        <div class="text"><b> Akun
                                        <?php echo $this->session->userdata('username'); ?></b>
                                        </div>
                                        <span class="border border-0 btn btn-link">
                                            <?php if (!empty($row->image)): ?>
                                            <img src="<?php echo  base_url('./image/karyawan' . $row->image) ?>" height="150"
                                                width="150" class="rounded-circle">

                                            <?php else: ?>
                                            <img class="rounded-circle " height="150" width="150"
                                                src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" />
                                            <?php endif;?>
                                        </span>
                                                  
                                        <br>
                                        <br>
                                        <form method="post"
                                            action="<?php echo base_url('karyawan/aksi_update_profile'); ?>"
                                            enctype="multipart/form-data">
                                            <input name="id" type="hidden" value="<?php echo $row->id; ?>">
                                            <div class="d-flex flex-row ">
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5"><b>Nama Depan</b></label>
                                                    <input type="text" class="form-control" id="nama_depan"
                                                        name="nama_depan" placeholder="Nama Depan"
                                                        value="<?php echo $row->nama_depan; ?>">

                                                    <label for="" class="form-label fs-5"><b>Username</b></label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Username"
                                                        value="<?php echo $row->username; ?>">
                                                </div>
                                                <br>
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5"><b>Nama Belakang</b></label>
                                                    <input type="text" class="form-control" id="nama_belakang"
                                                        name="nama_belakang" placeholder="Nama Belakang"
                                                        value="<?php echo $row->nama_belakang; ?>"></div>
                                            </div>
                                            <input type="file" name="foto" class="p-3">
                                            <button type="submit" class="btn btn-sm btn-outline-success col-5" name=" submit">Ubah
                                        Profile</button>

                                            <form action="<?php echo base_url('karyawan/aksi_password'); ?>"
                                    enctype="multipart/form-data" method="post">
                                    <div class="mb-3 col-5  " >
                            <label for="password_baru" class="form-label">Password Baru</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="password_baru" name="password_baru">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <input type="checkbox" id="showPasswordBaru"> cek
                                </span>
                            </div>
                            </div>
                                    <div class="mb-3 col-15  " >
                            <label for="password_lama" class="form-label">Password Lama</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="password_lama" name="password_lama">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <input type="checkbox" id="showPasswordlama"> cek
                                </span>
                            </div>
                            </div>
                        </div>
                        <div class="mb-3 col-15">
                            <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <input type="checkbox" id="showKonfirmasiPassword"> cek
                                </span>
                            </div>
                            </div>
                                                <button type="submit" class="btn btn-sm btn-outline-success col-5" name=" submit">Ubah Password</button>
                                                <a class="btn btn-outline-warning col-5" href="<?php echo base_url('karyawan/hapus_image'); ?>">
                                                    Hapus
                                                    Foto</a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<!-- <div style="margin-top:20px; margin-left:20%; margin-right:15%; position:fixed" class = 'card w-20px p-3 shadow-lg p-3 mb-5  rounded'>
               <div class="container">
                    <div class="row">
                                <?php $no = 0;
                            foreach ($user as $row) : $no++; ?>
                            <div class="w-100 m-auto p-3">
                                    <br>
                                    <div><?php echo $this->session->flashdata('message'); ?></div>
                                    <div><?php echo $this->session->flashdata('sukses'); ?></div>
                                    <div class="row " style="text-align:center;">
                                        <input name="id" type="hidden" value="<?php echo $row->id ?>">
                                        <div class="text"><b> Akun
                                        <?php echo $this->session->userdata('username'); ?></b>
                                        </div>
                                        <span class="border border-0 btn btn-link">
                                            <?php if (!empty($row->image)): ?>
                                            <img src="<?php echo  base_url('./image/' . $row->image) ?>" height="150"
                                                width="150" class="rounded-circle">

                                            <?php else: ?>
                                            <img class="rounded-circle " height="150" width="150"
                                                src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" />
                                            <?php endif;?>
                                        </span>
                                                  
                                        <br>
                                        <br>
                                        <form method="post"
                                            action="<?php echo base_url('karyawan/aksi_update_profile'); ?>"
                                            enctype="multipart/form-data">
                                            <input name="id" type="hidden" value="<?php echo $row->id; ?>">
                                            <div class="d-flex flex-row ">
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5"><b>Nama Depan</b></label>
                                                    <input type="text" class="form-control" id="nama_depan"
                                                        name="nama_depan" placeholder="Nama Depan"
                                                        value="<?php echo $row->nama_depan; ?>">

                                                    <label for="" class="form-label fs-5"><b>Username</b></label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Username"
                                                        value="<?php echo $row->username; ?>">
                                                </div>
                                                <br>
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5"><b>Nama Belakang</b></label>
                                                    <input type="text" class="form-control" id="nama_belakang"
                                                        name="nama_belakang" placeholder="Nama Belakang"
                                                        value="<?php echo $row->nama_belakang; ?>"></div>
                                            </div>
                                            <input type="file" name="foto" class="p-3">
                                            <button type="submit" class="btn btn-sm btn-outline-success col-5" name=" submit">Ubah
                                        Profile</button>

                                            <form action="<?php echo base_url('karyawan/aksi_password'); ?>"
                                    enctype="multipart/form-data" method="post">
                                    <div class="mb-3 col-5  " >
                            <label for="password_baru" class="form-label">Password Baru</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="password_baru" name="password_baru">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <input type="checkbox" id="showPasswordBaru"> cek
                                </span>
                            </div>
                            </div>
                                    <div class="mb-3 col-15  " >
                            <label for="password_lama" class="form-label">Password Lama</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="password_lama" name="password_lama">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <input type="checkbox" id="showPasswordlama"> cek
                                </span>
                            </div>
                            </div>
                        </div>
                        <div class="mb-3 col-15">
                            <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <input type="checkbox" id="showKonfirmasiPassword"> cek
                                </span>
                            </div>
                            </div>
                                                <button type="submit" class="btn btn-sm btn-outline-success col-5" name=" submit">Ubah Password</button>
                                                <a class="btn btn-outline-warning col-5" href="<?php echo base_url('karyawan/hapus_image'); ?>">
                                                    Hapus
                                                    Foto</a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

    <script>
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
  document.getElementById("showPasswordlama").addEventListener("change", function () {
    togglePasswordVisibility("password_lama");
  });
 </script>
</body>
<script>
function logout(id) {
    swal.fire({
        title: ' Yakin Ingin Log Out',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Log Out'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Log Out',
                showConfirmButton: false,
                timer: 1500,

            }).then(function() {
                window.location.href = "<?php echo base_url('auth/logout/')?>" + id;
            });
        }
    });
}
</script>

</html>