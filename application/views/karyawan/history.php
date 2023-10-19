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
            <a href="<?php echo base_url('auth/login')?>"><i class="fa-solid fa-right-from-bracket">Logout<hr></i></a> 
            <script type="text/javascript">
              window.onload = date_time('date_time');
              </script>
  </div>
</nav><br>
<br>
<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-green" style="width:15%"><br>
  <i>karyawan <hr></i>
  <a href="/absensii/karyawan/history" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i> History</span></a>

  <a href="<?php echo base_url('karyawan/profil_karyawan') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Profil</span></a></a>

</div>
<hr>

<div class="row container p-3 col-10" style="margin-left:15%;">
  <div style="width:100%; ">
    <div class="shadow p-3 mb-5 bg-body-tertiary rounded"><i class="fa-solid fa-coins"> HISTORY KARYAWAN</i></div>
      <div class="row mb-sm-0" style="margin-top: 25px;">
        <div class="col-5" style="margin-left: 10%;">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <i>Total Karyawan</i>
            <div class="card-header"><?php echo $user?></div>
            <div class="card-body">              <br>
              <div class="card text-center">
                <a href="<?php echo $user?>" class="btn btn-primary">Go Page</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-5" style="margin-left: 25px; ">
          <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <i>Total Absen</i>
            <div class="card-header"><?php echo $absen ?></div>
            <div class="card-body">
              <br>
            <div class="card text-center">
                <a href="" class="btn btn-primary">Go Page</a>
              </div>
            </div>
          </div>
        </div>
        
 </div>
</div>
<div class="how" style="widht:40vh; height:35vh;">
 <table class="table table-striped-columns">
    <thead>
   <tr class="table-success">
       <th style="width:3%;">NO</th>
       <th style="width:5%;">Foto</th>
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
       <th><img src="https://i0.wp.com/www.stignatius.co.uk/wp-content/uploads/2020/10/default-user-icon.jpg?fit=415%2C415&ssl=1" style="width:10rem"></th>
       <td><?php echo tampil_karyawan_byid($row->id_karyawan)?></td>
       <td><?php echo $row->kegiatan?></td>
       <td><?php echo $row->date?></td>
       <td><?php echo $row->jam_masuk?></td>
       <td><?php echo $row->jam_pulang?></td>
       <td><?php echo $row->keterangan?></td>
       <td onclick="myFunction()"><?php echo $row->status?></td>
       <td style="display:flex;"> 
       <a href="<?php echo base_url('karyawan/ubah_karyawan/' . $row->id)?>" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="hapus(<?php echo $row->id ?>)"
                        class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
          </button>
  <?php if ($row->status === "done"):?>
    <button disabled class="btn btn-success" type="submit">pulang</i></a></button>
    <?php else:?>
    <button onclick="pulang('<?php echo $row->id?>')" class="btn btn-success" type="submit">pulang</i></a></button>
    <?php endif;?>
        </td>
     </tr>
     <?php endforeach ?>
     <a href="<?php echo base_url('karyawan/export_karyawan')?>" class="btn btn-outline-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
     
   </tbody>
 </table>
</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
        function pulang(id){
          var yes = confirm('Yakin pulang?');
          if(yes == true) {
            window.location.href = "<?php echo base_url('karyawan/pulang/')?>" + id;
        }
    }
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
</body>
</html>