<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title of the document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
  img {
        max-height:259px; 
        max-width:250px;
        border-width: 10px;
        border-style:double;
    }
    </style>
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
            $classname=strtoupper($_POST["classname"]);
            $monday="";
            $tuesday="";
            $wednesday="";
            $thursday="";
            $friday="";
            if(isset($_POST["Monday"])){
                $monlist=$_POST["Monday"];
                foreach ($monlist as $value) {
                   $monday .= $value;
                }
            }else{
                $monday="NA";
            }
             if(isset($_POST["Tuesday"])){
                $monlist=$_POST["Tuesday"];
                
                foreach ($monlist as $value) {
                   $tuesday .= $value;
                }
            }else{
                $tuesday="NA";
            }
             if(isset($_POST["Wednesday"])){
                $monlist=$_POST["Wednesday"];
                foreach ($monlist as $value) {
                   $wednesday.=$value;
                }
            }else{
                $wednesday="NA";
            }
             if(isset($_POST["Thursday"])){
                $monlist=$_POST["Thursday"];
                
                foreach ($monlist as $value) {
                   $thursday.=$value;
                }
            }else{
                $thursday="NA";
            }
             if(isset($_POST["Friday"])){
                $monlist=$_POST["Friday"];
               
                foreach ($monlist as $value) {
                   $friday.=$value;
                }
            }else{
                $friday="NA";
            }
            $database->addclass($name,$classname,$monday,$tuesday,$wednesday,$thursday,$friday);
       }
    ?>
   <?php
        $database->displayclass($name);
   ?>
</div>
<a button class="btn btn-lg btn-primary btn-block" data-toggle="collapse" href="#addclass" >
    Add a Class
</a>
<div id="addclass" class="collapse">
    <div class="container">
        <br>
        <form action="TAlogin.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="classname" id="classname" class="form-control" style="width:500px;margin:auto" placeholder="Name of Class">
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
             <input class="btn btn-lg btn-primary btn-block" type="submit" name="Add"  value="Add Class">
             <br>
        </form>
    </div>
</div>
<form action="myforum.php" method="post">
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Answer Questions">
</form>

<?php $_SESSION["thisuser"] = "ta"?>
<form class="form-signin" action="index.php" method="post">
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="logout" value="Logout">
</form>
<script>
    function validateForm(){
      
        var check=true;
        var i=0;
        var classname=document.getElementById("classname").value;
       
        if(classname.length==7){
            for(i=0;i<4;i++){
                if(isNaN(classname[i])){

                }else{
                    check=false;
                }
            }
            for(i=4;i<7;i++){
                if(isNaN(classname[i])){
                    check=false
                }
            }

        }else if(classname.length==8){
             for(i=0;i<4;i++){
                if(isNaN(classname[i])){

                }else{
                    check=false;
                }
            }
            for(i=4;i<7;i++){
                if(isNaN(classname[i])){
                    check=false;
                }
            }
            if(isNaN(classname['7'])){
                
            }else{
                check=false;
            }
        }else{
           
            check=false;
        }
        if(check==false){
            alert("Not a valid class");
            return false;
        }else{
            return true;
        }
    }
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>