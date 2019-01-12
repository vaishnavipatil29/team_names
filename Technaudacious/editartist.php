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
			$f=$_POST['age'];
			$g=$_POST['gender'];
			$h=$_POST['interest'];
			$i=$_POST['experience'];
			$j=$_POST['free'];
			$k=$_POST['pay'];
			$l=$_POST['availability'];
			$m=$_POST['password'];
			$n=$_POST['sec'];
			$o=$_POST['id'];
			$sql="UPDATE Artists
				SET name='$a',email='$b',mobile='$c',city='$d',state='$e',age='$f',gender='$g',interest='$h',experience='$i',free='$j',pay='$k',availability='$l',password='$m',sec='$n'
				WHERE id='$o';";
			if($myconnection->query($sql)==TRUE)
				header("Location: artist_homepage.html");
			else
				echo "Error: " . $sql . "<br>" . $myconnection->error; 
			$myconnection->close();
		}
	}
?>
	</body>
</html>