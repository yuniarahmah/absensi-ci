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
    <!-- <h1>selamat datang <?php echo $this->session->userdata('username') ?></h1>
    <a href="<?php echo base_url('auth/logout');?>"
        class="btn btn-primary">
        loguot
</a> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ml-50% mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
</li>
    </ul> 
  </div>
</nav>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
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
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-gauge-high"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                </ul>
                            </li>
                            <li>
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">home</span></a>
                                    
                            </li>
                    <li>
                        <a href="<?php echo base_url('admin/siswa') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-graduation-cap"></i> <span class="ms-1 d-none d-sm-inline">Siswa</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>

    <div class="row container py-3">
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="https://3.bp.blogspot.com/--qQ_pbSFEWA/VkE89PogKjI/AAAAAAAAAAg/YbrmKZaYcw0/s1600/gambar-sekolah-sehat-1.gif" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>  
        </div>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="https://tse3.mm.bing.net/th?id=OIP.YPYBEWBJWTA6_SJZ-SrvhgHaDt&pid=Api&P=0&h=180" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>  
        </div>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="https://tse3.mm.bing.net/th?id=OIP.tE96-FOYf78B5BOUDSF1CQHaFj&pid=Api&P=0&h=180" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>  
        </div>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="https://lh3.googleusercontent.com/proxy/7oT0n4grX02MDzBDPV5YP6_e_bHaDPPSYntDEIkB1exRSmh9b5ULQIPZ-w-foxcvM-hI1PnXbrz3Wf96nORH4w1eIAtTiCo0DlaGkVrikxNUA5equO9qFYKOSmtbqxvoQ4AtYQt_nagklyUhOt0N54JvfCUhAdcVVQT6ruVYaWE1i41paFju=w1200-h630-p-k-no-nu" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>  
        </div>
    </div>
</div>