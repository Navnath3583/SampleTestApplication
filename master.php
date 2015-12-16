<?php
include_once('ez_sql_core.php'); 
include_once('ez_sql_mysql.php'); 
$host = $_SERVER['SERVER_NAME'];
$document_root = $_SERVER['DOCUMENT_ROOT'];
$db = new ezSQL_mysql('root','','mymasterstu','localhost');

$user_id=3;
$currentDate="2015-10-16";
$online_users = array();
$results2 = $db->get_results('select at_id from admin where ad_id='.$user_id.'');	
		if($results2){
				foreach ( $results2 as $user2 )
				{
					$at_id=$user2->at_id;
					//$online_users[]=$at_id;
					//echo "id=".$at_id;
				}
		}else{
		}		
	
$results = $db->get_results('select c.ucn_id,c.ucn_from,c.ucn_to from user_connections c where c.ucn_status=1 and ucn_from='.$user_id.' and "2015-10-15" in (select ucd_date from user_connection_dates where ucn_id=c.ucn_id and ucd_status=2)');
	
		if($results){
				foreach ( $results as $user )
				{
					$online_users[]=$user->ucn_id;
					//$online_users[]=$user->ucn_from;
					$online_users[]=$user->ucn_to;
				}
		}else{
				
		}
		
$results1 = $db->get_results('select ad_id from admin where ad_id in( select distinct(ucn_to) from user_connections where ucn_from='.$user_id.' and ucn_status=1 ) and at_id='.$at_id.'');
	
		if($results1){
				foreach ( $results1 as $user1 )
				{
					$online_users[]=$user1->ad_id;					
				}
		}else{
				
		}
		
		foreach ( $online_users as $online ){
			echo $online."</br>";
		}
		echo "size of=".sizeof($online_users);
		
?>