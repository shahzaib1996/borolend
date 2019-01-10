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
		<link rel="stylesheet" type="text/css" href="css/who_can_become_a_lender_style.css"s>
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
				<div class="txt-1">Who can become a lender ?</div>
				<!-- <div class="txt-2">How <span class="color-2">Faircent</span> Works</div> -->
				<!-- <div class="txt-3">“VEDANT is by people and for people”</div> -->
				<p style="margin-left:6px;">A Lender must :
				</p>
				<br>
				<div class="lender_content">   <!-- content of who can become a lender table+list -->
				<div class="reqs_list">
				<ul style="list-style-type:circle">
					<li>
						Be a resident of Pakistan.
					</li>
					<li>
						Atleast 18 years of age.
					</li>
					<li>
						Have a valid bank account in Pakistan.
					</li>
					<li>
						Have a valid Cnic or Passport.
					</li>
					<li>
						Agree to abide by Borolend Policies.
					</li>
					<li>
						Adhere to Lender code of conduct.
					</li>
				</ul>
				</div>
				<br>
				<p>
					We at Borolend are committed to Client confidentiality and the security of all information provided to us. We use this confidential information strictly for official purposes. We encourage all to please read  <a href="#" style="color:blue;">Borolend Policy</a> and <a href="#" style="color:blue;">Terms and Conditions </a>carefully. </p>
					<p>
	Simply click on the <a href="#" style="color:blue;">Borolend Policy</a> and <a href="#" style="color:blue;"> SIGN UP</a> icon to your right, and register through the simple step by step process as instructed.

				</p>
				<br>
				<div class="table_div">
				<table class="table_returns table-bordered">
					<!-- <thead>
						<tr class="table_head" >
							<th>
								Photographs (2 Copies)</th>
							<th>
								
							</th>
							
						</tr>

					</thead> -->
					<tbody>
						<tr>
							<td>1. Photographs (2 Copies)</td>
							<td> </td>
							
						</tr>
						<tr>
							<td>2. Identity proof(any one of the following)</td>
							<td>Cnic<br>Passport</td>
							
						</tr>
						<tr>
							<td>3. Date of Birth proof(any one of the following)</td>
							<td>Cnic<br>Passport</td>
							
						</tr>
						<tr>
							<td>4. Signature proof(any one of the following)</td>
							<td style="padding-left:5px;">Cnic<br> Signature verification from your bank <br>Passport</td>
							</tr>
							<tr>
							<td>5. Address proof(any one of the following)</td>
							<td>Cnic<br>Bank Statement <br>Passport</td>
							</tr>
							
							<tr>
							<td>6. Contact proof(any one of the following)</td>
							<td>Post paid Mobile Bill (last month)<br>	Post paid Landline Bill (last month)</td>
						</tr>
						<tr>
							<td>7. Bank Statements</td>
							<td>Last 3 months</td>
						</tr>

					</tbody>
				</table>
				</div>
				</div>
					
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