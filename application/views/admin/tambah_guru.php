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
<div class = 'card w-50 m-auto p-3'>
<h3 class = 'text-center '>Tambah Guru</h3>   
<form  action="<?php echo base_url('admin/aksi_tambah_guru')?>" method="post" enctype="multipart/from-data">
    <div class="mb-3 col-6">
        <label for="nama" class="form-label">Nama Guru</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3 col-6">
     <label for="nama" class="form-label">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik">
    </div>
    <div class="mb-3 col-6">
    <label for="gender" class="form-label">Gender</label>
    <select name="gender" class="form-select">
        <option selected>pilih gender</option>
        <option value="laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    </div>
    <div class="mb-3 col-6">
    <label for="mapel" class="form-label">Mapel</label>
     <input type="text" class="from-control" id="mapel" name="mapel">
</div>
<button type="submit" class="btn btn-primary w-25" name="submit">Tambah</button>
</form>
</div>
</body>
</html>