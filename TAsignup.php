<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<?php
require_once "tadblogin.php"; 

?>
</head>

<body>
    <?php
    if(isset($_POST["Submit"])){

        $username=$_POST["user"];

        if(checkuser($username,$host,$user,$password,$database)==false){
            echo "User don't exist";
           

        }else{
            echo "User exist";
        }
    }

    ?>
 	<div class="jumbotron">
      <h1 style="text-align:center"> Sign up as a TA</h1>
    </div>
   <div class="container">
    <form action="TAsignup.php" method="post">
            <input type="text" value="fake" name="first" class="form-control" style="width:500px;margin:auto" placeholder="First Name" required>
        
            <input type="text"  value="fake" name="last" class="form-control" style="width:500px;margin:auto" placeholder="Last Name" required>
            <input type="email" value="fake@gma.com" name="email" class="form-control" style="width:500px;margin:auto" placeholder="Password" required>
     		<input type="text" name="user" class="form-control" style="width:500px;margin:auto" placeholder="Username" required>
     	      
     		<input type="text" value="fake" id="password" class="form-control" style="width:500px;margin:auto" placeholder="Password" required>
        
            <br>
            <h2>Profile Image</h2>
            <input type="file" name="img">
            <br>
            
     		<input class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Signup">
     	</form>
 
</div>

<?php


?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->

</body>

</html>