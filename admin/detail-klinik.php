<?php
// We need to use sessions, so you should always start sessions using the below code.
	session_start();
	// If the user is not logged in redirect to the login page...
	
	if (!isset($_SESSION['loggedin-nakes']) || !isset($_SESSION['loggedin-psp'])) {
		header('Location: ../akses-nakes.php');
		exit;
	}	
	if (isset($_SESSION['loggedin-nakes']) || isset($_SESSION['loggedin-psp'])) {
		if ($_SESSION['loggedin-psp'] == False) {
			header('Location: index-nakes.php');
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

	<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
	
	<style>
		#qrcode {
		  width: 320px;
		  height: 320px;
		  margin-top: 15px;
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
                <a href="index-psp.php" class="navbar-brand mx-4 mb-3">
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
                    <a href="index-psp.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="list-klinik.php" class="nav-item nav-link active"><i class="fa fa-file-alt me-2"></i>Klinik Terdaftar</a>
                    <a href="list-pasien.php" class="nav-item nav-link"><i class="fa fa-user-circle me-2"></i>Pasien Terdaftar</a>
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
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="include/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
			
                <div class="card">
					<div class="card-body pt-3">
						<!-- Bordered Tabs -->
						<ul class="nav nav-tabs nav-tabs-bordered">
							<li class="nav-item">
							  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
							</li>
							<li class="nav-item">
							  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#list_pasien">List pasien</button>
							</li>
							<!--
							<li class="nav-item">
							  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
							</li>
							<li class="nav-item">
							  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
							</li>
							<li class="nav-item">
							  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
							</li>
							-->
						</ul>
					  <div class="tab-content pt-2">

						<div class="tab-pane fade show active profile-overview" id="profile-overview">
							<!--
							<h5 class="card-title">About</h5>
							<p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
							-->
							<br>
							<h5 class="card-title">Klinik Details</h5>
							<br>

							<div class="row">
								<div class="col-lg-3 col-md-4 label ">Nama Klinik</div>
								<div class="col-lg-9 col-md-8" id="instance"></div>
							</div>
														
							<div class="row">
								<div class="col-lg-3 col-md-4 label ">Phone</div>
								<div class="col-lg-9 col-md-8" id="phone"></div>
							</div>
							
							<div class="row">
								<div class="col-lg-3 col-md-4 label ">Email</div>
								<div class="col-lg-9 col-md-8" id="email"></div>
							</div>
							
							<div class="row">
								<div class="col-lg-3 col-md-4 label ">Alamat</div>
								<div class="col-lg-9 col-md-8" id="address"></div>
							</div>
							
							<br>
							<br>
							<div id="qrcode"></div>
							<br>
							<a type="button" class="btn btn-outline-primary" id='qrdl' hidden><i class="fa fa-download me-2"></i>Download</a>
							
						</div>
						

						<div class="tab-pane fade show profile-overview" id="list_pasien">
							<!--
							<h5 class="card-title">About</h5>
							<p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
							-->
                <div class="bg-light rounded h-100 p-4">
							<h5 class="mb-4" id="title_list"></h5>
			
							<div class="table-responsive">
		                        <table id="list_pasien_table" style="width: 100% !important;overflow: scroll;" class="text-center">
		                            <thead>
										<tr class="text-dark">
											<th class="text-center">Nama Pasien</th>
											<th class="text-center">Nomor Telepon</th>
											<th class="text-center">Email</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
		                        </table>
								<div class="paging"></div>
		                    </div>

                </div>
							
							
						</div>


						<!--

						<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
							<form>
								<div class="row mb-3">
									<label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
									<div class="col-md-8 col-lg-9">
										<img src="assets/img/profile-img.jpg" alt="Profile">
										<div class="pt-2">
											<a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
											<a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
									<div class="col-md-8 col-lg-9">
										<input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
									</div>
								</div>
								<div class="row mb-3">
									<label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
									<div class="col-md-8 col-lg-9">
										<textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
									</div>
								</div>
								<div class="row mb-3">
									<label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
									<div class="col-md-8 col-lg-9">
										<input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
									<div class="col-md-8 col-lg-9">
										<input name="job" type="text" class="form-control" id="Job" value="Web Designer">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
									<div class="col-md-8 col-lg-9">
										<input name="country" type="text" class="form-control" id="Country" value="USA">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
									<div class="col-md-8 col-lg-9">
										<input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
									<div class="col-md-8 col-lg-9">
										<input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
									<div class="col-md-8 col-lg-9">
										<input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
									<div class="col-md-8 col-lg-9">
										<input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
									<div class="col-md-8 col-lg-9">
										<input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
									<div class="col-md-8 col-lg-9">
										<input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
									</div>
								</div>
								<div class="row mb-3">
									<label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
									<div class="col-md-8 col-lg-9">
										<input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>

						<div class="tab-pane fade pt-3" id="profile-settings">
							<form>
								<div class="row mb-3">
									<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
									<div class="col-md-8 col-lg-9">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="changesMade" checked>
											<label class="form-check-label" for="changesMade">
												Changes made to your account
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="newProducts" checked>
											<label class="form-check-label" for="newProducts">
												Information on new products and services
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="proOffers">
											<label class="form-check-label" for="proOffers">
												Marketing and promo offers
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
											<label class="form-check-label" for="securityNotify">
												Security alerts
											</label>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>

						<div class="tab-pane fade pt-3" id="profile-change-password">
							<form>
								<div class="row mb-3">
									<label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="password" type="password" class="form-control" id="currentPassword">
									</div>
								</div>
	
								<div class="row mb-3">
									<label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="newpassword" type="password" class="form-control" id="newPassword">
									</div>
								</div>
	
								<div class="row mb-3">
									<label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="renewpassword" type="password" class="form-control" id="renewPassword">
									</div>
								</div>
	
								<div class="text-center">
									<button type="submit" class="btn btn-primary">Change Password</button>
								</div>
							</form>
						</div>
						-->
						
					  </div><!-- End Bordered Tabs -->
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
	<script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>

	
	<script>
	$( document ).ready(function() {
			
		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		const uuid = urlParams.get('uuid')
		//console.log(product);
		//alert(uuid);
		getDetailKlinik(uuid);
		
		function getDetailKlinik(uuidsearch){
			
			var instance = document.getElementById('instance');
			var phone =  document.getElementById('phone');
			var email =  document.getElementById('email');
			var address =  document.getElementById('address');
			var title_list =  document.getElementById('title_list');
			
			$.ajax({
				type: 'GET',
				dataType:"json",
				url: 'webapi/adminwebapi.php?function=get_detail_klinik&uuid=' + uuidsearch,
				success: function (data, status, xhr) {
					instance.innerHTML = "";
					instance.innerHTML += data.instance;
					phone.innerHTML = "";
					phone.innerHTML += data.phone;
					email.innerHTML = "";
					email.innerHTML += data.email;
					address.innerHTML = "";
					address.innerHTML += data.address;
					title_list.innerHTML = "";
					title_list.innerHTML += "List Pasien Bidan ";
					title_list.innerHTML += data.instance;
							
					const makeQR = (uuidsearch, filename) => {
						var qrcode = new QRCode("qrcode", {
							text: uuid,
							width: 320,
							height: 320,
							colorDark: "#000000",
							colorLight: "#ffffff",
							correctLevel: QRCode.CorrectLevel.H
						});
						qrcode.makeCode(uuid);
				
						setTimeout(() => {
							let qelem = document.querySelector('#qrcode img')
							let dlink = document.querySelector('#qrdl')
							let qr = qelem.getAttribute('src');
							dlink.setAttribute('href', qr);
							dlink.setAttribute('download', filename);
							dlink.removeAttribute('hidden');
						}, 500);
					}

					makeQR(uuid, data.instance);
			  }
			});
		
		}
	});
	</script>
</body>

</html>