<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>

    <div class="jumbotron">
      <h1 style="text-align:center"> Sign up as a Student</h1>
        <form class="form-signin" action="index.php">
            <h2 class="form-signin-heading" style="text-align:center">Please Fill in the form:</h2>
            <input type="text" id="first" class="form-control" style="width:500px;margin:auto" placeholder="First Name">
        
            <input type="text" id="last" class="form-control" style="width:500px;margin:auto" placeholder="Last Name">
        
            <input type="text" id="user" class="form-control" style="width:500px;margin:auto" placeholder="Username">
        
            <input type="text" id="password" class="form-control" style="width:500px;margin:auto" placeholder="Password">
        
            <br>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Signup">
        </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>