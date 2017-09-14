<?php
require("/PHPMailer-master/PHPMailerAutoload.php");
/**
 * This example shows sending a message using a local sendmail binary.
 */
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','GIC');
 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$email=$_REQUEST['email'];

$query="Select email_id from user_details where email_id='$email'";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$str = $row['email_id'];

if(!isset($str)){
  echo 'Email not found';
}
else{

$six_digit_random_number = mt_rand(100000, 999999);
$query="UPDATE user_details SET password='$six_digit_random_number' WHERE email_id='$str'";
  mysqli_query($con,$query);  
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "officialgicapp@gmail.com";
$mail->Password = "weareone";
$mail->SetFrom("officialgicapp@gmail.com");
$mail->Subject = 'Temporary Password';
$mail->Body    = 'Hello,<br>Your&nbsp;<b>Temporary password:'.$six_digit_random_number.'</b><br>Kindly reset it after one-time use.<br><br>Regards,<br><b>Team GIC</b>';
$mail->AddAddress($str);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
}

    ?>