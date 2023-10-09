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
          <i class="fa-solid fa-house-chimney"></i></a>
        </li>
      </ul>
    </div>
    
  </div>
</nav>
<div class="d-flex">
        <div class="col-12 bg-dark min-vh-100" style="width: 15%;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">INFO SEKOLAH</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                      
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin') ?>" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge-high"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                </ul>
                            </li>
                    <li>
                        <a href="<?php echo base_url('admin/admin') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">admin</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/karyawan') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user-tie"></i> <span class="ms-1 d-none d-sm-inline">Karyawan</span></span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>

    <div class="container py-3 h-auto">
          <h1 style="background-color:lightblue; height: 60px; text-align:center;">Karyawan</h1>
          <a href="<?php echo base_url('admin/tambah_siswa')?>"><button type="submit" class="btn btn-primary w-15" name="submit">Tambah <i class="fa-solid fa-file-circle-plus"></i></button></a>
 
      <table class="table">
        <thead>
            <th scope="col" >No</th>
            <th scope="col" >Nama karyawan</th>
            <th scope="col" >Nisn</th>
            <th scope="col" >Gender</th>
            <th scope="col" >Kelas</th>
            <th scope="col" >Aksi</th>
          </tr>

        </thead>
        <tbody classs="table-grup-divider">
          <?php $no=0; foreach($siswa as $row ): $no++ ?>
          <tr>
            <td>1.</td>
            <td>Rahma</td>
            <td>086909075</td>
            <td></td> 
            <td></td>       
            <td>
                <a href="<?php echo base_url('admin/ubah_siswa/').$row->id_siswa?>" class="btn btn-primary"><i class="fa-solid fa-square-pen"></i></a>
                <button onclick="hapus(<?php echo $row->id_siswa ?>)"
                class="btn btn-danger">
              Hapus  <i class="fa-solid fa-trash"></i>
             </button>
            </td>
            </tr>
           <?php endforeach ?>
        </tbody>
      </table>
      
      <a href="<?php echo base_url('admin');?>"class="btn btn-primary">loguot <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
         </div>
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
                       window.location.href = "<?php echo base_url('Admin/hapus_siswa/')?>" + id;
                   });
               }
           });
       }
    </script>
</script>
</body>
</html>
