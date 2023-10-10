<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #ffa12c;
}

.container {
    width: 100%;
    display: flex;
    max-width: 850px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.login {
    width: 400px;
}

form {
    width: 250px;
    margin: 60px auto;
}

h1 {
    margin: 20px;
    text-align: center;
    font-weight: bolder;
    text-transform: uppercase;
}

hr {
    border-top: 2px solid #ffa12c;
}

p {
    text-align: center;
    margin: 10px;
}

.right img {
    width: 450px;
    height: 100%;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}

form label {
    display: block;
    font-size: 16px;
    font-weight: 600;
    padding: 5px;
}

input {
    width: 100%;
    margin: 2px;
    border: none;
    outline: none;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid gray;
}

button {
    border: none;
    outline: none;
    padding: 8px;
    width: 252px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
    border-radius: 5px;
    background: #ffa12c;
}

button:hover {
    background: rgba(214, 86, 64, 1);
}


@media (max-width: 880px) {
    .container {
        width: 100%;
        max-width: 750px;
        margin-left: 20px;
        margin-right: 20px;
    }

    form {
        width: 300px;
        margin: 20px auto;
    }

    .login {
        width: 400px;
        padding: 20px;
    }

    button {
        width: 100%;
    }

    .right img {
        width: 100%;
        height: 100%;
    }
  }
</style>
<body>
    <div class="container">
        <div class="login">
        <form action="<?php echo base_url('auth/aksi_register')?>" method="post" style="text-align:center;">
                <h1>REGISTER ADMIN</h1>
                <hr>
                <p>Isi data dibawah ini untuk registrasi </p>
                <div class="user-box">
                  <label>Username</label>
            <input type="text" name="username" id="username">
          </div>
          <div class="user-box">
            <label>Email</label>
            <input type="text" name="email" id="email">
          </div>
          <div class="user-box">
            <label>Nama Depan</label>
            <input type="text" name="nama_depan" id="nama_depan">
          </div>
          <div class="user-box">
            <label>Nama Belakang</label>
            <input type="text" name="nama_belakang" id="nama_belakang">
          </div>
          <div class="user-box">
            <label>password</label>
            <input type="password" name="password" id="inputpassword">
            <input type="hidden" value="admin" name="role">
          </div>
          <button type="submit"><a href="<?php echo base_url('auth/login') ?>">Register</a></button>
        </form>
        </div>
        <div class="right">
            <img src="https://png.pngtree.com/element_origin_min_pic/16/07/06/23577d1d403788d.jpg" alt="">
        </div>
    </div>
    <!-- testss -->
</body>

</html>
