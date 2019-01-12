<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>A New Tinder!</title>
	<style>
		body {
			margin: 0px;
			/*margin-right: 5px;*/
		}
		.header {
			/*position: fixed;*/
			height: 10%;
			width: 100%;
			top: 0px;	
			z-index: 3;		
		}
		.header #background, .header #labels {
			position: absolute;
			/*background-color: white;*/
			/*padding: 0 0 5%;*/
			width: 100%;
			height: 100%;
			background-size: 100%;
			/*margin-right: auto;*/
			/*margin-left: auto;*/
		}

		.header #labels {
			position: fixed;
			background-color: transparent;
			color: #006793;
		}

		.header #background {
			position: absolute;
			background-color: darkblue;
			height: 10%;
			width: 100%;
			opacity: 0.6;
		}

		.header #search {
			position: fixed;
			width: 30%;
			height: 7%;
			left: 35%;
			top: 1.5%;
			background-color: #f29b9b;
			opacity: 0.5;
		}

		.header #logo {
			position: fixed;
			/*margin-top: 1.5%*/
			/*margin-left: 5%;*/
			left: 1.5%;
			top: 1.5%;
			width: 12%;
			height: 7%;
			margin-left: auto;
			margin-right: auto;
		}

		.header #login {
			position: fixed;
			right: 1.5%;
			top: 2%;
			width: 5%;
			height: 7%;
			margin-left: auto;
			margin-right: auto;
		}

		.dropbtn {
			position: fixed;
			right: 1.5%;
			top: 1.5%;
			width: 7%;
			height: 7%;
			margin-left: auto;
			margin-right: auto;
			cursor: pointer;
			font-size: 120%;
			font-family: "Herculanum";
		}

		.dropdown {
			/*right: 0;*/
			background-color: : #006793;
		    position: relative;
		    display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: fixed;
			right: 1.5%;
			top: 8.5%;
			margin-right: auto;
			background-color: green;
			border: 1px;
			border-color: black
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
			/*right: 10%;*/
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
			font-family: "Herculanum";
		}

		.dropdown-content a:hover {background-color: #fff;}

		.dropdown:hover .dropdown-content {display: block;}

		.dropdown:hover .dropbtn {background-color: #006793;}

		.content{
		    width:100%;
	    	height:5000px;
	    	background-color:#005b8e;
		}

		input::-webkit-input-placeholder {
		    font-size: 20px;
		    line-height: 3;
		    font-family: Herculanum;
		}

		input.empty {
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-decoration: inherit;
		}

		table.second {
			position: absolute;
			top: 110%;
			left: 10%;
			table-layout: fixed;
			width: 70%;
			font-size: 200%;
		}

		table.form {
			position: absolute;
			top: 20%;
			right: 20%;
			table-layout: auto;
			font-size: 200%;
			width: 25%;
			/*column-width: 250px;*/
		}

		.artistphoto {
			position: absolute;
			left: 20%;
			top: 20%;
			width: 20%;
			/*height: 50%;*/
		}
		.arrow_down {
			position: absolute;
			bottom: 0%;
			left: 50%;
			margin-top: 0;
			margin-left: -3%; 
			width: 0;
			height: 0;
			border-left: 50px solid transparent;
			border-right: 50px solid transparent;
			border-top: 50px solid #bcbcbc;
			opacity: 0.5;
		}


	</style>
	<!-- <script type="text/javascript" src="./lib/jquery-3.3.1.min.js"></script> -->
	<script type="text/javascript">
		function an_alert() {
			alert("Hi")
		}
		function go_below() {
			var height = window.screen.availHeight;
			// alert (height);
			// document.getElementById("goto").scrollIntoView();
			window.scrollTo(0, height);
			// for (i = 0; i < 500; i++) {
			// 	window.scrollTo(0, 1);
			// 	sleep(1);
			// }
		}


	</script>
</head>
<body bgcolor = "#006973">
	<?php
		$a=$_GET['rid']//see
		require("logincredentials.php");
				$mydatabase = "A_New_Tinder";
				$myconnection = new mysqli($servername, $username, $password, $mydatabase);
				if ($myconnection->connect_error)
					die("Connection failed: " . $myconnection->connect_error);
				$sql = "SELECT * FROM Artists
						WHERE ID='$a';";
				if ($myconnection->query($sql) == TRUE)
				{
					$result = $myconnection->query($sql);
					$row = $result->fetch_assoc();
				}
				else
						echo "Error: " . $sql . "<br>" . $myconnection->error;
	?>
	<div class = "header">
		<div id = "background"></div>
			<a href = "finder_homepage.html"><image src = "Aircraft_Carrier_Design.jpg" id = "logo"></image></a>
			<form method = "post" action = ""><input id = "search" type = "text" placeholder = "&#xF002; Enter What you wish to search. "></form>
	</div>
	<div class = "dropdown">
		<button class = "dropbtn">Settings</button>
		<div class = "dropdown-content">
			<a href = "finder_homepage.html">Your Profile</a>
			<a href = "finder_personal_details.html">Personal Settings</a>
			<a href = "index.html">Logout</a>
		</div>
	</div>
	<image src = "ArtistImage.jpg" class = "artistphoto"></image>
	<table class = "form">
 		<!-- <col width="130"> -->
		<tr>
			<td>
				Name: 
			</td>
			<td>
				<p id = "Name"><? echo $row["name"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				Age: 
			</td>
			<td>
				<p id = "Age"><? echo $row["age"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				City: 
			</td>
			<td>
				<p id = "City"><? echo $row["city"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				State: 
			</td>
			<td>
				<p id = "State"><? echo $row["state"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				Interest: 
			</td>
			<td>
				<p id = "Interest"><? echo $row["interest"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				Experience: 
			</td>
			<td>
				<p id = "Experience"><? echo $row["experience"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				Gender: 
			</td>
			<td>
				<p id = "Gender"><? echo $row["Gender"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				Willing to showcase for free: 
			</td>
			<td>
				<p id = "Gender"><? echo $row["Gender"]; ?></p>
			</td>
		</tr>
		<tr>
			<td>
				Fee charged: 
			</td>
			<td>
				<p id = "Gender"><? echo $row["Gender"]; ?></p>
			</td>
		</tr>

	<div class = "arrow_down" onmouseover = "go_below()"></div>

	<table class = "second">
		<tr>
			<td>
				Links which the artist has shared: 
			</td>
			<td>
				ArtistLinks
			</td>
		</tr>
		<tr>
			<td>
				Media which the artist has shared: 
			</td>
			<td>
				ArtistMedia
			</td>
		</tr>
	</table>

	<div class = "content">
	</div>
</body>
</html>