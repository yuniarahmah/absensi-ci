<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LOGIN </title>    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<style>
body{
    height: 100vh;
    background-image: url(https://dosenit.com/wp-content/uploads/2020/10/Gunung-Fuji-Jepang-1024x640-1.jpg);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
  /* test */
  .login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
  }
  
  .login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    color: #fff;
    text-align: center;
  }
  
  .login-box .user-box {
    position: relative;
  }
  
  .login-box .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
  }
  .login-box .user-box label {
    position: absolute;
    top:0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
  }
  
  .login-box .user-box input:focus ~ label,
  .login-box .user-box input:valid ~ label {
    top: -40px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
  }  
  .container form button{
    width: 100%;
    height: 40px;
    padding: 5px 0;
    border: none;
    background-color:#752BEA;
    font-size: 18px;
    color: #fafafa;
    border-radius: 20px;
} 
</style>
<body>
    <div class="login-box"> 
      <div class="container">
        <h1 style="color:white; text-align:center;">LOGIN</h1><br>
        <form action="<?php echo base_url('auth/fungsi_login')?>" method="post" style="text-align:center;">

          <div class="user-box">
            <input type="text" name="email" id="email"><br><br>
            <label>Email</label>
          </div>
          <div class="user-box">
            <div class="input-group-append" >
            <input type="password" name="password" id="pass"><br>
            <label>Password</label>
                            <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                            <span id="mybutton" onclick="change()" class="input-group-text" style="height:45px;">
    
                                <!-- icon mata bawaan bootstrap  -->
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>
                            </span>
                        </div>
          </div><br>
          <p style="color:white"> belum punya akun<a href="register_k"> silahkan register </a></p>
            <button type="submit" name="submit"> Login </button>
        </form>
      </div>
      </div>
    <script>
            // membuat fungsi change
            function change() {
    
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('pass').type;
    
                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {
    
                    //ubah form input password menjadi text
                    document.getElementById('pass').type = 'text';
                    
                     //ubah icon mata terbuka menjadi terbuka
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
                }
                else {
    
                    //ubah form input password menjadi text
                    document.getElementById('pass').type = 'password';
    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
                }
            }
        </script>
</body>
</html>
