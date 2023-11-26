<?php
      function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
      }

      session_start();

      $id = $_SESSION["id_pemesanBarang"];
      $email = $_SESSION["email"];
      $nama = $_SESSION["nama"];
      
      debug_to_console($id);

      include("koneksi.php");
  
      if (isset($_POST["pesanBarang"])) {
        $jenisBarang = htmlentities(strip_tags(trim($_POST["jenisBarang"])));
        $asalBarang  = htmlentities(strip_tags(trim($_POST["asalBarang"])));
        $tujuanBarang = htmlentities(strip_tags(trim($_POST["tujuanBarang"])));
        $beratBarang = htmlentities(strip_tags(trim($_POST["beratBarang"])));
       
        $error_message="";
  
        if (empty( $jenisBarang )) {
          $error_message .= "- Nama belum diisi <br>";
        }
        if (empty($asalBarang )) {
          $error_message .= "- Nama belum diisi <br>";
        }
        if (empty($tujuanBarang)) {
          $error_message .= "- Nama belum diisi <br>";
        }
        if (empty($beratBarang)) {
          $error_message .= "- Nama belum diisi <br>";
        }
  
        if ($error_message === "") {
          $jenisBarang = mysqli_real_escape_string($koneksi,  $jenisBarang);
          $asalBarang = mysqli_real_escape_string($koneksi, $asalBarang );
          $tujuanBarang = mysqli_real_escape_string($koneksi, $tujuanBarang);
          $beratBarang = mysqli_real_escape_string($koneksi, $beratBarang);
      

          $query = "INSERT INTO reservasibarang VALUES ";
          $query .= "('','$id','$jenisBarang', '$asalBarang', '$tujuanBarang', $beratBarang)";
  
          $result = mysqli_query($koneksi, $query);
  
          if($result) {
            echo "<script>
            alert('selamat anda telah berhasil regristrasi');
            window.location = 'reservasiBarang.php'
           </script>";
          }
          else {
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
          }
        }
      } 
      else {
        $error_message = "";
        $jenisBarang = "";
        $asalBarang  = "";
        $tujuanBarang ="";
        $beratBarang = "";
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
            <li><a class="dropdown-item" href="profilUserbarang.php">Profil</a></li>
            <li><a class="dropdown-item" href="logout1.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  <div class="container d-flex justify-content-center" style="padding-top:45px">
    <div class="col-md-6 " style="background: #09397a;border: 3px solid #09397a;height: 545px;  justify-content: center;">
      <div class="text-center">
        <img src="https://kalogistics.co.id/assets/img/tarifs.png" alt="Img" style="padding-top: 15px; max-width: 120px;margin-left: auto;margin-right: auto;">
        <span></span>
        <h3 style="color: #fff !important;">Pengiriman Barang</h3>
      </div><br>
      <form method="POST" action="">
        <div class="default-inp form-elem">
          <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 547px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-produk-container"><span class="select2-selection__rendered" id="select2-produk-container" style="color:#fff" role="textbox" aria-readonly="true" title="-Jenis Kiriman-">-Jenis Kiriman-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

          <select class="form-control select-2 select2-hidden-accessible" name="jenisBarang" id="produk" style="height: 40px" required="" data-select2-id="produk" tabindex="-1" aria-hidden="true">
            <option value="" data-select2-id="2">-Jenis Kiriman-</option>
            <option value="PAKET">PAKET</option>
            <option value="ELEKTRONIK">ELEKTRONIK</option>
            <option value="HEWAN">HEWAN</option>
            <option value="TANAMAN">TANAMAN</option>
            <option value="DINAS">DINAS</option>
            <option value="SEPEDA">SEPEDA</option>
            <option value="SEPEDA MOTOR BEBEK">SEPEDA MOTOR BEBEK</option>
            <option value="SEPEDA MOTOR LAKI">SEPEDA MOTOR LAKI</option>
            <option value="SEPEDA MOTOR BESAR / SPORT">SEPEDA MOTOR BESAR / SPORT</option>
            <option value="KALOG+">KALOG+</option>
          </select><!-- http://ops.kalogistics.co.id:8071/service/logistics/getRegProducts -->
        </div>
        <div class="default-inp form-elem">
          <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-asal-container"><span class="select2-selection__rendered" id="select2-asal-container" style="color:#fff" role="textbox" aria-readonly="true" title="-Dari-">-Dari-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
          <select class="form-control select-2 select2-hidden-accessible" name="asalBarang" id="asal" style="height: 40px;width: 100%" required="" data-select2-id="asal" tabindex="-1" aria-hidden="true">
            <option value="" data-select2-id="4">-Dari-</option>
            <option value="ACEH BARAT">ACEH BARAT</option>
            <option value="ACEH UTARA">ACEH UTARA</option>
            <option value="ALOR(KAB)">ALOR(KAB)</option>
            <option value="AMBON(KOTA)">AMBON(KOTA)</option>
            <option value="ASAHAN">ASAHAN</option>
            <option value="BADUNG">BADUNG</option>
            <option value="BALIKPAPAN(KOTA)">BALIKPAPAN(KOTA)</option>
            <option value="BANDA ACEH">BANDA ACEH</option>
            <option value="BANDAR LAMPUNG">BANDAR LAMPUNG</option>
            <option value="BANDUNG">BANDUNG</option>
            <option value="BANDUNG BARAT(Kab)">BANDUNG BARAT(Kab)</option>
            <option value="BANGGAI(KAB)">BANGGAI(KAB)</option>
            <option value="BANGIL">BANGIL</option>
            <option value="BANGKALAN(Kab)">BANGKALAN(Kab)</option>
            <option value="BANJAR">BANJAR</option>
            <option value="BANJARMASIN(KAB)">BANJARMASIN(KAB)</option>
            <option value="BANJARNEGARA(Kota)">BANJARNEGARA(Kota)</option>
            <option value="BANTUL(Kab)">BANTUL(Kab)</option>
            <option value="BANYUMAS(Kab)">BANYUMAS(Kab)</option>
            <option value="BANYUWANGI">BANYUWANGI</option>
            <option value="BANYUWANGI(Kota)">BANYUWANGI(Kota)</option>
            <option value="BATAM">BATAM</option>
            <option value="BATANG(Kab)">BATANG(Kab)</option>
            <option value="BATU(Kota)">BATU(Kota)</option>
            <option value="BAU-BAU(KOTA)">BAU-BAU(KOTA)</option>
            <option value="BEKASI">BEKASI</option>
            <option value="BELU(KAB)">BELU(KAB)</option>
            <option value="BENGKULU">BENGKULU</option>
            <option value="BERAU(KAB)">BERAU(KAB)</option>
            <option value="BIMA(KOTA)">BIMA(KOTA)</option>
            <option value="BINJAI">BINJAI</option>
            <option value="BINTAN">BINTAN</option>
            <option value="BITUNG(KOTA)">BITUNG(KOTA)</option>
            <option value="BLITAR">BLITAR</option>
            <option value="BLORA">BLORA</option>
            <option value="BOGOR">BOGOR</option>
            <option value="BOJONEGORO">BOJONEGORO</option>
            <option value="BONDOWOSO">BONDOWOSO</option>
            <option value="BONE BOLANGO(KAB)">BONE BOLANGO(KAB)</option>
            <option value="BOYOLALI">BOYOLALI</option>
            <option value="BREBES(Kab)">BREBES(Kab)</option>
            <option value="1010850">BUKIT TINGGI</option>
            <option value="BUKIT TINGGI">BULELENG(KAB)</option>
            <option value="BULUKUMBA(KAB)">BULUKUMBA(KAB)</option>
            <option value="BULUNGAN(KAB)">BULUNGAN(KAB)</option>
            <option value="BURU(KAB)">BURU(KAB)</option>
            <option value="CIKAMPEK">CIKAMPEK</option>
            <option value="CILACAP">CILACAP</option>
            <option value="CIMAHI">CIMAHI</option>
            <option value="CIPEUNDEUY">CIPEUNDEUY</option>
            <option value="CIREBON">CIREBON</option>
            <option value="CIREBON(Kab)">CIREBON(Kab)</option>
            <option value="DELI SERDANG">DELI SERDANG</option>
            <option value="DEMAK(Kab)">DEMAK(Kab)</option>
            <option value="DENPASAR">DENPASAR</option>
            <option value="DEPOK">DEPOK</option>
            <option value="DUMAI">DUMAI</option>
            <option value="ENDE(KAB)">ENDE(KAB)</option>
            <option value="FAKFAK(KAB)">FAKFAK(KAB)</option>
            <option value="FLORES TIMUR(KAB)">FLORES TIMUR(KAB)</option>
            <option value="GARUT(Kab)">GARUT(Kab)</option>
            <option value="GIANYAR">GIANYAR</option>
            <option value="GILIMANUK">GILIMANUK</option>
            <option value="GOMBONG">GOMBONG</option>
            <option value="GRESIK">GRESIK</option>
            <option value="GUNUNGKIDUL(Kab)">GUNUNGKIDUL(Kab)</option>
            <option value="GUNUNGSITOLI">GUNUNGSITOLI</option>
            <option value="HALMAHERA SELATAN(KAB)">HALMAHERA SELATAN(KAB)</option>
            <option value="HALMAHERA TIMUR(KAB)">HALMAHERA TIMUR(KAB)</option>
            <option value="HALMAHERA UTARA(KAB)">HALMAHERA UTARA(KAB)</option>
            <option value="INDRAMAYU">INDRAMAYU</option>
            <option value="JAKARTA">JAKARTA</option>
            <option value="JAKARTA SELATAN">JAKARTA SELATAN</option>
            <option value="JAMBI">JAMBI</option>
            <option value="JAYAPURA(KOTA)">JAYAPURA(KOTA)</option>
            <option value="JAYAWIJAYA(KAB)">JAYAWIJAYA(KAB)</option>
            <option value="JEMBER">JEMBER</option>
            <option value="JEPARA(Kab)">JEPARA(Kab)</option>
            <option value="JOMBANG">JOMBANG</option>
            <option value="KAIMANA(KAB)">KAIMANA(KAB)</option>
            <option value="KALISAT">KALISAT</option>
            <option value="KALISETAIL">KALISETAIL</option>
            <option value="KARANGANYAR(Kab)">KARANGANYAR(Kab)</option>
            <option value="KARAWANG">KARAWANG</option>
            <option value="KARIMUN">KARIMUN</option>
            <option value="KEBUMEN">KEBUMEN</option>
            <option value="KEDIRI">KEDIRI</option>
            <option value="KENDAL(Kab)">KENDAL(Kab)</option>
            <option value="KENDARI(KOTA)">KENDARI(KOTA)</option>
            <option value="KEPULAUAN ARU(KAB)">KEPULAUAN ARU(KAB)</option>
            <option value="KEPULAUAN SANGIHE(KAB)">KEPULAUAN SANGIHE(KAB)</option>
            <option value="KEPULAUAN TALAUD(KAB)">KEPULAUAN TALAUD(KAB)</option>
            <option value="KERTOSONO">KERTOSONO</option>
            <option value="Ketapang(Kab)">Ketapang(Kab)</option>
            <option value="KLAKAH">KLAKAH</option>
            <option value="KLATEN">KLATEN</option>
            <option value="KLATEN(Kab)">KLATEN(Kab)</option>
            <option value="KOLAKA(KAB)">KOLAKA(KAB)</option>
            <option value="KOTABARU(KAB)">KOTABARU(KAB)</option>
            <option value="KOTAWARINGIN BARAT(KAB)">KOTAWARINGIN BARAT(KAB)</option>
            <option value="KOTAWARINGIN TIMUR(KAB">KOTAWARINGIN TIMUR(KAB)</option>
            <option value="KROYA">KROYA</option>
            <option value="KUBU RAYA(KAB)">KUBU RAYA(KAB)</option>
            <option value="KUDUS">KUDUS</option>
            <option value="KULONPROGO(Kab)">KULONPROGO(Kab)</option>
            <option value="KUNINGAN(Kab)">KUNINGAN(Kab)</option>
            <option value="KUPANG(KOTA)">KUPANG(KOTA)</option>
            <option value="KUTOARJO">KUTOARJO</option>
            <option value="LABUHAN BATU">LABUHAN BATU</option>
            <option value="LAMONGAN">LAMONGAN</option>
            <option value="LAWANG">LAWANG</option>
            <option value="LUBUK LINGGAU">LUBUK LINGGAU</option>
            <option value="LUMAJANG-KLAKAH">LUMAJANG-KLAKAH</option>
            <option value="MADIUN">MADIUN</option>
            <option value="MAGELANG">MAGELANG</option>
            <option value="MAGETAN">MAGETAN</option>
            <option value="MAKASSAR(KOTA)">MAKASSAR(KOTA)</option>
            <option value="MALANG(Kab)">MALANG(Kab)</option>
            <option value="MALANG(Kota)">MALANG(Kota)</option>
            <option value="MALUKU TENGGARA BARAT(KAB)">MALUKU TENGGARA BARAT(KAB)</option>
            <option value="MALUKU TENGGARA(KAB)">MALUKU TENGGARA(KAB)</option>
            <option value="MAMUJU(KAB)">MAMUJU(KAB)</option>
            <option value="MANADO(KOTA)">MANADO(KOTA)</option>
            <option value="MANGGARAI BARAT(KAB)">MANGGARAI BARAT(KAB)</option>
            <option value="MANOKWARI(KAB)">MANOKWARI(KAB)</option>
            <option value="MATARAM(KOTA)">MATARAM(KOTA)</option>
            <option value="MEDAN">MEDAN</option>
            <option value="MERAUKE(KAB)">MERAUKE(KAB)</option>
            <option value="METRO">METRO</option>
            <option value="MOJOKERTO">MOJOKERTO</option>
            <option value="MOJOKERTO(Kab)">MOJOKERTO(Kab)</option>
            <option value="MUNA(KAB)">MUNA(KAB)</option>
            <option value="NABIRE(KAB)">NABIRE(KAB)</option>
            <option value="NEGARA">NEGARA</option>
            <option value="NGADA(KAB)">NGADA(KAB)</option>
            <option value="NGANJUK">NGANJUK</option>
            <option value="NGAWI(Kab)">NGAWI(Kab)</option>
            <option value="PADANG">PADANG</option>
            <option value="PADANG SIDEMPUAN">PADANG SIDEMPUAN</option>
            <option value="PALANGKA RAYA(KOTA)">PALANGKA RAYA(KOTA)</option>
            <option value="PALEMBANG">PALEMBANG</option>
            <option value="PALOPO(KOTA)">PALOPO(KOTA)</option>
            <option value="PALU(KOTA)">PALU(KOTA)</option>
            <option value="PANGKAL PINANG">PANGKAL PINANG</option>
            <option value="PASURUAN(Kab)">PASURUAN(Kab)</option>
            <option value="PEKALONGAN">PEKALONGAN</option>
            <option value="PEKANBARU">PEKANBARU</option>
            <option value="PEMALANG">PEMALANG</option>
            <option value="PEMATANG SIANTAR">PEMATANG SIANTAR</option>
            <option value="PONOROGO">PONOROGO</option>
            <option value="POSO(KAB)">POSO(KAB)</option>
            <option value="PROBOLINGGO">PROBOLINGGO</option>
            <option value="PULAU MOROTAI(KAB)">PULAU MOROTAI(KAB)</option>
            <option value="PURBALINGGA">PURBALINGGA</option>
            <option value="PURWOKERTO">PURWOKERTO</option>
            <option value="PURWOREJO(Kab)">PURWOREJO(Kab)</option>
            <option value="RAMBIPUJI">RAMBIPUJI</option>
            <option value="ROGOJAMPI">ROGOJAMPI</option>
            <option value="ROTE NDAO(KAB)">ROTE NDAO(KAB)</option>
            <option value="SALATIGA(Kota)">SALATIGA(Kota)</option>
            <option value="SAMARINDA(KOTA)">SAMARINDA(KOTA)</option>
            <option value="SEMARANG">SEMARANG</option>
            <option value="SEMARANG(Kab)">SEMARANG(Kab)</option>
            <option value="SERANG">SERANG</option>
            <option value="SERDANG BEDAGAI">SERDANG BEDAGAI</option>
            <option value="SIBOLGA">SIBOLGA</option>
            <option value="SIDAREJA">SIDAREJA</option>
            <option value="SIDOARJO">SIDOARJO</option>
            <option value="SIKKA(KAB)">SIKKA(KAB)</option>
            <option value="SIMEULUE(KAB)">SIMEULUE(KAB)</option>
            <option value="SLEMAN(KAB)">SLEMAN(KAB)</option>
            <option value="SORONG(KOTA)">SORONG(KOTA)</option>
            <option value="SRAGEN">SRAGEN</option>
            <option value="SUKOHARJO(Kab)">SUKOHARJO(Kab)</option>
            <option value="SUMBA BARAT(KAB)">SUMBA BARAT(KAB)</option>
            <option value="SUMBA TIMUR(KAB)">SUMBA TIMUR(KAB)</option>
            <option value="SUMBAWA(KAB)">SUMBAWA(KAB)</option>
            <option value="SUMEDANG(Kab)">SUMEDANG(Kab)</option>
            <option value="SURABAYA">SURABAYA</option>
            <option value="SURAKARTA-SOLO">SURAKARTA-SOLO</option>
            <option value="TABALONG(KAB)">TABALONG(KAB)</option>
            <option value="TABANAN(KAB)">TABANAN(KAB)</option>
            <option value="TANAH BUMBU(KAB)">TANAH BUMBU(KAB)</option>
            <option value="TANAH LAUT(KAB)">TANAH LAUT(KAB)</option>
            <option value="TANGERANG">TANGERANG</option>
            <option value="TANGERANG SELATAN">TANGERANG SELATAN</option>
            <option value="TANGGUL">TANGGUL</option>
            <option value="TANJUNG PANDAN">TANJUNG PANDAN</option>
            <option value="TARAKAN(KOTA)">TARAKAN(KOTA)</option>
            <option value="TASIKMALAYA">TASIKMALAYA</option>
            <option value="TEBING TINGGI">TEBING TINGGI</option>
            <option value="TEGAL">TEGAL</option>
            <option value="TEGAL(Kota)">TEGAL(Kota)</option>
            <option value="TERNATE(KOTA)">TERNATE(KOTA)</option>
            <option value="TOLI-TOLI(KAB)">TOLI-TOLI(KAB)</option>
            <option value="TRENGGALEK">TRENGGALEK</option>
            <option value="TUBAN">TUBAN</option>
            <option value="TULANG BAWANG">TULANG BAWANG</option>
            <option value="TULUNGAGUNG">TULUNGAGUNG</option>
            <option value="WAKATOBI(KAB)">WAKATOBI(KAB)</option>
            <option value="1009574">WATES</option>
            <option value="WLINGI">WLINGI</option>
            <option value="YOGYAKARTA">YOGYAKARTA</option>
          </select> <!-- <i class="fa fa-map-marker"></i>
                    <input type="text" name="asal" id="asal" placeholder="Asal" required="required" style="height: 40px"> -->
          <!-- http://ops.kalogistics.co.id:8071/service/logistics/getCityOrigin -->
        </div>
        <div class="default-inp form-elem">
          <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-tujuan-container"><span class="select2-selection__rendered" id="select2-tujuan-container" role="textbox" style="color:#fff" aria-readonly="true" title="-Tujuan-">-Tujuan-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

          <select class="form-control select-2 select2-hidden-accessible" name="tujuanBarang" id="tujuan" style="height: 40px;width: 100%" required="" data-select2-id="tujuan" tabindex="-1" aria-hidden="true">
            <option value="" data-select2-id="6">-Tujuan-</option>
            <option value="ACEH BARAT">ACEH BARAT</option>
            <option value="ACEH UTARA">ACEH UTARA</option>
            <option value="ALOR(KAB)">ALOR(KAB)</option>
            <option value="AMBON(KOTA)">AMBON(KOTA)</option>
            <option value="ASAHAN">ASAHAN</option>
            <option value="BADUNG">BADUNG</option>
            <option value="BALIKPAPAN(KOTA)">BALIKPAPAN(KOTA)</option>
            <option value="BANDA ACEH">BANDA ACEH</option>
            <option value="BANDAR LAMPUNG">BANDAR LAMPUNG</option>
            <option value="BANDUNG">BANDUNG</option>
            <option value="BANDUNG BARAT(Kab)">BANDUNG BARAT(Kab)</option>
            <option value="BANGGAI(KAB)">BANGGAI(KAB)</option>
            <option value="BANGIL">BANGIL</option>
            <option value="BANGKALAN(Kab)">BANGKALAN(Kab)</option>
            <option value="BANJAR">BANJAR</option>
            <option value="BANJARMASIN(KAB)">BANJARMASIN(KAB)</option>
            <option value="BANJARNEGARA(Kota)">BANJARNEGARA(Kota)</option>
            <option value="BANTUL(Kab)">BANTUL(Kab)</option>
            <option value="BANYUMAS(Kab)">BANYUMAS(Kab)</option>
            <option value="BANYUWANGI">BANYUWANGI</option>
            <option value="BANYUWANGI(Kota)">BANYUWANGI(Kota)</option>
            <option value="BATAM">BATAM</option>
            <option value="BATANG(Kab)">BATANG(Kab)</option>
            <option value="BATU(Kota)">BATU(Kota)</option>
            <option value="BAU-BAU(KOTA)">BAU-BAU(KOTA)</option>
            <option value="BEKASI">BEKASI</option>
            <option value="BELU(KAB)">BELU(KAB)</option>
            <option value="BENGKULU">BENGKULU</option>
            <option value="BERAU(KAB)">BERAU(KAB)</option>
            <option value="BIMA(KOTA)">BIMA(KOTA)</option>
            <option value="BINJAI">BINJAI</option>
            <option value="BINTAN">BINTAN</option>
            <option value="BITUNG(KOTA)">BITUNG(KOTA)</option>
            <option value="BLITAR">BLITAR</option>
            <option value="BLORA">BLORA</option>
            <option value="BOGOR">BOGOR</option>
            <option value="BOJONEGORO">BOJONEGORO</option>
            <option value="BONDOWOSO">BONDOWOSO</option>
            <option value="BONE BOLANGO(KAB)">BONE BOLANGO(KAB)</option>
            <option value="BOYOLALI">BOYOLALI</option>
            <option value="BREBES(Kab)">BREBES(Kab)</option>
            <option value="1010850">BUKIT TINGGI</option>
            <option value="BUKIT TINGGI">BULELENG(KAB)</option>
            <option value="BULUKUMBA(KAB)">BULUKUMBA(KAB)</option>
            <option value="BULUNGAN(KAB)">BULUNGAN(KAB)</option>
            <option value="BURU(KAB)">BURU(KAB)</option>
            <option value="CIKAMPEK">CIKAMPEK</option>
            <option value="CILACAP">CILACAP</option>
            <option value="CIMAHI">CIMAHI</option>
            <option value="CIPEUNDEUY">CIPEUNDEUY</option>
            <option value="CIREBON">CIREBON</option>
            <option value="CIREBON(Kab)">CIREBON(Kab)</option>
            <option value="DELI SERDANG">DELI SERDANG</option>
            <option value="DEMAK(Kab)">DEMAK(Kab)</option>
            <option value="DENPASAR">DENPASAR</option>
            <option value="DEPOK">DEPOK</option>
            <option value="DUMAI">DUMAI</option>
            <option value="ENDE(KAB)">ENDE(KAB)</option>
            <option value="FAKFAK(KAB)">FAKFAK(KAB)</option>
            <option value="FLORES TIMUR(KAB)">FLORES TIMUR(KAB)</option>
            <option value="GARUT(Kab)">GARUT(Kab)</option>
            <option value="GIANYAR">GIANYAR</option>
            <option value="GILIMANUK">GILIMANUK</option>
            <option value="GOMBONG">GOMBONG</option>
            <option value="GRESIK">GRESIK</option>
            <option value="GUNUNGKIDUL(Kab)">GUNUNGKIDUL(Kab)</option>
            <option value="GUNUNGSITOLI">GUNUNGSITOLI</option>
            <option value="HALMAHERA SELATAN(KAB)">HALMAHERA SELATAN(KAB)</option>
            <option value="HALMAHERA TIMUR(KAB)">HALMAHERA TIMUR(KAB)</option>
            <option value="HALMAHERA UTARA(KAB)">HALMAHERA UTARA(KAB)</option>
            <option value="INDRAMAYU">INDRAMAYU</option>
            <option value="JAKARTA">JAKARTA</option>
            <option value="JAKARTA SELATAN">JAKARTA SELATAN</option>
            <option value="JAMBI">JAMBI</option>
            <option value="JAYAPURA(KOTA)">JAYAPURA(KOTA)</option>
            <option value="JAYAWIJAYA(KAB)">JAYAWIJAYA(KAB)</option>
            <option value="JEMBER">JEMBER</option>
            <option value="JEPARA(Kab)">JEPARA(Kab)</option>
            <option value="JOMBANG">JOMBANG</option>
            <option value="KAIMANA(KAB)">KAIMANA(KAB)</option>
            <option value="KALISAT">KALISAT</option>
            <option value="KALISETAIL">KALISETAIL</option>
            <option value="KARANGANYAR(Kab)">KARANGANYAR(Kab)</option>
            <option value="KARAWANG">KARAWANG</option>
            <option value="KARIMUN">KARIMUN</option>
            <option value="KEBUMEN">KEBUMEN</option>
            <option value="KEDIRI">KEDIRI</option>
            <option value="KENDAL(Kab)">KENDAL(Kab)</option>
            <option value="KENDARI(KOTA)">KENDARI(KOTA)</option>
            <option value="KEPULAUAN ARU(KAB)">KEPULAUAN ARU(KAB)</option>
            <option value="KEPULAUAN SANGIHE(KAB)">KEPULAUAN SANGIHE(KAB)</option>
            <option value="KEPULAUAN TALAUD(KAB)">KEPULAUAN TALAUD(KAB)</option>
            <option value="KERTOSONO">KERTOSONO</option>
            <option value="Ketapang(Kab)">Ketapang(Kab)</option>
            <option value="KLAKAH">KLAKAH</option>
            <option value="KLATEN">KLATEN</option>
            <option value="KLATEN(Kab)">KLATEN(Kab)</option>
            <option value="KOLAKA(KAB)">KOLAKA(KAB)</option>
            <option value="KOTABARU(KAB)">KOTABARU(KAB)</option>
            <option value="KOTAWARINGIN BARAT(KAB)">KOTAWARINGIN BARAT(KAB)</option>
            <option value="KOTAWARINGIN TIMUR(KAB">KOTAWARINGIN TIMUR(KAB)</option>
            <option value="KROYA">KROYA</option>
            <option value="KUBU RAYA(KAB)">KUBU RAYA(KAB)</option>
            <option value="KUDUS">KUDUS</option>
            <option value="KULONPROGO(Kab)">KULONPROGO(Kab)</option>
            <option value="KUNINGAN(Kab)">KUNINGAN(Kab)</option>
            <option value="KUPANG(KOTA)">KUPANG(KOTA)</option>
            <option value="KUTOARJO">KUTOARJO</option>
            <option value="LABUHAN BATU">LABUHAN BATU</option>
            <option value="LAMONGAN">LAMONGAN</option>
            <option value="LAWANG">LAWANG</option>
            <option value="LUBUK LINGGAU">LUBUK LINGGAU</option>
            <option value="LUMAJANG-KLAKAH">LUMAJANG-KLAKAH</option>
            <option value="MADIUN">MADIUN</option>
            <option value="MAGELANG">MAGELANG</option>
            <option value="MAGETAN">MAGETAN</option>
            <option value="MAKASSAR(KOTA)">MAKASSAR(KOTA)</option>
            <option value="MALANG(Kab)">MALANG(Kab)</option>
            <option value="MALANG(Kota)">MALANG(Kota)</option>
            <option value="MALUKU TENGGARA BARAT(KAB)">MALUKU TENGGARA BARAT(KAB)</option>
            <option value="MALUKU TENGGARA(KAB)">MALUKU TENGGARA(KAB)</option>
            <option value="MAMUJU(KAB)">MAMUJU(KAB)</option>
            <option value="MANADO(KOTA)">MANADO(KOTA)</option>
            <option value="MANGGARAI BARAT(KAB)">MANGGARAI BARAT(KAB)</option>
            <option value="MANOKWARI(KAB)">MANOKWARI(KAB)</option>
            <option value="MATARAM(KOTA)">MATARAM(KOTA)</option>
            <option value="MEDAN">MEDAN</option>
            <option value="MERAUKE(KAB)">MERAUKE(KAB)</option>
            <option value="METRO">METRO</option>
            <option value="MOJOKERTO">MOJOKERTO</option>
            <option value="MOJOKERTO(Kab)">MOJOKERTO(Kab)</option>
            <option value="MUNA(KAB)">MUNA(KAB)</option>
            <option value="NABIRE(KAB)">NABIRE(KAB)</option>
            <option value="NEGARA">NEGARA</option>
            <option value="NGADA(KAB)">NGADA(KAB)</option>
            <option value="NGANJUK">NGANJUK</option>
            <option value="NGAWI(Kab)">NGAWI(Kab)</option>
            <option value="PADANG">PADANG</option>
            <option value="PADANG SIDEMPUAN">PADANG SIDEMPUAN</option>
            <option value="PALANGKA RAYA(KOTA)">PALANGKA RAYA(KOTA)</option>
            <option value="PALEMBANG">PALEMBANG</option>
            <option value="PALOPO(KOTA)">PALOPO(KOTA)</option>
            <option value="PALU(KOTA)">PALU(KOTA)</option>
            <option value="PANGKAL PINANG">PANGKAL PINANG</option>
            <option value="PASURUAN(Kab)">PASURUAN(Kab)</option>
            <option value="PEKALONGAN">PEKALONGAN</option>
            <option value="PEKANBARU">PEKANBARU</option>
            <option value="PEMALANG">PEMALANG</option>
            <option value="PEMATANG SIANTAR">PEMATANG SIANTAR</option>
            <option value="PONOROGO">PONOROGO</option>
            <option value="POSO(KAB)">POSO(KAB)</option>
            <option value="PROBOLINGGO">PROBOLINGGO</option>
            <option value="PULAU MOROTAI(KAB)">PULAU MOROTAI(KAB)</option>
            <option value="PURBALINGGA">PURBALINGGA</option>
            <option value="PURWOKERTO">PURWOKERTO</option>
            <option value="PURWOREJO(Kab)">PURWOREJO(Kab)</option>
            <option value="RAMBIPUJI">RAMBIPUJI</option>
            <option value="ROGOJAMPI">ROGOJAMPI</option>
            <option value="ROTE NDAO(KAB)">ROTE NDAO(KAB)</option>
            <option value="SALATIGA(Kota)">SALATIGA(Kota)</option>
            <option value="SAMARINDA(KOTA)">SAMARINDA(KOTA)</option>
            <option value="SEMARANG">SEMARANG</option>
            <option value="SEMARANG(Kab)">SEMARANG(Kab)</option>
            <option value="SERANG">SERANG</option>
            <option value="SERDANG BEDAGAI">SERDANG BEDAGAI</option>
            <option value="SIBOLGA">SIBOLGA</option>
            <option value="SIDAREJA">SIDAREJA</option>
            <option value="SIDOARJO">SIDOARJO</option>
            <option value="SIKKA(KAB)">SIKKA(KAB)</option>
            <option value="SIMEULUE(KAB)">SIMEULUE(KAB)</option>
            <option value="SLEMAN(KAB)">SLEMAN(KAB)</option>
            <option value="SORONG(KOTA)">SORONG(KOTA)</option>
            <option value="SRAGEN">SRAGEN</option>
            <option value="SUKOHARJO(Kab)">SUKOHARJO(Kab)</option>
            <option value="SUMBA BARAT(KAB)">SUMBA BARAT(KAB)</option>
            <option value="SUMBA TIMUR(KAB)">SUMBA TIMUR(KAB)</option>
            <option value="SUMBAWA(KAB)">SUMBAWA(KAB)</option>
            <option value="SUMEDANG(Kab)">SUMEDANG(Kab)</option>
            <option value="SURABAYA">SURABAYA</option>
            <option value="SURAKARTA-SOLO">SURAKARTA-SOLO</option>
            <option value="TABALONG(KAB)">TABALONG(KAB)</option>
            <option value="TABANAN(KAB)">TABANAN(KAB)</option>
            <option value="TANAH BUMBU(KAB)">TANAH BUMBU(KAB)</option>
            <option value="TANAH LAUT(KAB)">TANAH LAUT(KAB)</option>
            <option value="TANGERANG">TANGERANG</option>
            <option value="TANGERANG SELATAN">TANGERANG SELATAN</option>
            <option value="TANGGUL">TANGGUL</option>
            <option value="TANJUNG PANDAN">TANJUNG PANDAN</option>
            <option value="TARAKAN(KOTA)">TARAKAN(KOTA)</option>
            <option value="TASIKMALAYA">TASIKMALAYA</option>
            <option value="TEBING TINGGI">TEBING TINGGI</option>
            <option value="TEGAL">TEGAL</option>
            <option value="TEGAL(Kota)">TEGAL(Kota)</option>
            <option value="TERNATE(KOTA)">TERNATE(KOTA)</option>
            <option value="TOLI-TOLI(KAB)">TOLI-TOLI(KAB)</option>
            <option value="TRENGGALEK">TRENGGALEK</option>
            <option value="TUBAN">TUBAN</option>
            <option value="TULANG BAWANG">TULANG BAWANG</option>
            <option value="TULUNGAGUNG">TULUNGAGUNG</option>
            <option value="WAKATOBI(KAB)">WAKATOBI(KAB)</option>
            <option value="1009574">WATES</option>
            <option value="WLINGI">WLINGI</option>
            <option value="YOGYAKARTA">YOGYAKARTA</option>

          </select><!-- <i class="fa fa-truck"></i>
                    <input type="text" name="tujuan" id="tujuan" placeholder="Tujuan" required="required" style="height: 40px"> -->
          <!-- http://ops.kalogistics.co.id:8071/service/logistics/getCityDestination -->
        </div>
        <!-- <div class="row form-elem">
                    <div class="col-md-8">
                        <div class="default-inp form-elem">
                             <i class="fa fa-tachometer"></i>
                            <input type="number" name="volume" id="volume" placeholder="Volume" style="height: 40px" required>
                        </div>
                    </div>
                </div> -->
        <div class="row form-elem">
          <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-tujuan-container"><span class="select2-selection__rendered" id="select2-tujuan-container" role="textbox" style="color:#fff" aria-readonly="true" title="-Tujuan-">-Berat-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

          <div class="col-md-12">
            <div class="default-inp form-elem">
              <!-- <i class="fa fa-tachometer"></i> -->
              <input type="number" name="beratBarang" id="berat" placeholder="Berat (Kg)" style="height: 40px" required="">
            </div>
          </div>
        </div>
        <br>
        <div class="row form-elem">
          <div class="col-md-12">
            <button type="submit" class="btn btn-danger" name='pesanBarang' style="height: 40px">Pesan</button>
          </div>
        </div>
        <div style="padding-top: 4px">
          <!-- <h5 style="color: #fff !important;">Estimasi Harga : <span id="estimasi_tarif"></span></h5> -->
        </div>
      </form>
      <br>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


</body>

</html>