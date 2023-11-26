<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<?php 
$id = 0;
if(isset($_SESSION["id_pemesan"])){
    $id = $_SESSION["id_pemesan"];
}

if(isset($_POST['btn_save'])){
    $stasiun_asal           = $_POST['stasiun_asal'];
    $stasiun_tujuan         = $_POST["stasiun_tujuan"];
    $tanggalKeberangkatan   = $_POST["tanggalKeberangkatan"];
    $jumlahPenumpang        = $_POST["jumlahPenumpang"];

    if(isset($_GET['reservasitiket'])){
        mysqli_query($koneksi, "update reservasitiket set stasiunAsal = '".$stasiun_asal."',stasiunTujuan='".$stasiun_tujuan."',tanggalKeberangkatan='".$tanggalKeberangkatan."',jumlahPenumpang='".$jumlahPenumpang."' where id_tiket='".$_GET['reservasitiket']."'");
        $_SESSION['Message'] = 'Update reservation tiket successfully';

    }else{
        mysqli_query($koneksi, "INSERT INTO reservasitiket (stasiunAsal,stasiunTujuan,tanggalKeberangkatan,jumlahPenumpang,id_pemesan)values ('".$stasiun_asal."','".$stasiun_tujuan."', '".$tanggalKeberangkatan."','$jumlahPenumpang','$id')");
        $_SESSION['Message'] = 'Add reservation tiket successfully';

    }
    echo "<script>window.location.href ='viewreservasitiket.php';</script>";
    
}
if(isset($_GET['reservasitiket'])){
 $reservasiticket = mysqli_query($koneksi, "SELECT * FROM reservasitiket WHERE id_tiket =".$_GET['reservasitiket']);
 $reservasiticket = mysqli_fetch_assoc($reservasiticket);

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
                    <h1><?php echo (isset($_GET['reservasitiket']))?'Update':'Add';?> Ticket</h1>
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
                           <label for="inputEmail4" class="form-label">Stasiun Asal</label>
                           <select name="stasiun_asal"  id="stasiun_asal" class="form-control">
                                <script>
                                   var dat;
                                   var stasiun_asal = document.getElementById("stasiun_asal")
                                   fetch('https://booking.kai.id/api/stations2')
                                     .then((response) => response.json())
                                     .then((data) => {
                                       dat = data
                                     })
                                     .then(() => {
                                        console.log(dat);
                                        $(dat).each(function(index) {
                                            var selected = ('<?php if(isset($reservasiticket)){echo $reservasiticket['stasiunAsal'];}?>' == dat[index]["city"])?'Selected':'';
                                          $('#stasiun_asal').append(`<option `+selected+` value='`+dat[index]["city"]+`'>`+dat[index]["city"]+`</option`);
                                        });
                                     });
                                </script>
                           </select>
                       </div>
                       <div class="col-md-6">
                           <label for="inputEmail4" class="form-label">Stasiun Tujuan</label>
                            <select name="stasiun_tujuan" class="form-control" id="stasiun_tujuan">
                                <script>
                                   var dat;
                                   var stasiun_tujuan = document.getElementById("stasiun_tujuan")
                                   fetch('https://booking.kai.id/api/stations2')
                                     .then((response) => response.json())
                                     .then((data) => {
                                       dat = data
                                     })
                                     .then(() => {
                                        console.log(dat);
                                        $(dat).each(function(index) {
                                            var selected = ('<?php if(isset($reservasiticket)){echo $reservasiticket['stasiunTujuan'];}?>' == dat[index]["city"])?'Selected':'';
                                          $('#stasiun_tujuan').append(`<option `+selected+` value='`+dat[index]["city"]+`'>`+dat[index]["city"]+`</option`);
                                        });
                                     });
                                </script>
                            </select>
                       </div>
                       <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Tanggal Keberangkatan</label>
                            <input type="date" value="<?php if(isset($reservasiticket)){echo $reservasiticket['tanggalKeberangkatan'];}?>" class="form-control" name="tanggalKeberangkatan"required />
                       </div>
                       <div class="col-md-6">
                           <label for="Berat" class="form-label">Jumlah Penumpang</label>
                           <input type="number" value="<?php if(isset($reservasiticket)){echo $reservasiticket['jumlahPenumpang'];}?>" class="form-control" name="jumlahPenumpang"  required />
                       </div>

                       <div class="col-12">
                           <button type="submit" name="btn_save" class="btn btn-primary"><?php echo (isset($_GET['reservasitiket']))?'Update':'Add';?></button>
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
        ActiveMenu_user(2,1,1);
    </script>
</body>

</html>