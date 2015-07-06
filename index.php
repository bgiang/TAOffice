<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>

    <?php
    require_once "tadblogin.php"; 
    session_start();
    $usererror="";
    if(isset($_POST["logout"])){
        unset($_SESSION["curruser"]);
        unset($_SESSION["type"]);
    }
    if(isset($_SESSION["curruser"])){
        //set type to 0 for student login page
        if($_SESSION["type"]==1){
            header("Location:talogin.php");
        }else{

        }
    }
    $database=new database();
    if(isset($_POST["login"])){

        $username=$_POST["user"];
        $pw=$_POST["password"];
        if($database->verifyuser($username,$pw)==false){
            $usererror="Incorrect username or password";
            
        }else{
            $_SESSION["curruser"]=$username;

            $_SESSION["type"]=1;
            header("Location: talogin.php");
           
        }
    }
    ?>
 	<div class="jumbotron">
      <h1 style="text-align:center"> TA Office System</h1>
     	<form class="form-signin" action="index.php" method="post">
     		<h2 class="form-signin-heading" style="text-align:center">Please sign in</h2>
            <h4 class="text-center">Username</h4>
     		<input type="text" name="user" class="form-control" style="width:500px;margin:auto" placeholder="Username" required>
     	    <h4 class="text-center">Password</h4>
     		<input type="password" name="password" class="form-control" style="width:500px;margin:auto" placeholder="Password" required>
     		<br>
            <h4 class="text-center"><?php echo $usererror?></h4>
     		<input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login">
          
     	</form>
        <a button href="TAsignup.php" class="btn btn-lg btn-primary btn-block">Register as a TA</a>
        <a button href="Studentsignup.php"class="btn btn-lg btn-primary btn-block">Register as a Student</a>

    </div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>