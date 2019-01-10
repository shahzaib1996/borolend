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
$error = '';
if(isset($_POST['submit'])) {
  	$amount = $_POST['amount'];
  	$firmname = $_POST['firmname'];
  	$pan_no = $_POST['pan-no'];
  	$cin_no = $_POST['cin-no'];
  	$incorp_date = $_POST['incorp-date'];
  	$dir_fname = $_POST['dir-fname'];
  	$dir_lname = $_POST['dir-lname'];
  	$dir_gender = $_POST['gender'];
  	$user_fname = $_POST['user-fname'];
  	$user_lname = $_POST['user-lname'];
  	$email = $_POST['email'];
  	$pass = $_POST['pass'];
  	$mobile = $_POST['mobile'];
  	$add1 = $_POST['add1'];
  	$add2 = $_POST['add2'];
  	$state = $_POST['state'];
  	$city = $_POST['city'];
  	$pincode = $_POST['pincode'];
  	$c_add1 = $_POST['c-add1'];
  	$c_add2 = $_POST['c-add2'];
  	$c_state = $_POST['c-state'];
  	$c_city = $_POST['c-city'];
  	$c_pincode = $_POST['c-pincode'];

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
  		$sql = "INSERT INTO `lender_org` (`amount`,`firm_name`,`pan_card`,`cin`,`incorp_date`,`dir_fname`,`dir_lname`,`gender`,`fname`,`lname`,`email`,`password`,`mobile`,`reg_add1`,`reg_add2`,`state`,`city`,`pin_code`,`comm_add1`,`comm_add2`,`comm_state`,`comm_city`,`comm_pincode`) VALUES ('".$amount."','".$firmname."','".$pan_no."','".$cin_no."','".$incorp_date."','".$dir_fname."','".$dir_lname."','".$dir_gender."','".$user_fname."','".$user_lname."','".$email."','".$pass."','".$mobile."','".$add1."','".$add2."','".$state."','".$city."','".$pincode."','".$c_add1."','".$c_add2."','".$c_state."','".$c_city."','".$c_pincode."')";
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
	   	<title>BOROLEND | Organization Lender Registeration</title>
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
		
		<!-- Header include file-->
		<?php include_once 'header.php'; ?>
		
		
		<div class="container main-text">
			<div class="col-md-12">
				<h3>Register as Instutional Lender</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">Register as Instutional Lender</span></span>
			</div>
		</div>

	</header>
	
	
	<div class="o-r">
		
		<div class="container o-r-wrap">
		<img src="images/pencil-2.png" class="p1" alt="" />
		<img src="images/pencil-3.png" class="p2" alt="" />
			<div class="col-md-6 login">
				<h3>Register as Instutional Lender</h3>
				<?php echo $error; ?>
				<form name="reLeOrg" action="" method="post">
				<label>Enter Amount</label>
				<select id="amount" name="amount" class="orselect" required>
      				<option value="">- Select -</option>
      				<option value="1000000">10,00,000</option>
      				<option value="1500000">15,00,000</option>
      				<option value="2000000">20,00,000</option>
      				<option value="2500000">25,00,000</option>
      				<option value="3000000">30,00,000</option>
      				<option value="3500000">35,00,000</option>
      				<option value="4000000">40,00,000</option>
      				<option value="4500000">45,00,000</option>
      				<option value="5000000">50,00,000</option>
      				<option value="5500000">55,00,000</option>
      				<option value="6000000">60,00,000</option>
      				<option value="6500000">65,00,000</option>
      				<option value="7000000">70,00,000</option>
      				<option value="7500000">75,00,000</option>
      				<option value="8000000">80,00,000</option>
      				<option value="8500000">85,00,000</option>
      				<option value="9000000">90,00,000</option>
      				<option value="9500000">95,00,000</option>
      				<option value="10000000">100,00,000</option>
    			</select>
    			<label>NAME OF THE FIRM </label>
				<input type="text" class="form-control" placeholder="Firm Name" name="firmname" required>

				<label>PAN/TAN</label>
				<input type="text" class="form-control" placeholder="PAN Card Number" name="pan-no" required>

				<label>CIN</label>
				<input type="text" class="form-control" placeholder="CIN Number" name="cin-no" required>

				<label>INCORPORATION DATE</label>
				<input type="date" class="form-control" placeholder="Incorporation Date" name="incorp-date" required>

				<label class="l-half-1">DIRECTOR First Name</label>
				<label class="l-half-2">Last Name</label>
				<input type="text" class="form-control half-1" placeholder="First Name" name="dir-fname" required>
				<input type="text" class="form-control half-2" placeholder="last Name" name="dir-lname" required>

	
				<label class="radiobox"><input type="radio" class="myradio" name="gender" value="Mr." required> &nbsp;&nbsp;Mr.</label>
				<label class="radiobox" style="width:80%;"><input type="radio" class="myradio" name="gender" value="Mrs." required> &nbsp;&nbsp;Mrs.</label>


				<label class="l-half-1">USER First Name</label>
				<label class="l-half-2">Last Name</label>
				<input type="text" class="form-control half-1" placeholder="First Name" name="user-fname" required>
				<input type="text" class="form-control half-2" placeholder="Last Name" name="user-lname" required>

				<label>Email ID</label>
				<input type="email" class="form-control" placeholder="Email ID" name="email" id="temail" onBlur="checkemail();" required>
				<div style="position:relative;height:0px;color:red;font-size:11px;" id="email_status"></div>
				<label>Password</label>
				<input type="password" class="form-control" placeholder="Password" name="pass" required>

				<label>Mobile No</label>
				<input type="text" class="form-control" placeholder="Mobile No" name="mobile" required>

				<label>Registered Address</label>
				<input type="text" class="form-control" placeholder="Address 1" name="add1" id="add1" required>
				<input type="text" class="form-control" placeholder="Address 2" style="margin-top:10px;" name="add2" id="add2">

				<label>Province</label>
				<select id="state" name="state" class="orselect" required>
      				<option value="">- Select -</option>
      				<option value="punjab">Punjab</option>
      				<option value="sindh">Sindh</option>
      				<option value="balochistan">Balochistan</option>
      				<option value="khyber pakhtunkhwa">Khyber Pakhtunkhwa</option>
    			</select>

    			<label>City</label>
				<select id="city" name="city" class="orselect" required>
      				<option value="">- Select -</option>
    			</select>

    			<label>Pin Code</label>
				<input type="text" class="form-control" placeholder="Pin Code" name="pincode" id="pincode" required>

				<label>Address for Communication</label>
				<label style="margin-top:5px;margin-bottom:5px;"><input type="checkbox" class="mychkbox" id="samecheckbox"> &nbsp;&nbsp;Same As Above</label>
				<input type="text" class="form-control" placeholder="Address 1" name="c-add1" id="cadd1" required>
				<input type="text" class="form-control" placeholder="Address 2" style="margin-top:10px;" name="c-add2" id="cadd2">
				<select id="c-state" name="c-state" class="orselect" style="margin-top:10px;" required>
      				<option value="">- Select -</option>
      				<option value="punjab">Punjab</option>
      				<option value="sindh">Sindh</option>
      				<option value="balochistan">Balochistan</option>
      				<option value="khyber pakhtunkhwa">Khyber Pakhtunkhwa</option>
    			</select>

				<select id="c-city" name="c-city" class="orselect" style="margin-top:10px;" required>
      				<option value="" >- Select -</option>
    			</select>

				<input type="text" class="form-control" placeholder="Pin Code" style="margin-top:10px;" name="c-pincode" id="c-pincode" required>

				<label class="chkbox" style="margin-top:20px;"><input type="checkbox" class="mychkbox" required name="cb1" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms1"> &nbsp;&nbsp;I HAVE READ AND AGREE TO THE  <a href="">TERMS AND CONDITIONS</a> </label>

				<label class="chkbox"><input type="checkbox" class="mychkbox" required name="cb1" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms2" > &nbsp;&nbsp;I AGREE TO THE TERMS OF USE AND CONSENT TO ELEICTRONIC DISCLOSURES, AND THE <a href="">PRIVACY POLICIES</a></label>
				
				
				<button type="submit" class="rlibtn" style="" name="submit">SUBMIT</button>
				</form>
				
			</div>
			<script type="text/javascript">
  				document.getElementById("field_terms1").setCustomValidity("Please indicate that you accept the TERMS AND CONDITIONS");
  				document.getElementById("field_terms2").setCustomValidity("Please indicate that you accept the PRIVACY POLICIES");
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
	<script type="text/javascript" src="js/app.js"></script>	
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