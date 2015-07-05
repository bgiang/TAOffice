<?php
	/* Update based on your database and account info */
	$curruser;
	class database{
		
		public $host = "localhost";
		public $user = "tadbuser";
		public $password = "tadb";
		public $database = "ta_db";
		//Check if user exist in database
		function checkuser($username){
			$check=false;
			$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
						die($db_connection->connect_error);
			} else {
						
			}
		
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

		//Check if user and password match
		function verifyuser($username,$pw){
			$check=false;
			$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
						die($db_connection->connect_error);
			} else {
						
			}
		
			$query = "select * from tauser where username='$username' and password='$pw'";
				
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

		//add a user to the database
		function adduser(){
				$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
						die($db_connection->connect_error);
			} else {
				
			}
			$first=trim($_POST["first"]);
			$last=trim($_POST["last"]);
			$username=trim($_POST["user"]);
			$email=trim($_POST["email"]);
			$pw=trim($_POST["password"]);
			$query = "insert into tauser (first,last,email,username,password) values('$first','$last','$email','$username','$pw')";
				
			$result = $db_connection->query($query);
			if (!$result) {
				die("Insertion failed: " . $db_connection->error);
			} else {
			
			
			}
					
			$db_connection->close();
		}

		//update image user to the database
		function addimage($image){
				$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
						die($db_connection->connect_error);
			} else {
				
			}
			$username=trim($_POST["user"]);
			$imagefile=addslashes((file_get_contents($image)));
			$query="update tauser set profilepic='$imagefile' where username='$username'";
				
			$result = $db_connection->query($query);
			if (!$result) {
				die("Insertion failed: " . $db_connection->error);
			} else {
			
			
			}
					
			$db_connection->close();
		}
		function display($username){
			
			$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
						die($db_connection->connect_error);
			} else {
						
			}
		
			$query = "select * from tauser where username='$username'";
				
			$result = $db_connection->query($query);
			if (!$result) {
				die("Insertion failed: " . $db_connection->error);
			} else {
				$num_rows = $result->num_rows;
				
				if($num_rows==0){

					
				}else{
					for ($row_index = 0; $row_index < $num_rows; $row_index++) {
						$result->data_seek($row_index);
						$row = $result->fetch_array(MYSQLI_ASSOC);
						$first=$row['first'];
						$last=$row['last'];
						$email=$row['email'];

						
					}
					echo "<h2 class='text-center'>$first $last</h2>";
					echo "<h2 class='text-center'>Email: $email</h2>";
					if($row['profilepic']!=NULL){
						$img=$row['profilepic'];
						echo '<img style="display: block;margin-left: auto;margin-right:auto;" 
						src="data:image;base64,'.base64_encode($img).'"">';
					}else{
						echo "<img style=' display: block;margin-left: auto;margin-right:auto;' src='noprofile.gif'>";
					}
				}
			}
					
			$db_connection->close();
			
		}
		// Image upload (not done)
		function imageupload(){

		}
	}
?>