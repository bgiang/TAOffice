	<?php
	/* Update based on your database and account info */
	$time["08"]="8am-9am";
	$time["09"]="9am-10am";
	$time["10"]="10am-11am";
	$time["11"]="11am-12pm";
	$time["12"]="12pm-1pm";
	$time["01"]="1pm-2pm";
	$time["02"]="2pm-3pm";
	$time["03"]="3pm-4pm";
	$time["04"]="4pm-5pm";
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
			$first=trim($_POST["first"]);
			$last=trim($_POST["last"]);
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

		function getTA($username){
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

				for ($row_index = 0; $row_index < $num_rows; $row_index++) {
					$result->data_seek($row_index);
					$row = $result->fetch_array(MYSQLI_ASSOC);
					return $row["TA"];
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
			$type=trim($_POST["type"]);
			$query = "insert into tauser (first,last,email,username,password,TA) values('$first','$last','$email','$username','$pw',$type)";

			$result = $db_connection->query($query);
			if (!$result) {
				die("Insertion failed: " . $db_connection->error);
			} else {
				
				
			}

			$db_connection->close();
		}
			//Add class
		function addClass($username,$classname,$m,$t,$w,$th,$f){
			$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
				die($db_connection->connect_error);
			} else {

			}
			$query = "insert into taclass (username,classname,monday,tuesday,wednesday,thursday,friday) values('$username','$classname','$m','$t','$w','$th','$f')";

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

		function displayclass($username){

			$time["08"]="8am-9am";
			$time["09"]="9am-10am";
			$time["10"]="10am-11am";
			$time["11"]="11am-12pm";
			$time["12"]="12pm-1pm";
			$time["01"]="1pm-2pm";
			$time["02"]="2pm-3pm";
			$time["03"]="3pm-4pm";
			$time["04"]="4pm-5pm";
			$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
				die($db_connection->connect_error);
			} else {

			}
			
			$query = "select * from taclass where username='$username'";

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
						$classname=$row["classname"];
						$m=$row["monday"];
						$t=$row["tuesday"];
						$w=$row["wednesday"];
						$th=$row["thursday"];
						$f=$row["friday"];
						echo '<ul class="list-group">';
						echo $classname;
						if(strcmp($m,"NA")==0){

						}else{
							echo '<li class="list-group-item">';
							echo '<ul class="list-group">';
							echo "Monday";
							$date=str_split($m,2);
							foreach ($date as $value) {
								echo '<li class="list-group-item">';
								echo $time[$value];
								echo '</li>';
							}
							echo '</ul>';
							echo '</li>';
						}

						if(strcmp($t,"NA")==0){

						}else{
							echo '<li class="list-group-item">';
							echo '<ul class="list-group">';
							echo "Tuesday";
							$date=str_split($t,2);
							foreach ($date as $value) {
								echo '<li class="list-group-item">';
								echo $time[$value];
								echo '</li>';
							}
							echo '</ul>';
							echo '</li>';
						}

						if(strcmp($w,"NA")==0){

						}else{
							echo '<li class="list-group-item">';
							echo '<ul class="list-group">';
							echo "Wednesday";
							$date=str_split($w,2);
							foreach ($date as $value) {
								echo '<li class="list-group-item">';
								echo $time[$value];
								echo '</li>';
							}
							echo '</ul>';
							echo '</li>';
						}
						if(strcmp($th,"NA")==0){

						}else{
							echo '<li class="list-group-item">';
							echo '<ul class="list-group">';
							echo "Thursday";
							$date=str_split($th,2);
							foreach ($date as $value) {
								echo '<li class="list-group-item">';
								echo $time[$value];
								echo '</li>';
							}
							echo '</ul>';
							echo '</li>';
						}
						if(strcmp($f,"NA")==0){

						}else{
							echo '<li class="list-group-item">';
							echo '<ul class="list-group">';
							echo "Friday";
							$date=str_split($f,2);
							foreach ($date as $value) {
								echo '<li class="list-group-item">';
								echo $time[$value];
								echo '</li>';
							}
							echo '</ul>';
							echo '</li>';
						}
						echo '</ul>' ;


					}
				}
			}

			$db_connection->close();



		}

		function displayall(){
			$time["08"]="8am-9am";
			$time["09"]="9am-10am";
			$time["10"]="10am-11am";
			$time["11"]="11am-12pm";
			$time["12"]="12pm-1pm";
			$time["01"]="1pm-2pm";
			$time["02"]="2pm-3pm";
			$time["03"]="3pm-4pm";
			$time["04"]="4pm-5pm";
			$arrayclassname;
			$taname;
			$taemail;
			$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
				die($db_connection->connect_error);
			} else {

			}
			
			$query = "select DISTINCT classname from taclass order by classname";

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
						$arrayclassname[]=$row["classname"];

					}

				}
			}

			$db_connection->close();

			$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($db_connection->connect_error) {
				die($db_connection->connect_error);
			} else {

			}
			
			$query = "select * from tauser";

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
						$first=$row["first"];
						$last=$row["last"];
						$user=$row["username"];
						$taname[$user]=$first;
						$taname[$user].=" ";
						$taname[$user].=$last;
						$taemail[$user]=$row["email"];

					}

				}
			}

			$db_connection->close();
			if(isset($arrayclassname)){
				foreach($arrayclassname as $value){
					echo '<ul class="list-group">';
					echo '<h2><strong>';
					echo $value;
					echo '</strong></h2>';
					$db_connection = new mysqli($this->host, $this->user, $this->password, $this->database);
					if ($db_connection->connect_error) {
						die($db_connection->connect_error);
					} else {

					}

					$query = "select *  from taclass where classname='$value'";

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
								$user=$row["username"];
								$m=$row["monday"];
								$t=$row["tuesday"];
								$w=$row["wednesday"];
								$th=$row["thursday"];
								$f=$row["friday"];
								echo '<li class="list-group-item">';
								echo '<ul class="list-group">';
								echo "<strong>TA Name:</strong>";
								echo $taname[$user];
								echo " <strong>Email:</strong>";
								echo $taemail[$user];
								if(strcmp($m,"NA")==0){

								}else{
									echo '<li class="list-group-item">';
									echo '<ul class="list-group">';
									echo "Monday";
									$date=str_split($m,2);
									foreach ($date as $value) {
										echo '<li class="list-group-item">';
										echo $time[$value];
										echo '</li>';
									}
									echo '</ul>';
									echo '</li>';
								}

								if(strcmp($t,"NA")==0){

								}else{
									echo '<li class="list-group-item">';
									echo '<ul class="list-group">';
									echo "Tuesday";
									$date=str_split($t,2);
									foreach ($date as $value) {
										echo '<li class="list-group-item">';
										echo $time[$value];
										echo '</li>';
									}
									echo '</ul>';
									echo '</li>';
								}

								if(strcmp($w,"NA")==0){

								}else{
									echo '<li class="list-group-item">';
									echo '<ul class="list-group">';
									echo "Wednesday";
									$date=str_split($w,2);
									foreach ($date as $value) {
										echo '<li class="list-group-item">';
										echo $time[$value];
										echo '</li>';
									}
									echo '</ul>';
									echo '</li>';
								}
								if(strcmp($th,"NA")==0){

								}else{
									echo '<li class="list-group-item">';
									echo '<ul class="list-group">';
									echo "Thursday";
									$date=str_split($th,2);
									foreach ($date as $value) {
										echo '<li class="list-group-item">';
										echo $time[$value];
										echo '</li>';
									}
									echo '</ul>';
									echo '</li>';
								}
								if(strcmp($f,"NA")==0){

								}else{
									echo '<li class="list-group-item">';
									echo '<ul class="list-group">';
									echo "Friday";
									$date=str_split($f,2);
									foreach ($date as $value) {
										echo '<li class="list-group-item">';
										echo $time[$value];
										echo '</li>';
									}
									echo '</ul>';
									echo '</li>';
								}
								echo"</ul>";
								echo '</li>';
								
							}
							
						}
					}
					echo '</ul>';	
					$db_connection->close();

				}
			}

		}
	}
	?>