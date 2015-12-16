<?php
include_once('ez_sql_core.php'); 
include_once('ez_sql_mysql.php'); 
include('conn.php');

$db=&con_db();
echo '<thead>
							  <tr>
								<th>Booking NO</th>
								<th>Boking Date</th>
								<th>Event Date</th>
								<th>Client Name</th>
								<th>Client Address</th>
								<th>Mobile NO</th>
								<th>Booking Time</th>
								<th>Hall Rent</th>
								<th>Amount Paid</th>
								<th>Remaining Amount</th>
							  </tr>
							</thead>
							<tbody>';

	$results = $db->get_results("SELECT * FROM booking_details");
	
		if($results){
				foreach ( $results as $user )
				{
					echo '<tr>';
					echo '<td>'.$user->booking_id.'</td>';
					echo '<td>'.$user->booking_date.'</td>';
					echo '<td>'.$user->event_date.'</td>';
					echo '<td>'.$user->client_name.'</td>';
					echo '<td>'.$user->client_address.'</td>';
					echo '<td>'.$user->client_mobile.'</td>';
					echo '<td>'.$user->event_time.'</td>';
					echo '<td>'.$user->hall_rent.'</td>';
					echo '<td>'.$user->amount_paid.'</td>';
					echo '<td>'.$user->remaining_amount.'</td>';
					echo '</tr>';
				}
		}else{
				
		}
	echo '</tbody>';
?>