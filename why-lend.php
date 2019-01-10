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
	   	<title>BORLEND | Why Lend</title>
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
				<h3>Lenders</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">Lenders</span></span>
			</div>
		</div>

	</header>
	
	<div class="about">
		<div class="container">
			<div class="col-md-12 ab-main">
				<div class="txt-1">Why Lend ?</div>
				<!-- <div class="txt-2">How <span class="color-2">Faircent</span> Works</div> -->
				<!-- <div class="txt-3">“VEDANT is by people and for people”</div> -->
				<p> In today’s environment where investments seldom generate expected returns and most of our saving go to institutions like banks and stock exchange. Where returns are either low or very volatile. Borolend brings you a unique opportunity to generate higher fixed income by lending directly to pre-verified borrowers and eliminating middle man..</p>
				<p> Borolend model provides higher return as compare to traditional model because it removes the intermediaries and connects the lenders directly to the end users – the borrowers. Traditionally, banks and other financial institutions collect money (through savings accounts or deposits like fixed or recurring) at low interest rates (say 6-10%) and lend it to borrowers at much higher rates (18-36%). This margin goes into paying for the excessive costs they incur like thousands of employees to pay salaries to and hundreds of swanky branches to maintain and so on. Borolend brings borrowers and lenders directly in touch with each other, removes intermediary cost and enables borrowers to access faster and cheaper credit and enable lenders to make greater returns on funds lying idle in bank deposits. </p>
				<p>  It is a simple win-win situation so go ahead  <a href="#" style="color:blue;">SIGN UP </a> and start lending</p>
			
				<p>If you have any queries, <a href="#" style= "color:blue" >CONTACT US </a> and we would be happy to speak to you.</p>
			</div>
			
			<!-- <div class="col-md-7 right">

				
			</div> -->
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