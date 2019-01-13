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
			  <th>Roll NO.</th>
			  <th>Name</th>
			  <th>Contact</th>
			  <th>Amount</th>
			  <th>Last paid Date</th>
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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Useracc</title>
</head>
<body>
	<form method="post" action="add_purchase.php">
		<button>Add Purchase
		</button>
	</form>

	<form method="post" action="settle.php">
		<button>Settle Up
		</button>
	</form>
</body>
</html>

