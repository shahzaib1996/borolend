<?php
session_start();
 include_once 'connect.php';
 if(isset($_SESSION['uid'])){
	// header('Location: index.php');
 	?>
 	<script type="text/javascript">
 	window.location.href = 'index.php';
 	</script>
 	<?php
 }

$loginerror = "";

 if(!isset($_SESSION['uid'])){
 	if(isset($_POST['submit'])){
 		$email = $_POST['email'];
 		$password = $_POST['pass'];
 		$e_check1 = $con->query("SELECT * FROM lender_individual WHERE email='$email'");
 		$e_check2 = $con->query("SELECT * FROM lender_org WHERE email='$email'");
 		$e_check3 = $con->query("SELECT * FROM borrower_individual WHERE email='$email'");
 		$e_check4 = $con->query("SELECT * FROM borrower_business WHERE email='$email'");


 		if($e_check1->num_rows == 1){
 			$row1 = $e_check1->fetch_object();
 			$password_check = $row1->password;
 			if($password_check == $password){
 				$uid = $row1->id;
 				$type = $row1->type;
 				$up_check = $row1->up_check;
 				$_SESSION['uid'] = $uid;
 				$_SESSION['type'] = $type;
 				if($up_check == '0') {
					// header('Location: update-profile-step1.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'update-profile-step1.php';
 					</script>
 					<?php
 				}
 				elseif($up_check == '1') {
					// header('Location: update-profile-step2.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'update-profile-step2.php';
 					</script>
 					<?php
 				}
 				elseif($up_check == '2') {
					// header('Location: update-profile-step3.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'update-profile-step3.php';
 					</script>
 					<?php
 				}
 				else {
					// header('Location: index.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'index.php';
 					</script>
 					<?php
 				}

 			}
 			elseif($password_check != $password){
 				// echo "<script>alert('OPPS! Password incorrect.')</script>";	
                $loginerror = '<div class="alert alert-danger" style="position:absolute;padding:5px 10px;;margin-top:-20px;" role="alert"><b>ERROR</b> Incorrect password Try Again.</div>';
 			}
 		}
 		elseif($e_check2->num_rows == 1){
 			$row2 = $e_check2->fetch_object();
 			$password_check = $row2->password;
 			if($password_check == $password){
 				$uid = $row2->id;
 				$type = $row2->type;
 				$up_check = $row2->up_check;
 				$_SESSION['uid'] = $uid;
 				$_SESSION['type'] = $type;
 				if($up_check == '0') {
					// header('Location: update-profile-step1.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'update-profile-step1.php';
 					</script>
 					<?php
 				}
 				elseif($up_check == '1') {
					// header('Location: update-profile-step2.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'update-profile-step2.php';
 					</script>
 					<?php
 				}
 				elseif($up_check == '2') {
					// header('Location: update-profile-step3.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'update-profile-step3.php';
 					</script>
 					<?php
 				}
 				else {
 					// header('Location: index.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'index.php';
 					</script>
 					<?php
 				}

 			}
 			elseif($password_check != $password){
 				// echo "<script>alert('OPPS! Password incorrect.')</script>";	
                $loginerror = '<div class="alert alert-danger" style="position:absolute;padding:5px 10px;;margin-top:-20px;" role="alert"><b>ERROR</b> Incorrect password Try Again.</div>';

 			}
 		}
 		elseif($e_check3->num_rows == 1){
 			$row3 = $e_check3->fetch_object();
 			$password_check = $row3->password;
 			if($password_check == $password){
 				$uid = $row3->id;
 				$type = $row3->type;
 				$up_check = $row3->up_check;
 				$_SESSION['uid'] = $uid;
 				$_SESSION['type'] = $type;
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
					// header('Location: borrower-profile-step3.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'borrower-profile-step3.php';
 					</script>
 					<?php
 				}
 				else {
					// header('Location: index.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'index.php';
 					</script>
 					<?php
 				}
 			}
 			elseif($password_check != $password){
 				// echo "<script>alert('OPPS! Password incorrect.')</script>";	
                $loginerror = '<div class="alert alert-danger" style="position:absolute;padding:5px 10px;;margin-top:-20px;" role="alert"><b>ERROR</b> Incorrect password Try Again.</div>';

 			}
 		}
 		elseif($e_check4->num_rows == 1){
 			$row4 = $e_check4->fetch_object();
 			$password_check = $row4->password;
 			if($password_check == $password){
 				$uid = $row4->id;
 				$type = $row4->type;
 				$up_check = $row4->up_check;
 				$_SESSION['uid'] = $uid;
 				$_SESSION['type'] = $type;
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
					// header('Location: borrower-profile-step3.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'borrower-profile-step3.php';
 					</script>
 					<?php
 				}
 				else {
					// header('Location: index.php');
 					?>
 					<script type="text/javascript">
 					window.location.href = 'index.php';
 					</script>
 					<?php
 				}
 			}
 			elseif($password_check != $password){
 				// echo "<script>alert('OPPS! Password incorrect.')</script>";	
                $loginerror = '<div class="alert alert-danger" style="position:absolute;padding:5px 10px;;margin-top:-20px;" role="alert"><b>ERROR</b> Incorrect password Try Again.</div>';

 			}
 		}
 		else {
 			// echo "<script>alert('USER Doesn't Exist.')</script>";	
            $loginerror = '<div class="alert alert-danger" style="position:absolute;padding:5px 10px;;margin-top:-20px;" role="alert"><b>ERROR</b> User does not exist.</div>';
 		}
		// elseif($e_check1->num_rows == 0){
		// }
 	}
 }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>BORLEND | Login</title>
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
    		
    		<!-- header include file -->
    		<?php include_once 'header.php'; ?>

    		
    		<div class="container main-text">
    			<div class="col-md-12">
    				<h3>Login</h3> <span class="location pull-right">You Are Here :  <a href="index.php">Home</a>  >  <span class="r-page">Login</span></span>
    			</div>
    		</div>

    	</header>
    	
    	
    	<div class="log-r">
    		
    		<div class="container log-r-wrap">
    			<img src="images/pencil-2.png" class="p1" alt="" />
    			<img src="images/pencil-3.png" class="p2" alt="" />
    			<div class="col-md-6 login">
    				<h3>Login</h3>
                    <div><?php echo $loginerror; ?></div>
    				<form action="" method="post">
    					<input type="email" class="form-control" placeholder="Enter Your Username..." name="email" required>
    					<input type="password" class="form-control" placeholder="Enter Your Password..." name="pass" required>
    					<button type="submit" class="rlibtn" name="submit">SUBMIT</button>
    				</form>
    				<!-- <div class="r-txt">Recover your <a href="#">Username or Password</a></div> -->
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