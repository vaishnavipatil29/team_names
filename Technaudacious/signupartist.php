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
				/*background-color: plums;*/
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
			$f=$_POST['age'];
			$g=$_POST['gender'];
			$h=$_POST['interest'];
			$i=$_POST['experience'];
			$j=$_POST['free'];
			$k=$_POST['pay'];
			$l=$_POST['availability'];
			$m=$_POST['password'];
			$n=$_POST['sec'];
			$sql1 = "SELECT * FROM Artists WHERE Email='$b';";
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
						$sql="INSERT INTO Artists(Name,Email,Mobile_Number,City,State,Age,Gender,Interest,Experience,Free,Pay,Availability,Password,Security)VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n');";
						if($myconnection->query($sql)==TRUE)
						{
							$sql2="SELECT * FROM Artists WHERE Email='$b';";
							$resul = $myconnection->query($sql2);	
							$row = $resul->fetch_assoc();
							$_SESSION['ID'] = $row['ID'];
							header('Location: artist_newupload.php');
						}	
						else
							echo "Error: " . $sql . "<br>" . $myconnection->error; 
					}

				}
		$myconnection->close();
		}
	}
?>
	</body>
</html>