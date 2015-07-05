<?php
	/* Update based on your database and account info */
	$curruser;
	$host = "localhost";
	$user = "tadbuser";
	$password = "tadb";
	$database = "ta_db";

	function checkuser($username,$host,$user,$password,$database){
		$check=false;
		$db_connection = new mysqli($host, $user, $password, $database);
		if ($db_connection->connect_error) {
					die($db_connection->connect_error);
		} else {
					
		}
	
		echo $username;
		$query = "select * from tauser where username='$username'";
			
		$result = $db_connection->query($query);
		if (!$result) {
			die("Insertion failed: " . $db_connection->error);
		} else {
			$num_rows = $result->num_rows;
			
			if($num_rows==0){

				$check= false;
			}else{
				$check= true;
			}
		}
				
		$db_connection->close();
		return $check;
	}
	
?>