<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Daftar</title>
<link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' rel = 'stylesheet'
integrity = 'sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9' crossorigin = 'anonymous'>
</head>

<body class = 'min-vh-100 d-flex align-items-center'>
<div>
<nav class="navbar navbar-expand-lg" style="background:darkgrey; width:145%">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('auth/logout');?>">
          <i class="fa-solid fa-house-chimney"></i>Home <hr></a>
          <a class="nav-link active" aria-current="page" style="text-align:center;margin-left: 200px;"><h1>WELCOME TO THE WEB SIS RAHMA</h1>
          <hr></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
 <div class="d-flex">
<div class="col-12 bg-dark" style="width: 20%;">
            <div class=" flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">INFO SEKOLAH</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                      
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin') ?>" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge-high"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="admin">
                                </ul>
                            </li>
                    <li>
                        <a href="<?php echo base_url('admin/siswa') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">Siswa</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/guru') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user-tie"></i> <span class="ms-1 d-none d-sm-inline">guru</span></a>
                    </li>
                </ul>
            </div>
        </div>
<div class = 'card w-50 m-auto p-3'>
<h3 class = 'text-center'>Update</h3>
<?php foreach($siswa as $data_siswa): ?>   
<form  action="<?php echo base_url('admin/aksi_ubah_siswa')?>" method="post" enctype="multipart/from-data">
<input type="hidden" name="id_siswa" value="<?php echo $data_siswa->id_siswa ?>">
    <div class="mb-3 col-6">
        <label for="nama" class="form-label">nama Siswa</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_siswa->nama_siswa ?>">
    </div>
    <div class="mb-3 col-6">
     <label for="nama" class="form-label">NISN</label>
      <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data_siswa->nisn?>">
    </div>
    <div class="mb-3 col-6">
    <label for="gender" class="form-label">Gender</label>
    <select name="gender" class="form-select">
        <option selected value="<?php echo $data_siswa->gender?>">
        <?php echo $data_siswa->gender?>
        </option>
        <option value="laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    <div class="mb-3 col-6">
    <label for="kelas" class="form-label">Kelas</label>
    <select name="kelas" class="form-select">    
        <option selected value="<?php echo $data_siswa->id_kelas?>">
        <?php echo tampil_full_kelas_byid($data_siswa->id_kelas) ?>
    </option>
    <?php foreach($kelas as $row):?>
            <option value="<?php echo $row->id_kelas?>">
           <?php echo $row->tingkat_kelas.' '.$row->jurusan_kelas ?>
        </option>
        <?php endforeach ?>
    </select>
    </div>
<button type="submit" class="btn btn-primary w-25" name="submit">ubah</button>
</form>
<?php endforeach ?>
</div>
</div>
</div>
</body>
</html>