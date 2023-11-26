<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<?php 
$id = 0;
if(isset($_SESSION["id_pemesan"])){
    $id = $_SESSION["id_pemesan"];
}

if(isset($_POST['btn_save'])){
    $nik          = htmlentities(strip_tags(trim($_POST["nik"])));
    $nana         = htmlentities(strip_tags(trim($_POST["nana"])));
    $email        = htmlentities(strip_tags(trim($_POST["email"])));
    $password     = htmlentities(strip_tags(trim($_POST["password"])));
    $level        = htmlentities(strip_tags(trim($_POST["level"])));

    if(isset($_GET['usertiket'])){
        mysqli_query($koneksi, "update usertiket set NIK = '".$nik."',nama='".$nana."',email='".$email."',password='".$password."',level='".$level."' where id_pemesan='".$_GET['usertiket']."'");
        $_SESSION['Message'] = 'Update user tiket successfully';

    }else{
        mysqli_query($koneksi, "INSERT INTO usertiket (NIK,nama,email,password,level)values ('".$nik."','".$nana."','".$email."','".$password."','$level')");
        $_SESSION['Message'] = 'Add user tiket successfully';

    }
    echo "<script>window.location.href ='viewusertiket.php';</script>";
    
}
if(isset($_GET['usertiket'])){
 $usertiket = mysqli_query($koneksi, "SELECT * FROM usertiket WHERE id_pemesan =".$_GET['usertiket']);
 $usertiket = mysqli_fetch_assoc($usertiket);

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
                    <h1><?php echo (isset($_GET['usertiket']))?'Update':'Add';?> Ticket</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">User Ticket</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
            <div class="table-data">
                <div class="order">
                   <form class="row g-3" method="POST">
                       <div class="col-md-6">
                           <label for="inputEmail4" class="form-label">NIK</label>
                           <input type="text" value="<?php if(isset($usertiket)){echo $usertiket['NIK'];}?>" class="form-control" name="nik"required />
                       </div>
                       <div class="col-md-6">
                           <label for="inputEmail4" class="form-label">Nama</label>
                            <input type="text" value="<?php if(isset($usertiket)){echo $usertiket['nama'];}?>" class="form-control" name="nana"required />
                       </div>
                       <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" value="<?php if(isset($usertiket)){echo $usertiket['email'];}?>" class="form-control" name="email"required />
                       </div>
                       <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="text" value="<?php if(isset($usertiket)){echo $usertiket['password'];}?>" class="form-control" name="password"required />
                       </div>
                       <div class="col-md-6">
                           <label for="level" class="form-label">level</label>
                           <select name="level" class="form-control">
                               <option <?php if(isset($usertiket)){echo ($usertiket['level']=='0')?'selected':'';}?> value="0">0</option>
                               <option <?php if(isset($usertiket)){echo ($usertiket['level']=='1')?'selected':'';}?> value="1">1</option>
                               
                           </select>
                       </div>

                       <div class="col-12">
                           <button type="submit" name="btn_save" class="btn btn-primary"><?php echo (isset($_GET['usertiket']))?'Update':'Add';?></button>
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
        ActiveMenu_user(5,1,1);
    </script>
</body>

</html>