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
$results = $db->get_results("SELECT * FROM booking_details");

if($results){
				foreach ( $results as $user )
				{
				$time = strtotime($user->booking_date);
				$newformat = date('Y-m-d',$time);

				$dates[] = array(
            'date' => $newformat,
            'badge' => false,
            'title' => 'Example for ' . $newformat,
            'body' => '<p class="lead">Information for this date</p><p>You can add <strong>html</strong> in this block</p>',
            'footer' => 'Extra information',
        );

        if (!empty($_REQUEST['grade'])) {
            $dates[]['badge'] = false;
            $dates[]['classname'] = 'grade-' . rand(1, 4);
        }

        if (!empty($_REQUEST['action'])) {
            $dates[]['title'] = 'Action for ' . $newformat;
            $dates[]['body'] = '<p>The footer of this modal window consists of two buttons. One button to close the modal window without further action.</p>';
            $dates[]['body'] .= '<p>The other button [Go ahead!] fires myFunction(). The content for the footer was obtained with the AJAX request.</p>';
            $dates[]['body'] .= '<p>The ID needed for the function can be retrieved with jQuery: <code>dateId = $(this).closest(\'.modal\').attr(\'dateId\');</code></p>';
            $dates[]['body'] .= '<p>The second argument is true in this case, so the function can handle closing the modal window: <code>myFunction(dateId, true);</code></p>';
            $dates[]['footer'] = '
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="dateId = $(this).closest(\'.modal\').attr(\'dateId\'); myDateFunction(dateId, true);">Go ahead!</button>
            ';
        }
				
				}
		}else{
				
		}
    echo json_encode($dates);

