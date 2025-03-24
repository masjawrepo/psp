<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
		<link rel="icon" href="img/favicon.png">
        <title>PillSync+</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="lib/css2-1?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="lib/releases/v5.15.4/css/all.css">
        <link href="lib/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
		
			
		<style>
			
			#my-qr-reader {
				padding: 20px !important;
				border: 0px solid #b2b2b2 !important;
				border-radius: 8px;
			}

			#my-qr-reader img[alt="Info icon"] {
				display: none;
			}

			#my-qr-reader img[alt="Camera based scan"] {
				width: 100px !important;
				height: 100px !important;
				color: blue;
			}
			
			
			#html5-qrcode-anchor-scan-type-change {
				text-decoration: none !important;
				color: #1d9bf0;
			}

			video {
				width: 100% !important;
				border: 1px solid #b2b2b2 !important;
				border-radius: 0.25em;
			}

		</style>
		
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <!-- <h1 class="display-6 text-primary m-0"><i class="fas fa-envelope me-3"></i>Mailler</h1> -->
                    <img src="img/pillsync+.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#home" class="nav-item nav-link ">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="blog.php" class="nav-item nav-link">Blog</a>
                    </div>
                    <a href="akses-nakes.php" style="min-width: 11.5em;" class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4 mt-1 mb-1">Akses Nakes</a>
                    <a href="akses-pengguna.php" style="min-width: 11.5em;" class="btn btn-primary rounded-pill text-white py-2 px-4 mt-1 mb-1">Akses Pengguna</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->




        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
					
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                    <h1 class="display-5 mb-4">Form Pendaftaran Akun</h1>
                    <p class="mb-0" style="font-weight:500;">Afiliasi Bidan : </p>
                    <h4 class="text-primary mb-4" id="instance-name"></h4>
                </div>
								
                <div class="row g-5 align-items-center text-center justify-content-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <form autocomplete="off" action="app/webapi/registerwebapi.php?function=add_user" method="post" >
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="uuid-bidan" placeholder="" disabled>
                                        <input type="text" class="form-control d-none" name="uuid-bidan">
                                        <label for="uuid-bidan">UUID Bidan</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="fullname" placeholder="Nama Anda">
                                        <label for="name">Nama Anda (Sesuai KTP)</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="nik" placeholder="NIK">
                                        <label for="name">NIK (Nomor KTP)</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Alamat" name="address" style="height: 160px"></textarea>
                                        <label for="message">Alamat Tinggal (Sesuai KTP)</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="pob" placeholder="pOB">
                                        <label for="name">Tempat Lahir</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="dob" placeholder="DOB">
                                        <label for="name">Tanggal Lahir</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control" name="phone" placeholder="Phone">
                                        <label for="phone">No HP (Whatsapp)</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" >
                                        <label for="email">Email Anda</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" >
                                        <label for="email">Password Akun Anda</label>
										<p class="font-italic text-primary " style="text-align: left;">*Password ini digunakan untuk masuk ke akun anda</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6  text-center text-md-center text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn-square btn btn-light rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-center mb-md-0">
                        <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>PillSync+</a>, All right reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#home" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

    <!-- JavaScript Libraries -->
    <script src="lib/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="lib/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const uuid = urlParams.get('uuid')
        var instance = document.getElementById('instance-name');

        document.getElementById("uuid-bidan").value = uuid;

        $.ajax({
                type: 'GET',
                dataType:"json",
                url: 'app/webapi/registerwebapi.php?function=cek_bidan&uuid=' + uuid,
                success: function (data, status, xhr) {
                    instance.innerHTML = "";
                    instance.innerHTML += data.instance;
                }
            });

    </script>
		
    </body>

</html>