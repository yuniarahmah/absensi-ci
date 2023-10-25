<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="path_to_sweetalert/sweetalert.css">

</head>
<body>
    
<nav class="navbar bg-body-tertiary" style=" width:100%;">
  <div class="container-fluid">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQxjA2k8aeNuFReYdjwIvRzU6S9erT--bKmQ&usqp=CAU" style="width:10%;">     <?php
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
            <span id="date_time" style="margin-right: 40%;"></span>
            <script type="text/javascript">
                window.onload = date_time('date_time');
                </script>
                <a href="<?php echo base_url('auth/login')?>" id="logout-button"><i class="fa-solid fa-right-from-bracket">Logout<hr></i></a> 
  </div>
</nav>
<div class="d-flex">
  <div class="w3-sidebar w3-bar-block w3-black" style="width:15%"><br>
  <i>karyawan <hr></i>
  <a href="/absensii/karyawan/dashboard" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-clock-rotate-left"></i>  Dashboard</span></a>
  
  <a href="<?php echo base_url('karyawan/absen') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-regular fa-newspaper"></i> Menu Absen</span></a></a>

  <a href="<?php echo base_url('karyawan/izin') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-regular fa-envelope"></i> Menu Izin</span></a></a>

  <a href="<?php echo base_url('karyawan/profile') ?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-id-card"></i> Profil</span></a></a>
  
  <a href="<?php echo base_url('karyawan/history')?>" class="w3-bar-item w3-button"><span class="ms-1 d-none d-sm-inline"><i class="fa-solid fa-file-waveform"></i> History</span></a>

</div>
<hr>

<div class="how" style="widht:40%; height:35vh; margin-left:18%; ">
 <table class="table table-striped-columns">
  <div class="shadow p-3 mb-5 bg-body-tertiary rounded"><i class="fa-solid fa-clock-rotate-left"> History Karyawan</i>
</div>
    <thead>
   <tr class="table-secondary">
       <th>NO</th>
       <th>Nama</th>
       <th>Kegiatan</th>
       <th>Date</th>
       <th>Jam Masuk</th>
       <th>Jam Pulang</th>
       <th>keterangan Izin</th>
       <th>Status</th>
       <th>Aksi</th>
     </tr>
   </thead>
   <tbody>
   <?php $no=0; foreach($karyawan as $row ): $no++ ?>

     <tr>
       <th><?php echo $no ?></th>
       <td><?php echo tampil_karyawan_byid($row->id_karyawan)?></td>
       <td><?php echo $row->kegiatan?></td>
       <td><?php echo $row->date?></td>
       <td><?php echo $row->jam_masuk?></td>
       <td><?php echo $row->jam_pulang?></td>
       <td><?php echo $row->keterangan?></td>
       <td onclick="myFunction()"><?php echo $row->status?></td>
       <td style="display:flex; gap:5%"> 
       <a href="<?php echo base_url('karyawan/ubah_karyawan/' . $row->id)?>" class="btn btn-dark"><i class="fa-solid fa-pen-to-square"></i></a>
       <button onclick="hapus(<?php echo $row->id ?>)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
       <?php if ($row->status === "done") : ?>
  <button disabled class="btn btn-success" type="button"><i class="fas fa-check"></i></button>
<?php else : ?>
  <button onclick="pulang(<?= $row->id ?>)" class="btn btn-success" type="button"><i class="fas fa-home"></i></button>
<?php endif; ?>

        </td>
     </tr>
     <?php endforeach ?>
     <a style="margin-bottom:2%" href="<?php echo base_url('karyawan/export')?>" class="btn btn-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
   </tbody>
 </table>
</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function pulang(id) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger',
    },
    buttonsStyling: false,
  });

  // Get the current time
  const currentTime = new Date();
  const currentHour = currentTime.getHours();

  // Define the allowed time (e.g., 14:00)
  const allowedHour = 13;

  if (currentHour < allowedHour) {
    // Display an error message if it's too early to leave
    swalWithBootstrapButtons.fire(
      'Pulang Dilarang',
      'Anda tidak dapat pulang sebelum jam 14.00.',
      'error'
    );
  } else {
    swalWithBootstrapButtons
      .fire({
        title: 'Pulang?',
        text: 'Anda Yakin Ingin pulang!',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, pulang!',
        cancelButtonText: 'Tidak, batalkan!',
        reverseButtons: true,
      })
      .then((result) => {
        if (result.isConfirmed) {
          // Redirect to the URL after confirmation
          window.location.href = '<?= base_url("karyawan/pulang/") ?>' + id;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire('Dibatalkan', 'Tidak Jadi Pulang :)', 'error');
        }
      });
  }
}
</script>

  <script>
    //     function pulang(id){
    //       var yes = confirm('Yakin pulang?');
    //       if(yes == true) {
    //         window.location.href = "<?php echo base_url('karyawan/pulang/')?>" + id;
    //     }
    // }
    function hapus(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger',
        },

        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'

            )
            .then(function() {
              window.location.href = "<?php echo base_url('karyawan/hapus_karyawan/') ?>" + id;
            })
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'cancel',
            'Your file data is safe :>',
            'error'
          )
        }
      })
    }
</script>
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