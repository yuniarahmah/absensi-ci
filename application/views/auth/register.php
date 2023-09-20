<html>
<head>
    <title>Membuat Form Pendaftaran Registrasi Dengan PHP MySQL</title>    
</head>
<style>
    .container{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    padding: 20px 25px;
    width: 300px;

    background-image: url("");
    background-repeat: no-repeat;
    background-size:cover;
    width: 20%;
    height: 50%;
    box-shadow: 0 0 10px rgba(255,255,255,.3);
    border-radius:50px
  }
    
  body{
    background-image: url("https://static.vecteezy.com/system/resources/previews/000/544/710/original/black-abstract-background-vector-gray-abstract-modern-design-background-for-report-and-project-presentation-template-vector-illustration-graphic-dot-and-circular-shape-product-advertising-present.jpg");
    background-repeat: no-repeat;
    background-size:cover;
    }

   </style>
  <div class="ba">
  <body style="background-color:black;">
    <img src="https://anexia.com/blog/wp-content/uploads/2015/01/codeigniter_logo.png" style="width:700px; text-align:center;">
        <div class="container">
          <h1 style="text-align:center;background-color:bisque;">Registrasi</h1>
          <br>
            <form action="<?php echo base_url('Register/aksi_register')?>" method="post" style="text-align:center;">
                <label><font color='white'><b>
                    nama_pengguna
                    </b></label><br>@<br></font>
                <input type="text" id="nama_pengguna" name="nama_pengguna"><br>
                <label><font color='white'><b>
                    email
                    </br></label>#<br></font>
                <input type="text" id="email" name="email"><br>
                <label><font color='white'><b>
                    Password
                    </br></label>?<br></font>
                <input type="password" id="password" name="password"><br>
                <input type="hidden" id="role" name="role" value="admin"><br>
                <label><b>
                <br>
                <button name="submit" type="submit">Registrasi</button>
            </form>
</body>
  </div>
</html>
