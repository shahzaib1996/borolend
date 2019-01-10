<?php
session_start();
include_once 'connect.php';
if(!isset($_SESSION['uid'])){
	// header('Location: index.php');
	?>
	<script type="text/javascript">
	window.location.href = 'index.php';
	</script>
	<?php
}
if(isset($_SESSION['uid'])) {
	$uid = $_SESSION['uid'];
	$type = $_SESSION['type'];
	$email = "Error";
	if($type == 'bi') {
		$e_check1 = $con->query("SELECT * FROM borrower_individual WHERE id='$uid'");
		$row1 = $e_check1->fetch_object();
		$email = $row1->email;
		$up_check = $row1->up_check;
		if($up_check == '0') {
					// header('Location: borrower-profile-step1.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-profile-step1.php';
			</script>
			<?php
		}
		elseif($up_check == '1') {
					// header('Location: borrower-profile-step2.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-profile-step2.php';
			</script>
			<?php
		}
		elseif($up_check == '2') {
					// header('Location: update-profile-step3.php');
		}
		else {
					// header('Location: borrower-account.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-account.php';
			</script>
			<?php
		}

	}
	elseif($type == 'bb') {
		$e_check2 = $con->query("SELECT * FROM borrower_business WHERE id='$uid'");
		$row2 = $e_check2->fetch_object();
		$email = $row2->email;
		$up_check = $row2->up_check;
		if($up_check == '0') {
					// header('Location: update-profile-step1.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-profile-step1.php';
			</script>
			<?php
		}
		elseif($up_check == '1') {
					// header('Location: update-profile-step2.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-profile-step2.php';
			</script>
			<?php
		}
		elseif($up_check == '2') {
					// header('Location: update-profile-step3.php');
		}
		else {
					// header('Location: borrower-account.php');
			?>
			<script type="text/javascript">
			window.location.href = 'borrower-account.php';
			</script>
			<?php
		}
	}
}

if(isset($_POST['submit'])) {
	$puid = $_SESSION['type'].$_SESSION['uid'];
	$uid = $_SESSION['uid'];
	$type = $_SESSION['type'];

	$toa=$_POST['toa'];
	$a_no=$_POST['a_no'];
	$bank=$_POST['bank'];
	$branch=$_POST['branch'];
	$city=$_POST['city'];
	$bsimg = addslashes($_FILES["bsimg"] ["name"]);
	$sql = "UPDATE borrower_profile SET title_account='$toa' , account_number='$a_no' , bank='$bank' , branch='$branch' , bcity='$city' , bank_statement='$bsimg' WHERE uid='".$puid."'";
	$sqlup1 = "UPDATE borrower_individual SET up_check='3' WHERE id='".$uid."'";
	$sqlup2 = "UPDATE borrower_business SET up_check='3' WHERE id='".$uid."'";
	// $sqlup2 = "UPDATE lender_org SET up_check='1' WHERE (id=$uid and type=$type)";
	if(move_uploaded_file($_FILES["bsimg"] ["tmp_name"], "bankstatementimg/".$_FILES["bsimg"] ["name"])) {
		if(mysqli_query($con,$sql)) {
			if($type == 'bi') {
				if(mysqli_query($con,$sqlup1)) {
					// header('Location: borrower-account.php');
					?>
					<script type="text/javascript">
					window.location.href = 'borrower-account.php';
					</script>
					<?php
				}
			}
			elseif($type == 'bb') {
				if(mysqli_query($con,$sqlup2)) {
					// header('Location: borrower-account.php');
					?>
					<script type="text/javascript">
					window.location.href = 'borrower-account.php';
					</script>
					<?php
				}
			}

		// header ('location: update-profile-step2.php');
		}
		else {
			// header ('location: 404.html');	
			echo "<script>alert('Unexpected Error Try Again !')</script>";
			
		}
	}
	else {
		echo "<script>alert('Please Upload CNIC/Passport Image')</script>";
	}

}



?>

<!DOCTYPE html>
<html>
<head>
	<title>PAKCENT</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- bootstrap magic -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/mystyle.css" />

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
    				<h3>PROFILE UPDATE</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">Courses</span></span>
    			</div>
    		</div>

    	</header>

    	<div class="upcont">	
    		<div class="container up-1">
    			<div class="row">
    				<div class="up-wrap col-md-12">
    					<div class="upinner">
    						<h3>Bank Account details</h3>
    						<form action="" method="post" enctype="multipart/form-data">
    							<label>Title of Account</label>
    							<input type="text" class="form-control upt" placeholder="Enter Title..." name="toa" required>
    							<label>Account Number</label>
    							<input type="text" class="form-control upt" placeholder="Enter Account No..." name="a_no" required>
    							<label>Bank</label>
    							<input type="text" class="form-control upt" placeholder="Enter Bank..." name="bank" required>
    							<label>Branch</label>
    							<input type="text" class="form-control upt" placeholder="Enter Branch..." name="branch" required>
    							<label>City</label>
    							<input type="text" class="form-control upt" placeholder="Enter City..." name="city" required>
    							<label>Bank Statement (Attach picture 3 month latest)</label>
    							<input type="file" class="form-control" name="bsimg" id="bsimg">
    							<button type="submit" class="rlibtn" style="" name="submit">FINISH</button>
    						</form>
    					</div>
    				</div>
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