<?php
$sn = "localhost";
$un = "root";
$pw = "";
$db = "small_scale_retail";

$conn = new mysqli($sn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM avit";
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
		 echo '<td>' . $row['item'] . '</td>';
		 echo '<td>' . $row['avail'] . '</td>';
		 echo '</tr>';
		 }	
		echo "</table>";
?>
