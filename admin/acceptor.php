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
                <a href="index.html" class="navbar-brand mx-4 mb-3">
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
                    <a href="index-psp.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
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
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
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

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="row g-2 align-items-center text-center justify-content-center">
                        <div class="col-lg-10 wow fadeInLeft rounded bg-light " data-wow-delay="0.1s">
                            <form autocomplete="off" action="webapi/acceptorwebapi.php?function=cek_user" method="post" >
                                <div class="col-sm-12 col-xl-12 mt-2">
                                    <div class="d-flex align-items-center p-2" >
                                        <h4 class="mb-1 mt-1" style="margin-left: .5rem !important;">Cek Pasien</h4>
                                    </div>
                                </div>
                                <div class="row g-3 justify-content-center pt-1 px-4 mb-4">
                                    <div class="col-lg-9 col-xl-9">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="nik" placeholder="nik">
                                            <label for="name">NIK Pasien</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xl-3">
                                        <button type="submit" class="btn btn-primary w-100 py-3">Cek</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>




                    <div class="row g-2 align-items-center text-center justify-content-center">
                        <div class="col-lg-10 wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="col-sm-12 col-xl-12 mt-2 mb-1">
                                <div class="rounded bg-light d-flex align-items-center p-2" >
                                    <h4 class="mb-1 mt-1" style="margin-left: .5rem !important;">Pasien</h4>
                                </div>
                            </div>
                            <div class="row g-3 pt-4 px-4">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">Pasien</label>
                                    </div>
                                </div>
                            </div>
                            <form autocomplete="off" action="app/webapi/registerwebapi.php?function=add_user" method="post" >
                                <div class="col-sm-12 col-xl-12 mt-2 mb-1">
                                    <div class="rounded bg-light d-flex align-items-center p-2" >
                                        <h4 class="mb-1 mt-1" style="margin-left: .5rem !important;">Anamnese</h4>
                                    </div>
                                </div>
                                <div class="row g-3 pt-4 px-4">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">Partus (Persalinan)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="date" class="form-control" name="dob" placeholder="DOB">
                                            <label for="name">Tanggal Haid Terakhir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" id="uuid_bidan" placeholder="">
                                            <label for="message">Hamil / Diduga Hamil</label>
                                        </div>
                                    </div>
                                    <p class="font-italic " style="text-align: left;margin-bottom: -10px !important;margin-top: 20px !important;font-weight: 500;">Jumlah GPA</p>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">Partus (Persalinan)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">Abortus (Keguguran)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">Gravida (Kehamilan)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="floatingSelect" name="pendidikan"
                                                aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">Ya</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            <label for="floatingSelect">Menyusui</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" style="height: 80px"></textarea>
                                            <label for="message">Riwayat Penyakit Sebelumnya</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-xl-12 mt-5 mb-1">
                                    <div class="rounded bg-light d-flex align-items-center p-2" >
                                        <h4 class="mb-1 mt-1" style="margin-left: .5rem !important;">Pemeriksaan</h4>
                                    </div>
                                </div>
                                <div class="row g-3 pt-4 px-4">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="floatingSelect" name="pendidikan"
                                                aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">Baik</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            <label for="floatingSelect">Keadaan Umum</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">Berat Badan (Kg)</label>
                                        </div>
                                    </div>
                                    <p class="font-italic " style="text-align: left;margin-bottom: -10px !important;margin-top: 20px !important;font-weight: 500;">Tekanan Darah</p>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">SBP (Systolic Blood Pressure)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="nik" placeholder="NIK">
                                            <label for="name">DBP (Distolic Blood Pressure)</label>
                                        </div>
                                    </div>
                                    <p class="font-italic " style="text-align: left;margin-bottom: -10px !important;margin-top: 20px !important;font-weight: 500;">Sebelum Dilakukan Pemasangan IUD atau MOM Dilakukan Pemeriksaan Dalam :</p>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="floatingSelect" name="pendidikan"
                                                aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">Ya</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            <label for="floatingSelect">Tanda-Tanda Radang</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="floatingSelect" name="pendidikan"
                                                aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">Ya</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            <label for="floatingSelect">Tumor / Keganasan Ginekologi :</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="floatingSelect" name="pendidikan"
                                                aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">.....</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            <label for="floatingSelect">Posisi Rahim</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-xl-12 mt-5 mb-1">
                                    <div class="rounded bg-light d-flex align-items-center p-2" >
                                        <h4 class="mb-1 mt-1" style="margin-left: .5rem !important;">Tindakan</h4>
                                    </div>
                                </div>
                                <div class="row g-3 pt-4 px-4">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="SelectKontrasepsi" name="pendidikan"
                                                aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">Implan</option>
                                                <option value="2">IUD</option>
                                                <option value="3">......</option>
                                            </select>
                                            <label for="floatingSelect">Alat / Obat / Cara Kontrasepsi yang Dipilih:</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="date" class="form-control" name="dob" placeholder="DOB">
                                            <label for="name">Tanggal Dilayani</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12 noniud_implan">
                                        <div class="form-floating mb-0">
                                            <input type="date" class="form-control" name="dob" placeholder="DOB">
                                            <label for="name">Tanggal Kunjungan Ulang</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12 iud_implan">
                                        <div class="form-floating mb-0">
                                            <input type="date" class="form-control" name="dob" placeholder="DOB">
                                            <label for="name">Tanggal Dicabut (Khusus Implan / IUD)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" id="uuid_bidan" placeholder="">
                                            <label for="message">Tindakan</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="floatingSelect" name="pendidikan"
                                                aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">Sukses</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            <label for="floatingSelect">Hasil Pemeriksaan</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" id="uuid_bidan" placeholder="">
                                            <label for="message">Catatan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-5">
                                    <div class="col-sm-6 col-xl-6">
                                        <button type="submit" class="btn btn-primary w-100 py-3">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->



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

    $( document ).ready(function() {
            
        $('#SelectKontrasepsi').change(function(){
            if( $(this).val()=="1" || $(this).val()=="2"){
                $(".iud_implan").show();
                $(".noniud_implan").hide();
            } else {
                $(".iud_implan").hide();
                $(".noniud_implan").show();
            }
        });
        $('#SelectKontrasepsi').trigger("change");

    });
    </script>


</body>

</html>