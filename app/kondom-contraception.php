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
	
	<!-- fakeloader -->
	<div class="fakeLoader"></div>
	<!-- end fakeloader -->
	
	<!-- navbar -->
	<div class="navbar">
		<div class="left">
			<a href="" class="link link-back"><i class="icon ion-ios-arrow-back"></i></a>
		</div>
		<div class="title">
			CONTRACEPTION
		</div>
		<div class="right">
			
		</div>
	</div>
	<!-- end navbar -->

	<!-- pages wrapper -->
	<div class="pages-wrapper">

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->
		
			<div class="header-about">
				<div class="container">
					<!--img src="images/about-logo.png" alt="image-demo">-->
					<div class="about-title">
						<h4>Kondom</h4>
						<span class="text-small">Contraception</span>
					</div>
					<!--i
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, odio aliquam fugit.</p>
					<div class="separator-medium"></div>
					<div class="social-media-icon socmed-for-about shadow-sm">
						<ul>
							<li><a href="#"><i class="icon ion-logo-facebook color-facebook"></i></a></li>
							<li><a href="#"><i class="icon ion-logo-instagram color-instagram"></i></a></li>
							<li><a href="#"><i class="icon ion-logo-google color-google"></i></a></li>
							<li><a href="#"><i class="icon ion-logo-dribbble color-dribbble"></i></a></li>
							<li><a href="#"><i class="icon ion-logo-whatsapp color-whatsapp"></i></a></li>
						</ul>
					</div>
					-->
				</div>
			</div>

		<!-- separator -->
		<div class="separator-large"></div>
		<!-- end separator -->
		
		<!-- tabs -->
		<div class="tab-two">
			<ul class="nav nav-fill nav-separate" id="myTab" role="tablist">
				<li class="nav-item m-1">
					<a class="nav-link active" id="keuntungan-tab" data-toggle="tab" href="#keuntungan" role="tab" aria-controls="keuntungan" aria-selected="true">Keuntungan</a>
				</li>
				<li class="nav-item m-1">
					<a class="nav-link" id="keterbatasan-tab" data-toggle="tab" href="#keterbatasan" role="tab" aria-controls="keterbatasan" aria-selected="false">Keterbatasan</a>
				</li>
				<li class="nav-item m-1">
					<a class="nav-link" id="efektivitas-tab" data-toggle="tab" href="#efektivitas" role="tab" aria-controls="efektivitas" aria-selected="false">Efektivitas</a>
				</li>
				<li class="nav-item m-1">
					<a class="nav-link" id="carakerja-tab" data-toggle="tab" href="#carakerja" role="tab" aria-controls="carakerja" aria-selected="false">Cara Kerja</a>
				</li>
			</ul>

			<!-- separator -->
			<div class="separator-large"></div>
			<!-- end separator -->

			<div class="tab-content">
				<div class="tab-pane fade show active" id="keuntungan" role="tabpanel" aria-labelledby="keuntungan-tab">
					<div class="container">
						<div class="card bg-lightblue border-0">
							<div class="card-body">
								<h5 class="card-title">Keuntungan</h5>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, veniam.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="keterbatasan" role="tabpanel" aria-labelledby="keterbatasan-tab">
					<div class="container">
						<div class="card bg-lightblue border-0">
							<div class="card-body">
								<h5 class="card-title">Keterbatasan</h5>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, veniam.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="efektivitas" role="tabpanel" aria-labelledby="efektivitas-tab">
					<div class="container">
						<div class="card bg-lightblue border-0">
							<div class="card-body">
								<h5 class="card-title">Efektivitas</h5>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, veniam.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="carakerja" role="tabpanel" aria-labelledby="carakerja-tab">
					<div class="container">
						<div class="card bg-lightblue border-0">
							<div class="card-body">
								<h5 class="card-title">Cara Kerja</h5>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, veniam.</p>
							</div>
						</div>
					</div>
				</div>



			</div>

		</div>
		<!-- end tabs -->

	</div>
	<!-- end pages wrapper -->

	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/fakeLoader.js"></script>
	<script src="js/swiper.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>