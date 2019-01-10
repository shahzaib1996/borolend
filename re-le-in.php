<?php
// $con = mysqli_connect("localhost","root","","db_cent");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
	
	include_once 'connect.php';
	$fname = $_POST['fname'];
  	$lname = $_POST['lname'];
  	$email = $_POST['email'];
  	$mobile = $_POST['mobile'];
  	$pass = $_POST['pass'];

$e_check1 = $con->query("SELECT * FROM lender_individual WHERE email='$email'");
$e_check2 = $con->query("SELECT * FROM lender_org WHERE email='$email'");
$e_check3 = $con->query("SELECT * FROM borrower_individual WHERE email='$email'");
$e_check4 = $con->query("SELECT * FROM borrower_business WHERE email='$email'");

		if($e_check1->num_rows > 0){
			echo "1 exist";
		}
		elseif($e_check2->num_rows > 0) {
			echo "2 exitst";

		}
		elseif($e_check3->num_rows > 0) {
			echo "3 exitst";
			
		}
		elseif($e_check4->num_rows > 0) {
			echo "4 exitst";
			
		}

		else {
  	$sql = "INSERT INTO `lender_individual` (`fname`,`lname`,`email`,`password`,`mobile`) VALUES ('".$fname."','".$lname."','".$email."','".$pass."','".$mobile."')";
	if(mysqli_query($con,$sql)) {
		header ('location: redirectlogin.html');
	}
	else {
		header ('location: 404.html');	
	}
}
?>