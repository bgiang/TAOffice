<?php
session_start();
$username = $_SESSION["curruser"];
?>
<!DOCTYPE html>
<html>
<head>
<title>DISCUSSION FORUM</title>
<link rel="stylesheet" type="text/css" href="layout.css">
<style>
#botComments{
	text-align: right;
}
#commentTable {
	border-collapse: collapse;
	border-style: hidden;
}
#commentTable td{
	border-style: solid;
	text-align: left;
}
#commentTable th{
	border-style: hidden;
}
 img {
        max-height:75px; 
        max-width:75px;
        border-width: 10px;
        border-style:double;
    }
</style>
</head>
<body>


<div id="forumHeader">
	<h1>Homepage of Computer Science Discussion Forum </h1>
</div>

<div id="logoutSection">
	Today is <?php date_default_timezone_set("America/New_York");
echo $curDate = date("D, F j Y");?> <br><br>
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

<?php
require_once ("connectToForum.php");

$curTopic = $_GET ['topic'];
$currViews = $_GET['view'];

$query = "select username, content, replies from forum where topic='$curTopic'";
$result = mysqli_query ( $mydb, $query );
$postName;
$thisContent;
$numReplies;

if ($result) {
	if (mysqli_num_rows ( $result ) > 0) {
		while ( $row = mysqli_fetch_array ( $result, MYSQL_ASSOC ) ) {
			$postName = $row ["username"];
			$thisContent = $row ["content"];
			$numReplies = $row ["replies"];
		}
	}
}

echo "<b>Question:</b> $curTopic";
echo "<hr>";
$viewQuery = "update forum set views='$currViews' where topic='$curTopic'";
if (mysqli_query ( $mydb, $viewQuery )) {
} else {
	echo "Failed".mysqli_error($mydb);
}
?>
<br>
<?php 
	if(isset($_POST["submit"])){
		$curComments = $_POST["comments"];
		date_default_timezone_set("America/New_York");
		$curDate = date("Y-m-d H:i:s");
		$addCommentsQuery = "insert into comments (topic, commentuser, comment, commentdate)
		values ('$curTopic', '$username', '$curComments','$curDate')";
		if (mysqli_query ( $mydb, $addCommentsQuery )) {
		} else {
			echo "Failed".mysqli_error($mydb);
		}

		$numReplies++;
		$replayLastQuery = "update forum set replies='$numReplies', lastpost='$curDate' where topic='$curTopic'";
		if (mysqli_query ( $mydb, $replayLastQuery )) {
		} else {
			echo "Failed".mysqli_error($mydb);
		}
	
		
	}
	echo "<table id='commentTable' border=1>";
	echo "<col style=width:20%>";
	echo "<tr>";
		
	$getUserQuery = "select username, content, creationtime from forum where topic='$curTopic'";
	$result = $result = mysqli_query ( $mydb, $getUserQuery );
	$thisname ="";
	$thscontent ="";
	$currentTime;
	if ($result){
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row = mysqli_fetch_array ( $result, MYSQL_ASSOC ) ) {
				$thisname= $row["username"];
				$thiscontent=$row["content"];
				$currentTime = $row["creationtime"];
			}
		}
	}
	
	$getImageQuery = "select profilepic from tauser where username = '$thisname'";
	$result = mysqli_query ( $mydb, $getImageQuery );
	if ($result) {
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row = mysqli_fetch_array ( $result, MYSQL_ASSOC ) ) {
			$img =$row["profilepic"];
			if($img!=NULL){
			echo '<th rowspan=2><img src="data:image;base64,'.base64_encode($img).'">';
			echo "<br>$thisname</th>";
			echo "<td><b>$thiscontent</b></td>";
				}else{
						echo '<th rowspan=2><img src="noprofile.gif">';
						echo "<br>$thisname</th>";
						echo "<td><b>$thiscontent</b></td>";
				}
			}
		}
	}
	echo "</tr>";
	echo "<tr>";
	echo "<td ><em>Posted on$currentTime</em></td>";
	echo "</tr>";
	$commentUser ="";
	$thisComt ="";
	$thisDate;
	$getCommentsQuery = "select commentuser, comment, commentdate from comments where topic = '$curTopic'";
	$result = mysqli_query ( $mydb, $getCommentsQuery );
	if ($result) {
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row = mysqli_fetch_array ( $result, MYSQL_ASSOC ) ) {
				echo "<tr>";
				$commentUser = $row["commentuser"];
				$thisComt = $row["comment"];
				$thisDate = $row["commentdate"];
				
				
				$getImageQuery = "select profilepic from tauser where username = '$commentUser'";
				$resultTemp = mysqli_query ( $mydb, $getImageQuery );
				if ($resultTemp) {
					if (mysqli_num_rows ( $result ) > 0) {
						while ( $row = mysqli_fetch_array ( $resultTemp, MYSQL_ASSOC ) ) {
							$img =$row["profilepic"];
							if($img!=NULL){

								echo '<th rowspan=2><img src="data:image;base64,'.base64_encode($img).'">';
								echo "<br>$commentUser</th>";
								echo "<td><b>$thisComt</b></td>";
							}else{
								echo "<th rowspan=2><img src='noprofile.gif'>";
								
								echo "<br>$commentUser</th>";
								echo "<td><b>$thisComt</b></td>";
							}
						}
						echo "</tr>";
						echo "<tr>";
						echo "<td><em>Posted on $thisDate</em></td>";
					}
				}
				echo "</tr>";
			}
		}
	}
	
	echo "</table>";
?>

<div id="botComments">
<form action="topicContent.php?topic=<?php echo urlencode($curTopic)?>&view=
	<?php echo $currViews?>" method="post">
	<br><b>POST YOUR COMMENTS BELOW:</b><br><br>
	<textarea name="comments" rows="10" cols="100">
	</textarea><br>
	<input type="submit" name="submit" value="Submit">
	<input type="reset" value="Clear">
</form>
</div>
<br>
<br>
<div id="forumFooter">
	<p>Copyright &copy; 2015 University of Maryland </p>
</div>
</body>
</html>