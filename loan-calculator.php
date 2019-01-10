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
    	<link rel="stylesheet" href="css/mystyle.css">
		
        <!-- theme custom -->
		<link rel="stylesheet" href="css/style.css" />
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
        <style type="text/css">
        .borolend-lc {
        	text-align: center;
        	margin-top: -10px;
        }
        #calc-wrap {

        }
        .borolend-lc .blcinner {
        	margin: 0px auto;
        	width: 445px;
        }
        .calculator {
	background: #f0f0f0 !important; /* calculator's background color, default: #f2f3f7 */
	border: 1px solid #969696 !important; /* calculator's border, default: #303e64 thin solid */
	color: #333333; /* calculator's label color, default #333333 */
}

.calculator .btn-primary {
	color: #ffffff; /* button's caption color, default: #ffffff */
	background: #2c394a !important; /* button's background color, default: #303e64; */
	border-color: #283353;
	text-shadow: 2px 3px 3px rgba(0, 0, 0, 0.35) ;
}


.calculator .btn-primary:hover {
	color: #ffffff; /* button's caption color when mouse hovers, default #ffffff; */
	background: #aee238 !important; /* button's background color when mouse hovers, default #286090; */
	border-color: #89c00b !important;
}

.calculator .btn-primary:focus, .calculator .btn-primary:active, .calculator .btn-primary:active:focus {
		color: #ffffff; /* button's caption color when pressed/focused, default #ffffff; */
		background-color: #286090;  /* button's background color when pressed/focused, default #286090; */
		border-color: #122b40;
}


#calc-wrap #zoomer {
	color: #303e64; /* zoom's +/- button and text color, default: #303e64; */
}

#calc-wrap #zoomer #shrink:hover, #calc-wrap #zoomer #original:hover, #calc-wrap #zoomer #grow:hover {
	color: #286090; /* zoom's +/- button and text color, default: #286090; */
}


/* currency/date dialog colors */

#CURRENCYDATE .bg-modal {
	color: #ffffff; /* header caption & "X" color, default: #ffffff; */
	background-color: #303e64; /* header background color, default: #303e64; */
}


/* save button */
#CURRENCYDATE .btn-primary {
	color: #fff;
	background-color: #303e64; /* default: #303e64, same as calculator */
	border-color: #283353; /* default: #283353, same as calculator */
}
/* when mouse over */
#CURRENCYDATE .btn-primary:hover {
	color: #fff;
	background-color: #286090; /* default: #286090, same as calculator */
	border-color: #204d74; /* default: #204d74, same as calculator */
}

/* cancel button */
#CURRENCYDATE .btn-default {
	color: #333333;
	background-color: #ffffff; /* default: #ffffff */
	border-color: #cccccc;
}
/* when mouse over */
#CURRENCYDATE .btn-default:hover {
	color: #333333;
	background-color: #eeeeee; /* default: #eeeeee */
	border-color: #dddddd;
}


        </style>
		
	</head>
	
	
	<body>
	
	<header class="header-4 header-2">	
		<div class="container">
			<div class="col-md-12 top-bar">
				<div class="left">
					<?php
					if(isset($_SESSION['uid'])){
						echo '<div class="txt-1" style="float:left;"><a href=""> <i class="fa fa-user"></i> '.$email.' </a></div>
						<div class="txt-1" style="float:left;"><a href="logout.php"> <i class="fa fa-logout"></i> Logout </a></div>';
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
		
				<!-- Header Include -->
		<?php include_once 'header.php'; ?>
		
		
		<div class="container searchbardiv" id="formsearch">
				<form role="search" method="get" id="searchform"  >
					<div class="input-group">
						<input type="text" id="searchbox" class="form-control" placeholder="Search Here..." name="s" >
						<div class="input-group-btn">
							<button class="btn btn-default"  id="searchsubmit"  type="submit">
								<strong>Search</strong>
							</button>
							
						</div>
					</div>
				</form>
			</div>
		
		<div class="container main-text">
			<div class="col-md-12">
				<h3>BOROLEND LOAN CALCULATOR</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">About Us</span></span>
			</div>
		</div>

	</header>
	
	<div class="about">
		<div class="container borolend-lc">
			<div class="blcinner">
<!-- Free widget and plugin support @ https://financial-calculators.com -->

<div id="calc-wrap" class="fc-widget" style="margin:1px" >

	<!--calculator-->
	<form id="loan" class="calculator">

		<!-- calculator title - do not edit this - use the options to change -->
		<div class="calc-name"><a href="index.php" class="follow_directive" target="_blank" data-toggle="tooltip" data-placement="right" title=""></a></div>

	</form>
	<!--end calculator-->

</div>
<!--end calc-wrap-->
	
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



<script type="text/javascript">var fc_options = {op_size: "large", op_custom_style: false, op_no_follow: false, op_brand_name: "BOROLEND", op_hide_resize: true, op_loan_amt: 10000.0, op_n_months: 12, op_rate: 12, op_pmt: 0.0 }</script>

<script src="https://financial-calculators.com/widgets.v1/loan-calculator/js/widget.LOAN-CALCULATOR.min.js"></script>


	
	</body>
	</html>