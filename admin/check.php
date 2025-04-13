<?php
// We need to use sessions, so you should always start sessions using the below code.
	session_start();
	// If the user is not logged in redirect to the login page...
	
	if (!isset($_SESSION['loggedin-nakes']) || !isset($_SESSION['loggedin-psp'])) {
		header('Location: ../akses-nakes.php');
		exit;
	}	
	if (isset($_SESSION['loggedin-nakes']) || isset($_SESSION['loggedin-psp'])) {
		if ($_SESSION['loggedin-nakes'] == False) {
			header('Location: index-psp.php');
			exit;
		}
	}	
	
	
	global $site; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<title>PillSync+</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
	<link rel="icon" href="../img/favicon.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index-nakes.php" class="navbar-brand mx-4 mb-3">
                    <img src="../img/pillsync+.png" style="max-width:6em" alt="Logo">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
					<!-- 
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
					-->
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$_SESSION['instance']?></h6>
                        <span><?=$_SESSION['role_admin']?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index-nakes.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="list-pasien-nakes.php" class="nav-item nav-link"><i class="fa fa-user-circle me-2"></i>List Pasien</a>
					<!-- 
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
					-->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="min-height: 4.2em;">
                <a href="index-nakes.php" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="../img/favicon.png" style="max-width:2.5em">
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<!--
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
					-->
                            <span class="d-none d-lg-inline-flex"><?=$_SESSION['instance']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0">
                            <a href="include/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="row g-2 align-items-center text-center justify-content-center">
                            <div class="col-lg-12 wow fadeInLeft rounded bg-light " data-wow-delay="0.1s">
                                
                                    <div class="col-sm-12 col-xl-12">
                                        <div class="d-flex align-items-center p-2" >
                                            <h4 class="mb-1 mt-1" style="margin-left: .5rem !important;">Cek Pasien</h4>
                                        </div>
                                    </div>
                                    <div class="row g-3 justify-content-center pt-1 px-4 mb-4">
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="form-floating mb-0">
                                                <input type="number" class="form-control" id="nik" placeholder="nik">
                                                <label for="nik">NIK Pasien</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xl-3">
                                            <button onclick="cekPasien();" class="btn btn-primary w-100 py-3">Submit</button>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>

                        <div class="row g-2 align-items-center justify-content-center">
                            <div class="col-lg-12 wow fadeInLeft rounded bg-light " data-wow-delay="0.1s">
                                <div style="margin-left: .5rem !important;padding-left: .5em !important;">
                                    <div class="col-sm-12 col-xl-12">
                                        <div class="d-flex align-items-center" >
                                            <h4 class="mb-1 mt-1">Informasi Pasien</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-12 1" style="margin-left: .5rem !important;padding-left: .5em !important;">
                                        <div class="d-flex align-items-center" >
                                            <p class="mb-1 mt-1">Silahkan Masukan NIK untuk Cek Pasien Terlebih Dahulu !</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-12 2" style="margin-left: .5rem !important;padding-left: .5em !important;">
                                        <div class="d-flex align-items-center" >
                                            <p class="mb-1 mt-1">Pasien Terdaftar Namun Tidak Terafiliasi Dengan Bidan Ini !</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-12 3" style="margin-left: .5rem !important;padding-left: .5em !important;">
                                        <div class="d-flex align-items-center" >
                                            <p class="mb-1 mt-1">Pasien Tidak Terdaftar !</p>
                                        </div>
                                    </div>
                                    <div class="4" style="margin-left: .5rem !important;padding-left: .5em !important;">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">NIK Pasien</div>
                                            <div class="col-lg-9 col-md-8" id="nik_check">-</div>
                                        </div>
                                                                        
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Nama Pasien</div>
                                            <div class="col-lg-9 col-md-8" id="name_check">-</div>
                                        </div>
                                            
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Email Pasien</div>
                                            <div class="col-lg-9 col-md-8" id="email_check">-</div>
                                        </div>
                                            
                                            
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">No. Telp Pasien</div>
                                            <div class="col-lg-9 col-md-8" id="no_check">-</div>
                                        </div>
                                            
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Alamat</div>
                                            <div class="col-lg-9 col-md-8" id="address_check">-</div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 col-md-4 label ">Status Acceptor</div>
                                            <div class="col-lg-9 col-md-8" id="acceptor_check">
                                            </div>
                                        </div>

                                        <div class="col-lg-9 col-md-8" id="buttons">
                                        </div>

                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">PillSync+</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


    <script>

    $(document).ready( function() {
        $(".2").hide();
        $(".3").hide();
        $(".4").hide();
    });

    function cekPasien(){
        var nik = document.getElementById('nik').value;
        //alert(nik);
        
        var nik_check = document.getElementById('nik_check');
        var name_check =  document.getElementById('name_check');
        var email_check =  document.getElementById('email_check');
        var no_check = document.getElementById('no_check');
        var address_check =  document.getElementById('address_check');
        var acceptor_check =  document.getElementById('acceptor_check');
        var buttons =  document.getElementById('buttons');

        $.ajax({
            type: 'GET',
            dataType:"json",
            url: 'webapi/adminwebapi.php?function=cek_pasien&nik=' + nik,
            success: function (data, status, xhr) {
                if (data.data_available == "No Data"){
                    $(".1").hide();
                    $(".2").hide();
                    $(".3").show();
                    $(".4").hide();
                } else if (data.data_available == "Data Available"){
                    if (data.uuid_bidan != <?php echo json_encode($_SESSION['uuid']);?>){
                        $(".1").hide();
                        $(".2").show();
                        $(".3").hide();
                        $(".4").hide();
                    } else if (data.uuid_bidan == <?php echo json_encode($_SESSION['uuid']);?>){
                        $(".1").hide();
                        $(".2").hide();
                        $(".3").hide();
                        $(".4").show();
                        nik_check.innerHTML = "";
                        nik_check.innerHTML += data.nik;
                        name_check.innerHTML = "";
                        name_check.innerHTML += data.fullname;
                        email_check.innerHTML = "";
                        email_check.innerHTML += data.email;
                        no_check.innerHTML = "";
                        no_check.innerHTML += data.phone;
                        address_check.innerHTML = "";
                        address_check.innerHTML += data.alamat;
                        if (data.data_acceptor == "Acceptor NA"){
                            acceptor_check.innerHTML = "";
                            acceptor_check.innerHTML += '<div class="col-lg-9 col-md-8" style="display: contents !important; justify-content: center;"><span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum Terdata</span></div>';

                            buttons.innerHTML = "";
                            buttons.innerHTML += '<a type="button" class="btn btn-primary mt-3" href="acceptor.php?uuid=' + data.uuid + '"><i class="fa fa-book me-2"></i>Input Acceptor</a>';

                        } else if(data.data_acceptor == "Acceptor Available"){
                            acceptor_check.innerHTML = "";
                            acceptor_check.innerHTML += '<div class="col-lg-9 col-md-8" style="display: contents !important; justify-content: center;"><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Sudah Terdata</span></div>';

                            buttons.innerHTML = "";
                            buttons.innerHTML += '<a type="button" class="btn btn-outline-primary mt-3" href="pemeriksaan.php?uuid=' + data.uuid + '"><i class="fa fa-book me-2"></i>Periksa Pasien</a>';

                        }
                        //acceptor_check.innerHTML = "";
                    }
                }
                //acceptor_check.innerHTML += data.acceptor_check;
                //alert(data.phone_number);
                //console.log(data);
                //datamember = data;
                //$(".btn_use_member").show();
          }
        });
    }

    </script>


</body>

</html>