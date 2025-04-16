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

    <style>
        .t-text
        {   
            font-weight: 700;
            margin-bottom: 0rem !important;
            font-size: medium;
        }
        .d-text
        {
            font-size: large;
            line-height: 1.2;
            color: #666666 !important;
        }

    </style>

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

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="row g-2 align-items-center justify-content-center">

                        <div class="col-lg-11 wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="border rounded bg-light p-4 col-sm-12 col-xl-12 mt-2 mb-5">



                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="flase" aria-controls="flush-collapseOne">
                                                <div class="p-2" >
                                                    <h4 class="m-0">Data Pasien</h4>
                                                    <p class="mt-1 mb-0">Klik untuk melihat</p>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="row g-4 d-flex align-items-center justify-content-center pb-4">
                                                    <div class="col-sm-11 col-xl-11 border rounded bg-white p-4">
                                                        <h5 class="mb-0 mt-1 mb-3" style="color: #666666 !important;">Informasi Umum</h5>
                                                        <div class="row g-4">
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 name">
                                                                <p class="t-text">Nama Lengkap :</p>
                                                                <p class="d-text mb-0" id="name"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 phone">
                                                                <p class="t-text">No. WhatsApp :</p>
                                                                <p class="d-text mb-0" id="phone"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 email">
                                                                <p class="t-text">Email :</p>
                                                                <p class="d-text mb-0" id="email"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 nik">
                                                                <p class="t-text">Nomor Induk Kependudukan :</p>
                                                                <p class="d-text mb-0" id="nik"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 dob">
                                                                <p class="t-text">Tanggal Lahir :</p>
                                                                <p class="d-text mb-0" id="dob"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 pendidikan">
                                                                <p class="t-text">Status Pendidikan :</p>
                                                                <p class="d-text mb-0" id="pendidikan"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 pekerjaan">
                                                                <p class="t-text">Pekerjaan :</p>
                                                                <p class="d-text mb-0" id="pekerjaan"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 alamat">
                                                                <p class="t-text">Alamat :</p>
                                                                <p class="d-text mb-0" id="alamat"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 asuransi">
                                                                <p class="t-text">Asuransi :</p>
                                                                <p class="d-text mb-0" id="asuransi"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 status_kb">
                                                                <p class="t-text">Status KB :</p>
                                                                <p class="d-text mb-0" id="status_kb"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 kb_terakhir">
                                                                <p class="t-text">Alat / Obat / Cara KB Terakhir :</p>
                                                                <p class="d-text mb-0" id="kb_terakhir"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-11 col-xl-11 border rounded bg-white p-4">
                                                        <h5 class="mb-0 mt-1 mb-3" style="color: #666666 !important;">Informasi Suami / Istri (Pasangan)</h5>
                                                        <div class="row g-4" id="status_pasangan">
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 pasangan">
                                                                <p class="t-text">Nama Pasangan :</p>
                                                                <p class="d-text mb-0" id="pasangan"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 pendidikan_pasangan">
                                                                <p class="t-text">Status Pendidikan Pasangan :</p>
                                                                <p class="d-text mb-0" id="pendidikan_pasangan"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 pekerjaan_pasangan">
                                                                <p class="t-text">Pekerjaan Pasangan :</p>
                                                                <p class="d-text mb-0" id="pekerjaan_pasangan"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-11 col-xl-11 border rounded bg-white p-4">
                                                        <h5 class="mb-0 mt-1 mb-3" style="color: #666666 !important;">Informasi Anak</h5>
                                                        <div class="row g-4" id="status_anak">
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 anak_pria_hidup">
                                                                <p class="t-text">Jumlah Anak Masih Hidup :</p>
                                                                <p class="d-text mb-0 anak_pria_hidup" id="anak_pria_hidup"></p>
                                                                <p class="d-text mb-0 anak_wanita_hidup" id="anak_wanita_hidup"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 anak_terakhir">
                                                                <p class="t-text">Umur Anak Terakhir :</p>
                                                                <p class="d-text mb-0" id="anak_terakhir"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                
                            </div>
                        </div>

                        <div class="col-lg-10 wow fadeInLeft" data-wow-delay="0.1s">
                            <form autocomplete="off" action="webapi/acceptorwebapi.php?function=add_acceptor" method="post" >
                                <input type="text" class="form-control d-none" name="uuid">
                                <div class="col-sm-12 col-xl-12 mt-1 mb-1">
                                    <div class="rounded bg-light d-flex align-items-center p-2" >
                                        <h4 class="mb-1 mt-1" style="margin-left: .5rem !important;">Anamnese</h4>
                                    </div>
                                </div>
                                <div class="row g-3 pt-4 px-4">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" name="partus_saat_ini" placeholder="Partus">
                                            <label for="partus_saat_ini">Partus (Persalinan)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="date" class="form-control" name="haid_terakhir" placeholder="Haid_Terakhir">
                                            <label for="haid_terakhir">Tanggal Haid Terakhir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" name="status_kehamilan" id="status_kehamilan" placeholder="">
                                            <label for="status_kehamilan">Hamil / Diduga Hamil</label>
                                        </div>
                                    </div>
                                    <p class="font-italic " style="text-align: left;margin-bottom: -10px !important;margin-top: 20px !important;font-weight: 500;">Jumlah GPA</p>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="gravida" placeholder="Gravida">
                                            <label for="gravida">Gravida (Kehamilan)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="partus" placeholder="Partus">
                                            <label for="partus">Partus (Persalinan)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="form-floating mb-0">
                                            <input type="number" class="form-control" name="abortus" placeholder="Abortus">
                                            <label for="abortus">Abortus (Keguguran)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <select class="form-select" id="status_menyusui" name="status_menyusui" aria-label="Floating label select example">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="1">Ya</option>
                                                <option value="2">Tidak</option>
                                            </select>
                                            <label for="status_menyusui">Menyusui</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating mb-0">
                                            <textarea class="form-control" placeholder="Riwayat_Penyakit" name="riwayat_penyakit" style="height: 80px"></textarea>
                                            <label for="riwayat_penyakit">Riwayat Penyakit Sebelumnya</label>
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

        moment.locale('id');  
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const uuid = urlParams.get('uuid')
        //console.log(product);
        //alert(uuid);
        getPasien(uuid);
          

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


        function getPasien(uuidsearch){

            const array_pendidikan = new Array("Tidak Tamat SD/MI", "Tamat SD/MI", "Tamat SLTP/MTSN", "Tamat SMA/MA", "Tamat Perguruan Tinggi", "Tidak Sekolah");
            const array_pekerjaan = new Array("Petani", "Nelayan", "Pedagang", "PNS/TNI/POLRI", "Pegawai Swasta", "Wiraswasta", "Pensiunan", "Pekerja Lepas", "Tidak Bekerja");
            const array_asuransi = new Array("BPJS Kesehatan", "Lainnya", "Tidak");
            const array_status_kb = new Array("Baru Pertama Kali", "Pernah Pakai Alat KB (Berhenti Sesudah Bersalin/Keguguran)", "Pernah Pakai Alat KB", "Sedang KB");
            const array_kb_terakhir = new Array("Suntikan 1 Bulanan", "Suntikan 3 Bulanan", "Pil", "Kondom", "Implan 1 Batang", "Implan 2 Batang", "IUD", "IUD Lain-Lain", "Tubektomi", "Vasektomi", "Belum Pernah");
            

            
            
            
            $(".name").hide();
            var name = document.getElementById('name');
            $(".nik").hide();
            var nik = document.getElementById('nik');
            $(".email").hide();
            var email = document.getElementById('email');
            $(".phone").hide();
            var phone = document.getElementById('phone');
            $(".dob").hide();
            var dob = document.getElementById('dob');
            $(".alamat").hide();
            var alamat = document.getElementById('alamat');
            $(".pasangan").hide();
            var pasangan = document.getElementById('pasangan');
            $(".pendidikan").hide();
            var pendidikan = document.getElementById('pendidikan');
            $(".pendidikan_pasangan").hide();
            var pendidikan_pasangan = document.getElementById('pendidikan_pasangan');
            $(".pekerjaan").hide();
            var pekerjaan = document.getElementById('pekerjaan');
            $(".pekerjaan_pasangan").hide();
            var pekerjaan_pasangan = document.getElementById('pekerjaan_pasangan');

            $(".anak_pria_hidup").hide();
            var anak_pria_hidup = document.getElementById('anak_pria_hidup');
            $(".anak_wanita_hidup").hide();
            var anak_wanita_hidup = document.getElementById('anak_wanita_hidup');
            $(".anak_terakhir").hide();
            var anak_terakhir = document.getElementById('anak_terakhir');
            $(".status_kb").hide();
            var status_kb = document.getElementById('status_kb');
            $(".kb_terakhir").hide();
            var kb_terakhir = document.getElementById('kb_terakhir');

            var status_pasangan = document.getElementById('status_pasangan');
            var status_anak = document.getElementById('status_anak');
  
  



            $.ajax({
                type: 'GET',
                dataType:"json",
                url: 'webapi/adminwebapi.php?function=get_detail_pasien&uuid=' + uuidsearch,
                success: function (data, status, xhr) {
                    $("input[name='uuid']").val(uuidsearch);
                    if(data.hasOwnProperty("fullname")){
                        $(".name").show();
                        name.innerHTML = "";
                        name.innerHTML += data.fullname;
                    }
                    if(data.hasOwnProperty("nik")){
                        $(".nik").show();
                        nik.innerHTML = "";
                        nik.innerHTML += data.nik;
                    }
                    if(data.hasOwnProperty("email")){
                        $(".email").show();
                        email.innerHTML = "";
                        email.innerHTML += data.email;
                    }
                    if(data.hasOwnProperty("phone")){
                        $(".phone").show();
                        phone.innerHTML = "";
                        phone.innerHTML += data.phone;
                    }
                    if(data.hasOwnProperty("dob")){
                        $(".dob").show();
                        dob.innerHTML = "";
                        dob.innerHTML += moment(data.dob).format("DD MMMM YYYY");
                    }
                    if(data.hasOwnProperty("alamat")){
                        $(".alamat").show();
                        alamat.innerHTML = "";
                        alamat.innerHTML += data.alamat;
                    }
                    if(data.hasOwnProperty("pendidikan")){
                        $(".pendidikan").show();
                        pendidikan.innerHTML = "";
                        pendidikan.innerHTML += array_pendidikan[data.pendidikan - 1 ];
                    }
                    if(data.hasOwnProperty("pekerjaan")){
                        $(".pekerjaan").show();
                        pekerjaan.innerHTML = "";
                        pekerjaan.innerHTML += array_pekerjaan[data.pekerjaan - 1 ];
                    }
                    if(data.hasOwnProperty("asuransi")){
                        $(".asuransi").show();
                        asuransi.innerHTML = "";
                        asuransi.innerHTML += array_asuransi[data.asuransi - 1];
                    }
                    if(data.hasOwnProperty("status_kb")){
                        $(".status_kb").show();
                        status_kb.innerHTML = "";
                        status_kb.innerHTML += array_status_kb[data.status_kb - 1];
                    }
                    if(data.hasOwnProperty("kb_terakhir")){
                        $(".kb_terakhir").show();
                        kb_terakhir.innerHTML = "";
                        kb_terakhir.innerHTML += array_kb_terakhir[data.kb_terakhir - 1];
                    }

                    if(data.is_pasangan == 1){
                        if(data.hasOwnProperty("nama_pasangan")){
                            $(".pasangan").show();
                            pasangan.innerHTML = "";
                            pasangan.innerHTML += data.nama_pasangan;
                        }
                        if(data.hasOwnProperty("pendidikan_pasangan")){
                            $(".pendidikan_pasangan").show();
                            pendidikan_pasangan.innerHTML = "";
                            pendidikan_pasangan.innerHTML += array_pendidikan[data.pendidikan_pasangan - 1];
                        }
                        if(data.hasOwnProperty("pekerjaan_pasangan")){
                            $(".pekerjaan_pasangan").show();
                            pekerjaan_pasangan.innerHTML = "";
                            pekerjaan_pasangan.innerHTML += array_pekerjaan[data.pekerjaan_pasangan - 1];
                        }
                    } else if (data.is_pasangan == 0){
                        status_pasangan.innerHTML = "";
                        status_pasangan.innerHTML += '<div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0"><p class="t-text">Belum Punya Pasangan</p></div>';
                    }


                    if(data.is_anak == 1){
                        if(data.hasOwnProperty("anak_pria_hidup")){
                            $(".anak_pria_hidup").show();
                            anak_pria_hidup.innerHTML = "";
                            anak_pria_hidup.innerHTML += data.anak_pria_hidup + " Anak Laki-Laki";
                        }
                        if(data.hasOwnProperty("anak_wanita_hidup")){
                            $(".anak_wanita_hidup").show();
                            anak_wanita_hidup.innerHTML = "";
                            anak_wanita_hidup.innerHTML += data.anak_wanita_hidup + " Anak Perempuan";
                        }
                        if(data.hasOwnProperty("tahun_anak_terakhir")){
                            $(".anak_terakhir").show();
                            anak_terakhir.innerHTML = "";
                            anak_terakhir.innerHTML += data.tahun_anak_terakhir + " Tahun " + data.bulan_anak_terakhir + " Bulan";
                        }
                    } else if (data.is_anak == 0){
                        status_anak.innerHTML = "";
                        status_anak.innerHTML += '<div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0"><p class="t-text">Belum Punya Anak</p></div>';
                    }


                }
            });
        
        }

    });
    </script>


</body>

</html>