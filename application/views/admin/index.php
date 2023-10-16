<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

    <nav class="navbar bg-body-tertiary" style="position:fixed; width:100%;">
    <div class="container-fluid">
        <a style="text-align-center">Role Admin</a>
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

    </div>
    </nav>
    <br>
    <br>

<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-green">
  <br >
   <h2 style="color:black;">Admin <hr></h2>
  <a href="/absensii/admin/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i>  Dashboard</span></a>

  <a href="<?php echo base_url('admin/admin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-book-open"></i> Admin</span></a></a>

  <a href="<?php echo base_url('karyawan/profil_karyawan') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Karyawan</span></a></a>

  <a href="<?php echo base_url('auth')?>"><i class="fa- fa-right-from-bracket">Logout<hr></i></a> 
</div>

</body>
</html>
