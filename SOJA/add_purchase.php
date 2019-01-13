<!DOCTYPE html>
<html>
<head>
	<title>Add Purchase</title>
</head>
<body>

<?php
$sn = "localhost";
$un = "root";
$pw = "";
$db = "small_scale_retail";

$conn = new mysqli($sn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM users";
$result = $conn->query($query);

$result = $conn->query($query);
  if (!$result) die ($conn->error);
	
		 echo "<table>
		      <tr>
			  <th>Item</th>
			  <th>Availability</th>
			  </tr>";
			  
		$rows = $result->num_rows;
		 for ($j = 0 ; $j < $rows ; ++$j)
		 {
		 $result->data_seek($j);
		 $row = $result->fetch_array(MYSQLI_ASSOC);
		 echo "<tr>";
		 echo '<td>' . $row['roll_no'] . '</td>';
		 echo '<td>' . $row['name'] . '</td>';
		 echo '<td>' . $row['contact_no'] . '</td>';
		 echo '<td>' . $row['amount'] . '</td>';
		 echo '<td>' . $row['lastpaid'] . '</td>';
		 //echo '<td>' . $row['roll_no'] . '</td>';
		 echo '</tr>';
		 }	
		echo "</table>";

		//echo $roll;
		if (isset($_POST["tbpamtb"]))
		{
			$conn = new mysqli($sn, $un, $pw, $db);
			if ($conn->connect_error) die($conn->connect_error);
			$query = "SELECT amount FROM users WHERE roll_no='".$_POST['Roll_number']."'";
			$result = $conn->query($query);
			if (!$result) 
				{
					echo "<script type='text/javascript'>alert('Wrong roll number!');</script>";
					die ($conn->error);
				}	

			$rows = $result->num_rows;
			for ($j = 0 ; $j < $rows ; ++$j)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$amt = $row['amount'];
				$newamt = $amt + $_POST['tbpamt'];
				$query = "UPDATE users SET amount = ' $newamt ' WHERE roll_no='".$_POST['Roll_number']."'";
				$result = $conn->query($query);
				if (!$result) die ($conn->error);
			}

			header("Location:add_purchase.php");		
		}
	

?>

	
	<form method="post" action="" enctype="multipart/form-data">
		<h1>Enter the amount to be paid.</h1>
		Amount to be paid<input type="number" name="tbpamt">
		<br>
		Roll_number: <input type="text" name="Roll_number" id="Roll_number">
		<br>
		<input type="submit" name="tbpamtb">
	</form>
	
		
</body>
</html>






