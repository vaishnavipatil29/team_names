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

        .back { 
            position: absolute;
            top: 12%;
            left: 10%;
            width: 40%;
            height: 80%;
        }

        table.form {
            position: absolute;
            top: 20%;
            right: 10%;
            table-layout: fixed;
            width: 20%;
            /*width: 5%;*/
            /*column-width: 250px;*/
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

    </style>
    </head>
    <body>
        <?php
    $search = $_POST['search'];
    $mysqli = new mysqli("localhost", "root", "", "A_New_Tinder");
    $mysqli->query("USE A_New_Tinder");
    $result = $mysqli->query("SELECT * FROM Artists WHERE Name LIKE \"%" . $search . "%\" OR Email LIKE \"%" . $search . "%\" OR Mobile_Number LIKE \"%" . $search . "%\" OR City LIKE \"%" . $search . "%\" OR State LIKE \"%" . $search . "%\" OR Age LIKE \"%" . $search . "%\" OR Gender LIKE \"%" . $search . "%\"");
        echo "
                        <table style='width:100%'>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Mobile number</th>
                                <th>Art</th>
                                <th>Experience</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Showcase for free</th>
                                <th>Payment</th>
                                <th>Availability</th>
                            <tr>";
        if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                        {
                            echo " <tr>
                                    <td style='text-align:center;'>".$row['name']."</td>
                                    <td style='text-align:center;'>".$row['email']."</td>
                                    <td style='text-align:center;'>".$row['mobile']."</td>
                                    <td style='text-align:center;'>".$row['interest']."</td>
                                    <td style='text-align:center;'>".$row['experience']."</td>
                                    <td style='text-align:center;'>".$row['age']."</td>
                                    <td style='text-align:center;'>".$row['gender']."</td>
                                    <td style='text-align:center;'>".$row['city']."</td>
                                    <td style='text-align:center;'>".$row['state']."</td>
                                    <td style='text-align:center;'>".$row['free']."</td>
                                    <td style='text-align:center;'>".$row['pay']."</td>
                                    <td style='text-align:center;'>".$row['availability']."</td>
                                </tr>";
                        }
            }
            echo "</table>";
?>
    </body>
</html>