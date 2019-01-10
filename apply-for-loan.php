<?php
session_start();
include_once 'connect.php';
if(!isset($_SESSION['uid'])) {
	// header('location: index.php');
	?>
	<script type="text/javascript">
	window.location.href = 'login.php';
	</script>
	<?php
}
if(isset($_SESSION['uid'])){
	$uid = $_SESSION['uid'];
	$type = $_SESSION['type'];
	$email = "Error";
	if($type == 'li') {
		// header('location: index.php');
		?>
		<script type="text/javascript">
		window.location.href = 'index.php';
		</script>
		<?php
		// $setuser = $con->query("SELECT * FROM lender_individual WHERE id='$uid'");
		// $row = $setuser->fetch_object();
		// $email = $row->email;

	}elseif($type == 'lo'){
		// header('location: index.php');
		?>
		<script type="text/javascript">
		window.location.href = 'index.php';
		</script>
		<?php
		// $setuser = $con->query("SELECT * FROM lender_org WHERE id='$uid'");
		// $row = $setuser->fetch_object();
		// $email = $row->email;

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



if(isset($_SESSION['uid'])){ 
	$uid = $_SESSION['uid'];
	$type = $_SESSION['type'];
	if($type == 'bi'){
		$cl = $con->query("SELECT * FROM borrower_individual WHERE id='$uid'");
		$r = $cl->fetch_object();
		$chk = $r->loan_check;
		if(true) {} //$chk == '0'
		else { 
			// header('location: borrower-account.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-account.php';
			</script>
			<?php
		}
		
	}elseif($type == 'bb'){
		$setuser = $con->query("SELECT * FROM borrower_business WHERE id='$uid'");
		$row = $setuser->fetch_object();
		$chk = $row->loan_check;
		if(true) {} //$chk == '0'
		else { 
			// header('location: borrower-account.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-account.php';
			</script>
			<?php
		}
	}
}


if(isset($_POST['submit'])) {
	$atype = $_SESSION['type'];
	$auid = $_SESSION['uid'];
	$atb = $_POST['atb'];
	$rate = $_POST['rate'];
	$time = $_POST['time'];
	$payment = $_POST['payment'];
	$purpose = $_POST['purpose'];
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO `apply_for_loan` (`uid`,`type`,`borrow_amount`,`rate`,`time`,`payment`,`purpose`,`sdate`,`pending`) VALUES ('".$auid."','".$atype."','".$atb."','".$rate."','".$time."','".$payment."','".$purpose."','".$date."','".$atb."')";
	if(mysqli_query($con,$sql)) {
		print "<script>alert('Your Loan request has been submitted, you will be notified when your request has been accepted.')</script>";
		if($atype == 'bi') {
			$setchk = "UPDATE borrower_individual SET loan_check = '1'";
			mysqli_query($con,$setchk);
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-account.php';
			</script>
			<?php
		}elseif($atype == 'bi') {
			$setchk = "UPDATE borrower_business SET loan_check = '1'";
			mysqli_query($con,$setchk);
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-account.php';
			</script>
			<?php
		}
	}
	else {
		print "<script>alert('Unexpected Error Try submitting again!')</script>";

	}

}

?>

<!DOCTYPE html>
<html>
	<head>
	   	<title>BOROLEND | Loan Application</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		
		<!-- My Style Sheet -->
    	<link rel="stylesheet" href="css/mystyle.css">

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- bootstrap magic -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		
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
						echo '<div class="txt-1" style="float:left;"><a href="borrower-account.php"> <i class="fa fa-user"></i> '.$email.' </a></div>
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
		
		<?php include_once 'header.php' ?>

		<div class="container main-text">
			<div class="col-md-12">
				<h3>LOAN REQUEST</h3> <span class="location pull-right">You Are Here :  <a href="index.php">Home</a>  >  <span class="r-page">Borrower Posting Form</span></span>
			</div>
		</div>

	</header>
	
	
	<div class="al-r">
		
		<div class="container al-r-wrap">
		<img src="images/pencil-2.png" class="p1" alt="" />
		<img src="images/pencil-3.png" class="p2" alt="" />
			<div class="col-md-6 login">
				<h3>Loan Form</h3>
				<form action="" method="post">
				<label>Amount to Borrow</label>
				<input type="text" class="form-control" placeholder="Enter Amount to Borrow..." name="atb" required>
				<label>Interest Rate</label>
				<input type="text" class="form-control" placeholder="Enter Interest Rate..." name="rate" required>
				<label>Time (In Months)</label>
				<input type="text" class="form-control" placeholder="Enter Time..." name="time" required>
				<label>Payments</label>
				<select id="payment" name="payment" class="orselect" required >
      				<option value="">- Select -</option>
      				<option value="Monthly">Monthly</option>
      				<option value="Quarterly">Quarterly</option>
      				<option value="Semi Annually">Semi Annually</option>
    			</select>
				<label>Prefered Purpose</label>
				<input type="text" class="form-control" placeholder="Enter Preferred Purpose..."name="purpose" required>
				<button type="submit" class="rlibtn" style="" name="submit">POST</button>
				</form>
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