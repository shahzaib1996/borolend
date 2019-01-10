<?php
session_start();
include_once 'connect.php';

$fn = '';
$ln = '';
$mob = '';
$dob = '';
$city = '';
$pro = '';
$add = '';
$cnic = '';
$occ = '';
$on = '';
$oadd = '';
$ai= '';
$toa = '';
$ano = '';
$bank = '';
$branch = '';
$bcity = '';


if(isset($_POST['one'])) {
	$type = $_SESSION['type'];
	if($type == 'li') {
		$id = $_SESSION['uid'];
		$ufn = $_POST['fname'];
		$uln = $_POST['lname'];
		$umobile =  $_POST['mobile'];
		$query = "UPDATE lender_individual SET fname='$ufn' , lname='$uln' , mobile='$umobile'  WHERE id='".$id."'";
		if(mysqli_query($con,$query)) {
			echo "<script>alert('UPDATED')</script>";
		}
		else {
			echo "<script>alert('Error Updating')</script>";
		}
	}
	elseif($type == 'lo') {
		$id = $_SESSION['uid'];
		$ufn = $_POST['fname'];
		$uln = $_POST['lname'];
		$umobile =  $_POST['mobile'];
		$query = "UPDATE lender_org SET fname='$ufn' , lname='$uln' , mobile='$umobile'  WHERE id='".$id."'";
		if(mysqli_query($con,$query)) {
			echo "<script>alert('UPDATED')</script>";
		}
		else {
			echo "<script>alert('Error Updating')</script>";
		}
	}
}
if(isset($_POST['two'])) {
	$puid = $_SESSION['type'].$_SESSION['uid'];
	$type = $_SESSION['type'];
	$udob=$_POST['dob'];
	$ucity=$_POST['city'];
	$uprovince=$_POST['province'];
	$uaddress=$_POST['address'];
	$ucnic=$_POST['cnic'];
	$query = "UPDATE lender_profile SET birth_date='$udob' , pcity='$ucity' , pprovince='$uprovince' , paddress='$uaddress' , cnic='$ucnic'  WHERE uid='".$puid."'";
		if(mysqli_query($con,$query)) {
			echo "<script>alert('UPDATED')</script>";
		}
		else {
			echo "<script>alert('Error Updating')</script>";
		}
}
if(isset($_POST['three'])) {
	$puid = $_SESSION['type'].$_SESSION['uid'];
	$occupation=$_POST['occupation'];
	$org_name=$_POST['org_name'];
	$org_add=$_POST['org_add'];
	$org_no=$_POST['org_no'];
	$avg_income=$_POST['avg_income'];
	$query = "UPDATE lender_profile SET occupation='$occupation' , org_name='$org_name' , org_address='$org_add' , org_contact='$org_no' , avg_income='$avg_income'  WHERE uid='".$puid."'";
		if(mysqli_query($con,$query)) {
			echo "<script>alert('UPDATED')</script>";
		}
		else {
			echo "<script>alert('Error Updating')</script>";
		}
}
if(isset($_POST['four'])) {
	$puid = $_SESSION['type'].$_SESSION['uid'];
	$utoa=$_POST['toa'];
	$ua_no=$_POST['a_no'];
	$ubank=$_POST['bank'];
	$ubranch=$_POST['branch'];
	$ubcity=$_POST['bcity'];
	$query = "UPDATE lender_profile SET title_account='$utoa' , account_number='$ua_no' , bank='$ubank' , branch='$ubranch' , bcity='$ubcity'  WHERE uid='".$puid."'";
		if(mysqli_query($con,$query)) {
			echo "<script>alert('UPDATED')</script>";
		}
		else {
			echo "<script>alert('Error Updating')</script>";
		}
}




if(isset($_SESSION['uid'])){
	$uid = $_SESSION['uid'];
	$type = $_SESSION['type'];
	$comid = $_SESSION['type'].$_SESSION['uid'];
	$email = "Error";
	if($type == 'li') {
		$setuser = $con->query("SELECT * FROM lender_individual WHERE id='$uid'");
		$row = $setuser->fetch_object();
		$email = $row->email;
		$fn = $row->fname;
		$ln = $row->lname;
		$mob = $row->mobile;
		$v_s = $row->verify_status;


	}elseif($type == 'lo'){
		$setuser = $con->query("SELECT * FROM lender_org WHERE id='$uid'");
		$row = $setuser->fetch_object();
		$email = $row->email;
		$fn = $row->fname;
		$ln = $row->lname;
		$mob = $row->mobile;
		$v_s = $row->verify_status;


	}elseif($type == 'bi'){
		// header('location: index.php');
		?>
		<script type="text/javascript">
		window.location.href = 'index.php';
		</script>
		<?php
		
	}elseif($type == 'bb'){
		// header('location: index.php');
		?>
		<script type="text/javascript">
		window.location.href = 'index.php';
		</script>
		<?php
	}

	$setd = $con->query("SELECT * FROM lender_profile WHERE uid='$comid'");
	if($setd->num_rows == 1) {
	$row1 = $setd->fetch_object();
	$dob = $row1->birth_date;
	$city =$row1->pcity;
$pro =$row1->pprovince;
$add = $row1->paddress;
$cnic = $row1->cnic;
$passport = $row1->passport;
$occ = $row1->occupation;
$oname = $row1->org_name;
$oadd = $row1->org_address;
$ocontact = $row1->org_contact;
$ai= $row1->avg_income;
$toa = $row1->title_account;
$ano = $row1->account_number;
$bank = $row1->bank;
$branch = $row1->branch;
$bcity = $row1->bcity;

	$setloanstatus = $con->query("SELECT * FROM lend_req WHERE uid='$uid' and type='$type' ");

	
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
		
		<!-- Header include File -->
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
				<h3>Account</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">Courses</span></span>
			</div>
		</div>

	</header>
	
<div class="procont" style="padding-top:20px;">	
<div class="container pro-1" >
	<div class="row">
		<div class="pro-wrap col-md-6">
			<div class="upinner" style="padding-left:40px;padding-right:20px;">
				<h3>Account Setting</h3>

				<form action="" method="post">
				<label>First Name</label>
				<input type="text" class="form-control prot" placeholder="First Name..." name ="fname" value="<?php echo $fn;?>">
				<label>Last Name</label>
				<input type="text" class="form-control prot" placeholder="Last Name..." name="lname" value="<?php echo $ln;?>">
				<label>Contact No</label>
				<input type="text" class="form-control prot" placeholder="Contact No..." name="mobile" value="<?php echo $mob;?>">
				<button type="submit" class="rlibtn" style="" name="one">UPDATE</button>
				</form>


				

			</div>
		</div>
		<div class="pro-wrap col-md-6">
			<div class="upinner">
				<h3>Apply to Lend </h3>
				<?php
				if($v_s == '0') {
					echo '<div class="alert alert-info" role="alert" style="margin-top:20px;margin-right:50px;">Welcome to BOROLEND<br> Once your account has been approved by admin you will be able to apply to Lend.</div>
					<button type="submit" class="aflbtn" style="opacity:0.5;" name="submit" disabled>Click here to Lend</button>';
				}
				else { echo '<div class="alert alert-success" role="alert" style="margin-top:20px;margin-right:50px;">Welcome to BOROLEND<br>Your account has been approved now you can apply for lend.</div>
				<a href="lend-form.php"><button type="submit" class="aflbtn" style="" name="submit">Click here to Lend</button></a>'; }
				 ?>

				<!-- <a href="lend-form.php"><button type="submit" class="aflbtn" style="" name="submit">Click here to LEND</button></a>  -->
				<h3 style="margin-bottom:10px;margin-top:40px;">Your Lend Applications</h3>
				<table class="table">
					<thead>
						<tr>
							<th>Lend Amount</th>
							<th>Rate</th>
							<th>Time</th>
							<th>Apply Date</th>
							<th>status</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
						if ($setloanstatus->num_rows > 0) {
							while($row1 = $setloanstatus->fetch_assoc()) {
								$lc = $row1['l_check'];
								$msg = "pending";
								if($lc == '1') { $msg='Accepted';  }else {$msg='pending';}
									echo "<tr>
									<td>Rs. ".$row1["lend_amount"]."</td>
									<td>".$row1["rate"]." %</td>
									<td>".$row1["time"]." M</td>
									<td>".$row1["sdate"]."</td>
									<td>".$msg."</td>
									</tr>";
								
							}
						}

						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-12">
		<div class="pro-wrap col-md-6">
			<div class="upinner" style="padding-left:40px;padding-right:0px;">
				<h3>Personal Information</h3>
				<form action="" method="post">
				<label>Date of Birth</label>
				<input type="date" class="form-control prot" placeholder="Enter date of birth..." name="dob" value="<?php echo $dob;?>" required>
				<label>City</label>
				<input type="text" class="form-control prot" placeholder="Enter city..." name="city" value="<?php echo $city;?>" required>
				<label>Province</label>
				<input type="text" class="form-control prot" placeholder="Enter province..." name="province" value="<?php echo $pro;?>" required>
				<label>Home Address</label>
				<input type="text" class="form-control prot" placeholder="Enter home address..." name="address" value="<?php echo $add;?>" required>
				<label>CNIC</label>
				<input type="text" class="form-control prot" placeholder="Enter cnic no" name="cnic" value="<?php echo $cnic;?>" required>
				<button type="submit" class="rlibtn" style="" name="two">UPDATE</button>
				</form>
			</div>
		</div>
		</div>
		<div class="col-md-12">
		<div class="pro-wrap col-md-6">
			<div class="upinner" style="padding-left:40px;padding-right:0px;">
				<h3>Work Information</h3>
				<form action="" method="post">
				<label>Occupation</label>
				<input type="text" class="form-control prot" placeholder="Enter Occupation..." name="occupation" value="<?php echo $occ;?>" required>
				<label>Institution/Organization Name</label>
				<input type="text" class="form-control prot" placeholder="Enter Institution Name..." name="org_name" value="<?php echo $oname;?>" required>
				<label>Institution/Organization Address</label>
				<input type="text" class="form-control prot" placeholder="Enter Institution Name..." name="org_add" value="<?php echo $oadd;?>" required>
				<label>Institution/Organization Contact Number</label>
				<input type="text" class="form-control prot" placeholder="Enter Institution Contact No..." name="org_no" value="<?php echo $ocontact;?>" required>
				<label>Average income per month</label>
				<input type="text" class="form-control prot" placeholder="Enter Average Income..." name="avg_income" value="<?php echo $ai;?>" required>
				<button type="submit" class="rlibtn" style="" name="three">UPDATE</button>
				</form>

			</div>
		</div>
		</div>
		<div class="col-md-12">
		<div class="pro-wrap col-md-6">
			<div class="upinner" style="padding-left:40px;padding-right:0px;">
				<h3>Bank Account Details</h3>
				<form action="" method="post">
				<label>Title of Account</label>
				<input type="text" class="form-control prot" placeholder="Enter Title..." name="toa" value="<?php echo $toa;?>" required>
				<label>Account Number</label>
				<input type="text" class="form-control prot" placeholder="Enter Account No..." name="a_no" value="<?php echo $ano;?>" required>
				<label>Bank</label>
				<input type="text" class="form-control prot" placeholder="Enter Bank..." name="bank" value="<?php echo $bank;?>" required>
				<label>Branch</label>
				<input type="text" class="form-control prot" placeholder="Enter Branch..." name="branch" value="<?php echo $branch;?>" required>
				<label>City</label>
				<input type="text" class="form-control prot" placeholder="Enter City..." name="bcity" value="<?php echo $bcity;?>" required>
				<button type="submit" class="rlibtn" style="" name="four">UPDATE</button>
				</form>
			</div>
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