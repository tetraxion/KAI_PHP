<?php
  include("koneksi.php");

    // Registration_____
    if (isset($_POST["register"])) {
        $NIK = htmlentities(strip_tags(trim($_POST["NIK"])));
        $nama = htmlentities(strip_tags(trim($_POST["nama"])));
        $email = htmlentities(strip_tags(trim($_POST["email"])));
        $password = htmlentities(strip_tags(trim($_POST["password"])));

        $error_message="";

        $email = mysqli_real_escape_string($koneksi, $email);
        $query = "SELECT * FROM userTiket WHERE email='$email'";
        $query_result = mysqli_query($koneksi, $query);

        $data_amount = mysqli_num_rows($query_result);
        if ($data_amount >= 1 ) {
            $error_message .= " - Email Yang Sama Telah Terdaftar <br>";
        }

        if ($error_message === "") {
            $NIK = mysqli_real_escape_string($koneksi, $NIK );
            $nama = mysqli_real_escape_string($koneksi, $nama );
            $email = mysqli_real_escape_string($koneksi, $email );
            $password = mysqli_real_escape_string($koneksi, $password );

            $password = sha1($password);
            $query = "INSERT INTO userTiket VALUES ";
            $query .= "('','$NIK', '$nama', '$email', '$password','')";
    
            $result = mysqli_query($koneksi, $query);
    
            if($result) {
              echo "<script>
              alert('selamat anda telah berhasil regristrasi');
              window.location = 'loginTiket.php'
             </script>";
            }
            else {
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
            }
        }

    } 
    else {
      $error_message = "";
      $NIK = "";
      $nama = "";
      $email = "";
      $password = "";
    }
    ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pemesanan Tiket</title>
  <script src="https://kit.fontawesome.com/eeb0128020.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="shortcut icon" href="asset/shortcut.png" type="image/x-icon">
  <link rel="stylesheet" href="css/styleregritertiket.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img style='width:5rem' src="asset/Logo KAI (Kereta Api Indonesia).png" alt=""></a>
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
              <a class="nav-link" href="loginTiket.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="regristrasiTiket.php">Register</a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </nav>


  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-sm rounded text-light" style="background-color: #0B56A7">
          <form action="" method="POST">
            <div class="text-center">

              <h3 class="text-light">Registrasi</h3>

            </div>
            <div class="mb-0">
              <label for="NIK" class="form-label">NIK</label>
              <input type="number" class="form-control" id="NIK" name="NIK" required>
            </div>
            <div class="mb-0">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-0">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-0">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div><br>
            <button type="submit" class="btn btn-info" name="register">Register</button>
          </form>
          <div align="center">
            <p>Sudah Punya Akun?</p>
            <a href="loginTiket.php"><button class="btn btn-danger">Login</button></a>
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