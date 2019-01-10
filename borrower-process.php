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
	   	<title>VEDANT</title>
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
				<h3>Process for Borrowers</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>    <span class="r-page">The Process</span></span>
			</div>
		</div>

	</header>
	
	<div class="about">
		<div class="container">
			<div class="col-md-11 ab-main">
				<div class="txt-1">Registration and Loan Listing</div>
				
				
				<p > The registration process is quick and easy. A Borrower simply clicks on the Sign up Now icon, enters some basic information, pays the registration fees and uploads the documents required.
				</p>
				<p > Based on these documents, every borrower will be identity-verified, credit-checked and risk-assessed and our automated system will provide an indication about the Borrower’s capability to efficiently repay the loan. The rate of interest ranges from 12% to 28% and the loan tenure from 6 months to 36 months. With the aim to include those with limited credit history, Borolend has launched the Unrated Borrowers category. This segment of Unrated Borrowers is listed at higher interest rates.
				</p>

				<br>
				<div class="txt-1">Loan Funding</div>
				<p > Once the loan is listed, multiple lenders can view the listing and send proposals to fund it at the suggested interest rate. To secure the interests of the Lender we have proposed a system where a lender can fund up to 20% of a loan requirement. Hence, each loan will be funded by at least 5 lenders. All proposals are accepted on first come first serve basis.
				</p>
				<br>
				<div class="txt-1">Loan Disbursal</div>
				<p > 
				Loan disbursal begins only after:
				</p>
				<div class="lender_content"> 
				<div class="reqs_list">
				<ul style="list-style-type:circle">
					<li>
						Minimum 75% funding of the loan amount has been achieved.	

					</li>
					<li>
						Official loan agreement between Lender and Borrower has been signed.
					</li>
					<li>
						Borrower has provided the required number of Post-Dated Cheques.
					</li>
					<li>
						Borolend will inform the lender through email to proceed with the disbursal after ensuring all checks are complete.
					</li>
					<li>
						Applicable one-time Administrative Fees is deducted by Borolend from the loan amount before disbursal of amount to the borrower.
					</li>
					
				</ul>
				</div>


				<br><br>
				<div class="txt-1">The Agreement</div>
				<p > Borolend facilitates the online signing of a legally-binding agreement between the Borrower and the Lenders. The agreement is available online on the borrower and lender’s Borolend account. They login to their respective accounts, read and understand the terms and conditions mentioned, “digitally sign” by clicking on the acceptance box under the agreement and the process is complete. The agreement is then sent to both the borrowers and lenders through email for their records. The process, though legally binding just like a physical agreement, is faster and more efficient ensuring faster flow of loan amount from lender to borrower.
				</p>

				<br>
				<div class="txt-1">Cheques</div>
				<p > Along with the agreement, borrower must provide post-dated cheques towards security. NACH mandate is used to electronically transfer funds between lenders and borrowers.
				</p>
				<p > Once the agreements are signed and PDCs received, the loan amount is transferred through electronic transfer from the Lender’s escrow account to the Borrower’s bank account. The one-time administrative fee is debited by Borolend from the loan amount before transferring.
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