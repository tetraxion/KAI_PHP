<?php
      function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
      }

      session_start();

      $id = $_SESSION["id_pemesan"];
      $email = $_SESSION["email"];
      $nama = $_SESSION["nama"];
      
      debug_to_console($id);

      include("koneksi.php");
  
      if (isset($_POST["pesanTiket"])) {
        $stasiunAsal = htmlentities(strip_tags(trim($_POST["stasiunAsal"])));
        $stasiunTujuan = htmlentities(strip_tags(trim($_POST["stasiunTujuan"])));
        $tanggalKeberangkatan = htmlentities(strip_tags(trim($_POST["tanggalKeberangkatan"])));
        $jumlahPenumpang = htmlentities(strip_tags(trim($_POST["jumlahPenumpang"])));
       
        $error_message="";
  
        if (empty($stasiunAsal )) {
          $error_message .= "- Nama belum diisi <br>";
        }
        if (empty($stasiunTujuan )) {
          $error_message .= "- Nama belum diisi <br>";
        }
        if (empty($tanggalKeberangkatan)) {
          $error_message .= "- Nama belum diisi <br>";
        }
        if (empty($jumlahPenumpang)) {
          $error_message .= "- Nama belum diisi <br>";
        }
  
        if ($error_message === "") {
          $stasiunAsal = mysqli_real_escape_string($koneksi, $stasiunAsal);
          $stasiunTujuan = mysqli_real_escape_string($koneksi, $stasiunTujuan);
          $tanggalKeberangkatan = mysqli_real_escape_string($koneksi, $tanggalKeberangkatan);
          $jumlahPenumpang = mysqli_real_escape_string($koneksi, $jumlahPenumpang);
      

          $query = "INSERT INTO reservasitiket VALUES ";
          $query .= "('','$id','$stasiunAsal','$stasiunTujuan', '$tanggalKeberangkatan', $jumlahPenumpang)";
  
          $result = mysqli_query($koneksi, $query);
  
          if($result) {
            echo "<script>
            alert('selamat anda telah berhasil regristrasi');
            window.location = 'reservasiTiket.php'
           </script>";
          }
          else {
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
          }
        }
      } 
      else {
        $error_message = "";
        $stasiunAsal = "";
        $stasiunTujuan ="";
        $tanggalKeberangkatan ="";
        $jumlahPenumpang = "";
      }
  
  
  ?>


 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservasi Tiket</title>
  <script src="https://kit.fontawesome.com/eeb0128020.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="shortcut icon" href="asset/shortcut.png" type="image/x-icon">
  <style>
    @media screen and (max-width: 600px) {
      * {
        font-size: 3vw;
      }

      .input-container {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
      }

    }

    .input-container {
      display: flex;
      margin: 10px;
    }

    form {
      position: relative;
      direction: ltr;
    }

    .tasksInput {
      margin-right: 10px;
    }

    .submit-and-options {
      position: absolute;
      right: 0;
      top: 0;
    }
  </style>
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
            <li><a class="dropdown-item" href="profilUsertiket.php">Profil</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div id="content-wrapper" style="color:white; background-color:#0b56a7 ;margin-top: 10px; padding: 15px; width: 1150px; max-width: 90%; margin-left: auto; margin-right: auto; border-radius: 5px;">
    <div>
      <h3>Pemesanan Tiket Kereta Api</h2>
        <p id="tanggal">09/01/2002</p>
        <br>
        <form action="" method="POST">
          <div class="input-container">
            <div style="width: 100%;">
              <h3 for="stasiun_asal">Stasiun Asal</h3>
              <div class="tasksInput">
                <select placeholder="Stasiun Asal" name="stasiunAsal"  id="stasiun_asal" type="text" class="form-control"value="<?php echo $stasiunAsal ?>">
                  <script>
                    var dat;
                    var stasiun_asal = document.getElementById("stasiun_asal")
                    fetch('https://booking.kai.id/api/stations2')
                      .then((response) => response.json())
                      .then((data) => {
                        dat = data
                      })
                      .then(() => {
                        for (let i = 0; i < dat.length; i++) {
                          var x = document.createElement("option");
                          var y = `${dat[i]["city"]}     ${dat[i]["code"]}`
                          x.innerHTML = y
                          x.setAttribute("value", y)
                          stasiun_asal.appendChild(x)
                        }
                      });
                  </script>
                </select>
              </div>
            </div>
            <div style="width: 100%;">
              <h3 for="stasiun_tujuan">Stasiun Tujuan</h3>
              <div class="tasksInput">
                <select placeholder="Stasiun Tujuan" name="stasiunTujuan"  id="stasiun_tujuan" type="text" class="form-control" value="<?php echo $stasiunTujuan ?>">

                </select>
              </div>
            </div>
          </div>
          <div class="input-container">
            <div style="width: 100%;">
              <h3 for="tanggal_keberangkatan">Tanggal Keberangkatan</h3>
              <div class="tasksInput">
                <input name="tanggalKeberangkatan" id="tanggalKeberangkatan"  type="date" class="form-control"value="<?php echo $tanggalKeberangkatan ?>"></input>
              </div>
            </div>
            <div style="width: 100%;">
              <h3 for="Penumpang">Jumlah Penumpang</h3>
              <div class="tasksInput">
                <input name="jumlahPenumpang" id="dewasa" type="number"  class="form-control" value="<?php echo $jumlahPenumpang ?>"></input>
              </div>
            </div>
           
          </div>
          <button type="submit" name="pesanTiket" style="margin: 10px; border-radius: 5px; background-color: #F08210; color: white;">Pesan Tiket</button>
        </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script>
    var curday = function(sp) {
      today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //As January is 0.
      var yyyy = today.getFullYear();

      if (dd < 10) dd = '0' + dd;
      if (mm == 1) {
        mm = "Januari"
      } else if (mm == 2) {
        mm = "Februari"
      } else if (mm == 3) {
        mm = "Maret"
      } else if (mm == 4) {
        mm = "April"
      } else if (mm == 5) {
        mm = "Mei"
      } else if (mm == 6) {
        mm = "Juni"
      } else if (mm == 7) {
        mm = "Juli"
      } else if (mm == 8) {
        mm = "Agustus"
      } else if (mm == 9) {
        mm = "September"
      } else if (mm == 10) {
        mm = "Oktober"
      } else if (mm == 11) {
        mm = "November"
      } else if (mm == 12) {
        mm = "Desember"
      }
      return (dd + " " + sp + " " + mm + " " + sp + " " + yyyy);
    };
    var currentDate = curday('/')
    var elementDate = document.getElementById("tanggal");
    elementDate.innerHTML = currentDate

    var dat;
    var stasiun_tujuan = document.getElementById("stasiun_tujuan")
    fetch('https://booking.kai.id/api/stations2')
      .then((response) => response.json())
      .then((data) => {
        dat = data
      })
      .then(() => {
        for (let i = 0; i < dat.length; i++) {
          var x = document.createElement("option");
          var y = `${dat[i]["city"]}     ${dat[i]["code"]}`
          x.innerHTML = y
          x.setAttribute("value", y)
          stasiun_tujuan.appendChild(x)
        }
      });
  </script>
  
</body>

</html>