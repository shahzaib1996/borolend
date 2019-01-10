<?php
session_start();
include_once 'connect.php';
if(isset($_SESSION['uid'])){
	// header('location: index.php');
	?>
 	<script type="text/javascript">
 	window.location.href = 'index.php';
 	</script>
 	<?php
}
$error ='';
if(isset($_POST['submit'])) {
  	$fname = $_POST['fname'];
  	$lname = $_POST['lname'];
  	$email = $_POST['email'];
  	$mobile = $_POST['mobile'];
  	$pass = $_POST['pass'];

	$e_check1 = $con->query("SELECT * FROM lender_individual WHERE email='$email'");
	$e_check2 = $con->query("SELECT * FROM lender_org WHERE email='$email'");
	$e_check3 = $con->query("SELECT * FROM borrower_individual WHERE email='$email'");
	$e_check4 = $con->query("SELECT * FROM borrower_business WHERE email='$email'");

	if($e_check1->num_rows > 0){
$error = '<div style="position:absolute;font-size:12px;padding:3px 10px;" class="alert alert-danger" role="alert"> <b>ERROR</b> Email address already in use...</div>';
		
	}
	elseif($e_check2->num_rows > 0) {
$error = '<div style="position:absolute;font-size:12px;padding:3px 10px;" class="alert alert-danger" role="alert"> <b>ERROR</b> Email address already in use...</div>';
		
	}
	elseif($e_check3->num_rows > 0) {
$error = '<div style="position:absolute;font-size:12px;padding:3px 10px;" class="alert alert-danger" role="alert"> <b>ERROR</b> Email address already in use...</div>';
		
	}
	elseif($e_check4->num_rows > 0) {
$error = '<div style="position:absolute;font-size:12px;padding:3px 10px;" class="alert alert-danger" role="alert"> <b>ERROR</b> Email address already in use...</div>';
		
	}
	else {
  		$sql = "INSERT INTO `borrower_individual` (`fname`,`lname`,`email`,`password`,`mobile`) VALUES ('".$fname."','".$lname."','".$email."','".$pass."','".$mobile."')";
		if(mysqli_query($con,$sql)) {
			// header ('location: redirectlogin.html');
			?>
 	<script type="text/javascript">
 	window.location.href = 'redirectlogin.html';
 	</script>
 	<?php
		}
		else {
			// header ('location: error.html');	
			?>
 	<script type="text/javascript">
 	window.location.href = 'error.html';
 	</script>
 	<?php
		}
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
	   	<title>BOROLEND | Individual Borrower Registeration</title>
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
					<div class="txt-1" style="float:left;"><a href="login.php"> <i class="fa fa-user"></i> LOGIN </a></div>
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
					</div>
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
		
		<!-- Header Include File-->
		<?php include_once 'header.php'; ?>
		
		
		<div class="container main-text">
			<div class="col-md-12">
				<h3>Register as a Borrower</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">Register as a Borrower</span></span>
			</div>
		</div>

	</header>
	
	
	<div class="l-r">
		
		<div class="container l-r-wrap">
		<img src="images/pencil-2.png" class="p1" alt="" />
		<img src="images/pencil-3.png" class="p2" alt="" />
			<div class="col-md-6 login">
				<h3>Register as a Borrower</h3>
				<?php echo $error;?>
				<form name="reBoIn" action="" method="post">
				<input type="text" class="form-control" placeholder="First Name..." name="fname" required>
				<input type="text" class="form-control" placeholder="Last Name..." name="lname" required>
				<input type="email" class="form-control" placeholder="Email..." name="email" id="temail" onBlur="checkemail();" required>
				<div style="position:relative;height:0px;color:red;font-size:11px;" id="email_status"></div>
				<input type="password" class="form-control" placeholder="Password..." name="pass" required>
				<input type="text" class="form-control" placeholder="Mobile No..." name="mobile" required>
				
				<label class="chkbox"><input type="checkbox" class="mychkbox" required name="cb1" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms1" unchecked> &nbsp;&nbsp;I agree to the <a href="">TERMS OF USE</a></label>
				<label class="chkbox"><input type="checkbox" class="mychkbox" required name="cb2" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms2" unchecked> &nbsp;&nbsp;I have read and agreed to the <a href="">TERMS AND CONDITIONS</a></label>
				<label class="chkbox"><input type="checkbox" class="mychkbox" required name="cb3" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms3" unchecked> &nbsp;&nbsp;I authorize faircent.com to make any enquiries with any finance company or bank or register credit bureau regarding my credit history with them.</label>
				<button type="submit" class="rlibtn" style="" name="submit">SUBMIT</button>
				</form>
				
			</div>
			<script type="text/javascript">
  				document.getElementById("field_terms1").setCustomValidity("Please indicate that you accept the TERMS OF USE");
  				document.getElementById("field_terms2").setCustomValidity("Please indicate that you accept the TERMS AND CONDITIONS");
  				document.getElementById("field_terms3").setCustomValidity("Please indicate that you authorize");

			</script>
						
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
		
<script type="text/javascript">
function checkemail()
{
 var email=document.getElementById( "temail" ).value;
	
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'check.php',
  data: {
   user_email:email,
  },
  success: function (response) {
   $( '#email_status' ).html(" "+response);
   if(response=="OK")	
   {
    return true;	
   }
   else
   {
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

function checkall()
{
 var emailhtml=document.getElementById("email_status").innerHTML;

 if(emailhtml=="")
 {
  return true;
 }
 else
 {
  return false;
 }
}

</script>
	

	
	</body>
	</html>