

<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/eeb0128020.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

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


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            
        <li>
            <a href="viewreservasitiket.php">
            <i class="fa-solid fa-ticket" style="padding:10px"></i> 
                <span class="text">Reservasi Tiket</span>
            </a>
        </li>
        <li>
            <a href="viewreservasiBarang.php">
            <i class="fa-solid fa-box"style="padding:10px"></i>
                <span class="text">Reservasi Barang</span>
            </a>
        </li>  
        <li>
            <a href="viewuserbarang.php">
            <i class="fa-solid fa-user-gear"style="padding:10px"></i>
                <span class="text">User Brand</span>
            </a>
        </li> 
        <li>
            <a href="viewusertiket.php">
            <i class="fa-solid fa-user" style="padding:10px"></i>
                <span class="text">User tiket</span>
            </a>
        </li>  
        <li>
            <a href="index.php">
                <i class="fa-solid fa-right-from-bracket"style="padding:10px"></i>
                <span class="text">Logout</span>
            </a>
        </li>  
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            
            <a href="#" class="nav-link"></a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Selamat datang admin KAI</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
               
            </div>


           
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="script.js"></script>
</body>

</html>