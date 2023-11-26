<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/eeb0128020.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<?php 
    if(isset($_GET['delete'])){
        $userbarang = mysqli_query($koneksi, "Delete FROM  userbarang WHERE id_pemesanBarang =".$_GET['delete']);
        $_SESSION['Message'] = 'Delete user brand successfully';

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
                    <h1>User Barang</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">User Barang</a>
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
                        <h3>User Barang</h3>
                        <a href="userbarang.php"><i class="fa-solid fa-square-plus"></i><input type="button" value="" name="" class="btn button_add"></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $userbarang = mysqli_query($koneksi, "SELECT * FROM userbarang order by id_pemesanBarang DESC");
                                foreach ($userbarang as $userbarang_info){
                            ?>
                            <tr>
                                <td><?php echo $userbarang_info['NIK']?></td>
                                <td><?php echo $userbarang_info['nama']?></td>
                                <td><?php echo $userbarang_info['email']?></td>
                                <td><?php echo $userbarang_info['password']?></td>
                                <td><?php echo $userbarang_info['level']?></td>
                                <td>
                                    <a href="userbarang.php?userbarang=<?php echo $userbarang_info['id_pemesanBarang']?>"><button type="button" class="btn button_edit "><i style="color:  #3C91E6;" class="fa-solid fa-pen-to-square"></i></button></a>
                                    <button type="button" class="btn button_delete" onclick="Delete_barang(<?php echo $userbarang_info['id_pemesanBarang']?>)"><i style="color:  #3C91E6;"class="fa-solid fa-trash-can"></i></button></a>
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
                window.location.href ='viewuserbarang.php?delete='+$id;
              }
            });
        }
    </script>
    <script>
        ActiveMenu_user(4,1,1);
    </script>
</body>

</html>
<?php 
  if(isset($_SESSION['Message'])){

    echo "<script>toastr.success('".$_SESSION['Message']."');</script>";
    unset($_SESSION["Message"]);
  }

?>