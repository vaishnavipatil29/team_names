<html>

<head>
	<title> Photo Upload </title>

	<!--<script>
		
		function checkex()
		{
			var t = document.getElementById("fileToUpload").value;
			var p = t.match(/.jpg$/g);
			
			if (p==null)
			{
				alert("Not a .jpg file. Upload failed.");
				return false;
			}
			
			else 
			{
				return true;
			}
		}
	</script>-->
</head>

<body>
<form action="mladd.php" method="post" enctype="multipart/form-data" >
<input type="file" name="fileToUpload" id="fileToUpload">
<button>Submit</button>
</form>
<form action="add_purchase.php" >
	<button>Without Face Recognition</button>

</body>
</html>
