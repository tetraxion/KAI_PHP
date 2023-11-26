<?php
    include("koneksi.php");


    // Login___________________
    if (isset($_POST["login"])) {
        $email = htmlentities(strip_tags(trim($_POST["email"])));
        $password = htmlentities(strip_tags(trim($_POST["password"])));

        $error_message = "";

        if (empty($email)) {
            $error_message = $error_message. "- Email belum diisi <br>";
        }
        // .= sama dengan  $error_message. 
        if (empty($password)) {
            $error_message .= "- Password belum diisi <br>";
        }

        $email = mysqli_real_escape_string($koneksi, $email);
        $password = mysqli_real_escape_string($koneksi, $password);

        $password_sha1 = sha1($password);

        $query = "
        SELECT * FROM userBarang 
        WHERE email = '$email' AND password = '$password_sha1'";
        $result = mysqli_query($koneksi, $query);

        $count = mysqli_num_rows($result);
        $fetchData = mysqli_fetch_array($result);
        if($count > 0){
            session_start();
            $id_pemesanBarang = $fetchData['id_pemesanBarang'];
            $level = $fetchData['level'];
            $nama = $fetchData['nama'];
            if($level == '1'){
                $_SESSION['id_pemesanBarang'] = $id_pemesanBarang;
                $_SESSION['email'] = $email;
                $_SESSION['level'] = $level;
                $_SESSION['nama'] = $nama;
                header('location:dashboard.php');
            }else if($level == '0'){
                $_SESSION['id_pemesanBarang'] = $id_pemesanBarang;
                $_SESSION['email'] = $email;
                $_SESSION['level'] = $level;
                $_SESSION['nama'] = $nama;
                header('location:reservasiBarang.php');
            }
        }else{
          echo "<script>
          alert('usename atau password salah');
          window.location = 'loginBarang.php'
         </script>";
        }

       
    }
    else {
        $error_message = "";
        $email = "";
        $password = "";
    }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Barang</title>
    <script src="https://kit.fontawesome.com/eeb0128020.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="asset/shortcut.png" type="image/x-icon">  
</head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img style='width:5rem'src="asset/Logo KAI (Kereta Api Indonesia).png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Beranda</a>
              </li>
            </ul>
           
            <div class="coba">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="loginBarang.php">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="regristrasiBarang.php">Register</a>
                    </li>
                  </ul>
            </div>
           
          </div>
        </div>
      </nav>

       
      <div class="justify-content-center" style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;">
        <div class="col-md-5 col-xs-12 col-sm-12" style="margin-top:50px">
            <div class="card" style="border-radius:5px">
                <div class="card-header" style="background-color:#0b56a7;color:#fff;">Login</div>

                <div class="card-body">
                    <form method="POST" action="" >
                        
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">

                            <div style="background-color:#e7e7e7;" class="input-group">
                                <span style="padding-top: 5px;width:25px" class="input-group-addon"><i style='padding-left: 5px;' class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input id="username" type="username" class="form-control " name="email" value="" placeholder="Email atau Nomor HP" required data-error="Username wajib diisi.">
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                        </div>
<br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <div style="background-color:#e7e7e7;" class="input-group">
                                    <span class="input-group-addon" style="padding-top: 5px;width:25px"><i style='padding-left: 5px;'class="fa fa-lock fa"  aria-hidden="true"></i></span>
                                    <input id="password" type="password" class="form-control pass " name="password" placeholder="Password" required="" data-error="Password wajib diisi.">
                                    <i class="glyphicon glyphicon-eye-open form-control-feedback"></i>
                                </div>
                                <div class="help-block with-errors text-danger"></div>

                            </div>
                        </div>

                        <br>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-8">
                                <button type="submit" class="btn btn-primary" name="login">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                            <a href="regristrasiBarang.php"style="text-decoration: none;">
                                Registrasi</a>                           
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>