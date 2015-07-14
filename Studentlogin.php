<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>

#searchClass{
	text-align: center;
}
#curTime, #result {
	text-align: center;
}
#result{
color: red;
}
  img {
        max-height:259px; 
        max-width:250px;
        border-width: 10px;
        border-style:double;
    }
</style>
<script>
    	
    	setInterval(function(){document.getElementById("curTime").innerHTML = new Date()} ,1000);
		
    </script>
</head>
<body>

    <div class="jumbotron">
     <h1 class="text-center">Student</h1>
      <?php
       require_once "tadblogin.php";
     session_start();
      $database=new database();

      $name=$_SESSION["curruser"];

      $database->display($name);
    ?>
    </div>
   <p id="curTime"></p>
   	<form name="inputForm" action="Studentlogin.php" id ="searchClass" onsubmit ="return isValid()" method= "post">
   		Class: (eg: cmsc123)
   		<input type="text" name="className">
     	<input type= "submit" name="search" value="Search Class">
    </form>
    <p id="result"></p>
    
    <div class="container">
    <?php
 	
    $database->displayall();
    ?>
    <form action="myforum.php?" method="post">
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Post Questions">
	</form>
	<?php $_SESSION["thisuser"] = "student"?>
    <form class="form-signin" action="index.php" method="post">
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="logout" value="Logout">
    </form>
     </div>
     <script>
	document.getElementById("result").innerHTML = " <?php 
    $i = 0;
	$tempClass ="";
	$tempTA = "";

	if(isset($_POST["search"])){
		$i++;
		$host = "localhost";
		$user = "tadbuser";
		$password = "tadb";
		$database = "ta_db";
		$mydb = mysqli_connect ( $host, $user, $password, $database );
		if (mysqli_connect_errno ()) {
		die ( mysqli_connect_error () );
		} else {

		}
		
		$className = $_POST["className"];
		$tempClass = $className;
		date_default_timezone_set("America/New_York");
		$curDate = date("l");
		date_default_timezone_set("America/New_York");
		$thisHour = date("H");
		$curDay ="";
		
		if ($curDate == "Monday"){
			$curDay =", monday";
		}else if ($curDate == "Tuesday"){
			$curDay =", tuesday";
		}else if ($curDate == "Wednesday"){
			$curDay =", wednesday";
		}else if ($curDate == "Thursday"){
			$curDay =", thursday";
		}else if ($curDate == "Friday"){
			$curDay =", friday";
		}
		
		
		$getClassQuery = "select username".$curDay." from taclass";
		$result =mysqli_query( $mydb, $getClassQuery );
		$count = 0;
		if ($result){
			if (mysqli_num_rows ( $result ) > 0) {
				while ( $row = mysqli_fetch_array ( $result, MYSQL_ASSOC ) ) {
					if ($curDay != ""){
						$hours = $row[substr($curDay, 2)];
					
						$arryHours = str_split($hours, 2);
						foreach($arryHours as $index=> $oneValue){
							if ($thisHour== $oneValue){
								
								$count++;
							}
						}
					}
				}
				if ($count==0){
					$tempTA = "No teaching assistant is currently available!";
				}else{
					$tempTA = "$count teaching assistant is currently available!";
				}
			} else {
				$tempTA ="aaaNo teaching assistant is currently available!";
			}
		}else{
			$tempTA = "failed";
		}

		mysqli_close($mydb);
	}
	if ($i > 0){
		echo "$tempClass:<br>";
		echo "$tempTA";
	}

?>"

     </script>
     
     <script>
     function isValid(){
		var className = document.forms["inputForm"]["className"].value;
		if (className == ""||className.length > 7 || className.length < 7){
			alert("Invalid class name");
			return false;
		}else{ 
			if (className.substring(0,4) != "cmsc"){
				alert("Invalid class name");
				return false;
			}else{
				if (isNaN(className.charAt(4)) || className.chart(4) ==" "){
					alert("Invalid class name");
					return false;
				}
				if (isNaN(className.charAt(5)) || className.chart(5) ==" "){
					alert("Invalid class name");
					return false;
				}
				if (isNaN(className.charAt(6)) || className.chart(6) ==" "){
					alert("Invalid class name");
					return false;
				}
			}
		}
     }
     </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>