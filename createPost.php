<?php
session_start();
$username = $_SESSION["curruser"];
date_default_timezone_set("America/New_York");
$curDate = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html>
<head>
<title>Creating a Post</title>
<link rel="stylesheet" type="text/css" href="layout.css">
<style>
#askQuestion{
	text-align: center;
}

</style>
</head>
<body>

<div id="forumHeader">
	<h1>Homepage of Computer Science Discussion Forum </h1>
</div>

<div id="logoutSection">
	Today is <?php date_default_timezone_set("America/New_York");
echo date("D, F j Y");?> <br><br>
Welcome <?php echo $username ?>, <a href="goToIndex.php">Logout</a>
</div>

<div id = "navg">
<ul>
	<li><a href= "myforum.php">HOME</a> </li>
	<li> <a href= <?php if ($_SESSION["thisuser"]== "ta"){echo "talogin.php";}else{echo "Studentlogin.php";} ?> > TA Office Hours </a></li>
	<li> <a href= "createPost.php">ASK A QUESTION</a> </li>
</ul>
</div>
<br>

<div id = "askQuestion">
<?php
$url = $_SERVER["REQUEST_URI"];
$tempCreate = <<< DATA
<form action=$url method = post>
	<strong>Topic:</strong>
	<input type="text" name = "topic" size="50"><br><br>
	<strong>Description</strong>: <br>
	<textarea name='curcontent'rows= "20" cols= "100">
	</textarea><br>
	<input type="submit" name = "create" value="Create">
	<input type="reset" value="Reset">
</form>
DATA;
echo $tempCreate;
if (isset($_POST["create"])){
	require_once("connectToForum.php");
	$topic =$_POST['topic'];
	$curContent = $_POST['curcontent'];
	$numView = 0;
	$numReplies = 0;
	$query = "insert into $tableForum (username, topic, content, views, replies, lastpost, creationtime) 
	values('$username', '$topic', '$curContent', '$numView', '$numReplies', '$curDate', '$curDate')";
	if (mysqli_query($mydb, $query)){
		echo "<br><strong><em>YOUR QUESTION IS NOW POSTED!</em></strong>";
	}else{
		echo "Failed".mysqli_error($mydb);
	}
}

?>
</div>
<br><br>
<div id="forumFooter">
	<p>Copyright &copy; 2015 University of Maryland </p>
</div>
</body>
</html>
