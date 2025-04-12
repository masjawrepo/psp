<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../akses-pengguna.php');
	exit;
}
	global $site; 
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="../img/favicon.png">
	<title>PillSync+</title>

	<link href="../css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/fakeLoader.css">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/style.css">

	<style>
        .text-red
        {   
			color: #fe2775 !important;
        }
        .icon-ok{
		    font-size: 95px;
		    color: #1ad66c;
		    line-height: 1;
		    margin-bottom: 10px;
		    display: inline-block;
        }
        .icon-watch{
		    font-size: 95px;
		    color: orange;
		    line-height: 1;
		    margin-bottom: 10px;
		    display: inline-block;
        }
        .icon-close{
		    font-size: 95px;
		    color: #dc3545;
		    line-height: 1;
		    margin-bottom: 10px;
		    display: inline-block;
        }

    </style>

</head>
<body>
	
	<!-- navbar -->
	<div class="navbar navbar-home">
		<div class="left">
			<a href="#menu" class="link menu-link"><i class="icon ion-ios-menu"></i></a>
		</div>
		<div class="right">
			<a href="index.php" class="link"><img src="../img/favicon.png" alt=""></a>
		</div>
	</div>
	<!-- end navbar -->

	<!-- sidebar -->
	<div class="side-overlay"></div>
	<div id="menu" class="panel sidebar" role="navigation">
		
		<!--
		<div class="separator-large"></div>
		

		<div class="list-view list-separate-two list-colored">
			<ul>
				<li>
					<a href="index.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-home bg-blue"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Home</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="features.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-star bg-red"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Features</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="pages.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-browsers bg-green"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Pages</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="apps.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-apps bg-yellow"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Apps</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="sign-in.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-log-in bg-purple"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Sign In</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="settings.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-settings bg-orange"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Settings</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
			</ul>
		</div>

-->
		<div class="separator-large"></div>

		
		<div class="list-view list-separate-two list-colored">
			<ul>
		<!--
				<li>
					<a href="about-us.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-information-circle bg-lime"></i>
						</div>
						<div class="list-label">
							<div class="list-title">About</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
				<li>
					<a href="privacy.html" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-lock bg-blue"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Privacy</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
        -->
				<li>
					<a href="include/logout.php" class="list-item">
						<div class="list-media">
							<i class="icon ion-ios-power bg-red"></i>
						</div>
						<div class="list-label">
							<div class="list-title">Logout</div>
							<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
						</div>
					</a>
				</li>
			</ul>
		</div>

		
		<div class="separator-large"></div>
		
		<hr>
		<div class="about-title" style="padding: 0 15px;">
			<h4 class="w-bold"><a style="color:#fe2775">PillSync</a>+</h4>
			<br>
			<a class="text-medium">Aplikasi untuk kebutuhan informasi kotrasepsi kamu.</a>
			<p class="text-small">v1.0.0</p>
		</div>

	</div>
	<!-- end sidebar -->

	<!-- pages wrapper -->
	<div class="pages-wrapper bg-lightblue">

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->


		<div class="cards mt-4">
			<div class="container">


				<div class="swiper-container">
					<div class="swiper-wrapper">


						<div class="swiper-slide">
							<div class="card card-outline text-center shadow-sm bg-white m-3">
								<div class="card-body">
									<div class="header-about">
										<div class="container mt-3">
											<i class="icon ion-ios-notifications icon-ok"></i>
											<!--
											<img src="images/about-logo.png" alt="image-demo">
											-->
											<div class="about-title mb-0">
												<h4>Reminder</h4>
												<span class="text-small">Hai <?=$_SESSION['fullname']?>, sudah minum obat hari ini?</span>
											</div>
											<div class="row">
												<div class="col-sm-12 p-2">
													<p>Jangan lupa minum obatnya hari ini, ya! Kami selalu di sini untuk mendukung kontrasepsi mu :) </p>
												</div>
												<div class="col-sm-12 p-2">
													<p style="font-weight: bold;">Bidan Afiliasi Kamu :</p>
													<a href="#" class="list-item" data-toggle="modal" data-target="#succesModal">
														<div class="list-label">
															<div class="list-title text-red"><?=$_SESSION['bidan_affiliate']?></div>
														</div>
													</a>
												</div>
											</div>
											<!-- separator -->
											<div class="separator-medium"></div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="swiper-slide">
							<div class="card card-outline text-center shadow-sm bg-white m-3">
								<div class="card-body">
									<div class="header-about">
										<div class="container mt-3">
											<i class="icon ion-ios-checkmark-circle icon-ok"></i>
											<!--
											<img src="images/about-logo.png" alt="image-demo">
											-->
											<div class="about-title">
												<h4>Kamu Sudah On-Time</h4>
												<span class="text-small">Terima Kasih :)</span>
											</div>
											<div class="row">
												<div class="col-sm-6 p-2">
													<p style="font-weight: bold;">Jadwal Berikutnya :</p>
													<p>[tanggal-jadwal]</p>
												</div>
												<div class="col-sm-6 p-2">
													<p style="font-weight: bold;">Bidan Afiliasi Kamu :</p>
													<a href="#" class="list-item" data-toggle="modal" data-target="#succesModal">
														<div class="list-label">
															<div class="list-title text-red"><?=$_SESSION['bidan_affiliate']?></div>
														</div>
													</a>
												</div>
											</div>
											<!-- separator -->
											<div class="separator-medium"></div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="swiper-slide">
							<div class="card card-outline text-center shadow-sm bg-white m-3">
								<div class="card-body">
									<div class="header-about">
										<div class="container mt-3">
											<i class="icon ion-ios-alarm icon-watch"></i>
											<!--
											<img src="images/about-logo.png" alt="image-demo">
											-->
											<div class="about-title">
												<h4>Jadwal Kamu Sebentar Lagi</h4>
												<span class="text-small">jangan sampai terlewat jadwal kamu ya :)</span>
											</div>
											<div class="row">
												<div class="col-sm-6 p-2">
													<p style="font-weight: bold;">Jadwal Berikutnya :</p>
													<p>[tanggal-jadwal]</p>
												</div>
												<div class="col-sm-6 p-2">
													<p style="font-weight: bold;">Bidan Afiliasi Kamu :</p>
													<a href="#" class="list-item" data-toggle="modal" data-target="#succesModal">
														<div class="list-label">
															<div class="list-title text-red"><?=$_SESSION['bidan_affiliate']?></div>
														</div>
													</a>
												</div>
											</div>
											<!-- separator -->
											<div class="separator-medium"></div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="swiper-slide">
							<div class="card card-outline text-center shadow-sm bg-white m-3">
								<div class="card-body">
									<div class="header-about">
										<div class="container mt-3">
											<i class="icon ion-ios-close-circle icon-close"></i>
											<!--
											<img src="images/about-logo.png" alt="image-demo">
											-->
											<div class="about-title">
												<h4>Jadwal Kamu Sudah Terlewat</h4>
												<span class="text-small">Ayo segera lakukan pemeriksaan !</span>
											</div>
											<div class="row">
												<div class="col-sm-6 p-2">
													<p style="font-weight: bold;">Jadwal Seharusnya :</p>
													<p>[tanggal-jadwal]</p>
												</div>
												<div class="col-sm-6 p-2">
													<p style="font-weight: bold;">Bidan Afiliasi Kamu :</p>
													<a href="#" class="list-item" data-toggle="modal" data-target="#succesModal">
														<div class="list-label">
															<div class="list-title text-red"><?=$_SESSION['bidan_affiliate']?></div>
														</div>
													</a>
												</div>
											</div>
											<!-- separator -->
											<div class="separator-medium"></div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>

				<div id="succesModal" class="modal fade succes-modal">
					<div class="modal-dialog modal-bottom">
						<div class="modal-content">
							<div class="modal-body">
								<div class="modal-icon-title">
									<h5 style="font-weight: bold;">Informasi <?=$_SESSION['bidan_affiliate']?></h5>
									<div class="separator-medium"></div>
									<div class="row">
										<div class="col-sm-12 p-1">
											<p style="font-weight: bold;">Nomor Whatsapp :</p>
											<a class="button button-outline mt-0" style="border: 0px !important;line-height: 0px;" href="https://wa.me/<?=$_SESSION['bidan_wa']?>?"><i class="icon ion-logo-whatsapp" style="font-size: 1em;"></i> <?=$_SESSION['bidan_wa']?></a>
										</div>
										<div class="col-sm-12 p-1">
											<p style="font-weight: bold;">Alamat :</p>
											<p><?=$_SESSION['bidan_address']?></p>
										</div>
									</div>
								</div>
								<div class="button-default">
									<button class="button" data-dismiss="modal" aria-label="Close">Ok</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>


				
		

	</div>
	<!-- end pages wrapper -->
			<!-- separator -->
			<div class="separator-large"></div>
			<!-- end separator -->

		</div>
		<!-- end page wrapper -->

	<!-- toolbar bottom -->
	<div class="toolbar">
		<div class="container">
			<ul class="toolbar-bottom toolbar-wrap">
				<li class="toolbar-item">
					<a href="index.php" class="toolbar-link">
						<i class="icon ion-ios-home"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="notification.php" class="toolbar-link toolbar-link-active">
						<i class="icon ion-ios-alarm"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="med-rec.php" class="toolbar-link">
						<i class="icon ion-ios-folder-open"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- end toolbar bottom -->
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/fakeLoader.js"></script>
	<script src="js/swiper.min.js"></script>
	<script src="js/jquery.big-slide.js"></script>
	<script src="js/main.js"></script>

</body>
</html>