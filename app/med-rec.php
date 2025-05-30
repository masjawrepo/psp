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

</head>
<body>
	
	<!-- navbar -->
	<div class="navbar navbar-home">
		<div class="left">
			<a href="#menu" class="link menu-link"><i class="icon ion-ios-menu"></i></a>
		</div>
		<div class="title">
			Rekam Medis
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


		<div class="separator-large"></div>
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


		<div class="counter">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="card card-outline shadow-sm content bg-white">
							<div class="container mt-3">
								<div class="about-title">
									<h4>Data Identitas Pasien</h4>
								</div>

								<div class="content p-2">
									<div class="text">
										<span class="text-small">Nama</span>
										<h6><?=$_SESSION['fullname']?></h6>
									</div>
								</div>

								<div class="content p-2">
									<div class="text">
										<span class="text-small">Tanggal Lahir</span>
										<h6>[DOB]</h6>
									</div>
								</div>
								<div class="content p-2">
									<div class="text">
										<span class="text-small">Alamat</span>
										<h6>[Alamat]</h6>
									</div>
								</div>
								<div class="content p-2">
									<div class="text">
										<span class="text-small">Nomor Kontak</span>
										<h6>[Kontak]</h6>
									</div>
								</div>
								<div class="content p-2">
									<div class="text">
										<span class="text-small">Status Pernikahan</span>
										<h6>[status]</h6>
									</div>
								</div>


								<!-- separator -->
								<div class="separator-medium"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="card card-outline shadow-sm content bg-white" style="height:100%">
							<div class="about-title">
								<h4>Status Kontrasepsi</h4>
							</div>
							<h6>[Data Status Kontrasepsi]</h6>
						</div>
					</div>
					<div class="col-6">
						<div class="card card-outline shadow-sm content bg-white" style="height:100%">
							<div class="about-title">
								<h4>Riwayat Pemeriksaan</h4>
							</div>
							<h6>[Data Riwayat Pemeriksaan]</h6>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="card card-outline shadow-sm content bg-white" style="height:100%">
							<div class="about-title">
								<h4>Tindakan Pemeriksaan</h4>
							</div>
							<h6>[Data Tindakan Pemeriksaan]</h6>
						</div>
					</div>
					<div class="col-6">
						<div class="card card-outline shadow-sm content bg-white" style="height:100%">
							<div class="about-title">
								<h4>Catatan Pemeriksaan</h4>
							</div>
							<h6>[Data Catatan Pemeriksaan]</h6>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="card card-outline shadow-sm content bg-white" style="height:100%">
							<div class="about-title">
								<h4>Catatan Kepatuhan</h4>
							</div>
							<h6>[Data Catatan Kepatuhan]</h6>
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
					<a href="notification.php" class="toolbar-link">
						<i class="icon ion-ios-alarm"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="med-rec.php" class="toolbar-link toolbar-link-active">
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