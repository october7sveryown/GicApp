<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','GIC');
 
$con = mysqli_connect(HOST,USER,PASS,DB);
 


$query="Select event_id,event_name,event_venue,event_date,event_register_link,event_description,event_starttime,event_endtime,event_img from event_details";


$result=mysqli_query($con,$query);

while ($row=mysqli_fetch_assoc($result)) {
    $array[]=$row;
}
 header('Content-Type:Application/json');
 echo json_encode($array);
?>