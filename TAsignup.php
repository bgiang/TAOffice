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
    $usererror="";
    $fileerror="";
    $database=new database();
    if(isset($_POST["Submit"])){

        $username=$_POST["user"];

        if($database->verifyuser($username)==false){
            $usererror="";


            $database->adduser();
            header("Location: signupconfirm.html");

        }else{
            $usererror="this user existed already";
           
        }
    }

    ?>
 	<div class="jumbotron">
      <h1 style="text-align:center"> Sign up as a TA</h1>
    </div>
   <div class="container">
    <form action="TAsignup.php" method="post">
            <h4 class="text-center">First Name</h4>
            <input type="text" name="first" class="form-control" style="width:500px;margin:auto" placeholder="First Name" required>
            <h4 class="text-center">Last Name</h4>
            <input type="text" name="last" class="form-control" style="width:500px;margin:auto" placeholder="Last Name" required>
            <h4 class="text-center">Email</h4>
            <input type="email"  name="email" class="form-control" style="width:500px;margin:auto" placeholder="Password" required>
     		<h4 class="text-center">Username</h4>
            <input type="text" name="user" class="form-control" style="width:500px;margin:auto" placeholder="Username" required>
     	    <p class="text-center"><?php echo  $usererror; ?></p>  
            <h4 class="text-center">Password</h4>
     		<input type="password"  name="password" class="form-control" style="width:500px;margin:auto" placeholder="Password" required>
        
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