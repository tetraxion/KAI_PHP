<?php
session_start();

include("koneksi.php");
$id = $_SESSION["id_pemesan"];
$email = $_SESSION["email"];
$nama = $_SESSION["nama"];
if (!isset($_SESSION["email"])) {
  header("Location: loginTiket.php");
}


$NIK = '';
$nama1 = '';

$query = "SELECT * FROM userTiket WHERE id_pemesan = '$id';";
$sql = mysqli_query($koneksi, $query);
$result = mysqli_fetch_row($sql);

$NIK = $result[1];
$nama1 = $result[2];


if (isset($_POST["update"])) {
  $NIK = htmlentities(strip_tags(trim($_POST["NIK"])));
  $nama1 = htmlentities(strip_tags(trim($_POST["nama"])));


  $error_message = "";

  $query = "UPDATE userTiket SET NIK = '$NIK', nama = '$nama1' WHERE id_pemesan = '$id'";
  $sql = mysqli_query($koneksi, $query);

  if ($sql) {
    header("location: profilUsertiket.php");
  } else {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
  }
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
            <a class="nav-link"></a>
          </li>
        </ul>

        <div class="dropdown">
          <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?=$nama?>
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="reservasiTiket.php">Back</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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

              <h3 class="text-light">Profile</h3>

            </div>
            <div class="mb-0">
              <label for="NIK" class="form-label">NIK</label>
              <input type="text" value="<?php echo $NIK ?>" class="form-control" id="NIK" name="NIK" required>
            </div>
            <div class="mb-0">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" value="<?php echo $nama1 ?>" id="nama" name="nama" required>
            </div>
            <br>
            <button type="submit" class="btn btn-outline-light" name="update">Update</button>
          </form>

        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


</body>

</html>