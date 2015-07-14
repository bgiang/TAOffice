<?php
$host = "localhost";
$user = "tadbuser";
$password = "tadb";
$database = "ta_db";
$tableForum = "forum";

$mydb = mysqli_connect ( $host, $user, $password, $database );
if (mysqli_connect_errno ()) {
	die ( mysqli_connect_error () );
} else {
	
}

?>