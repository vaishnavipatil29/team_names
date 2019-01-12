<!DOCTYPE html>
<html>
	<head>
		<title>Create Tables</title>
		<style>
			body
			{
				background-color: pink;
			}
			h1
			{
				color: mediumvioletred;
				text-align: center;
				font-size: 50px;
				font-family: "Lucida Console", Monaco, monospace;
			}
			p
			{
				text-align: center;
				font-family: "Lucida Console", Monaco, monospace;
			}
			table
			{
    				border-collapse: collapse;
			}
			table, td, th
			{
				border: 1px solid mediumvioletred;
			}
			th
			{
				height: 65px;
				font-size: 25px;
				font-family: "Lucida Console", Monaco, monospace;
				background-color: palevioletred;
				color: black;
			}
			td
			{
				height: 50px;
   				font-size: 20px;
				font-family: "Lucida Console", Monaco, monospace;
			}
			tr:nth-child(even){background-color: #ebadc2;}	
			input[type=submit]
			{
   				font-size: 45px; 
				font-family: "Lucida Console", Monaco, monospace;
				background-color: plum;
			}
			input[type=text], select
			{
				font-size: 25px;
			}
		</style>
	</head>
	<body>
		<h1>Creating the tables...</h1>
		<br><br><br>
		<form action="createbdt.php" method="post">
			<p><input type="submit" value="Create the tables"></p>
		</form>
		<br><br><br>
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
					$sql="CREATE TABLE Artists(
					ID int NOT NULL AUTO_INCREMENT,
					name VARCHAR(120),
					email VARCHAR(100),
					mobile VARCHAR(120),
					city VARCHAR(120),
					state VARCHAR(120),
					gender VARCHAR(120),
					age VARCHAR(120),
					interest VARCHAR(120),
					experience VARCHAR(120),
					free VARCHAR(120),
					pay VARCHAR(120),
					availability VARCHAR(120),
					password VARCHAR(120),
					sec VARCHAR(120),
   					primary key (ID)
					);";
					$sql.="CREATE TABLE Finders(
					ID int NOT NULL AUTO_INCREMENT,
					name VARCHAR(120),
					email VARCHAR(100),
					mobile VARCHAR(120),
					city VARCHAR(120),
					state VARCHAR(120),
					gender VARCHAR(120),
					password VARCHAR(120),
					sec VARCHAR(120),
   					primary key (ID)
					);";
					if ($myconnection->multi_query($sql) === TRUE)
					{
    						header("Location:indexbd.php");
					}
					else
    						echo "Error: " . $sql . "<br>" . $myconnection->error;
				}
				$myconnection->close();
			}
		?>
	</body>
</html>