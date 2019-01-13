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
			  <th>Availablity</th>
			  <th>Available</th>
			  <th>Not Available</th>
			  <th>Few Available</th>
			  </tr>";
			  
		 $rows = $result->num_rows;
		 for ($j = 0 ; $j < $rows ; ++$j)
		 {
		 $result->data_seek($j);
		 $row = $result->fetch_array(MYSQLI_ASSOC);
		 echo "<tr>";
		 echo '<td>' . $row['item'] . '</td>';
		 echo '<td>' . $row['avail'] . '</td><td>';
		 echo "<form action='' method='post'>";
		 echo "<input type='submit' name='available' value = 'available'>
		 	   <input type='hidden' name='itemname_a' value='".$row['item']."'></form></td>
		 	   	   <td>
		 	   	   <form action='' method='post'>
				<input type='submit' name='notavailable' value = 'available'>
		 	   <input type='hidden' name='itemname_n' value='".$row['item']."'></form></td>
		 	   <td>
		 	   	   <form action='' method='post'>	
		 	   <input type='hidden' name='itemname_l' value='".$row['item']."'>
		 	   	<input type='submit' name='lessavailable' value = 'availale'></form></td> </tr>";
		 }
		 echo "</table>";
		 $result->close();

	if(isset($_POST["available"]))
	{
		$query = "UPDATE avit SET avail = 2 WHERE item = '". $_POST["itemname_a"]."'";
		$result = $conn->query($query);
		header("Location:retailerlogin.php");		

	}	   

if(isset($_POST["notavailable"]))
	{   

		$query = "UPDATE avit SET avail = 0 WHERE item = '". $_POST["itemname_n"]."'";
		$result = $conn->query($query);
		header("Location: retailerlogin.php");

		
	}
	if(isset($_POST["lessavailable"]))
	{
		$query = "UPDATE avit SET avail = 1 WHERE item = '". $_POST["itemname_l"]."'";
		$result = $conn->query($query);
		header("Location: retailerlogin.php");
		
	}







		 

?>
