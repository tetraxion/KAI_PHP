<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<?php 
$id = 0;
if(isset($_SESSION["id_pemesanBarang"])){
    $id = $_SESSION["id_pemesanBarang"];
}

if(isset($_POST['btn_save'])){
    $nik          = $_POST['nik'];
    $nana         = $_POST["nana"];
    $email        = $_POST["email"];
    $password     = $_POST["password"];
    $level        = $_POST["level"];

    if(isset($_GET['userbarang'])){
        mysqli_query($koneksi, "update userbarang set NIK = '".$nik."',nama='".$nana."',email='".$email."',password='".$password."',level='".$level."' where id_pemesanBarang='".$_GET['userbarang']."'");
        $_SESSION['Message'] = 'Update user brand successfully';

    }else{
        mysqli_query($koneksi, "INSERT INTO userbarang (NIK,nama,email,password,level)values ('".$nik."','".$nana."','".$email."','".$password."','$level')");
        $_SESSION['Message'] = 'Add user brand successfully';

    }
    echo "<script>window.location.href ='viewuserbarang.php';</script>";
    
}
if(isset($_GET['userbarang'])){
 $userbarang = mysqli_query($koneksi, "SELECT * FROM userbarang WHERE id_pemesanBarang =".$_GET['userbarang']);
 $userbarang = mysqli_fetch_assoc($userbarang);

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
                    <h1><?php echo (isset($_GET['userbarang']))?'Update':'Add';?> Barang</h1>
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
                   <form class="row g-3" method="POST">
                       <div class="col-md-6">
                           <label for="inputEmail4" class="form-label">NIK</label>
                           <input type="text" value="<?php if(isset($userbarang)){echo $userbarang['NIK'];}?>" class="form-control" name="nik"required />
                       </div>
                       <div class="col-md-6">
                           <label for="inputEmail4" class="form-label">Nama</label>
                            <input type="text" value="<?php if(isset($userbarang)){echo $userbarang['nama'];}?>" class="form-control" name="nana"required />
                       </div>
                       <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" value="<?php if(isset($userbarang)){echo $userbarang['email'];}?>" class="form-control" name="email"required />
                       </div>
                       <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="text" value="<?php if(isset($userbarang)){echo $userbarang['password'];}?>" class="form-control" name="password"required />
                       </div>
                       <div class="col-md-6">
                           <label for="level" class="form-label">level</label>
                           <select name="level" class="form-control">
                               <option <?php if(isset($userbarang)){echo ($userbarang['level']=='0')?'selected':'';}?> value="0">0</option>
                               <option <?php if(isset($userbarang)){echo ($userbarang['level']=='1')?'selected':'';}?> value="1">1</option>
                               
                           </select>
                       </div>

                       <div class="col-12">
                           <button type="submit" name="btn_save" class="btn btn-primary"><?php echo (isset($_GET['userbarang']))?'Update':'Add';?></button>
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
        ActiveMenu_user(4,1,1);
    </script>
</body>

</html>