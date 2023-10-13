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

  <!-- <button id="myBtn">My Button</button>
  
<p>Click the button below to disable the button above.</p>

<button onclick="myFunction()">Try it</button> -->

  </div>
</nav>

<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-green" style="width:15%"><br>

  <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <a href="/absensii/karyawan/history" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i> History</span></a>

  <a href="<?php echo base_url('karyawan/menu_izin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-book-open"></i> Menu Izin Cuti</span></a></a>

  <a href="<?php echo base_url('karyawan/profil_karyawan') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Profil</span></a></a>

  <a href="<?php echo base_url('auth')?>"><i class="fa-solid fa-right-from-bracket">Logout<hr></i></a> 
</div>


<div class="row container p-3 col-10" style="margin-left:15%;">
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
       <th style="width:5%;">Nama</th>
       <th style="width:5%;">Kegiatan</th>
       <th style="width:5%;">Date</th>
       <th style="width:3%;">Jam Masuk</th>
       <th style="width:3%;">Jam Pulang</th>
       <th style="width:3%;">keterangan Izin</th>
       <th style="width:3%;">Status</th>
       <th style="width:3%;">Aksi</th>
     </tr>
   </thead>
   <tbody>
   <?php $no=0; foreach($karyawan as $row ): $no++ ?>

     <tr>
       <th><?php echo $no ?></th>
       <td><?php echo tampil_full_karyawan_byid($row->id_karyawan)?></td>
       <td><?php echo $row->kegiatan?></td>
       <td><?php echo $row->date?></td>
       <td><?php echo $row->jam_masuk?></td>
       <td><?php echo $row->jam_pulang?></td>
       <td><?php echo $row->keterangan?></td>
       <td onclick="myFunction()"><?php echo $row->status?></td>
       <td style="display:flex;"> 
       <a href="<?php echo base_url('karyawan/ubah_kegiatan/' . $row->id)?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="hapus(<?php echo $row->id ?>)"
                        class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
          </button>
          <?php if ('status' === 'done'):?>
 <div>
     <button sidabled class="btn btn-success" ><i class="fa-solid fa-house-user"><i>home</i></a></button>
    </div>
    <?php endif; ?>
        </td>
     </tr>
     <?php endforeach ?>
     <a href="<?php echo base_url('karyawan/export_karyawan')?>" class="btn btn-outline-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
   </tbody>
 </table>
  </div>
</div>
  <script>
        function hapus(id){
          var yes = confirm('Yakin Di Hapus?');
          if(yes == true) {
            window.location.href = "<?php echo base_url('admin/hapus_siswa/')?>" + id;
        }
    }
   function myFunction() {
  document.getElementById("home").disabled = true;
}
</script>
</body>
</html>