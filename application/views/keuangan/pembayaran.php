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
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('auth/logout');?>">
          <i class="fa-solid fa-house-chimney"></i> </a>
          <a class="nav-link active" aria-current="page" style="text-align:center;margin-left: 200px;"><h1>WELCOME TO THE WEB SIS RAHMA</h1>
          <hr></a>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<div class="d-flex">
        <div class="col-10 bg-dark" style="width: 15%;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">INFO SEKOLAH</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                      
                    </li>
                    <li>
                        <a href="/codeigniter-3/admin/" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge-high"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu"></ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/siswa') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-graduation-cap"></i> <span class="ms-1 d-none d-sm-inline">Siswa</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/account') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-house-user"></i><span class="ms-1 d-none d-sm-inline">Account</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('keuangan/index') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-file-invoice-dollar"></i><span class="ms-1 d-none d-sm-inline">Keuangan</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('keuangan/pembayaran') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-cash-register"></i><span class="ms-1 d-none d-sm-inline">Pembayaran</span></a>
                    </li>
                </ul>
                <hr>
                <a href="<?php echo base_url('admin');?>"class="btn btn-outline-primary">loguot <i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>

    <div class="row container py-3">
    <div class="container py-3 h-auto">
                  <h1 style="background-color:blue; height: 60px; text-align:center;"><font color='white'>DATA PEMBAYARAN</font></h1>
              <table class="table">
                <thead class="table-info ">
                    <th scope="col" >No</th>
                    <th scope="col" >Nama_siswa</th>
                    <th scope="col" >Jenis Pembayaran</th>
                    <th scope="col" >Total Pembayaran</th>
                    <th scope="col" >Aksi</th>
                  </tr>
          
                </thead>
                <tbody classs="table-grup-divider">
                  <?php $no=0; foreach($pembayaran as $row ): $no++ ?>
                  <tr>
                    <td><?php echo $no?></td>
                    <td><?php echo $row->nama_siswa ?></td>
                    <td><?php echo $row->jenis_pembayaran ?></td>
                    <td><?php echo $row->total_pembayaran?></td>
                    <td>
                        <a href="<?php echo base_url('keuangan/ubah_pembayaran/').$row->id?>" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="hapus(<?php echo $row->id?>)"
                        class="btn btn-outline-danger">
                        <i class="fa-regular fa-trash-can"></i>
                      </button>
                     
                    </td>
                  </tr>
                  <?php endforeach ?>
                  <a href="<?php echo base_url('keuangan/export')?>" class="btn btn-outline-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
                </tbody>
              </table>
              <form method="post" enctype="multipart/form-data" action="<?php base_url('keuangan/import') ?>">
          <div>
            <input type="file" name="file">
            <input type="submit" name="import" class="btn btn-outline-secondary" value="import" />
          </div>
        </form>
               <a href="<?php echo base_url('keuangan/tambah_pembayaran')?>" class="btn btn-primary">Tambah <i class="fa-solid fa-square-plus"></i> </a>
    </div>    
      <script>
        function hapus(id) {
          var yes = confirm('Yakin Di Hapus?');
          if (yes == true) {
            window.location.href = "<?php echo base_url('keuangan/delete_pembayaran/') ?>" + id;
          }
        }
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>