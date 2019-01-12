<!DOCTYPE html>
<html>
	<head>
		<style>
			body
			{
				background-color: pink;
			}
			p
			{
				font-size: 25px;
				text-align: center;
				font-family: "Lucida Console", Monaco, monospace;
			}
			input[type=submit]
			{
   				font-size: 25px; 
				font-family: "Lucida Console", Monaco, monospace;
				background-color: plum;
			}			
		</style>
	</head>
	<body>
		<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		require("logincredentials.php");
		$mydatabase="A_New_Tinder";
		$myconnection=new mysqli($servername,$username,$password,$mydatabase);
		if($myconnection->connect_error)
			die("Connection failed: ".$myconnection->connect_error);
		else
		{
			$a=$_POST['name'];
			$b=$_POST['email'];
			$c=$_POST['mobile'];
			$d=$_POST['city'];
			$e=$_POST['state'];
			$f=$_POST['gender'];
			$g=$_POST['password'];
			$h=$_POST['sec'];
			$i=$_POST['id'];
			$sql="UPDATE Finders
				SET name='$a',email='$b',mobile='$c',city='$d',state='$e',gender='$f',password='$g',sec='$h'
				WHERE id='$i';";
			if($myconnection->query($sql)==TRUE)
				header("Location: finder_homepage.html");
			else
				echo "Error: " . $sql . "<br>" . $myconnection->error; 
			$myconnection->close();
		}
	}
?>
	</body>
</html>