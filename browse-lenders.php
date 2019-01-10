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




$fname = '';
$lanem ='';
$pp = '<center><img src="images/tick.png" style="width:30px;" class="img-responsive"></center>';
$st = $con->query("SELECT * FROM lend_req where l_check='1' ORDER BY lid DESC");
// if($st->num_rows > 0) {
//     while($trow = $st->fetch_assoc()) {
//         $auid = $trow['uid'];
//         $atype = $trow['type'];
//         if($atype=='bi') {
//             $setname = $con->query("SELECT * FROM borrower_individual WHERE id='$auid'");
//             $nr = $setname->fetch_object();
//             $fname = $nr->fname;
//             $lname =$nr->lname;
//         }
//         else{
//             $setname = $con->query("SELECT * FROM borrower_individual WHERE id='$auid'");
//             $nr = $setname->fetch_object();
//             $fname = $nr->fname;
//             $lname =$nr->lname;
            
//         }
        
//         if($trow['pending'] != 0) {
//              $pp = $trow['paid']; 
//          }
//         echo '<tr>
//         <td >'.$fname[0].'. '.$lname[0].'.</td>
//         <td>'.$trow['time'].'M</td>
//         <td>'.$trow['rate'].'%</td>
//         <td>Rs. '.$trow['borrow_amount'].'</td>
//         <td>Rs. '.$pp.'</td>
//         <td>Rs. '.$trow['pending'].'</td>
//         </tr>';  
              
//     }
// }


// $settable = $con->query("SELECT * FROM apply_for_loan");
// if ($settable->num_rows > 0) {

//     while($trow = $settable->fetch_assoc()) {
//         if($trow['type'] == 'bi') {

//         }
//         else {
//             // $a_uid =  $trow['uid'];
//             // $setname = $con->query("SELECT * FROM borrower_business where id='$a_uid' ")
//             // $getn = $setname->fetch_object();
//             // $name = $getn->fname.'. '.$getn->lname.'.';
//         }
//         echo $name.$trow['borrow_amount'].$trow['time'].$trow['rate'];


//     }
// }



?>


<!DOCTYPE html>
<html>
<head>
	<title>BOROLEND | Browse Lenders</title>
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
	<link rel="stylesheet" href="AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	

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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


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

    		<!-- Header include file -->
            <?php include_once 'header.php'; ?>

    		<div class="container main-text">
    			<div class="col-md-12">
    				<h3>LEND REQUESTS</h3> <span class="location pull-right">You Are Here :  <a href="index.html">Home</a>  >  <span class="r-page">LEND REQUESTS</span></span>
    			</div>
    		</div>

    	</header>

    	<div class="loanp">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">
    				<div class="box">
    					<div class="box-header">
                            <a id="apptl" style="background:#2c394a;padding:5px 20px;;color:#fff;font-size:14px;position:absolute;right:20px;z-index:999;" href="apply-for-loan.php" title="Click here to LEND Money.">BORROW <i class="fa fa-chevron-right"></i></a>

    						<h3 class="box-title" style="text-align:center;opacity:0.8;margin-bottom:20px;">Table represents the lenders' lend requests</h3>
                                					</div>
    					<!-- /.box-header -->
    					<div class="box-body">
    						<table id="example1" class="table table-bordered">
    							<thead>
    								<tr>
    									<th>name</th>
    									<th>TENURE</th>
    									<th>WEIGHTED ROI</th>
    									<th>WANT TO LEND</th>
    									<th>CITY</th>
    									
    								</tr>
    							</thead>
    							<tbody>
                                    <?php
                                    
                                    if($st->num_rows > 0) {
                                        while($trow = $st->fetch_assoc()) {
                                            $auid = $trow['uid'];
                                            $atype = $trow['type'];
                                            $pp = '<center><img src="images/tick.png" style="width:30px;" class="img-responsive"></center>';
                                            if($atype=='li') {
                                                $setname = $con->query("SELECT * FROM lender_individual WHERE id='$auid'");
                                                $nr = $setname->fetch_object();
                                                $fname = $nr->fname;
                                                $lname =$nr->lname;
                                                $city = $nr->city;
                                            }
                                            else{
                                                $setname = $con->query("SELECT * FROM lender_org WHERE id='$auid'");
                                                $nr = $setname->fetch_object();
                                                $fname = $nr->fname;
                                                $lname =$nr->lname;
                                                $city = $nr->city;
                                            }

                                            
                                           echo '<tr>
                                           <td >'.$fname.'. '.$lname.'.</td>
                                           <td>'.$trow['time'].'M</td>
                                           <td>'.$trow['rate'].'%</td>
                                           <td>Rs. '.$trow['lend_amount'].'</td>
                                           <td>'.$city.'</td>
                                           </tr>';  

                                       }
                                   }

// <td style="opacity:1;"><a id="apptl" style="background:#2c394a;padding:5px;color:#fff;font-size:12px;" href="">LEND <i class="fa fa-chevron-// right"></i></a> </td> 

                                    ?>
    								
    								    <style type="text/css">
                                            #example1  a#apptl:hover {
                                                
                                            }
                                        </style>    								

    							</tbody>
    							<!-- <tfoot>
    								<tr>
    									<th>name</th>
    									<th>TENURE</th>
    									<th>WEIGHTED ROI</th>
    									<th>BORROWED</th>
    									<th>PAID</th>
    									<th>PENDING</th>
    								</tr>
    							</tfoot> -->
    						</table>
    					</div>
    					<!-- /.box-body -->
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
    	<!-- DataTables -->
<script src="AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>

    </body>
    </html>