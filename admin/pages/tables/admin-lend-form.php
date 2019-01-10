<?php
include_once 'connect.php';
$id = $_GET['id'];
$type = $_GET['type'];
$comid = $type.$id;
$aid = $_GET['loanapp'];
$ufn = '';
$uln ='';
$email ='';
$pro ='';
$city ='';
$atl ='';
$rate ='';
$time ='';
$payment ='';
$purpose ='';
$dd = '';
$from = '';
$efn ='';

if(isset($_GET['approve'])) {
	$query = "UPDATE lend_req SET l_check='1' WHERE lid='".$aid."'";
	mysqli_query($con,$query);
	echo "<script>alert('Loan Request Approved')</script>";

	if($type == 'bi') {
		$gete = $con->query("select * from lender_individual where id='$id'");
		$x = $gete->fetch_object();
		$from = $x->email;
		$efn = $x->fname;
	}elseif($type == 'bb'){
		$gete = $con->query("select * from lender_business where id='$id'");
		$x = $gete->fetch_object();
		$from = $x->email;
		$efn = $x->fname;
	}

	$subject = "LOAN REQUEST";
    $message = "Dear ".$efn."\n Your Lend request has been approved, \n Please contact xyz\n Signin >> [Link]";
    // $message2 = "Here is a copy of your message " . $first_name . "\n\n My Message 2";

    $headers = "From:" . $from;
    // $headers2 = "From:" . $to;
    mail($from,$subject,$message,$headers);
}
if(isset($_GET['reject'])) {
	$query = "UPDATE lend_req SET a_check='0' WHERE aid='".$aid."'";
	mysqli_query($con,$query);
	echo "<script>alert('Loan Request Rejected')</script>";
}



if($type == 'li') {
$setuser1 = $con->query("select * from lender_individual where id='$id'");
$row1 = $setuser1->fetch_object();
$ufn = $row1->fname;
$uln = $row1->lname;
$name = $ufn.' '.$uln;
$mobile = $row1->mobile;
$email = $row1->email;
$setuser2 = $con->query("select * from lender_profile where uid='$comid'");
$row2 = $setuser2->fetch_object();
$city = $row2->pcity;
$pro = $row2->pprovince;
$setuser3 = $con->query("select * from lend_req where lid='$aid'");
$row3 = $setuser3->fetch_object();
$atl = $row3->lend_amount;
$rate = $row3->rate;
$time = $row3->time;
$a_c = $row3->l_check;
$payment = $row3->payment;
$purpose = $row3->purpose;
$dd = $row3->sdate;


}elseif($type=='lo'){
$setuser1 = $con->query("select * from lender_org where id='$id'");
$row1 = $setuser1->fetch_object();
$ufn = $row1->fname;
$uln = $row1->lname;
$name = $ufn.' '.$uln;
$mobile = $row1->mobile;
$email = $row1->email;
$setuser2 = $con->query("select * from lender_profile where uid='$comid'");
$row2 = $setuser2->fetch_object();
$city = $row2->pcity;
$pro = $row2->pprovince;
$setuser3 = $con->query("select * from lend_req where lid='$aid'");
$row3 = $setuser3->fetch_object();
$atl = $row3->lend_amount;
$rate = $row3->rate;
$time = $row3->time;
$a_c = $row3->l_check;
$payment = $row3->payment;
$purpose = $row3->purpose;
$dd = $row3->sdate;

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
		
		<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../dist/css/profile.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
		
        <!-- theme custom -->
		<link rel="stylesheet" href="css/style.css" />
		<!-- edited by huzaifa -->
		<!-- mobile menu -->
		<link rel="stylesheet" href="css/slicknav.css" />

		<link rel="stylesheet" type="text/css" href="css/profile.css">
		
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

		
	</head>
	<body>
	<div class="profile">
	<div class="container"> 
	<div class="row"> 
	<div class="col-md-12 col-xs-12">
	<div class="header-info"> 
	<br>
	<h1>
		Loan Request
	</h1>
	<br>
	</div>
	<div class="content">
	<div class="col-md-12  first ">
	
	
		<br>
		<div class="work-info">
		<h3>User Information</h3>
		<hr>	
		
		<table class="table tables ">
		<thead>
		<tr>
			<th> </th>
			<th> </th></tr>
		</thead>
			<tbody>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Name</td>
					<td  ><?php echo $name;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Email</td>
					<td > <?php echo $email;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Mobile</td>
					<td > <?php echo $mobile;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Province</td>
					<td > <?php echo $pro;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > City</td>
					<td > <?php echo $city;?></td>
				</tr>
				<tr>
					<td>
				<?php
				echo "<a href='admin-user-profile.php?id=".$id."&type=".$type."' class='btn btn-warning'>View Profile</a>";
						?>
					</td>
					</tr>
			</tbody>
		</table>

		</div>
		<br>
		<div class="personal-info">
			<h3>Loan Request Form</h3>
		<hr>
		<table class="table tables ">
		<thead>
		<tr>
			<th> </th>
			<th> </th></tr>
		</thead>
			<tbody>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Amount To Lend</td>
					<td  > <?php echo $atl;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Interest Rate</td>
					<td ><?php echo $rate;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Time</td>
					<td ><?php echo $time;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Payments</td>
					<td > <?php echo $payment;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Prefered Purpose</td>
					<td > <?php echo $purpose;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Submission Date</td>
					<td > <?php echo $dd;?></td>
				</tr>

			</tbody>
		</table>

		</div>	
	</div>
	<a href="lend-request.php" class="btn btn-primary"><strong>Back</strong></a>'
	
		<?php
						if($a_c == '0') {
							echo '<form action="admin-lend-form.php">
								<input type="hidden" name="id" value="'.$id.'" >
								<input type="hidden" name="type" value="'.$type.'" >
								<input type="hidden" name="loanapp" value="'.$aid.'" >

<button class="btn btn-success"  id=""  type="submit" name="approve" >
								<strong>Approve Loan</strong>
							</button>
						</form>';
						}
						else {
// 						echo '<form action="admin-lend-info.php">
// 								<input type="hidden" name="id" value="'.$id.'" >
// 								<input type="hidden" name="type" value="'.$type.'" >
// 								<input type="hidden" name="loanapp" value="'.$aid.'" >

// <button class="btn btn-danger"  id=""  type="submit" name="reject" >
// 								<strong>Reject</strong>
// 							</button>
// 						</form>';
						}
						?>
 </div>

		</div>

	</div>
	</div>
	</div>
	
		
	</body>
	
	</html>