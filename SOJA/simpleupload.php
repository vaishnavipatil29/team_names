<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

 if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
 }
 if ($_FILES["fileToUpload"]["size"] > 102400) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
 }
 if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
 } 
 else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} 
	else {
        echo "Sorry, there was an error uploading your file.";
   }
 }

 $myfile = fopen($target_file, "r") or die ("Unable to open!");
 $filedata =  fread($myfile, filesize($target_file));
 fclose($myfile);
 $filearray1 = preg_split("/[\s]+/", $filedata, 0 , PREG_SPLIT_NO_EMPTY);
 $filearray2[0]="";
 
 echo "<br>";
 
 $wc = count($filearray1);
 
 for ($s=0; $s < $wc; $s++)
	{
		$filearray2[$s] = strtolower($filearray1[$s]);
	}
//$larray[0] = $filearray2[0]
//$k = 1;
//$fq[0]=1;
	
	
	$larray = array_count_values($filearray2);
	
	ksort($larray);
	
	echo "<table>";
	echo "<tr>";
	echo "<th>";
	echo "Word";
	echo "</th>";
	echo "<th>";
	echo "Frequency";
	echo "</th>";
	echo "</tr>";
	
	foreach ($larray as $x => $x_value)
	{	echo "<center>";
		echo "<tr>";
		echo "<td>";
		echo $x;
		echo "</td>";
		echo "<td>";
		echo $x_value;
		echo "</td>";
		echo "</tr>";
		echo "<br>";
		echo "</center>";
	}
	echo "</table>";
 ?> 
