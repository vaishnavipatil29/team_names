<?php


$id = $_GET['id'];


include 'settings.php';

  $conc = mysqli_connect("$domainname","$drootname","$dpassword");




$zx = "create database ipd";



if($conc->query($zx)){$_SESSION['c'] = 1 ;
echo "<br>database ipd created successfully<br>";}



$uo = "use ipdr";

mysqli_query($conc,$uo);

$data = "select *  from request1729 where slno = $id";





$result =  mysqli_query($conc,$data);


$rowmat = mysqli_fetch_assoc($result);


$uu =$rowmat['uname'];

$up = $rowmat['upassword'];

$nam = $rowmat['name'];

$ema = $rowmat['email'];

$uo = "use ipd";
mysqli_query($conc,$uo);


$tab="create table $uu(slno bigint,name varchar(120), email varchar(120), address longtext, phone bigint,webpage varchar(120),interests longtext,sent longtext,received longtext)";
$ac = mysqli_query($conc,$tab);







$gen1 = "grant all privileges on ipd.$uu  to '$uu'@'localhost' identified by '$up'";

$ab =  mysqli_query($conc,$gen1);


if($ab && $ac)

{
  $uo = "use ipdr";
  mysqli_query($conc,$uo);

$alp = $uu."match007";
$taba="create table $alp(matches longtext,p bigint)";
$aca = mysqli_query($conc,$taba);
$gen2 = "grant all privileges on  ipd.$alp to '$uu'@'localhost' identified by '$up'";
$ab =  mysqli_query($conc,$gen2);

$update = "update request1729 set status = 'accepted' where slno = $id";


if(mysqli_query($conc,$update)){


  // echo "<br>status updated successfully";

  echo "made & status updated successfully";

}
// $opo = "use ipdr";
// mysqli_query($conc,$opo);
// $exit1 = "\q";
//   mysqli_query($conc,$exit1);
$inn = 0;
  $intr = "insert into lobo(userid,points) values('$uu','$inn')";
   mysqli_query($conc,$intr);




////////////////////////////////////////////////////////////////////////////////
  $nsi = (rand()*rand())*(rand());

  $uo = "use ipd";
  mysqli_query($conc,$uo);


  $inwryt = "insert into $uu values('$nsi','$nam','$ema','','','','','','')";

  mysqli_query($conc,$inwryt);


/////////////////////////////entry in lobo

// $exit1 = "\q";
//  mysqli_query($conc,$exit1);

// include 'settings.php';
// $conc = mysqli_connect("$domainname","$drootname","$dpassword");

// $opo = "use ipdr";
// mysqli_query($conc,$opo);
// // $exit1 = "\q";
// //   mysqli_query($conc,$exit1);
// $inn = 0;
//   $intr = "insert into lobo(userid,points) values($uu,$inn)";
//    mysqli_query($conc,$intr);


   // $conc = mysqli_connect("localhost","$naam","$pass");
   // $uo = "use ipd";
   // mysqli_query($conc,$uo);



//////////////////////////////

}


header("Location: http://localhost//iitdh/pp/adminv.php");







 ?>
