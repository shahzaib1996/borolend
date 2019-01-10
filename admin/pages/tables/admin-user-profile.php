<?php

session_start();
if(isset($_SESSION['admin'])) {
  if($_SESSION['admin'] == '@borolend' ) {

  }
  else {
    header('location: alogin.php');
  }
}

include_once 'connect.php';
$id = $_GET['id'];
$type = $_GET['type'];
$uid = $type.$id;
$ufn = '';
$uln = '';
$mobile = '';
$email = '';
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
$l_p = '';
$passport = '';
$b_s = '';
//lender org var
$amount = '';
$firmname = '';
$pc = '';
$cin ='';
$incorp_date = '';
$dfn ='';
$dln ='';
$gen = '';
$radd1 = '';
$radd2 ='';
$rstate = '';
$rcity = '';
$rpin ='';
$cadd1 = '';
$cadd2 ='';
$cstate = '';
$ccity = '';
$cpin ='';
$from = '';
$efn ='';
if(isset($_GET['approve'])) {
	if($type=='li') {
	$query = "UPDATE lender_individual SET verify_status='1' WHERE id='".$id."'";
	mysqli_query($con,$query);
	$gete = $con->query("select * from lender_individual where id='$id'");
	$x = $gete->fetch_object();
	$from = $x->email;
	$efn = $x->fname;
	echo "<script>alert('Registeration Approved')</script>";
	}
	elseif($type=='lo') {
	$query = "UPDATE lender_org SET verify_status='1' WHERE id='".$id."'";
	mysqli_query($con,$query);
	$gete = $con->query("select * from lender_org where id='$id'");
	$x = $gete->fetch_object();
	$from = $x->email;
	$efn = $x->user_fname;
	echo "<script>alert('Registeration Approved')</script>";
	}
	elseif($type=='bi') {
	$query = "UPDATE borrower_individual SET verify_status='1' WHERE id='".$id."'";
	mysqli_query($con,$query);
	$gete = $con->query("select * from borrower_individual where id='$id'");
	$x = $gete->fetch_object();
	$from = $x->email;
	$efn = $x->fname;
	echo "<script>alert('Registeration Approved')</script>";
	}
	elseif($type=='bb') {
	$query = "UPDATE borrower_business SET verify_status='1' WHERE id='".$id."'";
	mysqli_query($con,$query);
	$gete = $con->query("select * from borrower_business where id='$id'");
	$x = $gete->fetch_object();
	$from = $x->email;
	$efn = $x->fname;
	echo "<script>alert('Registeration Approved')</script>";
	}

	// this is your Email address
    // $from = "shahzaibmehfooz_420@yahoo.com"; // this is the sender's Email address
    $subject = "BOROLEND Account Approved";
    $message = "Dear ".$efn."\n Your account has been approved, \n Now You can submit loan application\n Signin >> [Link]";
    // $message2 = "Here is a copy of your message " . $first_name . "\n\n My Message 2";

    $headers = "From:" . $from;
    // $headers2 = "From:" . $to;
    mail($from,$subject,$message,$headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}

if(isset($_GET['reject'])) {
	if($type=='li') {
	$query = "UPDATE lender_individual SET verify_status='0' WHERE id='".$id."'";
	mysqli_query($con,$query);
	echo "<script>alert('Registeration REJECTED')</script>";
	}
	elseif($type=='lo') {
	$query = "UPDATE lender_org SET verify_status='0' WHERE id='".$id."'";
	mysqli_query($con,$query);
	echo "<script>alert('Registeration REJECTED')</script>";
	}elseif($type=='bi') {
	$query = "UPDATE borrower_individual SET verify_status='0' WHERE id='".$id."'";
	mysqli_query($con,$query);
	echo "<script>alert('Registeration REJECTED')</script>";
	}elseif($type=='bb') {
	$query = "UPDATE borrower_business SET verify_status='0' WHERE id='".$id."'";
	mysqli_query($con,$query);
	echo "<script>alert('Registeration REJECTED')</script>";
	}
}

if($type == 'li') {
$setuser = $con->query("select * from lender_individual where id='$id'");
$row = $setuser->fetch_object();
$ufn = $row->fname;
$uln = $row->lname;
$mobile = $row->mobile;
$email = $row->email;
$v_s = $row->verify_status;

$setud = $con->query("select * from lender_profile where uid='$uid'");
$row1 = $setud->fetch_object();
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

}
elseif($type == 'lo') {
$setuser = $con->query("select * from lender_org where id='$id'");
$row = $setuser->fetch_object();
$ufn = $row->user_fname;
$uln = $row->user_lname;
$mobile = $row->mobile;
$email = $row->email;
$v_s = $row->verify_status;
$amount = $row->amount;
$firmname = $row->firm_name;
$pc = $row->pan_card;
$cin =$row->cin;
$incorp_date = $row->incorp_date;
$dfn =$row->dir_fname;
$dln =$row->dir_lname;
$gen = $row->gender;
$radd1 = $row->reg_add1;
$radd2 =$row->reg_add2;
$rstate = $row->state;
$rcity = $row->city;
$rpin =$row->pin_code;
$cadd1 = $row->comm_add1;
$cadd2 =$row->comm_add2;
$cstate = $row->comm_state;
$ccity = $row->comm_city;
$cpin =$row->comm_pincode;

$setud = $con->query("select * from lender_profile where uid='$uid'");
$row1 = $setud->fetch_object();
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
}
elseif($type == 'bi') {
$setuser = $con->query("select * from borrower_individual where id='$id'");
$row = $setuser->fetch_object();
$ufn = $row->fname;
$uln = $row->lname;
$mobile = $row->mobile;
$email = $row->email;
$v_s = $row->verify_status;

$setud = $con->query("select * from borrower_profile where uid='$uid'");
$row1 = $setud->fetch_object();
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
$l_p = $row1->loan_purpose;
$b_s = $row1->bank_statement;
}
elseif($type == 'bb') {
$setuser = $con->query("select * from borrower_business where id='$id'");
$row = $setuser->fetch_object();
$ufn = $row->fname;
$uln = $row->lname;
$mobile = $row->mobile;
$email = $row->email;
$v_s = $row->verify_status;

$setud = $con->query("select * from borrower_profile where uid='$uid'");
$row1 = $setud->fetch_object();
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
$l_p = $row1->loan_purpose;
$b_s = $row1->bank_statement;
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
		<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->
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
	<h1>
		<?php
		if($type=='li'){echo "Individual Lender Profile";}
		elseif($type=='lo'){echo "Organization Lender Profile";}
		elseif($type=='bi'){echo "Individual Borrower Profile";}
		elseif($type=='bb'){echo "Business Borrower Profile";}
		?>
	</h1>
	<br>
	</div>
	<div class="content">
	<div class="col-md-12  first ">
	<br>
	<div class="personal-info">
		<h3>Personal Information</h3>
		<hr>	
		<table class="table tables ">
		<thead>
		<tr>
			<th> </th>
			<th> </th></tr>
		</thead>
			<tbody>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > First Name</td>
					<td><?php echo $ufn;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Last Name</td>
					<td ><?php echo $uln;?></td>
				</tr>
				
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Email</td>
					<td ><?php echo $email;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Mobile</td>
					<td ><?php echo $mobile;?></td>
				</tr>
					<tr style="margin-left:20px;">
					<td style="width:25%; " > Date of Birth</td>
					<td ><?php echo $dob;?></td>
				</tr>
					<tr style="margin-left:20px;">
					<td style="width:25%; " > City</td>
					<td ><?php echo $city;?></td>
				</tr>
					<tr style="margin-left:20px;">
					<td style="width:25%; " > Province</td>
					<td ><?php echo $pro;?></td>
				</tr>
					</tr>
					<tr style="margin-left:20px;">
					<td style="width:25%; " > Home Address</td>
					<td ><?php echo $add;?></td>
				</tr>
					</tr>
					<tr style="margin-left:20px;">
					<td style="width:25%;" > CNIC</td>
					<td ><?php echo $cnic;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%;" > CNIC / Passport</td>
					<td ><img src="../../../passportimg/<?php echo $passport; ?>" class="img-responsive" style="border:2px solid black;width:80%;" onclick="window.open(this.src)"></td>
				</tr>
			</tbody>
		</table>

		</div>
<?php if($type == 'lo') { ?>
<div class="personal-info">
		<h3>Organization Information</h3>
		<hr>	
		<table class="table tables ">
		<thead>
		<tr>
			<th> </th>
			<th> </th></tr>
		</thead>
			<tbody>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Firm Name</td>
					<td><?php echo $firmname;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Director Name</td>
					<td ><?php echo $gen.' '.$dfn.' '.$dln;?></td>
				</tr>
				
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Pan Card</td>
					<td ><?php echo $pc;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >CIN</td>
					<td ><?php echo $cin;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Incorp Date</td>
					<td ><?php echo $incorp_date;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Registered Address 1</td>
					<td ><?php echo $radd1;?></td>
				<?php 
				if($radd2!='') {	
				echo '</tr>
					<tr style="margin-left:20px;">
					<td style="width:25%; " >Registered Address 2</td>
					<td >'.$radd2.'</td>
				</tr>';
				} ?>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >City</td>
					<td ><?php echo $rcity;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Province</td>
					<td ><?php echo $rstate;?></td>
				</tr>
		
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Pin Code</td>
					<td ><?php echo $rpin;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Communication Address 1</td>
					<td ><?php echo $cadd1;?></td>
				<?php 
				if($cadd2!='') {	
				echo '</tr>
					<tr style="margin-left:20px;">
					<td style="width:25%; " >Communication Address 2</td>
					<td >'.$cadd2.'</td>
				</tr>';
				} ?>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >City</td>
					<td ><?php echo $ccity;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Province</td>
					<td ><?php echo $cstate;?></td>
				</tr>
		
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Pin Code</td>
					<td ><?php echo $cpin;?></td>
				</tr>

			</tbody>
		</table>

		</div> <?php } ?>

		<div class="work-info">
		<h3>Work Information</h3>
		<hr>	
		
		<table class="table tables ">
		<thead>
		<tr>
			<th> </th>
			<th> </th></tr>
		</thead>
			<tbody>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Occupation</td>
					<td  ><?php echo $occ;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Organization Name</td>
					<td ><?php echo $oname;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Organization Address</td>
					<td ><?php echo $oadd;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Organization Contact No</td>
					<td ><?php echo $ocontact;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Average Income per Month</td>
					<td ><?php echo $ai;?></td>
				</tr>
				<?php
				if($type=='bi' || $type=='bb') {
				echo '<tr style="margin-left:20px;">
					<td style="width:25%;" >Purpose of Loan</td>
					<td >'.$l_p.'</td>
				</tr>';
				}
				?>

			</tbody>
		</table>
		
		</div>
		
		<div class="bank-info">
		<h3>Bank Account Details</h3>
		<hr>
		<table class="table tables ">
		<thead>
		<tr>
			<th> </th>
			<th> </th></tr>
		</thead>
			<tbody>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Title of Account</td>
					<td  ><?php echo $toa;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > Account No</td>
					<td ><?php echo $ano;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%;" > Bank</td>
					<td ><?php echo $bank;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " >Branch</td>
					<td ><?php echo $branch;?></td>
				</tr>
				<tr style="margin-left:20px;">
					<td style="width:25%; " > City</td>
					<td ><?php echo $bcity;?></td>
				</tr>
				<?php
				if($type=='bi' || $type=='bb') {
				echo '<tr style="margin-left:20px;">
					<td style="width:25%;" > Bank Statement</td>
					<td ><img src="../../../bankstatementimg/'.$b_s.'" class="img-responsive" style="border:2px solid black;width:80%;" onclick="window.open(this.src)"></td>
				</tr>';
				}
				?>
			</tbody>
		</table>
		
		</div>

	
	</div>
	<?php
	if($type=='li' || $type=='lo'){ echo '<a href="lender-registration.php" class="btn btn-primary"><strong>Back</strong></a>';}
	else{echo '<a href="borrower-registration.php" class="btn btn-primary"><strong>Back</strong></a>';}
	?>
						<?php
						if($v_s == '0') {
							echo '<form action="admin-user-profile.php">
								<input type="hidden" name="id" value="'.$id.'" >
								<input type="hidden" name="type" value="'.$type.'" >
<button class="btn btn-success"  id=""  type="submit" name="approve" >
								<strong>Approve</strong>
							</button>
						</form>';
						}
						else {
						echo '<form action="admin-user-profile.php">
								<input type="hidden" name="id" value="'.$id.'" >
								<input type="hidden" name="type" value="'.$type.'" >
<button class="btn btn-danger"  id=""  type="submit" name="reject" >
								<strong>Reject</strong>
							</button>
						</form>';
						}
						?>

 </div>

		</div>

	</div>
	</div>
	</div>
	
		
	</body>
	
	</html>