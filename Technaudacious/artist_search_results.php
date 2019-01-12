<?php
	session_start();
?>
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
			width: 16%;
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

		.back_img1 {
			position: absolute;
			top: 10%;
			left: 0%;
			width: 100%;
			height: 90%;
		}

		.main1{
			position: absolute;
			/*width: 20%*/
			/*height: 10%;*/
			bottom: 20%;
			left: 40%;
			width: 20%;
			height: 10%;
			background-color: #c68d1b;
			font-family: Helvetica;
			font-size: 150%;
			white-space: normal;
		}

		.main2{
			position: absolute;
			/*width: 20%*/
			/*height: 10%;*/
			bottom: 8%;
			left: 40%;
			width: 20%;
			height: 10%;
			background-color: #c68d1b;
			font-family: Helvetica;
			font-size: 150%;
			white-space: normal;
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

		table.box1 {
			position: absolute;
			top: 12%;
			left: 10%;
			height: 35%;
			width: 35%;
			table-layout: auto;
			border: 1px solid black;
			/*padding: 2px solid black;*/
			box-shadow: 5px 10px #434343
		}

		table.box2 {
			position: absolute;
			top: 12%;
			right: 10%;
			height: 35%;
			width: 35%;
			table-layout: auto;
			border: 1px solid black;
			/*padding: 2px solid black;*/
			box-shadow: 5px 10px #434343
		}
		table.box3 {
			position: absolute;
			top: 60%;
			left: 10%;
			height: 35%;
			width: 35%;
			table-layout: auto;
			border: 1px solid black;
			/*padding: 2px solid black;*/
			box-shadow: 5px 10px #434343
		}
		table.box4 {
			position: absolute;
			top: 60%;
			right: 10%;
			height: 35%;
			width: 35%;
			table-layout: auto;
			border: 1px solid black;
			/*padding: 2px solid black;*/
			box-shadow: 5px 10px #434343
		}
		button.reject {
			position: absolute;
			height: 5%;
			width: 15%;
			top: 90%;
			left: 5%;
			background-color: #f00;
			border: 0;
			font-family: "Herculanum";
			color: white;
		}

		button.moreinfo {
			position: absolute;
			height: 5%;
			width: 15%;
			top: 90%;
			right: 42%;
			background-color: #c68d1b;
			border: 0;
			font-family: "Herculanum";
			color: white;
		}
		button.contact {
			position: absolute;
			height: 5%;
			width: 15%;
			top: 90%;
			right: 5%;
			background-color: #17c417;
			border: 0;
			font-family: "Herculanum";
			color: white;
		}
		.artistphoto {
			position: absolute;
			right: 0%;
			top: 0%;
			width: 30%;
			height: 40%;
			/*background-color: #0000ff*/
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
	<?
		$search = $_POST['search'];
	    $mysqli = new mysqli("localhost", "root", "", "A_New_Tinder");
	    $mysqli->query("USE A_New_Tinder");
	    $result = $mysqli->query("SELECT * FROM Artists WHERE Name LIKE \"%" . $search . "%\" OR Email LIKE \"%" . $search . "%\" OR Mobile_Number LIKE \"%" . $search . "%\" OR City LIKE \"%" . $search . "%\" OR State LIKE \"%" . $search . "%\" OR Age LIKE \"%" . $search . "%\" OR Gender LIKE \"%" . $search . "%\" OR Interest LIKE \"%" . $search . "%\" OR Experience LIKE \"%" . $search . "%\" OR Free LIKE \"%" . $search . "%\" OR Pay LIKE \"%" . $search . "%\" OR Availability LIKE \"%" . $search . "%\"");
	        if($result->num_rows > 0)
            {
            	$x = 1;
                while($row = $result->fetch_assoc())
                {
	?>
	<table class = <? echo "\"box".$x."\""; ?>>
		<tr>
			<td>
				<center>
					<image src = <? echo "\"images/" . $row['Image'] . "\""; ?> class = "artistphoto"></image>
				</center>
			</td>
		</tr>
		<tr>
			<td>
				Name:
			</td>
			<td>
				<? echo $row['Name']; ?>
			</td>
		</tr>
		<tr>
			<td>
				Age:
			</td>
			<td>
				<? echo $row['Age'] ?>
			</td>
		</tr>
		<tr>
			<td>
				City:
			</td>
			<td>
				<? echo $row['City']; ?>
			</td>
		</tr>
		<tr>
			<td>
				State:
			</td>
			<td>
				<? echo $row['State']; ?>
			</td>
		</tr>
		<tr>
			<td>
				Interest:
			</td>
			<td>
				<? echo $row['Interest']; ?>
			</td>
		</tr>
		<tr>
			<td>
				Experience:
			</td>
			<td>
				<? echo $row['Experience']; ?>
			</td>
		</tr>
		<tr>
			<td>
				<a href = ""><button class = "reject">Reject</button></a>
			</td>
			<td>
				<a href = <?echo "\"artist_profile_for_finder.php?rid=" . $row['ID'] . "\""?>><button class = "moreinfo">More Info</button></a>
			</td>
			<td>
				<a href = ""><button class = "contact">Contact!</button></a>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
		</tr>
	</table>
	<?$x = $x + 1;
	if ($x > 4) goto a;}a:}?>
	<div class = "header">
		<div id = "background"></div>
			<a href = "artist_homepage.php"><image src = "Aircraft_Carrier_Design.jpg" id = "logo"></image></a>
			<form method = "post" action = "artist_search_results.php"><input id = "search" name="search" type = "text" placeholder = "&#xF002; Enter What you wish to search. "></form>
	</div>
	<div class = "dropdown">
		<button class = "dropbtn">Settings</button>
		<div class = "dropdown-content">
			<a href = "artist_homepage.php">Your Profile</a>
			<a href = "artist_personal_settings.php">Personal Settings</a>
			<a href = "logout_artists.php">Logout</a>
		</div>
	</div>
	<div class = "content">
	</div>
</body>
</html>