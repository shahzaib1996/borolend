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
				<h3>Return & Fees </h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>    <span class="r-page">Return & fees </span></span>
			</div>
		</div>

	</header>
	
	<div class="about">
		<div class="container">
			<div class="col-md-11 ab-main">
				<div class="txt-1">Returns</div>
				<!-- <div class="txt-2">How <span class="color-2">Faircent</span> Works</div> -->
				<!-- <div class="txt-3">“VEDANT is by people and for people”</div> -->
				<p> Unlike in the case of conventional financial institutions, it is not Borolend but the Lender who decides how much return they want to earn. Interest rate agreements are entirely between lenders and borrowers across the platform in which Borolend has no intervention. We recommend that investment should be spread, such that returns are a weighted average of the individual loan parts. This is explained through an illustration below.
				For example, on a loan of Rs. 150,000 spread across 3 borrowers, for a period of 1 year at various interest rates; the returns can be as follows:
				</p>
				<br>
				<div class="table_div"> 
				<table class="table_returns table-bordered">
					<thead>
						<tr class="table_head" >
							<th>
								Borrower
							</th>
							<th>
								Amount Lent
							</th>
							<th>
								Rate
							</th>
							<th>
								Interest Earning
							</th>
						</tr>

					</thead>
					<tbody>
						<tr>
							<td>Mr. X</td>
							<td>50,000</td>
							<td>12% p.a.</td>
							<td>3,309</td>
						</tr>
						<tr>
							<td>Mr. Y</td>
							<td>50,000</td>
							<td>16% p.a.</td>
							<td>4,439</td>
						</tr>
						<tr>
							<td>Mr. Z</td>
							<td>50,000</td>
							<td>20% p.a.</td>
							<td>5,581</td>
						</tr>
						<tr>
							<td>TOTAL</td>
							<td>150,000</td>
							<td>16% p.a.</td>
							<td>13,329</td>
						</tr>
					</tbody>
				</table>
				</div>
					<p> So, in the example above the lender is earning on an average 16% interest on total investment. Also, Interest earnings can be more or less depending on loan amount split across interest rates. For egs the lender may decide to lend only Rs. 20,000/- @ 12% and increase the amount to Rs. 60,000/- @ 16% and to Rs. 70,000/- @ 20%. This will increase the lender’s average return. At Borolend, what amount to lend at what interest rate is controlled by the lender depending on his/her judgment and negotiating skills.
				</p>
				<p> Sounds interesting?<a href="#" style="color:blue;"> SIGN UP</a> now 
				</p>

				<br>
			<div class="txt-1">Non-Payment Of EMI</div>

			<p> In case the EMI is not paid on the due date by Borrower(s), additional penal interest applicable as per Borolend Policy will be applied to the due amount for the duration of delay which Borrowers will be liable to pay directly to their Lender(s). A penal interest of Rs. 50/- will be payable by the Borrower for each instance of delayed repayment to their Lender(s).</p>
				<p>Though we do our best to manage the risk at every step, defaults may happen. In such a scenario, Borolend will facilitate the collection through our in-house collection mechanism and also send a legal notice on behalf of the lender to the borrower. Expenses incurred for sending legal notices, by recovery agency and towards other legal proceedings are borne by the lender. </p>
			<br>
			<div class="txt-1">Registration Fees</div>

				<p> There is no registration fees. It is free for both lenders and borrowers.</p>
			<br>
			<div class="txt-1">Transaction Fees</div>

				<p> A non-refundable 1% transaction fee from retail investors and 2% from institutional investors is charged on the loan amount disbursed. This is deducted from the first EMI.</p>

				<br>
		 <div class="txt-1">Other Fees</div>

				<p> Lender(s) are obliged to maintain details of their loan including statement of accounts. In case, they need Borolend’s assistance in this regard then a non-refundable fee of Rs. 500/- per statement of accounts will be charged.</p>
				
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