<?php
echo "came";
$target_dir = "unknown_persons/";
$target_file = target_dir."unknown.jpg";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["filesToUpload"]["tmp_name"]);
    if($check == true){
    echo "File is an image -".$check["mine"]. ".";
    $uploadOk = 1;
    }
    else {
    //echo "File is not an image.";
    $uploadOK = 0;
    }
$output = shell_exec("face_recognition --tolerance 0.54 ./known_persons ./unknown_persons | cut -d '. -f2 ");

echo "Is this the correct roll number?";
echo "$output";
echo "<form method='post' action='make_upload.php'>";
echo "<input type='hidden' value=$output name='Roll_number'>";
echo "<input type='submit' value='Confirm'>";
echo "</form>";

echo "<form action='make_upload.php'>";
echo "<input type='submit' value='Reject'> </form>"
}

?>
