<!-- SIDEBAR -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/toastr.min.css">
<script src="asset/js/toastr.min.js"></script>

<script>
    function ActiveMenu_user(main_nav,child,type) {
      
          if(type==1){
              $("#main-menu-navigation> li:nth-child("+main_nav+")").addClass("active");
            }
          else if(type==2){
            $("#main-menu-navigation> li:nth-child("+main_nav+")> .menu-content> li:nth-child("+child+")").addClass("active");
          }

    }
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    
</script>
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top" id="main-menu-navigation">
        <li>
            <a href="dashboard.php">
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
        
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->