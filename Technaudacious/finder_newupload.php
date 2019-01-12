<!DOCTYPE html>
<html>
<head>
	<title>IMAGE UPLOADER</title>
	<script type="text/javascript">
		function Validate(fin)
		{
			if (fin.type == "file")
			{
				var fname = fin.files[0].name;
					if (fname.length > 0)
					{
						var valid = false;
							if (fname.substr(fname.length-3, 3).toLowerCase() == "jpg" || fname.substr(fname.length-4, 4).toLowerCase() == "jpeg")
								valid = true;
							if (!valid)
							{
								alert(fname + " is not an Image\nUpload an Image with .jpg extention");
								fin.value = "";
								return false;
							}
					}
			}
			return true;
		}
		function call_album()
		{
			location.href = 'album.php?index=0';
		}
	</script>
</head>
<body>
	<?php
		echo "<form action=\"finder_upload.php\" method=\"post\" enctype=\"multipart/form-data\">";
			echo "Select an Image to upload :";
			echo "<input type=\"file\" name=\"filetoupload\" id=\"filetoupload\" onchange=\"Validate(this)\">";
			echo "<input type=\"submit\" value=\"Upload Image\" name=\"submit\" id=\"submit\">";
	?>
</body>
</html>