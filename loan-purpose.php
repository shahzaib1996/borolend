<?php

session_start();
include_once 'connect.php';
if(isset($_SESSION['uid'])){
	$uid = $_SESSION['uid'];
	$type = $_SESSION['type'];
	$email = "Error";
	if($type == 'li') {
		$setuser = $con->query("SELECT * FROM lender_individual WHERE id='$uid'");
		$row = $setuser->fetch_object();
		$email = $row->email;

	}elseif($type == 'lo'){
		$setuser = $con->query("SELECT * FROM lender_org WHERE id='$uid'");
		$row = $setuser->fetch_object();
		$email = $row->email;

	}elseif($type == 'bi'){
		$setuser = $con->query("SELECT * FROM borrower_individual WHERE id='$uid'");
		$row = $setuser->fetch_object();
		$email = $row->email;
		
	}elseif($type == 'bb'){
		$setuser = $con->query("SELECT * FROM borrower_business WHERE id='$uid'");
		$row = $setuser->fetch_object();
		$email = $row->email;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
	   	<title>BORLEND | Loan Purpose</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- bootstrap magic -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		
        <!-- theme custom -->
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/mystyle.css" />
		<!-- edited by huzaifa -->
		<link rel="stylesheet" href="css/huzStyle.css"/>
		<link rel="stylesheet" href="css/returns_style.css">
		<link rel="stylesheet" type="text/css" href="css/who_can_become_a_lender_style.css">
		<!-- mobile menu -->
		<link rel="stylesheet" href="css/slicknav.css" />
		
		<!-- Owl stylesheet -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		 
		<!-- Default Theme -->
		<link rel="stylesheet" href="css/owl.theme.css">
		
		<!-- Magnific Popup core CSS file -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- bxSlider CSS file -->
		<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css"  />
		
		<!-- RS5.0 Main Stylesheet -->
		<link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
		 
		<!-- RS5.0 Layers and Navigation Styles -->
		<link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
		<link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
		

		<!-- fonts -->
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		
		<!-- Font Awesome -->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css" />

		<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->

		
	</head>
	
	
	<body>
	
	<header class="header-4 header-2">	
		<div class="container">
			<div class="col-md-12 top-bar">
				<div class="left">
					<?php
					if(isset($_SESSION['uid'])){
						if($_SESSION['type']=='li'){
							echo '<div class="txt-1" style="float:left;"><a href="lender-account.php"> <i class="fa fa-user"></i> '.$email.' </a></div>
						<div class="txt-1" style="float:left;"><a href="logout.php"> <i class="fa fa-logout"></i> Logout </a></div>';
						}elseif($_SESSION['type']=='lo'){
							echo '<div class="txt-1" style="float:left;"><a href="lender-account.php"> <i class="fa fa-user"></i> '.$email.' </a></div>
						<div class="txt-1" style="float:left;"><a href="logout.php"> <i class="fa fa-logout"></i> Logout </a></div>';
						}elseif($_SESSION['type']=='bi'){
							echo '<div class="txt-1" style="float:left;"><a href="borrower-account.php"> <i class="fa fa-user"></i> '.$email.' </a></div>
						<div class="txt-1" style="float:left;"><a href="logout.php"> <i class="fa fa-logout"></i> Logout </a></div>';
						}elseif($_SESSION['type']=='bb'){
							echo '<div class="txt-1" style="float:left;"><a href="borrower-account.php"> <i class="fa fa-user"></i> '.$email.' </a></div>
						<div class="txt-1" style="float:left;"><a href="logout.php"> <i class="fa fa-logout"></i> Logout </a></div>';
						}
						// echo '<div class="txt-1" style="float:left;"><a href=""> <i class="fa fa-user"></i> '.$email.' </a></div>
						// <div class="txt-1" style="float:left;"><a href="logout.php"> <i class="fa fa-logout"></i> Logout </a></div>';
					}
					else {
						echo '<div class="txt-1" style="float:left;"><a href="login.php"> <i class="fa fa-user"></i> LOGIN </a></div>
					<div class="txt-3" style="float:left;" ><a href="" class="onlyr"> <i class="fa fa-user-plus"></i> REGISTER </a>
						<div class="dropdiv">
							<div class="ddi1"><span style="text-shadow: 2px 3px 3px rgba(0, 0, 0, 0.35);">As Lender</span>
								<div class="subdrop1">
									<a href="register-lender-individual.php">Individual</a>
									<a href="register-lender-org.php">Organization</a>
								</div>
							</div>
							<div class="ddi2"><span style="text-shadow: 2px 3px 3px rgba(0, 0, 0, 0.35);">As Borrower</span>
								<div class="subdrop2">
									<a href="register-borrower-individual.php">Personal Loan</a>
									<a href="register-borrower-org.php">Business Loan</a>
								</div>
							</div>
						</div>
					</div>';
					}
					?>
				</div>
				
				<div class="right">
					<ul class="top-socials">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-skype"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<?php include_once 'header.php'; ?>
		
		<div class="container main-text">
			<div class="col-md-12">
				<h3>Purpose Of Loan</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>    <span class="r-page">Purpose Of Loan</span></span>
			</div>
		</div>

	</header>
	
	<div class="about">
		<div class="container">
			<div class="col-md-11 ab-main">
				<div class="txt-1">Purpose Of Loan</div>
				
				
				<p > Borolend does not consider any cause to be unworthy for a loan. There are no set restrictions on the reason for seeking a loan, other than the obvious condition that the money is not to be used for any illegal or prohibited purpose under Indian laws. Loan requests are for many purposes like:
				</p>
				<br>
				<div class="lender_content"> 
				<div class="reqs_list">
				<ul style="list-style-type:circle">
					<li>
						For undertaking a professional course.
					</li>
					<li>
						To provide for child’s education.
					</li>
					<li>
						For weddings and family functions.
					</li>
					<li>
						For financing a vacation.
					</li>
					<li>
						To refinance Credit Card dues.
					</li>
					<li>
						For down payments for cars, bikes etc.
					</li>
					<li>
						For home purchase, renovations and refurbishing.
					</li>
					<li>
						To consolidate ongoing loans.
					</li>
					<li>
						To cover for the period while moving from one job to another (subject to valid offer letter available from the new company).
					</li>
					
				</ul>
				</div>
<br>
				<p > The list is not exhaustive as life can put forth various kinds of challenges that could require sudden fund requirements and hence the need to borrow.
				</p>


				
				</div>
					
			</div>

			

			<div class="col-md-7 right">

				
			</div>
		</div>
	</div>
	
	
	
	<?php include_once 'footer.php'; ?>
	
	<div class="scroll-top-wrapper ">
	  <span class="scroll-top-inner">
		<i class="fa fa-lg fa-angle-double-up"></i>
	  </span>
	</div>
	
	
	
	
	<!-- Jquery Libs -->
	<!-- Latest Version Of Jquery -->
	<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<!-- Bootstrap Jquery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- mobile menu -->
	<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup core JS file -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<!-- bxSlider Javascript file -->
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<!-- Scroll top -->
	<script type="text/javascript" src="js/to-top.js"></script>
	<!-- Theme Custom -->
	<script type="text/javascript" src="js/custom.js"></script>

	
	</body>
	</html>