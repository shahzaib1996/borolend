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


  	$sql = "INSERT INTO `borrower_individual` (`fname`,`lname`,`email`,`pass`,`mobile`) VALUES ('".$fname."','".$lname."','".$email."','".$pass."','".$mobile."')";
	if(mysqli_query($con,$sql)) {
		header ('location: redirectlogin.html');
	}
	else {
		header ('location: error.html');	
	}
?>