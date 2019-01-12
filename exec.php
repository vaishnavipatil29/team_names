<?php
	$cmd1 = "cd /Users/saianuroopkesanapalli/Sites";	// change this directory according to your OS
	exec(escapeshellcmd($cmd1),$output1,$status1);
	if($status1)
	{
		echo "Command 1 failed!";
		echo"<br>";
	}

	$cmd2 = "make";
	exec(escapeshellcmd($cmd2),$output2,$status2);
	if($status2)
	{
		echo "Command 2 failed!";
		echo"<br>";
	}
	$cmd3 = "./my_client 10.196.2.10";	// change this to server's IP address
	exec(escapeshellcmd($cmd3),$output3,$status3);
	if($status3)
	{
		echo "Command 3 failed!";
	}
?>
