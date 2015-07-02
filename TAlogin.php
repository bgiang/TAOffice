<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title of the document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>

  <div class="jumbotron">
      <h1 style="text-align:center"> TA Office Hour</h1>
     

         <h2 class="form-signin-heading" style="text-align:center">Full Name</h2>
       
    </div>
         <a button class="btn btn-lg btn-primary btn-block" data-toggle="collapse" href="#class" >
            See Appointment
        </a>

        <div id="class" class="collapse">   
         <ul class="list-group">
          <li class="list-group-item">CMSC389N</li>
          <li class="list-group-item">CMSC216</li>
      </ul>
  </div>
  <a button class="btn btn-lg btn-primary btn-block" data-toggle="collapse" href="#addclass" >
    Add a Class
</a>
<div id="addclass" class="collapse">
    <div class="container">
        <br>
        <form action="index.php">
            <input type="text" id="classname" class="form-control" style="width:500px;margin:auto" placeholder="Name of Class">
            <h2>Monday</h2>
            <label class="checkbox-inline"><input type="checkbox" value="">8am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">9am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">10am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">11am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">12pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">1pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">2pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">3pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">4pm</label>
            <h2>Tuesday</h2>
            <label class="checkbox-inline"><input type="checkbox" value="">8am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">9am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">10am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">11am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">12pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">1pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">2pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">3pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">4pm</label>
            <h2>Wednesday</h2>
            <label class="checkbox-inline"><input type="checkbox" value="">8am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">9am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">10am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">11am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">12pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">1pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">2pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">3pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">4pm</label>
            <h2>Thursday</h2>
            <label class="checkbox-inline"><input type="checkbox" value="">8am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">9am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">10am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">11am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">12pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">1pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">2pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">3pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">4pm</label>
            <h2>Friday</h2>
            <label class="checkbox-inline"><input type="checkbox" value="">8am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">9am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">10am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">11am</label>
            <label class="checkbox-inline"><input type="checkbox" value="">12pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">1pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">2pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">3pm</label>
            <label class="checkbox-inline"><input type="checkbox" value="">4pm</label>

        </form>
    </div>
</div>
 <form class="form-signin" action="index.php" method="post">
<input class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Logout">
</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>