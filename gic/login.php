<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username = $_POST['email'];
		$password = $_POST['password'];
		
		require_once('dbConnect.php');
		
		$sql = "select email_id,password from user_details where email_id='$username' and password='$password'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		if(isset($check)){
			echo "success";
		}else{
			echo "Invalid Username or Password";
		}
		
	}else{
		echo "error try again";
	}
?>