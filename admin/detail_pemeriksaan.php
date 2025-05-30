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
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$_SESSION['instance']?></h6>
                        <span><?=$_SESSION['role_admin']?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index-nakes.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="list-pasien-nakes.php" class="nav-item nav-link"><i class="fa fa-user-circle me-2"></i>List Pasien</a>
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
                            <div class="border rounded bg-light p-4 pt-0 pb-0 p-4 col-sm-12 col-xl-12 mt-2 mb-5">

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

                        <div class="col-lg-11 wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="border rounded bg-light p-4 pt-0 pb-0 col-sm-12 col-xl-12 mt-2 mb-5">

                                <div class="accordion accordion-flush" id="accordionFlush2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="flase" aria-controls="flush-collapseTwo">
                                                <div class="p-2" >
                                                    <h4 class="m-0">Data Anamnese</h4>
                                                    <p class="mt-1 mb-0">Klik untuk melihat</p>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush2">
                                            <div class="accordion-body">
                                                <div class="row g-4 d-flex align-items-center justify-content-center pb-4">
                                                    <div class="col-sm-11 col-xl-11 border rounded bg-white p-4">
                                                        <h5 class="mb-0 mt-1 mb-3" style="color: #666666 !important;">Informasi Umum</h5>
                                                        <div class="row g-4">
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 partus_saat_ini">
                                                                <p class="t-text">Partus (Persalinan) :</p>
                                                                <p class="d-text mb-0" id="partus_saat_ini"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 haid_terakhir">
                                                                <p class="t-text">Tanggal Haid Terakhir :</p>
                                                                <p class="d-text mb-0" id="haid_terakhir"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 status_kehamilan">
                                                                <p class="t-text">Hamil / Diduga Hamil :</p>
                                                                <p class="d-text mb-0" id="status_kehamilan"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 status_menyusui">
                                                                <p class="t-text">Menyusui :</p>
                                                                <p class="d-text mb-0" id="status_menyusui"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 riwayat_penyakit">
                                                                <p class="t-text">Riwayat Penyakit Sebelumnya :</p>
                                                                <p class="d-text mb-0" id="riwayat_penyakit"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-11 col-xl-11 border rounded bg-white p-4">
                                                        <h5 class="mb-0 mt-1 mb-3" style="color: #666666 !important;">Jumlah GPA</h5>
                                                        <div class="row g-4" id="status_pasangan">
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 gravida">
                                                                <p class="t-text">Gravida (Kehamilan):</p>
                                                                <p class="d-text mb-0" id="gravida"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 partus">
                                                                <p class="t-text">Partus (Persalinan) :</p>
                                                                <p class="d-text mb-0" id="partus"></p>
                                                            </div>
                                                            <div class="col-sm-12 col-xl-4 p-3 pb-0 mt-0 abortus">
                                                                <p class="t-text">Abortus (Keguguran) :</p>
                                                                <p class="d-text mb-0" id="abortus"></p>
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

                        <div class="col-lg-12 wow fadeInLeft" data-wow-delay="0.1s">

                            <h3 class="mb-0 mt-1 text-center" style="color: #666666 !important;">Detail Pemeriksaan Terakhir</h3>
                            <h6 class="mb-0 mb-3 text-center tgl_dilayani" style="color: #666666 !important;" id="tgl_dilayani">Tidak Ada</h6>
                            <div class="row g-4 d-flex align-items-center justify-content-center pb-2">
                                <div class="col-sm-11 col-xl-11 bg-white p-4 pb-2">
                                    <h5 class="mb-0 mt-1 mb-3" style="color: #666666 !important;">Riwayat Pemeriksaan</h5>
                                    <div class="row g-4">
                                        <div class="col-sm-6 col-xl-6 p-3 pb-0 mt-0 keadaan_umum">
                                            <p class="t-text">Keadaan Umum :</p>
                                            <p class="d-text mb-0" id="keadaan_umum"></p>
                                        </div>
                                        <div class="col-sm-6 col-xl-6 p-3 pb-0 mt-0 berat_badan">
                                            <p class="t-text">Berat Badan (Kg) :</p>
                                            <p class="d-text mb-0" id="berat_badan"></p>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0">
                                            <p class="t-text">Tekanan Darah</p>
                                            <div class="row g-4  pt-4">
                                                <div class="col-sm-6 col-xl-6 p-3 pt-0 pb-0 mt-0 sbp">
                                                    <p class="t-text">SBP (Systolic Blood Pressure) :</p>
                                                    <p class="d-text mb-0" id="sbp"></p>
                                                </div>
                                                <div class="col-sm-6 col-xl-6 p-3 pt-0 pb-0 mt-0 dbp">
                                                    <p class="t-text">DBP (Distolic Blood Pressure) :</p>
                                                    <p class="d-text mb-0" id="dbp"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0 is_IUDorMOM">
                                            <p class="t-text">Pemeriksaan Dalam (Untuk Pemasangan IUD atau MOM)</p>
                                            <div class="row g-4  pt-4">
                                                <div class="col-sm-6 col-xl-6 p-3 pt-0 pb-0 mt-0 tanda_radang">
                                                    <p class="t-text">Tanda-Tanda Radang :</p>
                                                    <p class="d-text mb-0" id="tanda_radang"></p>
                                                </div>
                                                <div class="col-sm-6 col-xl-6 p-3 pt-0 pb-0 mt-0 tumor">
                                                    <p class="t-text">Tumor / Keganasan Ginekologi :</p>
                                                    <p class="d-text mb-0" id="tumor"></p>
                                                </div>
                                                <div class="col-sm-12 col-xl-12 p-3 pt-0 pb-0 mt-2 posisi_rahim">
                                                    <p class="t-text">Posisi Rahim:</p>
                                                    <p class="d-text mb-0" id="posisi_rahim"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-11 col-xl-11 bg-white p-4">
                                    <h5 class="mb-0 mt-1 mb-3" style="color: #666666 !important;">Riwayat Tindakan</h5>
                                    <div class="row g-4" id="status_pasangan">
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0 pilihan_kontrasepsi">
                                            <p class="t-text">Alat / Obat / Cara Kontrasepsi yang Dipilih :</p>
                                            <p class="d-text mb-0" id="pilihan_kontrasepsi"></p>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0 tgl_kunjungan_ulang">
                                            <p class="t-text">Tanggal Kunjungan Ulang:</p>
                                            <p class="d-text mb-0" id="tgl_kunjungan_ulang"></p>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0 tgl_dicabut_kontrasepsi">
                                            <p class="t-text">Tanggal Dicabut (Khusus Implan / IUD) :</p>
                                            <p class="d-text mb-0" id="tgl_dicabut_kontrasepsi"></p>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0 tindakan">
                                            <p class="t-text">Tindakan :</p>
                                            <p class="d-text mb-0" id="tindakan"></p>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0 hasil_pemeriksaan">
                                            <p class="t-text">Hasil Pemeriksaan :</p>
                                            <p class="d-text mb-0" id="hasil_pemeriksaan"></p>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 p-3 pb-0 mt-0 catatan">
                                            <p class="t-text">Catatan :</p>
                                            <p class="d-text mb-0" id="catatan"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

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
            const array_status_kehamilan = new Array("Ya", "Tidak");
            const array_status_menyusui = new Array("Ya", "Tidak");


            const array_keadaan_umum = new Array("Baik", "Tidak");
            const array_tanda_radang = new Array("Ya", "Tidak");
            const array_tumor = new Array("Ya", "Tidak");
            const array_posisi_rahim = new Array(".....", "Tidak");
            const array_pilihan_kontrasepsi = new Array("Implan", "IUD", ".....");
            const array_hasil_pemeriksaan = new Array("Sukses", "Tidak");


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
  
  
            $(".partus_saat_ini").hide();
            var partus_saat_ini = document.getElementById('partus_saat_ini');
            $(".haid_terakhir").hide();
            var haid_terakhir = document.getElementById('haid_terakhir');
            $(".status_kehamilan").hide();
            var status_kehamilan = document.getElementById('status_kehamilan');
            $(".gravida").hide();
            var gravida = document.getElementById('gravida');
            $(".partus").hide();
            var partus = document.getElementById('partus');
            $(".abortus").hide();
            var abortus = document.getElementById('abortus');
            $(".status_menyusui").hide();
            var status_menyusui = document.getElementById('status_menyusui');
            $(".riwayat_penyakit").hide();
            var riwayat_penyakit = document.getElementById('riwayat_penyakit');


            //$(".tgl_dilayani").hide();
            var tgl_dilayani = document.getElementById('tgl_dilayani');
            $(".keadaan_umum").hide();
            var keadaan_umum = document.getElementById('keadaan_umum');
            $(".berat_badan").hide();
            var berat_badan = document.getElementById('berat_badan');
            $(".sbp").hide();
            var sbp = document.getElementById('sbp');
            $(".dbp").hide();
            var dbp = document.getElementById('dbp');
            $(".tanda_radang").hide();
            var tanda_radang = document.getElementById('tanda_radang');
            $(".tumor").hide();
            var tumor = document.getElementById('tumor');
            $(".posisi_rahim").hide();
            var posisi_rahim = document.getElementById('posisi_rahim');


            $(".pilihan_kontrasepsi").hide();
            var pilihan_kontrasepsi = document.getElementById('pilihan_kontrasepsi');
            $(".tgl_kunjungan_ulang").hide();
            var tgl_kunjungan_ulang = document.getElementById('tgl_kunjungan_ulang');
            $(".tgl_dicabut_kontrasepsi").hide();
            var tgl_dicabut_kontrasepsi = document.getElementById('tgl_dicabut_kontrasepsi');
            $(".tindakan").hide();
            var tindakan = document.getElementById('tindakan');
            $(".hasil_pemeriksaan").hide();
            var hasil_pemeriksaan = document.getElementById('hasil_pemeriksaan');
            $(".catatan").hide();
            var catatan = document.getElementById('catatan');



            $.ajax({
                type: 'GET',
                dataType:"json",
                url: 'webapi/adminwebapi.php?function=get_detail_last_check&uuid=' + uuidsearch,
                success: function (data, status, xhr) {
                    $("input[name='uuid_user']").val(uuidsearch);
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



                    if(data.hasOwnProperty("partus_saat_ini")){
                        $(".partus_saat_ini").show();
                        partus_saat_ini.innerHTML = "";
                        partus_saat_ini.innerHTML += data.partus_saat_ini;
                    }
                    if(data.hasOwnProperty("haid_terakhir")){
                        $(".haid_terakhir").show();
                        haid_terakhir.innerHTML = "";
                        haid_terakhir.innerHTML += data.haid_terakhir;
                    }
                    if(data.hasOwnProperty("status_kehamilan")){
                        $(".status_kehamilan").show();
                        status_kehamilan.innerHTML = "";
                        status_kehamilan.innerHTML += array_status_kehamilan[data.status_kehamilan - 1];
                    }
                    if(data.hasOwnProperty("gravida")){
                        $(".gravida").show();
                        gravida.innerHTML = "";
                        gravida.innerHTML += data.gravida;
                    }
                    if(data.hasOwnProperty("partus")){
                        $(".partus").show();
                        partus.innerHTML = "";
                        partus.innerHTML += data.partus;
                    }
                    if(data.hasOwnProperty("abortus")){
                        $(".abortus").show();
                        abortus.innerHTML = "";
                        abortus.innerHTML += data.abortus;
                    }
                    if(data.hasOwnProperty("status_menyusui")){
                        $(".status_menyusui").show();
                        status_menyusui.innerHTML = "";
                        status_menyusui.innerHTML += array_status_menyusui[data.status_menyusui - 1 ];
                    }
                    if(data.hasOwnProperty("riwayat_penyakit")){
                        $(".riwayat_penyakit").show();
                        riwayat_penyakit.innerHTML = "";
                        riwayat_penyakit.innerHTML += data.riwayat_penyakit;
                    }


                    
                    if(data.hasOwnProperty("tgl_dilayani")){
                        $(".tgl_dilayani").show();
                        tgl_dilayani.innerHTML = "";
                        tgl_dilayani.innerHTML += "Tanggal : " + data.tgl_dilayani;
                    }
                    if(data.hasOwnProperty("keadaan_umum")){
                        $(".keadaan_umum").show();
                        keadaan_umum.innerHTML = "";
                        keadaan_umum.innerHTML += array_keadaan_umum[data.keadaan_umum - 1];
                    }
                    if(data.hasOwnProperty("berat_badan")){
                        $(".berat_badan").show();
                        berat_badan.innerHTML = "";
                        berat_badan.innerHTML += data.berat_badan;
                    }
                    if(data.hasOwnProperty("sbp")){
                        $(".sbp").show();
                        sbp.innerHTML = "";
                        sbp.innerHTML += data.sbp;
                    }
                    if(data.hasOwnProperty("dbp")){
                        $(".dbp").show();
                        dbp.innerHTML = "";
                        dbp.innerHTML += data.dbp;
                    }

                    if (data.tanda_radang != null && data.tumor != null && data.posisi_rahim != null){
                        if(data.hasOwnProperty("tanda_radang")){
                            $(".tanda_radang").show();
                            tanda_radang.innerHTML = "";
                            tanda_radang.innerHTML += array_tanda_radang[data.tanda_radang - 1];
                        }
                        if(data.hasOwnProperty("tumor")){
                            $(".tumor").show();
                            tumor.innerHTML = "";
                            tumor.innerHTML += array_tumor[data.tumor - 1];
                        }
                        if(data.hasOwnProperty("posisi_rahim")){
                            $(".posisi_rahim").show();
                            posisi_rahim.innerHTML = "";
                            posisi_rahim.innerHTML += array_posisi_rahim[data.posisi_rahim - 1];
                        } 
                    } else {
                        $(".is_IUDorMOM").hide();
                    }


                    if(data.hasOwnProperty("pilihan_kontrasepsi")){
                        $(".pilihan_kontrasepsi").show();
                        pilihan_kontrasepsi.innerHTML = "";
                        pilihan_kontrasepsi.innerHTML += array_pilihan_kontrasepsi[data.pilihan_kontrasepsi - 1];
                    }
                    if(data.hasOwnProperty("tgl_kunjungan_ulang") && data.tgl_kunjungan_ulang != null){
                        $(".tgl_kunjungan_ulang").show();
                        tgl_kunjungan_ulang.innerHTML = "";
                        tgl_kunjungan_ulang.innerHTML += data.tgl_kunjungan_ulang;
                    }
                    if(data.hasOwnProperty("tgl_dicabut_kontrasepsi") && data.tgl_dicabut_kontrasepsi != null){
                        $(".tgl_dicabut_kontrasepsi").show();
                        tgl_dicabut_kontrasepsi.innerHTML = "";
                        tgl_dicabut_kontrasepsi.innerHTML += data.tgl_dicabut_kontrasepsi;
                    }
                    if(data.hasOwnProperty("tindakan")){
                        $(".tindakan").show();
                        tindakan.innerHTML = "";
                        tindakan.innerHTML += data.tindakan;
                    }
                    if(data.hasOwnProperty("hasil_pemeriksaan")){
                        $(".hasil_pemeriksaan").show();
                        hasil_pemeriksaan.innerHTML = "";
                        hasil_pemeriksaan.innerHTML += array_hasil_pemeriksaan[data.hasil_pemeriksaan - 1];
                    }
                    if(data.hasOwnProperty("catatan")){
                        $(".catatan").show();
                        catatan.innerHTML = "";
                        catatan.innerHTML += data.catatan;
                    }





                }
            });
        
        }

    });
    </script>


</body>

</html>