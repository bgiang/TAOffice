<?php
session_start();
$username = $_SESSION["curruser"];
?>
<!DOCTYPE html>
<html>
<head>
<title>DISCUSSION FORUM</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="layout.css">
<style>
a {
	text-decoration: none;
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
<form  action="myforum.php" method="post">
	<input type="submit" name="search" value = "Search Questions">
	<input type="text" name ="ques" >
</form>


<br>

<table id="allposts">
	<col style=width:10%>
	<col style=width:60%>
	<col style=width:5%>
	<col style=width:5%>
	
	
	<tr>
		<th>Post by</th>
		<th>Questions</th>
		<th>Views</th>
		<th>Replies</th>
		<th>Last Modified</th>
	</tr>
	<?php 
		require_once("connectToForum.php");
		$query = "";
		if (isset($_POST["search"])){
			$tempQues = $_POST["ques"];
			$query = "select username, topic, content, views, replies, lastpost from forum where topic='$tempQues'";
		}else{
			$query = "select username, topic, content, views, replies, lastpost from forum order by lastpost desc";
		}
		$result = mysqli_query($mydb, $query);
		if($result){
			$count = 0;
			if (mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
					$thisTag ="";
					if ($count %2 == 0) {
						$thisTag ="next";
					}
					$parTopic = urlencode($row["topic"]);
					$numV = $row["views"] + 1;
					echo "<tr class=$thisTag>";
					echo "<td>$row[username]</td>";
					echo "<td><a href='topicContent.php?topic=$parTopic&view=$numV'>$row[topic]</a></td>";
					echo "<td>$row[views]</td>";
					echo "<td>$row[replies]</td>";
					echo "<td>$row[lastpost]</td>";
					echo "</tr>";
					$count++;
				}
			}else{
				
			}
		}else{	
			echo "error!";
		}
	?>
</table>

<div id="forumFooter">
	<p>Copyright &copy; 2015 University of Maryland </p>
</div>
</body>
</html>


