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

    background-image: url();
    background-repeat: no-repeat;
    background-size:cover;
    width: 20%;
    height: 50%;
    box-shadow: 0 0 10px rgba(255,255,255,.3);
    border-radius:50px
  }
    
    body{
      background-image: url("https://static.vecteezy.com/system/resources/previews/000/833/525/original/grey-abstract-background-with-layers-vector.jpg");
    background-repeat: no-repeat;
    background-size:cover;
    }

   </style>
  <body>
    <div>
    <img src="https://anexia.com/blog/wp-content/uploads/2015/01/codeigniter_logo.png" style="width:700px; text-align:center;">
        <div class="container">
          <h1 style="text-align:center;background-color:bisque;">Register</h1>
          <br>
            <form action="<?php echo base_url('Register/aksi_register')?>" method="post" style="text-align:center;">
                <label><font color='white'><b>
                    Nama Pengguna
                    </b></label><br>@<br></font>
                <input type="text" id="nama_pengguna" name="nama_pengguna"><br>
                <label><font color='white'><b>
                    Email
                    </br></label>#<br></font>
                <input type="text" id="email" name="email"><br>
                <label><font color='white'><b>
                    assword
                    </b></label><br>?<br></font>
        <input type="password" name="password" id="inputPassword">
        <input type="hidden" value="admin" name="role">
        <br><br>
        <input type="checkbox" onclick="myFunction()"><font color='white'>Tampilkan Password</font><br>
        <button name="submit" type="submit">Register</button>
            </form>
       </div>
       <script>
            function myFunction() {
                var x = document.getElementById("inputPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
  </div>
      </body>
</html>
