<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body class="bg-">
<nav class="navbar navbar-expand-lg" style="background:darkgrey" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url('auth/logout');?>">
          <i class="fa-solid fa-house-chimney"></i>Home </a>
          <a class="nav-link active" aria-current="page" style="text-align:center;margin-left: 200px;"><h1>WELCOME TO THE WEB SIS RAHMA</h1>
          <hr></a>
        </li>
      </ul>
    </div>
    
  </div>
</nav>

<div class="d-flex">
        <div class="col-12 bg-dark" style="width: 15%;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
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
                <hr>
            </div>
        </div>
       <br>
       <div class="col-10 card p-2" >
  <h1 style="text-align:center">DETAIL KELAS </h1>

                        <div class="card-body min-vh-100  align-items-center">
                            <div class="card w-100 m-auto p-5" >
                                <a href="<?php echo base_url('admin/tambah_guru')?>"><button type="submit" class="btn btn-primary w-15" name="submit">Tambah </button></a>
                                <?php echo $this->session->set_flashdata('message'); ?>
                                <br>
                                <br>
                                <table class="table  table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No </th>
                                            <th scope="col">Tingkat Kelas </th>
                                            <th scope="col">Jurusan Kelas </th>
                                            <th scope="col"> Aksi </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($kelas as $row) : $no++
                                        ?>
                                        <tr>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $no ?></td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <?php echo $row->tingkat_kelas ?></td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <?php echo $row->jurusan_kelas ?></td>   
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <a href="<?php echo base_url('admin/ubah_kelas/') . $row->id_kelas ?>"
                                                    class="btn btn-sm btn-primary">Ubah <i class="fa-solid fa-pen-to-square"></i></a>
                                                <button onclick="hapus(<?php echo $row->id_kelas ?>)"
                                                 class="btn btn-sm btn-danger">Hapus <i class="fa-solid fa-trash"></i></button>
                                            </td>

                                        </tr><?php endforeach ?>
                                     </tbody>
                                </table>
                            </div>
                            <div>
                                <div>
                                    </div>
                                    <a href="<?php echo base_url('admin');?>"class="btn btn-primary w-15" name="submit">loguot</a>
                            </div>
                            </form>
                    </div>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <script>
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
                       window.location.href = "<?php echo base_url('Admin/hapus_kelas/')?>" + id;
                   });
               }
           });
       }
    </script>
  <br>
</body>
</html>