<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','GIC');
 
$con = mysqli_connect(HOST,USER,PASS,DB);
 


$email=$_REQUEST['email'];
$password=$_REQUEST['newpassword'];
$query="Select email_id,password from user_details where email_id='$email'";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$str = $row['email_id'];
$str1 = $row['password'];
if(!isset($str)){
  echo 'Email not found';
}
else{
$query="UPDATE user_details SET password='$password' WHERE email_id='$str'";
  mysqli_query($con,$query);
echo 'Password Changed Successfully';
}