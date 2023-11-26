<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<?php 
if(isset($_POST['btn_save'])){
    $jenisBarang  = $_POST['jenisBarang'];
    $asalBarang   = $_POST["asalBarang"];
    $tujuanBarang = $_POST["tujuanBarang"];
    $beratBarang  = $_POST["beratBarang"];

    if(isset($_GET['reservasibarang'])){
        mysqli_query($koneksi, "update reservasibarang set jenisBarang = '".$jenisBarang."',asalBarang='".$asalBarang."',tujuanBarang='".$tujuanBarang."',beratBarang='".$beratBarang."' where id_barang='".$_GET['barang']."'");
            $_SESSION['Message'] = 'Update reservation barang successfully';

    }else{
        mysqli_query($koneksi, "INSERT INTO reservasibarang (jenisBarang,asalBarang,tujuanBarang,beratBarang)values ('".$jenisBarang."','".$asalBarang."', '".$tujuanBarang."','$beratBarang')");
         $_SESSION['Message'] = 'Add reservation barang successfully';
    }

    echo "<script>window.location.href ='viewreservasiBarang.php';</script>";
    
}
if(isset($_GET['reservasibarang'])){
 $reservasibarang = mysqli_query($koneksi, "SELECT * FROM reservasibarang WHERE id_barang =".$_GET['reservasibarang']);
 $reservasibarang = mysqli_fetch_assoc($reservasibarang);

}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/styleDash.css">
    <link rel="stylesheet" href="css/styleregritertiket.css">

    <title>AdminHub</title>
</head>
<body>
        <?php include 'sidebar.php';?>
        <main>
            <div class="head-title">
                <div class="left">
                    <h1><?php echo (isset($_GET['reservasibarang']))?'Update':'Add';?> Reservasi Barang</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Reservasi Barang</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-data">
                <div class="order">
                   <form class="row g-3" method="POST">
                       <div class="col-md-6">
                           <label for="inputEmail4" class="form-label">Jenis Barang</label>
                            <select name="jenisBarang" class="form-control">
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000025')?'selected':'';}?> value="1000025">PAKET</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000033')?'selected':'';}?> value="1000033">ELEKTRONIK</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000037')?'selected':'';}?> value="1000037">HEWAN</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000047')?'selected':'';}?> value="1000047">TANAMAN</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000067')?'selected':'';}?> value="1000067">DINAS</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000099')?'selected':'';}?> value="1000099">SEPEDA</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000101')?'selected':'';}?> value="1000101">SEPEDA MOTOR BEBEK</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000102')?'selected':'';}?> value="1000102">SEPEDA MOTOR LAKI</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000103')?'selected':'';}?> value="1000103">SEPEDA MOTOR BESAR / SPORT</option>
                                <option  <?php if(isset($reservasibarang)){echo ($reservasibarang['jenisBarang']=='1000107')?'selected':'';}?> value="1000107">KALOG+</option>
                           </select>
                       </div>
                       <div class="col-md-6">
                           <label for="inputPassword4" class="form-label">Dari</label>
                           <select name="asalBarang" class="form-control">
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101321')?'selected':'';}?> value="1101321">ACEH BARAT</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101331')?'selected':'';}?> value="1101331">ACEH UTARA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101475')?'selected':'';}?> value="1101475">ALOR(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101457')?'selected':'';}?> value="1101457">AMBON(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101337')?'selected':'';}?> value="1101337">ASAHAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011162')?'selected':'';}?> value="1011162">BADUNG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101424')?'selected':'';}?> value="1101424">BALIKPAPAN(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011011')?'selected':'';}?> value="1011011">BANDA ACEH</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010624')?'selected':'';}?> value="1010624">BANDAR LAMPUNG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007133')?'selected':'';}?> value="1007133">BANDUNG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101411')?'selected':'';}?> value="1101411">BANDUNG BARAT(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101452')?'selected':'';}?> value="1101452">BANGGAI(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011155')?'selected':'';}?> value="1011155">BANGIL</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009923')?'selected':'';}?> value="1009923">BANGKALAN(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009915')?'selected':'';}?> value="1009915">BANJAR</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101418')?'selected':'';}?> value="1101418">BANJARMASIN(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005980')?'selected':'';}?> value="1005980">BANJARNEGARA(Kota)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009568')?'selected':'';}?> value="1009568">BANTUL(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006070')?'selected':'';}?> value="1006070">BANYUMAS(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005250')?'selected':'';}?> value="1005250">BANYUWANGI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1008834')?'selected':'';}?> value="1008834">BANYUWANGI(Kota)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010913')?'selected':'';}?> value="1010913">BATAM</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005987')?'selected':'';}?> value="1005987">BATANG(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101413')?'selected':'';}?> value="1101413">BATU(Kota)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101447')?'selected':'';}?> value="1101447">BAU-BAU(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1000341')?'selected':'';}?> value="1000341">BEKASI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101433')?'selected':'';}?> value="1101433">BELU(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010748')?'selected':'';}?> value="1010748">BENGKULU</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101427')?'selected':'';}?> value="1101427">BERAU(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101430')?'selected':'';}?> value="1101430">BIMA(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010978')?'selected':'';}?> value="1010978">BINJAI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010940')?'selected':'';}?> value="1010940">BINTAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101476')?'selected':'';}?> value="1101476">BITUNG(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005251')?'selected':'';}?> value="1005251">BLITAR</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005954')?'selected':'';}?> value="1005954">BLORA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1000340')?'selected':'';}?> value="1000340">BOGOR</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005252')?'selected':'';}?> value="1005252">BOJONEGORO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005253')?'selected':'';}?> value="1005253">BONDOWOSO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101456')?'selected':'';}?> value="1101456">BONE BOLANGO(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005964')?'selected':'';}?> value="1005964">BOYOLALI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005970')?'selected':'';}?> value="1005970">BREBES(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010850')?'selected':'';}?> value="1010850">BUKIT TINGGI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101477')?'selected':'';}?> value="1101477">BULELENG(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101478')?'selected':'';}?> value="1101478">BULUKUMBA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101426')?'selected':'';}?> value="1101426">BULUNGAN(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101458')?'selected':'';}?> value="1101458">BURU(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011152')?'selected':'';}?> value="1011152">CIKAMPEK</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005974')?'selected':'';}?> value="1005974">CILACAP</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007454')?'selected':'';}?> value="1007454">CIMAHI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011153')?'selected':'';}?> value="1011153">CIPEUNDEUY</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007455')?'selected':'';}?> value="1007455">CIREBON</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007456')?'selected':'';}?> value="1007456">CIREBON(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010977')?'selected':'';}?> value="1010977">DELI SERDANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005960')?'selected':'';}?> value="1005960">DEMAK(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011103')?'selected':'';}?> value="1011103">DENPASAR</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1000350')?'selected':'';}?> value="1000350">DEPOK</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010969')?'selected':'';}?> value="1010969">DUMAI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101437')?'selected':'';}?> value="1101437">ENDE(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101467')?'selected':'';}?> value="1101467">FAKFAK(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101436')?'selected':'';}?> value="1101436">FLORES TIMUR(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007458')?'selected':'';}?> value="1007458">GARUT(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101311')?'selected':'';}?> value="1101311">GIANYAR</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011164')?'selected':'';}?> value="1011164">GILIMANUK</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005962')?'selected':'';}?> value="1005962">GOMBONG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005254')?'selected':'';}?> value="1005254">GRESIK</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009569')?'selected':'';}?> value="1009569">GUNUNGKIDUL(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101340')?'selected':'';}?> value="1101340">GUNUNGSITOLI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101465')?'selected':'';}?> value="1101465">HALMAHERA SELATAN(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101466')?'selected':'';}?> value="1101466">HALMAHERA TIMUR(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101463')?'selected':'';}?> value="1101463">HALMAHERA UTARA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007727')?'selected':'';}?> value="1007727">INDRAMAYU</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1000347')?'selected':'';}?> value="1000347">JAKARTA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101415')?'selected':'';}?> value="1101415">JAKARTA SELATAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010827')?'selected':'';}?> value="1010827">JAMBI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101472')?'selected':'';}?> value="1101472">JAYAPURA(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101473')?'selected':'';}?> value="1101473">JAYAWIJAYA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005255')?'selected':'';}?> value="1005255">JEMBER</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005972')?'selected':'';}?> value="1005972">JEPARA(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005256')?'selected':'';}?> value="1005256">JOMBANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101468')?'selected':'';}?> value="1101468">KAIMANA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101318')?'selected':'';}?> value="1101318">KALISAT</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011160')?'selected':'';}?> value="1011160">KALISETAIL</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005959')?'selected':'';}?> value="1005959">KARANGANYAR(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007738')?'selected':'';}?> value="1007738">KARAWANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101367')?'selected':'';}?> value="1101367">KARIMUN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005961')?'selected':'';}?> value="1005961">KEBUMEN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005257')?'selected':'';}?> value="1005257">KEDIRI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005965')?'selected':'';}?> value="1005965">KENDAL(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101444')?'selected':'';}?> value="1101444">KENDARI(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101460')?'selected':'';}?> value="1101460">KEPULAUAN ARU(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101454')?'selected':'';}?> value="1101454">KEPULAUAN SANGIHE(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101455')?'selected':'';}?> value="1101455">KEPULAUAN TALAUD(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005279')?'selected':'';}?> value="1005279">KERTOSONO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101483')?'selected':'';}?> value="1101483">Ketapang(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011158')?'selected':'';}?> value="1011158">KLAKAH</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005898')?'selected':'';}?> value="1005898">KLATEN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005986')?'selected':'';}?> value="1005986">KLATEN(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101445')?'selected':'';}?> value="1101445">KOLAKA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101419')?'selected':'';}?> value="1101419">KOTABARU(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101421')?'selected':'';}?> value="1101421">KOTAWARINGIN BARAT(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101422')?'selected':'';}?> value="1101422">KOTAWARINGIN TIMUR(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009924')?'selected':'';}?> value="1009924">KROYA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101428')?'selected':'';}?> value="1101428">KUBU RAYA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005899')?'selected':'';}?> value="1005899">KUDUS</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009570')?'selected':'';}?> value="1009570">KULONPROGO(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1007737')?'selected':'';}?> value="1007737">KUNINGAN(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101432')?'selected':'';}?> value="1101432">KUPANG(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005901')?'selected':'';}?> value="1005901">KUTOARJO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010994')?'selected':'';}?> value="1010994">LABUHAN BATU</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1008656')?'selected':'';}?> value="1008656">LAMONGAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011154')?'selected':'';}?> value="1011154">LAWANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010739')?'selected':'';}?> value="1010739">LUBUK LINGGAU</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1008658')?'selected':'';}?> value="1008658">LUMAJANG-KLAKAH</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005260')?'selected':'';}?> value="1005260">MADIUN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005903')?'selected':'';}?> value="1005903">MAGELANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005261')?'selected':'';}?> value="1005261">MAGETAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101416')?'selected':'';}?> value="1101416">MAKASSAR(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101412')?'selected':'';}?> value="1101412">MALANG(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005262')?'selected':'';}?> value="1005262">MALANG(Kota)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101461')?'selected':'';}?> value="1101461">MALUKU TENGGARA BARAT(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101459')?'selected':'';}?> value="1101459">MALUKU TENGGARA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101442')?'selected':'';}?> value="1101442">MAMUJU(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101453')?'selected':'';}?> value="1101453">MANADO(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101439')?'selected':'';}?> value="1101439">MANGGARAI BARAT(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101469')?'selected':'';}?> value="1101469">MANOKWARI(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101429')?'selected':'';}?> value="1101429">MATARAM(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010976')?'selected':'';}?> value="1010976">MEDAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101474')?'selected':'';}?> value="1101474">MERAUKE(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010627')?'selected':'';}?> value="1010627">METRO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005263')?'selected':'';}?> value="1005263">MOJOKERTO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1008564')?'selected':'';}?> value="1008564">MOJOKERTO(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101446')?'selected':'';}?> value="1101446">MUNA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101471')?'selected':'';}?> value="1101471">NABIRE(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011166')?'selected':'';}?> value="1011166">NEGARA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101438')?'selected':'';}?> value="1101438">NGADA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005264')?'selected':'';}?> value="1005264">NGANJUK</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005265')?'selected':'';}?> value="1005265">NGAWI(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010849')?'selected':'';}?> value="1010849">PADANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011003')?'selected':'';}?> value="1011003">PADANG SIDEMPUAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101420')?'selected':'';}?> value="1101420">PALANGKA RAYA(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010713')?'selected':'';}?> value="1010713">PALEMBANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101443')?'selected':'';}?> value="1101443">PALOPO(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101449')?'selected':'';}?> value="1101449">PALU(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010696')?'selected':'';}?> value="1010696">PANGKAL PINANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005268')?'selected':'';}?> value="1005268">PASURUAN(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005992')?'selected':'';}?> value="1005992">PEKALONGAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010948')?'selected':'';}?> value="1010948">PEKANBARU</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005994')?'selected':'';}?> value="1005994">PEMALANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010988')?'selected':'';}?> value="1010988">PEMATANG SIANTAR</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005269')?'selected':'';}?> value="1005269">PONOROGO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101451')?'selected':'';}?> value="1101451">POSO(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005270')?'selected':'';}?> value="1005270">PROBOLINGGO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101464')?'selected':'';}?> value="1101464">PULAU MOROTAI(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005995')?'selected':'';}?> value="1005995">PURBALINGGA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006066')?'selected':'';}?> value="1006066">PURWOKERTO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006074')?'selected':'';}?> value="1006074">PURWOREJO(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011159')?'selected':'';}?> value="1011159">RAMBIPUJI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011161')?'selected':'';}?> value="1011161">ROGOJAMPI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101434')?'selected':'';}?> value="1101434">ROTE NDAO(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006894')?'selected':'';}?> value="1006894">SALATIGA(Kota)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101423')?'selected':'';}?> value="1101423">SAMARINDA(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006896')?'selected':'';}?> value="1006896">SEMARANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005978')?'selected':'';}?> value="1005978">SEMARANG(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101404')?'selected':'';}?> value="1101404">SERANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101351')?'selected':'';}?> value="1101351">SERDANG BEDAGAI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010998')?'selected':'';}?> value="1010998">SIBOLGA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101316')?'selected':'';}?> value="1101316">SIDAREJA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005272')?'selected':'';}?> value="1005272">SIDOARJO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101435')?'selected':'';}?> value="1101435">SIKKA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101417')?'selected':'';}?> value="1101417">SIMEULUE(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009573')?'selected':'';}?> value="1009573">SLEMAN(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101470')?'selected':'';}?> value="1101470">SORONG(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006959')?'selected':'';}?> value="1006959">SRAGEN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006958')?'selected':'';}?> value="1006958">SUKOHARJO(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101441')?'selected':'';}?> value="1101441">SUMBA BARAT(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101440')?'selected':'';}?> value="1101440">SUMBA TIMUR(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101431')?'selected':'';}?> value="1101431">SUMBAWA(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1008452')?'selected':'';}?> value="1008452">SUMEDANG(Kab)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005283')?'selected':'';}?> value="1005283">SURABAYA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006956')?'selected':'';}?> value="1006956">SURAKARTA-SOLO</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101479')?'selected':'';}?> value="1101479">TABALONG(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101480')?'selected':'';}?> value="1101480">TABANAN(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101481')?'selected':'';}?> value="1101481">TANAH BUMBU(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101482')?'selected':'';}?> value="1101482">TANAH LAUT(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1000353')?'selected':'';}?> value="1000353">TANGERANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101414')?'selected':'';}?> value="1101414">TANGERANG SELATAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011157')?'selected':'';}?> value="1011157">TANGGUL</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010708')?'selected':'';}?> value="1010708">TANJUNG PANDAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101425')?'selected':'';}?> value="1101425">TARAKAN(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1008184')?'selected':'';}?> value="1008184">TASIKMALAYA</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1011008')?'selected':'';}?> value="1011008">TEBING TINGGI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006898')?'selected':'';}?> value="1006898">TEGAL</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1006960')?'selected':'';}?> value="1006960">TEGAL(Kota)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101462')?'selected':'';}?> value="1101462">TERNATE(KOTA)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101450')?'selected':'';}?> value="1101450">TOLI-TOLI(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005275')?'selected':'';}?> value="1005275">TRENGGALEK</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005276')?'selected':'';}?> value="1005276">TUBAN</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1010647')?'selected':'';}?> value="1010647">TULANG BAWANG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1005277')?'selected':'';}?> value="1005277">TULUNGAGUNG</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101448')?'selected':'';}?> value="1101448">WAKATOBI(KAB)</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009574')?'selected':'';}?> value="1009574">WATES</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1101319')?'selected':'';}?> value="1101319">WLINGI</option>
                              <option <?php if(isset($reservasibarang)){echo ($reservasibarang['asalBarang']=='1009576')?'selected':'';}?> value="1009576">YOGYAKARTA</option>
                           </select>
                       </div>
                       <div class="col-md-6">
                           <label for="inputEmail4" class="form-label">Tujuan</label>
                           <select name="tujuanBarang" class="form-control">
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101321')?'selected':'';}?> value="1101321">ACEH BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101322')?'selected':'';}?> value="1101322">ACEH BARAT DAYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101323')?'selected':'';}?> value="1101323">ACEH BESAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101324')?'selected':'';}?> value="1101324">ACEH JAYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101325')?'selected':'';}?> value="1101325">ACEH SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101326')?'selected':'';}?> value="1101326">ACEH SINGKIL</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101327')?'selected':'';}?> value="1101327">ACEH TAMIANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101328')?'selected':'';}?> value="1101328">ACEH TENGAH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101329')?'selected':'';}?> value="1101329">ACEH TENGGARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101330')?'selected':'';}?> value="1101330">ACEH TIMUR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101331')?'selected':'';}?> value="1101331">ACEH UTARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101369')?'selected':'';}?> value="1101369">AGAM</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101337')?'selected':'';}?> value="1101337">ASAHAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011162')?'selected':'';}?> value="1011162">BADUNG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011011')?'selected':'';}?> value="1011011">BANDA ACEH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010624')?'selected':'';}?> value="1010624">BANDAR LAMPUNG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007133')?'selected':'';}?> value="1007133">BANDUNG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101411')?'selected':'';}?> value="1101411">BANDUNG BARAT(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011155')?'selected':'';}?> value="1011155">BANGIL</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010697')?'selected':'';}?> value="1010697">BANGKA (KOTA)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101394')?'selected':'';}?> value="1101394">BANGKA BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101395')?'selected':'';}?> value="1101395">BANGKA SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010698')?'selected':'';}?> value="1010698">BANGKA TENGAH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009923')?'selected':'';}?> value="1009923">BANGKALAN(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009915')?'selected':'';}?> value="1009915">BANJAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005980')?'selected':'';}?> value="1005980">BANJARNEGARA(Kota)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009568')?'selected':'';}?> value="1009568">BANTUL(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101386')?'selected':'';}?> value="1101386">BANYUASIN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006070')?'selected':'';}?> value="1006070">BANYUMAS(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005250')?'selected':'';}?> value="1005250">BANYUWANGI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010913')?'selected':'';}?> value="1010913">BATAM</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005987')?'selected':'';}?> value="1005987">BATANG(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101338')?'selected':'';}?> value="1101338">BATU BARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101413')?'selected':'';}?> value="1101413">BATU(Kota)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1000341')?'selected':'';}?> value="1000341">BEKASI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010707')?'selected':'';}?> value="1010707">BELITUNG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101396')?'selected':'';}?> value="1101396">BELITUNG TIMUR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010970')?'selected':'';}?> value="1010970">BENGKALIS</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010748')?'selected':'';}?> value="1010748">BENGKULU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101383')?'selected':'';}?> value="1101383">BENGKULU SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101384')?'selected':'';}?> value="1101384">BENGKULU UTARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010978')?'selected':'';}?> value="1010978">BINJAI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010940')?'selected':'';}?> value="1010940">BINTAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011019')?'selected':'';}?> value="1011019">BIREUEN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005251')?'selected':'';}?> value="1005251">BLITAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005954')?'selected':'';}?> value="1005954">BLORA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1000340')?'selected':'';}?> value="1000340">BOGOR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005252')?'selected':'';}?> value="1005252">BOJONEGORO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005253')?'selected':'';}?> value="1005253">BONDOWOSO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005964')?'selected':'';}?> value="1005964">BOYOLALI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005970')?'selected':'';}?> value="1005970">BREBES(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101370')?'selected':'';}?> value="1101370">BUKITTINGGI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101377')?'selected':'';}?> value="1101377">BUNGO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011152')?'selected':'';}?> value="1011152">CIKAMPEK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005974')?'selected':'';}?> value="1005974">CILACAP</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007454')?'selected':'';}?> value="1007454">CIMAHI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011153')?'selected':'';}?> value="1011153">CIPEUNDEUY</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007455')?'selected':'';}?> value="1007455">CIREBON</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007456')?'selected':'';}?> value="1007456">CIREBON(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101339')?'selected':'';}?> value="1101339">DAIRI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010977')?'selected':'';}?> value="1010977">DELI SERDANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005960')?'selected':'';}?> value="1005960">DEMAK(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011103')?'selected':'';}?> value="1011103">DENPASAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1000350')?'selected':'';}?> value="1000350">DEPOK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010856')?'selected':'';}?> value="1010856">DHARMASRAYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010969')?'selected':'';}?> value="1010969">DUMAI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101387')?'selected':'';}?> value="1101387">EMPAT LAWANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007458')?'selected':'';}?> value="1007458">GARUT(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101332')?'selected':'';}?> value="1101332">GAYO LUES</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101311')?'selected':'';}?> value="1101311">GIANYAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011164')?'selected':'';}?> value="1011164">GILIMANUK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005962')?'selected':'';}?> value="1005962">GOMBONG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005254')?'selected':'';}?> value="1005254">GRESIK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009569')?'selected':'';}?> value="1009569">GUNUNGKIDUL(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101340')?'selected':'';}?> value="1101340">GUNUNGSITOLI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101341')?'selected':'';}?> value="1101341">HUMBANG HASUNDUTAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101358')?'selected':'';}?> value="1101358">INDRAGIRI HILIR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101359')?'selected':'';}?> value="1101359">INDRAGIRI HULU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007727')?'selected':'';}?> value="1007727">INDRAMAYU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1000347')?'selected':'';}?> value="1000347">JAKARTA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1000347')?'selected':'';}?> value="1000347">JAKARTA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101415')?'selected':'';}?> value="1101415">JAKARTA SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010827')?'selected':'';}?> value="1010827">JAMBI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005255')?'selected':'';}?> value="1005255">JEMBER</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005972')?'selected':'';}?> value="1005972">JEPARA(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005256')?'selected':'';}?> value="1005256">JOMBANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1013664')?'selected':'';}?> value="1013664">KALIBARU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101318')?'selected':'';}?> value="1101318">KALISAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011160')?'selected':'';}?> value="1011160">KALISETAIL</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101360')?'selected':'';}?> value="1101360">KAMPAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005959')?'selected':'';}?> value="1005959">KARANGANYAR(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011221')?'selected':'';}?> value="1011221">KARANGASEM(KAB)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007738')?'selected':'';}?> value="1007738">KARAWANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101367')?'selected':'';}?> value="1101367">KARIMUN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101342')?'selected':'';}?> value="1101342">KARO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005961')?'selected':'';}?> value="1005961">KEBUMEN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005257')?'selected':'';}?> value="1005257">KEDIRI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005965')?'selected':'';}?> value="1005965">KENDAL(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010750')?'selected':'';}?> value="1010750">KEPAHIANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101361')?'selected':'';}?> value="1101361">KEPULAUAN MERANTI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101378')?'selected':'';}?> value="1101378">KERINCI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005279')?'selected':'';}?> value="1005279">KERTOSONO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011158')?'selected':'';}?> value="1011158">KLAKAH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005986')?'selected':'';}?> value="1005986">KLATEN(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009924')?'selected':'';}?> value="1009924">KROYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101362')?'selected':'';}?> value="1101362">KUANTAN SINGINGI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005899')?'selected':'';}?> value="1005899">KUDUS</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009570')?'selected':'';}?> value="1009570">KULONPROGO(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1007737')?'selected':'';}?> value="1007737">KUNINGAN(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005901')?'selected':'';}?> value="1005901">KUTOARJO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101343')?'selected':'';}?> value="1101343">LABUAN BATU SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101344')?'selected':'';}?> value="1101344">LABUAN BATU UTARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010994')?'selected':'';}?> value="1010994">LABUHAN BATU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010736')?'selected':'';}?> value="1010736">LAHAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1008656')?'selected':'';}?> value="1008656">LAMONGAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101397')?'selected':'';}?> value="1101397">LAMPUNG BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101398')?'selected':'';}?> value="1101398">LAMPUNG SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101399')?'selected':'';}?> value="1101399">LAMPUNG TENGAH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101400')?'selected':'';}?> value="1101400">LAMPUNG TIMUR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101401')?'selected':'';}?> value="1101401">LAMPUNG UTARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010980')?'selected':'';}?> value="1010980">LANGKAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011014')?'selected':'';}?> value="1011014">LANGSA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011154')?'selected':'';}?> value="1011154">LAWANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010752')?'selected':'';}?> value="1010752">LEBONG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011015')?'selected':'';}?> value="1011015">LHOKSEUMAWE</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101371')?'selected':'';}?> value="1101371">LIMA PULUH KOTO/KOTA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010739')?'selected':'';}?> value="1010739">LUBUK LINGGAU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1008658')?'selected':'';}?> value="1008658">LUMAJANG-KLAKAH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005260')?'selected':'';}?> value="1005260">MADIUN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005903')?'selected':'';}?> value="1005903">MAGELANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005261')?'selected':'';}?> value="1005261">MAGETAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101412')?'selected':'';}?> value="1101412">MALANG(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005262')?'selected':'';}?> value="1005262">MALANG(Kota)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010976')?'selected':'';}?> value="1010976">MEDAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010831')?'selected':'';}?> value="1010831">MERANGIN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010648')?'selected':'';}?> value="1010648">MESUJI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010627')?'selected':'';}?> value="1010627">METRO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1008564')?'selected':'';}?> value="1008564">MOJOKERTO(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010730')?'selected':'';}?> value="1010730">MUARA ENIM</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010843')?'selected':'';}?> value="1010843">MUARO JAMBI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101385')?'selected':'';}?> value="1101385">MUKO MUKO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101388')?'selected':'';}?> value="1101388">MUSI BANYUASIN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101389')?'selected':'';}?> value="1101389">MUSI RAWAS</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101333')?'selected':'';}?> value="1101333">NAGAN RAYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011006')?'selected':'';}?> value="1011006">NATAL/MANDAILING NATAL</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011166')?'selected':'';}?> value="1011166">NEGARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005264')?'selected':'';}?> value="1005264">NGANJUK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005265')?'selected':'';}?> value="1005265">NGAWI(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101345')?'selected':'';}?> value="1101345">NIAS</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101346')?'selected':'';}?> value="1101346">NIAS BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011001')?'selected':'';}?> value="1011001">NIAS SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101347')?'selected':'';}?> value="1101347">NIAS UTARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101390')?'selected':'';}?> value="1101390">OGAN ILIR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010743')?'selected':'';}?> value="1010743">OGAN KOMERING ILIR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101391')?'selected':'';}?> value="1101391">OGAN KOMERING ULU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101392')?'selected':'';}?> value="1101392">OGAN KOMERING ULU SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101393')?'selected':'';}?> value="1101393">OGAN KOMERING ULU TIMUR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010849')?'selected':'';}?> value="1010849">PADANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101373')?'selected':'';}?> value="1101373">PADANG BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101348')?'selected':'';}?> value="1101348">PADANG LAWAS</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101349')?'selected':'';}?> value="1101349">PADANG LAWAS UTARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010853')?'selected':'';}?> value="1010853">PADANG PANJANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101372')?'selected':'';}?> value="1101372">PADANG PARIAMAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011003')?'selected':'';}?> value="1011003">PADANG SIDEMPUAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010737')?'selected':'';}?> value="1010737">PAGAR ALAM</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010713')?'selected':'';}?> value="1010713">PALEMBANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011156')?'selected':'';}?> value="1011156">PANDAAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010696')?'selected':'';}?> value="1010696">PANGKAL PINANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010851')?'selected':'';}?> value="1010851">PARIAMAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010858')?'selected':'';}?> value="1010858">PASAMAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005268')?'selected':'';}?> value="1005268">PASURUAN(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010852')?'selected':'';}?> value="1010852">PAYAKUMBUH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005992')?'selected':'';}?> value="1005992">PEKALONGAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010948')?'selected':'';}?> value="1010948">PEKANBARU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101363')?'selected':'';}?> value="1101363">PELALAWAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005994')?'selected':'';}?> value="1005994">PEMALANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010988')?'selected':'';}?> value="1010988">PEMATANG SIANTAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010629')?'selected':'';}?> value="1010629">PESAWARAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101402')?'selected':'';}?> value="1101402">PESISIR BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101374')?'selected':'';}?> value="1101374">PESISIR SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101334')?'selected':'';}?> value="1101334">PIDIE</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101335')?'selected':'';}?> value="1101335">PIDIE JAYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005269')?'selected':'';}?> value="1005269">PONOROGO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010729')?'selected':'';}?> value="1010729">PRABUMULIH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010635')?'selected':'';}?> value="1010635">PRINGSEWU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005270')?'selected':'';}?> value="1005270">PROBOLINGGO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010869')?'selected':'';}?> value="1010869">PULAU MENTAWAI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005995')?'selected':'';}?> value="1005995">PURBALINGGA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1008111')?'selected':'';}?> value="1008111">PURWAKARTA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006066')?'selected':'';}?> value="1006066">PURWOKERTO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006074')?'selected':'';}?> value="1006074">PURWOREJO(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011159')?'selected':'';}?> value="1011159">RAMBIPUJI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010751')?'selected':'';}?> value="1010751">REJANG LEBONG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011161')?'selected':'';}?> value="1011161">ROGOJAMPI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101364')?'selected':'';}?> value="1101364">ROKAN HILIR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101365')?'selected':'';}?> value="1101365">ROKAN HULU</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011020')?'selected':'';}?> value="1011020">SABANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006894')?'selected':'';}?> value="1006894">SALATIGA(Kota)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101350')?'selected':'';}?> value="1101350">SAMOSIR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010828')?'selected':'';}?> value="1010828">SAROLANGUN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010868')?'selected':'';}?> value="1010868">SAWAH LUNTO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010759')?'selected':'';}?> value="1010759">SELUMA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006896')?'selected':'';}?> value="1006896">SEMARANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005978')?'selected':'';}?> value="1005978">SEMARANG(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101404')?'selected':'';}?> value="1101404">SERANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101351')?'selected':'';}?> value="1101351">SERDANG BEDAGAI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010961')?'selected':'';}?> value="1010961">SIAK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010998')?'selected':'';}?> value="1010998">SIBOLGA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101316')?'selected':'';}?> value="1101316">SIDAREJA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005272')?'selected':'';}?> value="1005272">SIDOARJO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010855')?'selected':'';}?> value="1010855">SIJUNJUNG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101352')?'selected':'';}?> value="1101352">SIMALUNGUN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101336')?'selected':'';}?> value="1101336">SIMEULUE</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1029194')?'selected':'';}?> value="1029194">SINGARAJA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1014187')?'selected':'';}?> value="1014187">SITUBONDO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009573')?'selected':'';}?> value="1009573">SLEMAN(KAB)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010866')?'selected':'';}?> value="1010866">SOLOK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101375')?'selected':'';}?> value="1101375">SOLOK SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006959')?'selected':'';}?> value="1006959">SRAGEN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011029')?'selected':'';}?> value="1011029">SUBULUSSALAM</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006958')?'selected':'';}?> value="1006958">SUKOHARJO(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1008452')?'selected':'';}?> value="1008452">SUMEDANG(Kab)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009137')?'selected':'';}?> value="1009137">SUMENEP(Kota)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101382')?'selected':'';}?> value="1101382">SUNGAIPENUH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005283')?'selected':'';}?> value="1005283">SURABAYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006956')?'selected':'';}?> value="1006956">SURAKARTA-SOLO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011737')?'selected':'';}?> value="1011737">TABANAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101376')?'selected':'';}?> value="1101376">TANAH DATAR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1000353')?'selected':'';}?> value="1000353">TANGERANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101414')?'selected':'';}?> value="1101414">TANGERANG SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010631')?'selected':'';}?> value="1010631">TANGGAMUS</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011157')?'selected':'';}?> value="1011157">TANGGUL</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101353')?'selected':'';}?> value="1101353">TANJUNG BALAI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101379')?'selected':'';}?> value="1101379">TANJUNG JABUNG BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101380')?'selected':'';}?> value="1101380">TANJUNG JABUNG TIMUR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010927')?'selected':'';}?> value="1010927">TANJUNG PINANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101354')?'selected':'';}?> value="1101354">TAPANULI SELATAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101355')?'selected':'';}?> value="1101355">TAPANULI TENGAH</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101356')?'selected':'';}?> value="1101356">TAPANULI UTARA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1008184')?'selected':'';}?> value="1008184">TASIKMALAYA</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1011008')?'selected':'';}?> value="1011008">TEBING TINGGI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101381')?'selected':'';}?> value="1101381">TEBO</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006898')?'selected':'';}?> value="1006898">TEGAL</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1006960')?'selected':'';}?> value="1006960">TEGAL(Kota)</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101357')?'selected':'';}?> value="1101357">TOBA SAMOSIR</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005275')?'selected':'';}?> value="1005275">TRENGGALEK</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005276')?'selected':'';}?> value="1005276">TUBAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010647')?'selected':'';}?> value="1010647">TULANG BAWANG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101403')?'selected':'';}?> value="1101403">TULANG BAWANG BARAT</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1005277')?'selected':'';}?> value="1005277">TULUNGAGUNG</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1010645')?'selected':'';}?> value="1010645">WAY KANAN</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1101319')?'selected':'';}?> value="1101319">WLINGI</option>
                                <option <?php if(isset($reservasibarang)){echo ($reservasibarang['tujuanBarang']=='1009576')?'selected':'';}?> value="1009576">YOGYAKARTA</option>
                           </select>
                       </div>
                       <div class="col-md-6">
                           <label for="Berat" class="form-label">Berat</label>
                           <input type="number" value="<?php if(isset($reservasibarang)){echo $reservasibarang['beratBarang'];}?>" class="form-control" name="beratBarang" id="Berat" required />
                       </div>

                       <div class="col-12">
                           <button type="submit" name="btn_save" class="btn btn-primary"><?php echo (isset($_GET['reservasibarang']))?'Update':'Add';?></button>
                       </div>
                    </form>

                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
    <script>
        ActiveMenu_user(3,1,1);
    </script>
</body>

</html>