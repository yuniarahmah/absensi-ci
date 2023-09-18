<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

    
    <form action="<?php echo base_url()?>Auth/fungsi_login" method="post">
    <h2>Login Form</h2>
  </div>
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
    
    .boy{
     background-color:black;
    }

   </style>
  <div class="ba">
  <body style="background-color:black;">
    <img src="https://anexia.com/blog/wp-content/uploads/2015/01/codeigniter_logo.png" style="width:700px; text-align:center;">
        <div class="container">
          <h1 style="text-align:center;background-color:bisque;">Login</h1>
          <br>
            <form action="<?php echo base_url()?>" method="post" style="text-align:center;">
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
                <label><b>
                <br>
                <button name="submit" type="submit">Log In</button>
            </form>
</body>
  </div>
</html>

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit"><a href="<?= base_url()?>"></a>Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="submit" class="cancelbtn" >Cansel</button>
  </div>
</form>

</body>
</html>

