<?php

      

     $conn=mysqli_connect("localhost","root","","GIC");

	if(!$conn)
	{
		die('Could not connect'.mysql_error());
	}
    $eid=$_POST['event_id'];
	$ename=$_POST['event_name'];
	$evenue=$_POST['event_venue'];
    $edate=$_POST['event_date'];
$estime=$_POST['event_starttime'];
$eetime=$_POST['event_endtime'];
$desc=$_POST['description'];
$imglink=$_POST['imgLINK'];

mysqli_select_db($conn,"GIC");
 $sql = "SELECT event_name FROM `GIC`.`event_details` WHERE event_name = '" . mysqli_real_escape_string($conn,$ename) . "'";
    $result = mysqli_query($conn,$sql) or die('error');
    $row = mysqli_fetch_assoc($result);


$sql = "UPDATE `GIC`.`event_details` SET event_name='$ename',event_venue='$evenue',event_description='$desc',event_img='$imglink',event_starttime='$estime',event_endtime='$eetime',
event_date='$edate' WHERE event_id='$eid' ";

    	



   if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Event Updated succesfully ! Thank You');document.location='index.php';</script>";
} else {
 echo "Error updating record: " . $conn->error;
}



    
?>