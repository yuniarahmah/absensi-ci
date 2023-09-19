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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div>
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      </div>
    </form>
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
        <div class="col-12 bg-dark min-vh-100" style="width: 15%;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
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
                        <a href="<?php echo base_url('admin/siswa') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">Siswa</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/guru') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-user-tie"></i> <span class="ms-1 d-none d-sm-inline">Guru</span></a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>

    <div class="container py-3 h-auto">
          <h1 style="background-color:lightblue; height: 60px; text-align:center;">guru</h1>
      <table class="table">
        <thead>
            <th scope="col" >Nama Guru</th>
            <th scope="col" >Nik</th>
            <th scope="col" >Gender</th>
            <th scope="col" >Mapel</th>
            <th scope="col" >Aksi</th>
          </tr>

        </thead>
        <tbody classs="table-grup-divider">
          <?php $no=0; foreach($guru as $row ): $no++ ?>
          <tr>
            <td><?php echo $row ->nama_guru ?></td>
            <td><?php echo $row->nik ?></td>
            <td><?php echo $row->gender?></td>
            <td><?php echo $row->mapel?></td>
            <td>
                <a href="<?php echo base_url('admin/ubah_guru/'). $row->id_guru?>" class="btn btn-primary">Ubah</a>
                <button onclick="hapus(<?php echo $row->id_guru ?>)"
                class="btn btn-danger">
              Hapus
             </button>
            </td>
            </tr>
           <?php endforeach ?>
        </tbody>
      </table>
      <a href="<?php echo base_url('admin/tambah_guru')?>"><button type="submit" class="btn btn-primary w-25" name="submit">Tambah</button></a>
    </div>
</div>
<script>
    function hapus(id){
        var yes = confirm('Yakin Di Hapus?');
        if(yes == true) {
            window.location.href = "<?php echo base_url('admin/hapus_guru/')?>" + id;
        }
    }
</script>
</body>
</html>
