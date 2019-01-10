<?php
// $con = mysqli_connect("localhost","root","","db_cent");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
	
	include_once 'connect.php';

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

  	$sql = "INSERT INTO `lender_org` (`amount`,`firm_name`,`pan_card`,`cin`,`incorp_date`,`dir_fname`,`dir_lname`,`gender`,`user_fname`,`user_lname`,`email`,`pass`,`mobile`,`reg_add1`,`reg_add2`,`state`,`city`,`pin_code`,`comm_add1`,`comm_add2`,`comm_state`,`comm_city`,`comm_pincode`) VALUES ('".$amount."','".$firmname."','".$pan_no."','".$cin_no."','".$incorp_date."','".$dir_fname."','".$dir_lname."','".$dir_gender."','".$user_fname."','".$user_lname."','".$email."','".$pass."','".$mobile."','".$add1."','".$add2."','".$state."','".$city."','".$pincode."','".$c_add1."','".$c_add2."','".$c_state."','".$c_city."','".$c_pincode."')";
	if(mysqli_query($con,$sql)) {
		header ('location: redirectlogin.html');
	}
	else {
		header ('location: error.html');	
	}
?>