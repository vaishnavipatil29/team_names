<?php
session_start();

$id = $_GET['id'];
$dbname = "ipdr";
$naam =$_SESSION['usr'];
$pass =$_SESSION['psr'];
$conc = mysqli_connect("localhost","$naam","$pass");
$uo = "use ipdr";

if(isset($_SESSION[$naam.$id]))
{

  echo "<script> alert('one time like only') </script>";

  header("Location: http://localhost//iitdh/pp/userv.php");
exit;
}

$exit1 = "\q";
 mysqli_query($conc,$exit1);

include 'settings.php';
$conc = mysqli_connect("$domainname","$drootname","$dpassword");





 $uo = "use ipdr";
 mysqli_query($conc,$uo);

 // $tab="create table  lobo(userid longtext,points bigint)";
 //
 // $ac = mysqli_query($conc,$tab);

$rss = "select points from lobo where userid = '$id'";

$ree  = mysqli_query($conc,$rss);

$row = mysqli_fetch_assoc($ree);

$new = $row['points'];


$new = $new+1;

echo $id;

$dltu = "update lobo set points = '$new' where userid='$id'";







if(mysqli_query($conc,$dltu) )
{
  $exit1 = "\q";
     mysqli_query($conc,$exit1);



      $conc = mysqli_connect("localhost","$naam","$pass");
      $uo = "use ipd";
      mysqli_query($conc,$uo);

      $_SESSION[$naam.$id] = 1;


header("Location: http://localhost//iitdh/pp/userv.php");
exit;
}
else
{
echo "error ";
}

?>
