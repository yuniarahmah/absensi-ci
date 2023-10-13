<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
   
<nav class="navbar navbar-expand-lg" style="background:darkgrey" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('auth/logout')?>">
         log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="d-flex">
        <div class="col-12 bg-dark" style="width: 17%;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">INFO SEKOLAH</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                      
                    </li>
                    <li>
                        <a href="/dashboard" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge-high"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="admin">
                                </ul>
                            </li>
                    <li>
                        <a href="<?php echo base_url('admin') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">Admin</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/karyawan') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user-tie"></i> <span class="ms-1 d-none d-sm-inline">Karyawan</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
       <br>
       <div class="row container py-3">
    <div class="container py-3 h-auto">
                  <h1 style="background-color:grey ; height: 60px; text-align:center;"><font color='white'>karyawan</font></h1>
              <table class="table">
                <thead>
                    <th scope="col" >No</th>
                    <th scope="col" >foto</th>
                    <th scope="col" >Nama siswa</th>
                    <th scope="col" >Nisn</th>
                    <th scope="col" >Gender</th>
                    <th scope="col" >Id_kelas</th>
                    <th scope="col" >Aksi</th>
                  </tr>
          
                </thead>
                <tbody classs="table-grup-divider">
                  <?php $no=0; foreach($absen as $row ): $no++ ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><img src="<?php echo base_url('images/siswa/'. $row->foto)?>" width="50px"></td>
                    <td>
                        <a href="<?php echo base_url('admin/ubah_siswa/').$row->id_siswa?>" class="btn btn-primary">Ubah</a>
                        <button onclick="hapus(<?php echo $row->id_siswa ?>)"
                        class="btn btn-danger">
                      Hapus
                     </button>
                    </td>
                    </tr>
                   <?php endforeach ?>
                   <a href="<?php echo base_url('admin/expor_tsiswa')?>" class="btn btn-outline-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
                </tbody>
              </table>
              <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/import') ?>">
          <div>
            <input type="file" name="file">
            <input type="submit" name="import" class="btn btn-outline-secondary" value="import" />
          </div>
        </form>
              <a href="<?php echo base_url('admin/tambah_siswa')?>"><button type="submit" class="btn btn-primary w-25" name="submit">Tambah</button></a>
    </div>
      <script>
        function hapus(id){
          var yes = confirm('Yakin Di Hapus?');
          if(yes == true) {
            window.location.href = "<?php echo base_url('admin/hapus_siswa/')?>" + id;
        }
    }
</script>
</body>
</html>
