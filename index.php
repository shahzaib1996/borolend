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
//fetch live feed from db
$setlivefeed = $con->query("SELECT * FROM live_feed WHERE id=1");
$lfd = $setlivefeed->fetch_object();
$f11 = $lfd->f11;
$f121 = $lfd->f121;
$f122 = $lfd->f122;
$f21 = $lfd->f21;
$f22 = $lfd->f22;

//Fetch Risk Values from db
$setlivefeed = $con->query("SELECT * FROM live_feed WHERE id=2");
$rr = $setlivefeed->fetch_object();
$min = $rr->f11;
$low = $rr->f121;
$med = $rr->f122;
$high = $rr->f21;
$vhigh =$rr->f22;

//Sum Lend Amount
$lendm = $con->query("SELECT SUM(lend_amount) AS la FROM lend_req WHERE l_check='1'");
$sumla = $lendm->fetch_object();
$lendsum = $sumla->la;
//sum borrow amount
$borrm = $con->query("SELECT SUM(borrow_amount) AS ba FROM apply_for_loan WHERE a_check='1'");
$sumba = $borrm->fetch_object();
$borrowsum = $sumba->ba;

//no of loan and lend requests
$nolends = $con->query("SELECT lid FROM lend_req");
$no_lend = $nolends->num_rows;
//for loan
$noloans = $con->query("SELECT aid FROM apply_for_loan");
$no_loan = $noloans->num_rows;

?>
<!DOCTYPE html>
<html>
	<head>
	   	<title>Welcome to BOROLEND</title>
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
		
		<!-- RS5.0 Main Stylesheet -->
		<link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
		 
		<!-- RS5.0 Layers and Navigation Styles -->
		<link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
		<link rel="stylesheet" type="text/css" href="revolution/css/navigation.css">
		
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
	
	<header class="header-2">	
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
					<!-- <div class="txt-1" style="float:left;"><a href=""> <i class="fa fa-user"></i> MY ACCOUNT </a></div> -->
					<!-- <div class="txt-1" style="float:left;"><a href="login.php"> <i class="fa fa-user"></i> LOGIN </a></div>
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
					</div> -->
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

<style type="text/css">
div.home-cont div.homebox1 div.homebox1-inner table.hometable {
	background: #fff;
	min-width: 330px;
	border-radius: 10px 10px 10px 10px;
	box-shadow: 0px 3px 10px;
	overflow: hidden !important;
}
.rgrid {
	background:  	;
	padding-top: 20px;	
	padding-bottom: 20px;
	padding-right: 10px;
	padding-left: 10px;

	text-align: center;
}
.rbox {
	margin-top: 50px;
	margin-bottom: 50px;
}
.rgrid div.h {
	font-size: 20px;
	font-weight: bold;
	padding-top: 60px;
	padding-bottom: 60px;
	background: ;
	box-shadow: 0px 3px 10px;
	color:#424242;
}
.rbox .heading {
	padding-left: 10px;
	font-size: 32px;
	margin-top: 10px;
}
.rgrid div.h span {
	font-weight: normal;
}
table.hometable thead tr th {
	font-size: 28px;
	padding: 20px 30px;
	background: #aee238;

}
table.hometable tbody tr {

}
table.hometable tbody tr td {
	padding: 20px 30px;
	font-family: 'Open Sans', sans-serif;
	font-size: 14px;
	border: 0;
}</style>
		
		<div class="home-2">
    <div class="container home-cont">
        <div class="row">
            <div class="homebox1 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="homebox1-inner">
                      <table class="table hometable">
                        <thead>
	
                            <tr style="">
                                <th style="opacity:1;color:#fff;text-shadow: 2px 3px 3px rgba(0, 0, 0, 0.35);">Live Feed</th>
                                <th><a href="" style="color:#000;font-size:15px;font-weight:normal;opacity:1;text-decoration:none;"></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <td><span class="s1"> <?php echo $f11; ?>% &nbsp;<i class="fa fa-sort-desc ipab1"></i> </span><br/>
                                    <span class="s2">Rs 68.5 </span> <span style="font-size:16px;">Lacs</span> <br/>
                                    Loan amount approved<br/>
                                </td>
                                <td class="tdactive"><span class="s1"> <?php echo $f121?>%&nbsp;&nbsp;</span><span class="s3"> <?php echo $f122;?>% &nbsp;<i class="fa fa-sort-asc"></i></span> <br/>
                                    Average interest rate<br/>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="s1"> <?php echo $f21?>% &nbsp;<i class="fa fa-sort-desc ipab1"></i> </span><br/>
                                    <span style="font-size:16px;"> <?php echo $no_loan;?> requests</span> <br/>
                                    Loan requests received<br/>
                                </td>
                                <td><span class="s1"> <?php echo $f22?>% &nbsp;<i class="fa fa-sort-desc ipab1"></i> </span><br/>
                                    <span style="font-size:16px;"> <?php echo $no_lend;?> Offers</span> <br/>
                                    Investment Proposals<br/>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td colspan="2" class="tabbottom-line">Calculations are based on rolling seven (7) days</td>
                            </tr> -->
                        </tbody>
                    </table>
                    
                </div>
            </div>

            <div class="homebox2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="homebox2-inner">
                    <div class="hb2-head">register now</div><br>
                    <div class="lbbtn-box">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="lbtn lenderstyle" id="lstyle">lender 
                            	<div class="msubdrop" id="subdrop">
                            		<!-- <div class="tri"></div> -->
                            		<a href="register-lender-individual.php" class="dd">Individual</a>
                            		<a href="register-lender-org.php" class="dd">Organization</a>
                            	</div> 
                        	</div><br>
                        	
                            <!-- <div class="lbtn-bline">Get returns up to 25%</div> -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="lbtn borrowstyle">borrower
                            	<div class="msubdrop" id="subdrop">
                            		<!-- <div class="tri"></div> -->
                            		<a href="register-borrower-org.php" class="dd">Individual</a>
                            		<a href="register-borrower-indivisual.php" class="dd">Business</a>
                            	</div>
                            </div><br>
                            <!-- <div class="lbtn-bline">Get rates as low as 12%</div> -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="rdetails rdetailsborder1">
                                <span class="rs1">Lender</span><br>
                                Committed to Lend<br>
                                <span class="rs2">Rs <?php echo number_format($lendsum);?></span>
                            </div>
                            <a href="browse-lenders.php"> <div class="rd-bline1">Browse Lenders ></div> </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="rdetails rdetailsborder2">
                                <span class="rs3">Borrowers</span><br>
                                Seeking to borrow<br>
                                <span class="rs4">Rs <?php echo number_format($borrowsum);?></span>
                            </div>
                            <a href="browse-borrowers.php"> <div class="rd-bline2">Browse Borrowers ></div> </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- Container closed -->
		</div>
	</header>
	
	<div class="container rbox">
		<div class="row">
			<div class="heading">EARN GREAT RETURNS</div>
			<div class="rgrid col-md-4">
				<div class="h" style="background:#7edc5b;">MINIMAL RISK <br><span>Net Return: <?php echo $min;?> %</span> </div>
			</div>
			<div class="rgrid col-md-4">
				<div class="h" style="background:#bae326;">LOW RISK <br><span>Net Return: <?php echo $low;?> %</span> </div>
			</div>
			<div class="rgrid col-md-4">
				<div class="h" style="background:#ffe527;">MEDIUM RISK <br><span>Net Return: <?php echo $med;?> %</span> </div>
			</div>
			<div class="rgrid col-md-6" style="padding-top:0px;">
				<div class="h" style="background:#ff9e29;">HIGH RISK <br><span>Net Return: <?php echo $high;?> %</span> </div>
			</div>
			<div class="rgrid col-md-6" style="padding-top:0px;">
				<div class="h" style="background:#ff6e41;">VERY HIGH RISK <br><span>Net Return: <?php echo $vhigh;?> %</span> </div>
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
	<!-- RS5.0 Core JS Files -->
	<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>
	<!-- Scroll top -->
	<script type="text/javascript" src="js/to-top.js"></script>
	<!-- Theme Custom -->
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/app.js"></script>

	
	
	</body>
	</html>