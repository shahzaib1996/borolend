<?php
$con = mysqli_connect("localhost","root","","db_cent");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 $email=$_POST['user_email'];

 // $checkdata=" SELECT * FROM lender_individual WHERE email='$email' ";
$e_c1 = $con->query("SELECT * FROM lender_individual WHERE email='$email' ");
$e_c2 = $con->query("SELECT * FROM lender_org WHERE email='$email' ");
$e_c3 = $con->query("SELECT * FROM borrower_individual WHERE email='$email' ");
$e_c4 = $con->query("SELECT * FROM borrower_business WHERE email='$email' ");


 // $query=mysql_query($checkdata);

 if($e_c1->num_rows>0)
 {
  echo "Email already in use...";
 }
 elseif($e_c2->num_rows>0)
 {
  echo "Email already in use...";
 }
 elseif($e_c3->num_rows>0)
 {
  echo "Email already in use...";
 }
 elseif($e_c4->num_rows>0)
 {
  echo "Email already in use...";
 }
 else
 {
  echo "";
 }
 exit();


?>