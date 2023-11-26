<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/eeb0128020.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<?php 
    if(isset($_GET['delete'])){
        $reservasibarang = mysqli_query($koneksi, "Delete FROM  reservasibarang WHERE id_barang =".$_GET['delete']);
        $_SESSION['Message'] = 'Delete reservation barang successfully';
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
                    <h1>Reservasi Barang</h1>
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
                    <div class="head">
                        <h3>Reservasi Barang</h3>
                        <a href="barang.php"><i class="fa-solid fa-square-plus"></i><input type="button" value="" name="" class="btn button_add"></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>JenisBarang</th>
                                <th>AsalBarang</th>
                                <th>TujuanBarang</th>
                                <th>BeratBarang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $reservasibarang = mysqli_query($koneksi, "SELECT * FROM reservasibarang order by id_barang DESC");
                                foreach ($reservasibarang as $reservasibarang_info){
                            ?>
                            <tr>
                                <td><?php echo $reservasibarang_info['jenisBarang']?></td>
                                <td><?php echo $reservasibarang_info['asalBarang']?></td>
                                <td><?php echo $reservasibarang_info['tujuanBarang']?></td>
                                <td><?php echo $reservasibarang_info['beratBarang']?></td>
                                <td>
                                    <a href="barang.php?reservasibarang=<?php echo $reservasibarang_info['id_reservasiBarang']?>"><button type="button" class="btn button_edit "><i style="color:  #3C91E6;" class="fa-solid fa-pen-to-square"></i></button></a>
                                    <button type="button" class="btn button_delete" onclick="Delete_barang(<?php echo $reservasibarang_info['id_barang']?>)"><i style="color:  #3C91E6;"class="fa-solid fa-trash-can"></i></button></a>
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
                window.location.href ='viewreservasiBarang.php?delete='+$id;
              }
            });
        }
        ActiveMenu_user(3,1,1);

    </script>
</body>

</html>
<?php 
  if(isset($_SESSION['Message'])){

    echo "<script>toastr.success('".$_SESSION['Message']."');</script>";
    unset($_SESSION["Message"]);
  }

?>