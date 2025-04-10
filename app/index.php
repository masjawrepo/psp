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

    </style>
</head>
<body>
	
	<!-- navbar -->
	<div class="navbar navbar-home">
		<div class="left">
			<a href="#menu" class="link menu-link"><i class="icon ion-ios-menu"></i></a>
		</div>
		<div class="right">
			<a href="#" class="link"><img src="images/square6.jpg" alt=""></a>
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

	<!-- page wrapper -->
	<div class="page-wrapper">

		<div class="section-title title-large">
			<span class="overline-title">Wellcome</span>
			<h3> <?=$_SESSION['fullname']?></h3>
		</div>

		<!-- intro app -->
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><div class="img"><img src="images/horizontal2.jpg" alt="image-demo"></div></div>
				<div class="swiper-slide"><div class="img"><img src="images/horizontal1.jpg" alt="image-demo"></div></div>
				<div class="swiper-slide"><div class="img"><img src="images/horizontal3.jpg" alt="image-demo"></div></div>
			</div>
		</div>
		<!-- end intro app -->


		<!-- pages wrapper -->
		<div class="pages-wrapper">

			<!-- separator -->
			<div class="separator-large"></div>
			<!-- end separator -->
			
			<!-- tabs -->
			<div class="tab-two">

				<ul class="nav nav-fill nav-separate" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="true">My Contraception</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="apps-tab" data-toggle="tab" href="#apps" role="tab" aria-controls="apps" aria-selected="false">Contraception</a>
					</li>
				</ul>

				<!-- separator -->
				<div class="separator-large"></div>
				<!-- end separator -->

				<div class="tab-content">
					<div class="tab-pane fade show active" id="features" role="tabpanel" aria-labelledby="features-tab">

						<!--
						<div class="list-view list-colored">
							<ul>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Acceptor Form</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Medical Record</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
							</ul>
						</div>
						-->
						<div class="container">
							<div class="row">

								<div class="col-sm-12 p-2">
									<div class="card bg-light card-outline">
										<div class="card-body">
											<h5 class="card-title card-title-large text-red">My Medical Record</h5>
											<h6 class="card-subtitle text-red">History</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small text-red">Click</h5>
											<h6 class="card-location text-red">To See Detail</h6>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>

					<div class="tab-pane" id="apps" role="tabpanel" aria-labelledby="apps-tab">
						
						<div class="container">
							<div class="card bg-lightblue border-0">
								<div class="card-body">
									<h5 class="card-title">Description</h5>
									<p class="card-text">Di halaman ini kamu bisa pelajari lebih lanjut mengenai jenis-jenis kontrasepsi yang bisa kamu gunakan!.</p>
								</div>
							</div>
						</div>

						<!-- separator -->
						<div class="separator-medium"></div>
						<!-- end separator -->

						<div class="container">
							<div class="row">
								<div class="col-sm-4 p-2">
									<div class="card card-highlight">
										<div class="card-body">
											<h5 class="card-title card-title-large">Calendar</h5>
											<h6 class="card-subtitle">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small">Click Here</h5>
											<h6 class="card-location">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card bg-light card-outline">
										<div class="card-body">
											<h5 class="card-title card-title-large text-red">Lactational Amenorrhea</h5>
											<h6 class="card-subtitle text-red">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small text-red">Click Here</h5>
											<h6 class="card-location text-red">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card card-highlight">
										<div class="card-body">
											<h5 class="card-title card-title-large">Kondom</h5>
											<h6 class="card-subtitle">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small">Click Here</h5>
											<h6 class="card-location">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card bg-light card-outline">
										<div class="card-body">
											<h5 class="card-title card-title-large text-red">Pil</h5>
											<h6 class="card-subtitle text-red">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small text-red">Click Here</h5>
											<h6 class="card-location text-red">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card card-highlight">
										<div class="card-body">
											<h5 class="card-title card-title-large">Injection</h5>
											<h6 class="card-subtitle">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small">Click Here</h5>
											<h6 class="card-location">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card bg-light card-outline">
										<div class="card-body">
											<h5 class="card-title card-title-large text-red">Patch</h5>
											<h6 class="card-subtitle text-red">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small text-red">Click Here</h5>
											<h6 class="card-location text-red">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card card-highlight">
										<div class="card-body">
											<h5 class="card-title card-title-large">Ring Hormonal</h5>
											<h6 class="card-subtitle">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small">Click Here</h5>
											<h6 class="card-location">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card bg-light card-outline">
										<div class="card-body">
											<h5 class="card-title card-title-large text-red">Female Condom</h5>
											<h6 class="card-subtitle text-red">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small text-red">Click Here</h5>
											<h6 class="card-location text-red">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card card-highlight">
										<div class="card-body">
											<h5 class="card-title card-title-large">IUD Contraception</h5>
											<h6 class="card-subtitle">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small">Click Here</h5>
											<h6 class="card-location">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card bg-light card-outline">
										<div class="card-body">
											<h5 class="card-title card-title-large text-red">Implan Contraception</h5>
											<h6 class="card-subtitle text-red">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small text-red">Click Here</h5>
											<h6 class="card-location text-red">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card card-highlight">
										<div class="card-body">
											<h5 class="card-title card-title-large">Vacektomy/h5>
											<h6 class="card-subtitle">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small">Click Here</h5>
											<h6 class="card-location">To Learn More</h6>
										</div>
									</div>
								</div>
								<div class="col-sm-4 p-2">
									<div class="card bg-light card-outline">
										<div class="card-body">
											<h5 class="card-title card-title-large text-red">Tubektomy</h5>
											<h6 class="card-subtitle text-red">Contraception</h6>

											<!-- separator -->
											<div class="separator-large"></div>
											<!-- end separator -->

											<h5 class="card-title card-title-small text-red">Click Here</h5>
											<h6 class="card-location text-red">To Learn More</h6>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--
						<div class="list-view list-colored">
							<ul>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Calendar</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Lactational Amenorrhea Method</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Kondom</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Pil</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Injection</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Patch</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Ring Hormonal</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Female Condom</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">IUD Contraception</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Implan Contraception</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Vacektomy</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
								<li class="list-item">
									<div class="list-media">
										<i class="icon ion-ios-arrow-down bg-blue"></i>
									</div>
									<div class="list-label">
										<div class="list-title">Tubektomy</div>
										<div class="list-after"><i class="icon ion-ios-arrow-forward"></i></div>
									</div>
								</li>
							</ul>
						</div>
						-->
					</div>
					
				</div>

			</div>
			<!-- end tabs -->

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
					<a href="index.html" class="toolbar-link toolbar-link-active">
						<i class="icon ion-ios-home"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="notification.html" class="toolbar-link">
						<i class="icon ion-ios-alarm"></i>
					</a>
				</li>
				<li class="toolbar-item">
					<a href="med-rec.html" class="toolbar-link">
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