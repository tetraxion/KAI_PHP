<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/eeb0128020.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<?php 
    if(isset($_GET['delete'])){
        $reservasibarang = mysqli_query($koneksi, "Delete FROM  reservasitiket WHERE id_tiket =".$_GET['delete']);
        $_SESSION['Message'] = 'Delete reservation tiket successfully';
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/styleDash.css">
    <title>AdminHub</title>
</head>
<body>
        <?php include 'sidebar.php';?>
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Reservasi Tiket</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Reservasi Tiket</a>
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
                    <div class="head">
                        <h3>Reservasi Tiket</h3>
                        <a href="ticket.php"><i class="fa-solid fa-square-plus"></i><input type="button" value="" name="" class="btn button_add"></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Stasiun Asal</th>
                                <th>Stasiun Tujuan</th>
                                <th>Tanggal Keberangkatan</th>
                                <th>Jumlah Penumpang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $reservasitiket = mysqli_query($koneksi, "SELECT * FROM reservasitiket order by id_tiket DESC");
                                foreach ($reservasitiket as $reservasitiket_info){
                            ?>
                            <tr>
                                <td><?php echo $reservasitiket_info['stasiunAsal']?></td>
                                <td><?php echo $reservasitiket_info['stasiunTujuan']?></td>
                                <td><?php echo $reservasitiket_info['tanggalKeberangkatan']?></td>
                                <td><?php echo $reservasitiket_info['jumlahPenumpang']?></td>
                                <td>
                                    <a href="ticket.php?reservasitiket=<?php echo $reservasitiket_info['id_tiket']?>"><button type="button" class="btn button_edit "><i style="color:  #3C91E6;" class="fa-solid fa-pen-to-square"></i></button></a>
                                    <button type="button" class="btn button_delete" onclick="Delete_barang(<?php echo $reservasitiket_info['id_tiket']?>)"><i style="color:  #3C91E6;"class="fa-solid fa-trash-can"></i></button></a>
                                </td> 
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script>
        function Delete_barang($id){
            swal({
              title: "Are you sure?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if(willDelete) {
                window.location.href ='viewreservasitiket.php?delete='+$id;
              }
            });
        }
        ActiveMenu_user(2,1,1);
    </script>
</body>

</html>
<?php 
  if(isset($_SESSION['Message'])){

    echo "<script>toastr.success('".$_SESSION['Message']."');</script>";
    unset($_SESSION["Message"]);
  }

?>