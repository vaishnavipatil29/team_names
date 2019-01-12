<?php

	$inipath = php_ini_loaded_file();

	if ($inipath) 
	{
		echo "<br>";
	} 
	else 
	{
   		echo 'A php.ini file is not loaded';
	}
    $currentDir = getcwd();
    $uploadDirectory = "/var/www/html/";    // change this directory according to your OS

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['mp3']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES["myfile"]["tmp_name"];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));
    
    $uploadPath = $uploadDirectory. basename($fileName); 

    if (isset($_POST['submit'])) 
    {

        if (! in_array($fileExtension,$fileExtensions)) 
        {
            $errors[] = "This file extension is not allowed. Please upload a MP3 file";
            echo "flag 1 error";
        }

        if ($fileSize > 20000000) 
        {
            $errors[] = "This file is more than 20MB. Sorry, it has to be less than or equal to 20MB";
        }

        if (empty($errors)) 
        {
            echo "<br>"; 
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($didUpload) 
            {
            	$cmd2="mv ".$fileName." 1.mp3";
            	exec(escapeshellcmd($cmd2),$output2,$status2);
	            if($status2)
                {
                    echo "Command 2 failed!";
                    echo"<br>";
                }                  
            } 
            else 
            {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        }
        else 
        {
            foreach ($errors as $error) 
            {
     	       echo "oops";
        	    echo $error . "These are the errors" . "\n";
            }
        }
    }
    else 
        echo "submit fault";

?>