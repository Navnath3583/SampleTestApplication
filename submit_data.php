<?php
include_once('ez_sql_core.php'); 
include_once('ez_sql_mysql.php'); 
include('conn.php');

$bookingDate=$_POST["bookingDate"];
$eventDate=$_POST["eventDate"];
$eventUserName=$_POST["eventUserName"];
$eventUserAddress=$_POST["eventUserAddress"];
$clientMobileNo=$_POST["clientMobileNo"];
$eventTime=$_POST["eventTime"];
$eventHallRent=$_POST["eventHallRent"];
$eventPaidAmount=$_POST["eventPaidAmount"];
$eventRemainingAmount=$_POST["eventRemainingAmount"];

$db=&con_db();
	$db->query("INSERT INTO booking_details(booking_date,event_date,client_name,client_address,client_mobile,event_time,hall_rent,amount_paid,remaining_amount) VALUES 
('$bookingDate','$eventDate','$eventUserName','$eventUserAddress','$clientMobileNo','$eventTime','$eventHallRent','$eventPaidAmount','$eventRemainingAmount')");
	
	/*$results = $db->get_results("SELECT max(upi_id) as upi_id FROM user_profileimages where ad_id='$user_id'");
		if($results){
			foreach ( $results as $user )
			{
			$max_no=$user->upi_id;
			}
		}else{
			$max_no=0;	
		}*/

?>