<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<script>
  myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
  }
</script>
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
          <i class="fa-solid fa-house-chimney"></i> </a>
          <a class="nav-link active" aria-current="page" style="text-align:center;margin-left: 200px;"><h1></h1>
          <hr></a>
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
                        <a href="" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge-high"></i> <span class="ms-1 d-none d-sm-inline">history</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="admin">
                                </ul>
                            </li>
                    <li>
                        <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">Admin</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('karyawan/karyawan') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user-tie"></i> <span class="ms-1 d-none d-sm-inline">Karyawan</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
       <br>
    <div class="row container py-3 col-10">
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
     <tr class="table-dark">
       <th scope="col">NO</th>
       <th scope="col">Nama Belakang</th>
       <th scope="col">Nama Depan</th>
       <th scope="col">Email</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <th scope="row" class="table-secondary">1</th>
       <td class="table-light">Satria Candra Pamungkas</td>
       <td class="table-secondary">Satria</td>
       <td  class="table-light">@candra</td>
     </tr>
     <tr>
       <th scope="row" class="table-secondary">2</th>
       <td class="table-light">Wahyu Yulianto</td>
       <td class="table-secondary">Yuya</td>
       <td class="table-light">@elena</td>
     </tr>
     <tr>
       <th scope="row" class="table-secondary">3</th>
       <td class="table-light">Andi Saputro</td>
       <td class="table-secondary">Andi</td>
       <td class="table-light">@andi</td>
     </tr>
   </tbody>
 </table>
  </div>
      </div>
</body>
</html>