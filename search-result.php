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
        <style type="text/css">
/* search page  */
.srcont {
	background: #e0e0e0;
}
.sr-1 {
}
.sr-1 div.sr-wrap {
	margin-top: 20px;
	margin-bottom: 20px;
	background:#f0f0f0;
	padding-left: 100px;
	padding-right: 100px;
	padding-bottom: 20px;
}
.sr-1 .upinner {
	height:auto;
	background: ;
}
.sr-1 h3 {
	color:#2c394a;
	font-size:24px;
	margin:0px;
	margin-top: 20px;
	border-bottom: 1px solid grey;
	margin-bottom: 20px;
}
.sr-1 h3 span {
	font-size: 14px;
}
.sr-1 input.upt{
	background:#fff;
	height:39px;
	border:1px solid #d7d7d7;
	border-radius:0px;
	box-shadow:none;
	color:#959595;
	font-size:12px;
	padding-left: 10px;
	width: 100%;
}
.sr-1 input.upt:focus{
	box-shadow:none;
	border-color:#d7d7d7;
}
.sr-1 label {
	color:#959595;
	font-size:14px;
	font-weight: normal;
	width:100%;
	float:left;
	margin-top:20px;
	outline: 0;
}
.sr-1 button.rlibtn {
	width:200px;
	height:34px;
	background:#2c394a;
	color:#fff;
	font-size:13px;
	display:inline-block;
	transition:.3s;
	text-align:center;
	margin-top:30px;
	border: 0px;
}
.sr-1 .srbox {
	background: ;
	height: auto;
	border-bottom: 1px solid grey;
	margin-bottom: 20px;
	padding-bottom: 10px;
}
.sr-1 .srbhead {
	background: ;
	font-size: 20px;
	padding-left: 1px;
	color:;
	text-transform: uppercase;
}
.srbhead span {
	font-size: 14px;
	text-transform: capitalize;
}
.sr-1 .searchbox {
	margin-top: 20px;
	background: #fff;
	padding: 0px;
}
.sr-1 .sselect {
	height:50px;
	border-radius:0px;
	padding-left:20px;
	position: ;
	border: 0px;
width: calc(100% - 130px);
}
.sr-1 .sselect:focus {
	outline:none;
	box-shadow:none;
}
.sr-1 .btn-default{
	height:50px;
	width:126px;
	background:#aee238;
	border:none;
	border-radius:0;
	float: right;
}
.sr-1 .nrf {
	font-size: 16px;
	text-align: center;
	height: 20px;
	width: 100%;
	background: ;
	margin-top: 50px;
	margin-bottom: 50px;
}
        </style>
		
	</head>
	
	
	<body>
	
	<header class="header-4 header-2">	
		<div class="container">
			<div class="col-md-12 top-bar">
				<div class="left">
					<!-- <span class="txt-1"><i class="fa fa-user"></i> LOGIN
						
					</span> -->
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
				<h3>Search</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">Courses</span></span>
			</div>
		</div>

	</header>
	
<div class="srcont">	
<div class="container sr-1">
	<div class="row">
		<div class="sr-wrap col-md-12">
			<div class="upinner">
				<div class="searchbox">
					<form action="search-result.php" method="get" >
					<select id="scity" name="scity" class="sselect" required>
      						<option value="">- Select City -</option>
      						<option value="karachi">Karachi</option>
      						<option value="lahore">Lahore</option>
      						<option value="hyderabad">Hyderabad</option>
      						<option value="peshawar">Peshawar</option>
    				</select>
    				<button class="btn btn-default"  id="searchsubmit"  type="submit">
						<strong>Search</strong>
					</button>
					</form>
				</div>
				<?php 
				$chkr ='0';
				if(isset($_GET['scity'])) {
					require_once( dirname(__FILE__) . '/searchclass.php');
					
					$search = new search();

					$search_term = $_GET['scity'];

					$search_results = $search->search($search_term);

					if($search_results) :
				?>
				<h3>Search Result <span>(<?php echo $search_results['count']; $chkr = $search_results['count']; ?> Result found)</span> </h3>
				<?php	foreach ($search_results['results'] as $search_result) : ?>

				<div class="srbox">
					<div class="srbhead"><?php echo $search_result->fname.' '.$search_result->lname ;?> <span>

					<?php 
					if($search_result->type == 'li') {echo "Lender";}
					elseif($search_result->type == 'lo') {echo "Lender";}
					elseif($search_result->type == 'bi') {echo "Borrower";}
					elseif($search_result->type == 'bb') {echo "Borrower";}
					?>

				</span></div>
					<div>Email: <?php echo $search_result->email;?></div>
					<div>City: <?php echo $search_result->city;?></div>
				</div>
				<?php
				endforeach;
				endif;
				}
				if($chkr == '0') {
					echo '<div class="nrf" > <<< <<< <<< No Result Found >>> >>> >>></div>';
				}
				?>
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