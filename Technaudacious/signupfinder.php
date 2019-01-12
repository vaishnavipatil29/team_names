<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			body
			{
				/*background-color: pink;*/
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
		<?
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$mydatabase="A_New_Tinder";
		$myconnection = new mysqli("localhost", "root", "", "A_New_Tinder");
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
			$sql1 = "SELECT * FROM Finders WHERE Email='$b';";
				if ($myconnection->query($sql1) == TRUE)
				{
					$result = $myconnection->query($sql1);
					if ($result->num_rows > 0)
					{
    						echo " Already signed up";  
							session_destroy(); 						
					}
					else
					{
						$sql="INSERT INTO Finders(Name,Email,Mobile_Number,City,State,Gender,Password,Security) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h')";
						if($myconnection->query($sql)==TRUE)
						{
							$sql2="SELECT * FROM Finders WHERE Email='$b';";
							$resul = $myconnection->query($sql2);	
							$row = $resul->fetch_assoc();
							$_SESSION['ID'] = $row['ID'];
							echo $_SESSION['ID'];
							header('Location: finder_newupload.php');
						}
						else
							echo "Error: " . $sql . "<br>" . $myconnection->error; 
					}
				}
				else
					echo "Error: " . $sql1 . "<br>" . $myconnection->error;
		$myconnection->close();
		}
	}
?>
	</body>
</html>