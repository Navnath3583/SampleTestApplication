<?php
function &con_db(){
$host = $_SERVER['SERVER_NAME'];
$document_root = $_SERVER['DOCUMENT_ROOT'];
$db = new ezSQL_mysql('u642245358_root','A@m#ol12524','u642245358_book','localhost');
return $db;
}	
?>