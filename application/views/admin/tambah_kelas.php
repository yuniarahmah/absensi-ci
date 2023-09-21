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
<h3 class = 'text-center '>Tambah Kelas</h3>   
<form  action="<?php echo base_url('admin/aksi_tambah_kelas')?>" method="post" enctype="multipart/from-data">
    <div class="mb-3 col-6">
        <label for="jurusan_kelas" class="form-label">Jurusan_kelas 
            </label>
            <input type="text" class="form-control" id="jurusan_kelas" name="jurusan_kelas">
        </div>
        <div class="mb-3 col-6">
            <label for="tingkat_kelas" class="form-label">Tingkat Kelas</label>
            <input type="text" class="form-control" id="tingkat_kelas" name="tingkat_kelas">
        </div>
<button type="submit" class="btn btn-primary w-25" name="submit">Tambah</button>
</form>
</div>
</body>
</html>