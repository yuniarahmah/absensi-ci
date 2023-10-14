<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENDAFTARAN ONLINE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <style>
        .background {
            background-image:url('https://blogct.creative-tim.com/blog/content/images/wordpress/2020/11/How-to-add-Bootstrap-to-HTML-.jpg');
            background-size:cover;
        }
        .background-image-black {
        height: 10px;
        background-color: rgb();
    }
    </style>

</head>
<body class="background">
    <center>
    <h1 style="text-align:center;">ABSENSI KARYAWAN</h1>
    <button class="btn btn-dark w-20">
        <a style="color:white;" href="<?php echo base_url('auth/register') ?>">REGISTER</a>
    </button>
    <button class="btn btn-dark w-20">
        <a style="color:white;" href="<?php echo base_url('auth/register_k') ?>">REGISTER 2</a>
    </button><br><br>
    <button class="btn btn-dark w-20">
        <a style="color:white;" href="<?php echo base_url('auth/login') ?>">LOGIN</a>
    </button>
    </center>
</body>
</html>