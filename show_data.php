<?php
/**
 * Example of JSON data for calendar
 *
 * @package zabuto_calendar
 */

include_once('ez_sql_core.php'); 
include_once('ez_sql_mysql.php'); 
include('conn.php');


//echo "sql="."insert into booking_details('booking_title','booking_date') values('$title','$dateval')";

$db=&con_db();
	//$db->query("INSERT INTO booking_details(booking_title,booking_date) VALUES ('$title','$dateval')");



	$results = $db->get_results("SELECT * FROM booking_details");
	
		if($results){
				foreach ( $results as $user )
				{
				$time = strtotime($user->event_date);
				$newformat = date('Y-m-d',$time);

				$dates[] = array(
					'date' => $newformat,
					'badge' => true,
					'title' => 'Booking Date: ' . $newformat,
					'header'  => 'sample header',
					'body' => '
					<table class="table table-bordered" id="bookingTable" name="bookingTable">
							<thead>
							  
							</thead>
							<tbody>
								<tr><td>Booking Date</td><td><strong><strong>'.$user->booking_date.'</strong></td></tr>
								<tr><td>Event Date</td><td><strong>'.$user->event_date.'</strong></td></tr>
								<tr><td>Client Name</td><td><strong>'.$user->client_name.'</strong></td></tr>
								<tr><td>Client Address</td><td><strong>'.$user->client_address.'</strong></td></tr>
								<tr><td>Mobile NO</td><td><strong>'.$user->client_mobile.'</strong></td></tr>
								<tr><td>Booking Time</td><td><strong>'.$user->event_time.'</strong></td></tr>
								<tr><td>Hall Rent</td><td><strong>'.$user->hall_rent.'</strong></td></tr>
								<tr><td>Amount Paid</td><td><strong>'.$user->amount_paid.'</strong></td></tr>
								<tr><td>Remaining Amount</td><td><strong>'.$user->remaining_amount.'</strong></td></tr>
								
							</tbody>
					</table>
					',
					'footer' => '
					<button type="button" class="btn btn-danger"
						data-dismiss="modal">Close</button>
					',
					);
				}
		}else{
				
		}
		
 echo json_encode($dates);
 
?>