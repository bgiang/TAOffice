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
    $name=$_SESSION["curruser"];
    $database=new database();
    ?>
    <div class="jumbotron">
      <h1 style="text-align:center"> TA Office Hour</h1>


      <?php $database->display($name)?>

  </div>
  <a button class="btn btn-lg btn-primary btn-block" data-toggle="collapse" href="#class" >
   See Class
</a>

<div id="class" class="collapse">  
    <?php
        if(isset($_POST["Add"])){ 
            if(isset($_POST["Monday"])){
                $monlist=$_POST["Monday"];
                echo "<p>";
                foreach ($monlist as $value) {
                   echo "Monday $value<";
                }
                echo "</p>";
            }
       }
    ?>
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
        <form action="TAlogin.php" method="post">
            <input type="text" name="classname" class="form-control" style="width:500px;margin:auto" placeholder="Name of Class">
            <h2>Monday</h2>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="08">8am-9am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="09">9am-10am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="10">10am-11am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="11">11am-12am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="12">12pm-1pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]"  value="01">1pm-2pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="02">2pm-3pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="03">3pm-4pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Monday[]" value="04">4pm-5pm</label>
            <h2>Tuesday</h2>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="08">8am-9am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="09">9am-10am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="10">10am-11am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="11">11am-12am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="12">12pm-1pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="01">1pm-2pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="02">2pm-3pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="03">3pm-4pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Tuesday[]" value="04">4pm-5pm</label>
            <h2>Wednesday</h2>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="08">8am-9am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="09">9am-10am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="10">10am-11am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="11">11am-12pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="12">12pm-1pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="01">1pm-2pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="02">2pm-3pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="03">3pm-4pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Wednesday[]" value="04">4pm-5pm</label>
            <h2>Thursday</h2>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="08">8am-9am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="09">9am-10am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="10">10am-11am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="11">11am-12pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="12">12pm-1pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="01">1pm-2pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="02">2pm-3pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="03">3pm-4pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Thursday[]" value="04">4pm-5pm</label>
            <h2>Friday</h2>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="08">8am-9am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="09">9am-10am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="10">10am-11am</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="11">11am-12pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="12">12pm-1pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="01">1pm-2pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="02">2pm-3pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="03">3pm-4pm</label>
            <label class="checkbox-inline"><input type="checkbox" name="Friday[]" value="04">4pm-5pm</label>
            <br>
            <br>
             <input class="btn btn-lg btn-primary btn-block" type="submit" name="Add" value="Add Class">
             <br>
        </form>
    </div>
</div>
<form class="form-signin" action="index.php" method="post">
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="logout" value="Logout">
</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>