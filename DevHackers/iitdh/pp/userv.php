<html>
<head>
  <body background="18.jpg">
<style type="text/css">
h1 { text-align: center}
h3 { text-align: center}

body {
    background-color: white;
}

input[type=text], select {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 30%;
    background-color: #480000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</body>
</style>
</head>


<form action="userv.php" method="POST">



<input type="submit" name="dm" value="Display Matches" style="color:green" />

</form>






<form action="userv.php" method="POST">
  <input type="submit" name="out" value="logout" style="color:blue" />

<input type="submit" name="clr" value="clear" style="color:blue" />
  <input type="submit" name="dis" value="display profile"  />
  <input type="submit" name="udlt" value="Delete self data & ID" style="color:red" />

</form>

<form action="userv.php"  method="POST" >
  profile:
<input type="text" name="em" placeholder="email"/>
<input type="text" name="cy" placeholder="comapny-nos"/>
<input type="text" name="py" placeholder="phn-nos"/>
<input type="text" name="wy" placeholder="paste complete URL"/>



<input type="submit" name="adda" value="add record"  />
  </form>




  <form action="userv.php"  method="POST" >
[For Best Experience]Please write your objects of interests; your personality traits seperate entery wise ;
personality traits write only as many similar words that descibe truly you from follows :(inventive/curious vs consistent/cautious),(organised/efficient vs easygoing/careless),(outgoing/energetic vs. solitary/reserved),
(friendly/compassionate vs. challenging/detached).
<br>
  <input type="text" name="iy" placeholder="your interests/traits"/>
  <input type="submit" name="ilt" value="add record"  />

    </form>






  <form action="show.php" method="POST">
  <input type="text" name="ema" placeholder="OPTIONAL NAME PATTERN / OR DEFAULT DISPLAY ALL"/>

  <input type="submit" name="dise" value="DISPLAY ALL CURRENT PROFILES"  />
  </form>


  <form action="userv.php"  method="POST" >
    To:
  <input type="text" name="to" placeholder="user_id"/>
Write:
  <input type="text" name="letter" placeholder="write"/>




  <input type="submit" name="sms" value="send"  />
    </form>



    <form action="userv.php"  method="POST" >

    <input type="submit" name="msg" value="inbox"  />
      </form>


      <form action="userv.php"  method="POST" >
    To common forum:
    Write:

    <input type="text" name="subj" placeholder="one word subject without spaces"/>

      <input type="text" name="cletter" placeholder="ask/write"/>

      <input type="submit" name="cms" value="send"  />
        </form>





        <form action="userv.php"  method="POST" >
      From common forum:
      Write keywords of your question:


        <input type="text" name="clok" placeholder="keywords"/>
<input type="submit" name="iii" value="search"  />
          </form>



          <form action="userv.php"  method="POST" >
        Answer on common forum:
        Write subject of the question you want to answer:


        <input type="text" name="sop" placeholder="one word subject without spaces"/>

          <input type="text" name="aletter" placeholder="write"/>



          <input type="submit" name="jjj" value="send"  />
            </form>



            <form action="userv.php"  method="POST" >

            <input type="submit" name="ldr" value="leaderboard"  />
              </form>



<?php
session_start();











if(!isset($_SESSION['loggedinv']))
{

  header("Location: http://localhost//iitdh/pp/usercreate.php");

}


$naam =$_SESSION['usr'];
$pass =$_SESSION['psr'];
 $conc = mysqli_connect("localhost","$naam","$pass");
 $uo = "use ipd";

 mysqli_query($conc,$uo);

if(isset($_POST['dis'])){
  echo "  <br>displaying $naam <br> ";
$t = $_SESSION['tabname'];
$ex= "select * from  $t";
$result1 =  mysqli_query($conc,$ex);
$result2 =  mysqli_query($conc,$ex);

$n1=mysqli_num_rows($result1);

$tab1 = '<table style="width:50%" border="1" bordercolor="green">';
$tab1 .= "<tr><td><b>email</b></td><td><b>address</b></td><td><b>phone</b></td><td><b>webpage</b></td><td><b>interests</b></td></tr>";

$i = 0;
while($i<$n1)
{
 $row = mysqli_fetch_assoc($result1);

$tab1 .= "<tr><td>".$row['email']."</td><td>".$row['address']."</td><td>".$row['phone']."</td><td>".$row['webpage']."</td><td>".$row['interests']."</td><td><a href='delete.php?id=".$row['slno']."'>delete</a> </td></tr>";
  $i =$i+1;
}
$tab1 .="</table>";
$rowforname = mysqli_fetch_assoc($result2);
echo "<b>Name</b>: ".$rowforname['name'];
echo $tab1;
}

if(isset($_POST['adda'])){

$t = $_SESSION['tabname'];
$si= "select * from  $t";
$resultsi =  mysqli_query($conc,$si);
$nsi=mysqli_num_rows($resultsi);
$nsi = ($nsi+1)*(rand());
$email = $_POST['em'];
$comn = $_POST['cy'];
$phon = $_POST['py'];

// $interests = $

$refp1 ="+91836";
$refp2 ="91836" ;
$refp3 ="836" ;


$a = chunk_split($phon,6,"@");
$b = chunk_split($phon,5,"@");
$c = chunk_split($phon,3,"@");

$exploded1 = explode("@",$a);

$exploded2 = explode("@",$b);

$exploded3 = explode("@",$c);

// print_r ($exploded3[0]);
$ln=strlen("$phon");
// echo $ln;


if(  ( ($exploded1[0] == $refp1)&&($ln=="13") ) || ( ($exploded2[0] == $refp2)&&($ln=="12") ) ||  ( ($exploded3[0] == $refp3 )&&($ln=="10") )           )
{
echo 'added';





if($_POST['wy'] == NULL)
{
  $hyperw = "";

}
else {

$url = $_POST['wy'];
$hyperw = "<a href=$url>goto</a>";

}

$t = $_SESSION['tabname'];
$name = "";

$inwryt = "insert into $t values('$nsi','$name','$email','$comn','$phon','$hyperw')";
if(mysqli_query($conc,$inwryt)){echo "<br>added successfully";}



}


else{

  echo "<script>alert('invalid iitdh group code')</script>";

}







// if($_POST['wy'] == NULL)
// {
//   $hyperw = "";

// }
// else {

// $url = $_POST['wy'];
// $hyperw = "<a href=$url>goto</a>";

// }

// $t = $_SESSION['tabname'];
// $name = "";

// $inwryt = "insert into $t values('$nsi','$name','$email','$comn','$phon','$hyperw')";
// if(mysqli_query($conc,$inwryt)){echo "<br>added successfully";}
}




if(isset($_POST['ilt']))
{
$insa = $_POST['iy'];
$t = $_SESSION['tabname'];

$si= "select * from  $t";
$resultsi =  mysqli_query($conc,$si);
$nsi=mysqli_num_rows($resultsi);
$nsi = ($nsi+1)*(rand());

$intr = "insert into $t (slno,interests) values('$nsi','$insa')";
if(mysqli_query($conc,$intr)){echo "<br>added successfully";}

}



if(isset($_POST['udlt']))
{
  echo "";
$o = "\q";


include 'settings.php';
$conc = mysqli_connect("$domainname","$drootname","$dpassword");


if($conc){echo "";}
$uo = "use ipdr";


mysqli_query($conc,$uo);



$update = "update request1729 set requestdeletion = 'yes' where uname = '$naam'";

// echo $naam;


if(mysqli_query($conc,$update))
{
  echo "<br>request updated successfully";






}
  else {echo "error";}


  $o = "\q";
  $conc = mysqli_connect("localhost","$naam","$pass");

  $uo = "use ipd";
  mysqli_query($conc,$uo);

  }



if(isset($_POST['clr'])){
  echo "";
}
if(isset($_POST['out']))
{
session_destroy();
header("Location: http://localhost//iitdh/pp/usercreate.php");

}
// //////////////////////////////////////////////////////////////////////////////////////////
$t = $_SESSION['tabname'];

if(isset($_POST['dm'])){

  $uo = "use ipd";

  mysqli_query($conc,$uo);

  // echo "  <br><b>displaying  profile data</b><br> ";
  $t = $_SESSION['tabname'];
  $ex= "select interests from  $t ";
  $result1 =  mysqli_query($conc,$ex);


  $n1=mysqli_num_rows($result1);



  $i = 0;
  $collc="";

  while($i<$n1)
  {
   $row = mysqli_fetch_assoc($result1);

$collc.=$row['interests']." ";
    $i =$i+1;
  }





$exit1 = "\q";
 mysqli_query($conc,$exit1);


$nmpat = $collc;
$chk = 0;


include 'settings.php';
$conc = mysqli_connect("$domainname","$drootname","$dpassword");


if($conc){echo "ok";}

$eu = "use ipd";
 mysqli_query($conc,$eu);



$ext= "show tables";
$result =  mysqli_query($conc,$ext);
$n=mysqli_num_rows($result);


/////////////////////////////////////////////////////////////////2nd

$io = 0;

while($io<$n)
 {
$r = mysqli_fetch_assoc($result);
$current = $r['Tables_in_ipd'];





$t = $_SESSION['tabname'];

$ex= "select interests from  $current ";
$result1 =  mysqli_query($conc,$ex);


$n1=mysqli_num_rows($result1);



$i = 0;
$collc2="";

while($i<$n1)
{
 $row = mysqli_fetch_assoc($result1);

$collc2.=$row['interests']." ";
  $i =$i+1;
}

$sim = similar_text($collc,$collc2,$perc);

// echo "\n$sim($perc %)";
// echo $collc;
$rrr = $perc*10000000;
$cars[$rrr] = $current;
// echo $io;
// echo " ".$current." ";
$io =$io +1;

}
krsort($cars);

// print_r($cars);


////////////////////////////////////////////////////////////////////////////////////////
// $alp = $t."match007"
//
// $tab="create table $alp(matches longtext)";
// $ac = mysqli_query($conc,$tab);

$alp = $t."match007";

// $iw = 0;
// while($iw<$n)
// {
//
//   $intr = "insert into $alp (matches,p) values('$nsi','$insa')";
//
//     mysqli_query($conc,$inwryt);
//
// $iw = $iw + 1;
// }

$eu = "use ipdr";
 mysqli_query($conc,$eu);
$eu = "truncate $alp";
mysqli_query($conc,$eu);

foreach($cars as $key => $value)
{
// $tabu .="<tr><td>".$key."</td><td>".$value."</td><tr>";

$intr = "insert into $alp (matches,p) values('$value','$key')";

mysqli_query($conc,$intr);





}




$ex= "select * from  $alp";
$result1 =  mysqli_query($conc,$ex);

$n1=mysqli_num_rows($result1);

$tab1 = '<table style="width:50%" border="1" bordercolor="green"  " >';
$tab1 .= "<tr><td><b>user_id</b></td><td><b>match_score</b></td></tr>";

$i = 0;
while($i<$n1)
{
 $row = mysqli_fetch_assoc($result1);

$tab1 .= "<tr><td>".$row['matches']."</td><td>".$row['p']."</td></tr>";
  $i =$i+1;
}
$tab1 .="</table>";
echo $tab1;



// $i = 0;
//
// while($i<$n)
//  {
// $r = mysqli_fetch_assoc($result);
// $current = $r['Tables_in_ipd'];
// $tabname = "select * from $current  where interests like '%$nmpat%'";
// $rendavu =  mysqli_query($conc,$tabname);
// $lar = mysqli_fetch_assoc($rendavu);
// if($lar !== NULL)
// {
// $chk = 1;
// $mat = "select * from $current";
// $resultmat =  mysqli_query($conc,$mat);
// $nmat=mysqli_num_rows($resultmat);
// $tab1 = '<table style="width:50%" border="1" bordercolor="green">';
// $tab1 .= "<tr><td><b>email</b></td><td><b>address</b></td><td><b>phone</b></td><td><b>webpage</b></td><td><b>interests</b></td></tr>";
// $ij = 0;
// while($ij<$nmat)
// {
// $rowmat = mysqli_fetch_assoc($resultmat);
// $tab1 .= "<tr><td>".$rowmat['email']."</td><td>".$rowmat['address']."</td><td>".$rowmat['phone']."</td><td>".$rowmat['webpage']."</td><td>".$rowmat['interests']."</td></tr>";
// $ij =$ij+1;
// }
// $tab1 .="</table>";
// $rowfornamemat = mysqli_fetch_assoc($resultmat);
//
// echo "<b>Name</b>: ".$lar['name']."     "."<b>User Id</b>: ".$current;
// echo "\r\n";
// echo $tab1;
// }
// $i =$i+1;
// }
// if($chk == 0){echo "no matches found, please use appropriate intersts";}

$exit1 = "\q";
 mysqli_query($conc,$exit1);



  $conc = mysqli_connect("localhost","$naam","$pass");
  $uo = "use ipd";

  mysqli_query($conc,$uo);






  // $sim = similar_text('i am intersted in starting a microprcessor fab. inventive organised friendly ','i want to develop microcontrollers. inventive efficient friendly',$perc);
  //
  // echo "\n$sim($perc %)";

}




if(isset($_POST['sms']))
{

$to = $_POST['to'];
$ltt = $_POST['letter'];

$ss = $to.":".$ltt;
$rr = $t.":".$ltt;
$nsi = rand()*rand();
$intr = "insert into $t (slno,sent) values('$nsi','$ss')";

mysqli_query($conc,$intr);


$exit1 = "\q";
 mysqli_query($conc,$exit1);

include 'settings.php';
$conc = mysqli_connect("$domainname","$drootname","$dpassword");
$eu = "use ipd";
 mysqli_query($conc,$eu);
 $nsi = rand()*rand();

 $intr = "insert into $to (slno,received) values('$nsi','$rr')";
 mysqli_query($conc,$intr);


 $exit1 = "\q";
  mysqli_query($conc,$exit1);



   $conc = mysqli_connect("localhost","$naam","$pass");
   $uo = "use ipd";

   mysqli_query($conc,$uo);


}



if(isset($_POST['msg']))
{
  $ex= "select * from  $t";
  $result1 =  mysqli_query($conc,$ex);

  $n1=mysqli_num_rows($result1);

  $tab1 = '<table style="width:50%" border="1" bordercolor="green">';
  $tab1 .= "<tr><td><b>sent</b></td><td><b>received</b></td></tr>";

  $i = 0;
  while($i<$n1)
  {
   $row = mysqli_fetch_assoc($result1);

  $tab1 .= "<tr><td>".$row['sent']."</td><td>".$row['received']."</td><td><a href='delete.php?id=".$row['slno']."'>delete</a> </td></tr>";
    $i =$i+1;
  }
  $tab1 .="</table>";
  // $rowforname = mysqli_fetch_assoc($result2);
  // echo "<b>Name</b>: ".$rowforname['name'];
  echo $tab1;




}




if(isset($_POST['cms']))
{
  $exit1 = "\q";
   mysqli_query($conc,$exit1);

  include 'settings.php';
  $conc = mysqli_connect("$domainname","$drootname","$dpassword");

$opo = "use ipdr";
mysqli_query($conc,$opo);



$tss = $_POST['subj'];
  $tlt = $_POST['cletter'];



  $opo = "create database qa";
  mysqli_query($conc,$opo);


  $opo = "use qa";
  mysqli_query($conc,$opo);

  // if(mysqli_query($conc,$opo)){
  //
  //   echo "posted ";
  // }
  // else {echo "not posted error";}






  $tab="create table $tss (ori longtext,data longtext,postedby longtext)";
  $ac = mysqli_query($conc,$tab);

  $intr = "insert into $tss(ori,data,postedby) values('Q','$tlt','$t')";
   mysqli_query($conc,$intr);




  if($ac)
  {

    echo "posted ";
  }
  else
  {echo "not posted error";}


 $exit1 = "\q";
    mysqli_query($conc,$exit1);



     $conc = mysqli_connect("localhost","$naam","$pass");
     $uo = "use ipd";
     mysqli_query($conc,$uo);







}

if(isset($_POST['iii']))
{
$clo = $_POST['iii'];

$exit1 = "\q";
 mysqli_query($conc,$exit1);

include 'settings.php';
$conc = mysqli_connect("$domainname","$drootname","$dpassword");

$ro = "use qa";
mysqli_query($conc,$ro);

//
// $opo = "create database qa";
// mysqli_query($conc,$opo);
//
//
// $opo = "use qa";
//
// if(mysqli_query($conc,$opo)){
//
//   echo "posted ";
// }
// else {echo "not posted error";}






  $nmpat = $_POST['clok'];
  $chk = 0;
  $ext= "show tables";
  $result =  mysqli_query($conc,$ext);
  $n=mysqli_num_rows($result);
  $i = 0;
  while($i<$n)
   {
  $r = mysqli_fetch_assoc($result);
  $current = $r['Tables_in_qa'];
  $tabname = "select * from $current  where data like '%$nmpat%'";
  $rendavu =  mysqli_query($conc,$tabname);
  $lar = mysqli_fetch_assoc($rendavu);
  if($lar !== NULL)
  {
  $chk = 1;
  $mat = "select * from $current";
  $resultmat =  mysqli_query($conc,$mat);
  $nmat=mysqli_num_rows($resultmat);
  $tab1 = '<table style="width:50%" border="1" bordercolor="green">';
  $tab1 .= "<tr><td><b>Q/A</b></td><td><b>data</b></td><td><b>postedby</b></td></tr>";
  $ij = 0;
  while($ij<$nmat)
  {
  $rowmat = mysqli_fetch_assoc($resultmat);
  $tab1 .= "<tr><td>".$rowmat['ori']."</td><td>".$rowmat['data']."</td><td>".$rowmat['postedby']."</td><td><a href='like.php?id=".$rowmat['postedby']."'>like</a> </td></tr>";
  $ij =$ij+1;
  }
  $tab1 .="</table>";
  $rowfornamemat = mysqli_fetch_assoc($resultmat);

  // echo "<b>Name</b>: ".$lar['name']."     "."<b>User Id</b>: ".$current;
  echo "\r\n";
  echo "subject : ".$current;
  echo "\n";

  echo $tab1;
  }
  $i =$i+1;
  }
  if($chk == 0){echo "no matches found, please use appropriate pattern";}




$uo = "\q";

mysqli_query($conc,$uo);

   $conc = mysqli_connect("localhost","$naam","$pass");
   $uo = "use ipd";
  mysqli_query($conc,$uo);


}


if(isset($_POST['jjj']))
{
  $exit1 = "\q";
   mysqli_query($conc,$exit1);

  include 'settings.php';
  $conc = mysqli_connect("$domainname","$drootname","$dpassword");

$opo = "use qa";
mysqli_query($conc,$opo);



$sss = $_POST['sop'];
  $alt = $_POST['aletter'];



  // $opo = "create database qa";
  // mysqli_query($conc,$opo);


  $opo = "use qa";
  mysqli_query($conc,$opo);

  // if(mysqli_query($conc,$opo)){
  //
  //   echo "posted ";
  // }
  // else {echo "not posted error";}






  // $tab="create table $tss (ori longtext,data longtext)";
  // $ac = mysqli_query($conc,$tab);

  $intr = "insert into $sss(ori,data,postedby) values('A','$alt','$naam')";
$ac =    mysqli_query($conc,$intr);





  if($ac)
  {

    echo "posted ";
  }
  else
  {echo "not posted error";}


 $exit1 = "\q";
    mysqli_query($conc,$exit1);



     $conc = mysqli_connect("localhost","$naam","$pass");
     $uo = "use ipd";
     mysqli_query($conc,$uo);







}

if(isset($_POST['ldr']))
{

  $exit1 = "\q";
   mysqli_query($conc,$exit1);

  include 'settings.php';
  $conc = mysqli_connect("$domainname","$drootname","$dpassword");

  $opo = "use ipdr";
  mysqli_query($conc,$opo);







    echo "  <br><b>displaying  leaderboard</b><br> ";

    $ex= "select * from  lobo order by points desc";


// SELECT name, birth FROM pet ORDER BY birth DESC;
    $result1 =  mysqli_query($conc,$ex);

    $n1=mysqli_num_rows($result1);

    $tab1 = '<table style="width:50%" border="1" bordercolor="green">';
    $tab1 .= "<tr><td><b>user_id</b></td><td><b>likes</b></td></tr>";

    $i = 0;
    while($i<$n1)
    {
     $row = mysqli_fetch_assoc($result1);

    $tab1 .= "<tr><td>".$row['userid']."</td><td>".$row['points']."</td></tr>";
      $i =$i+1;
    }
    $tab1 .="</table>";
    // $rowforname = mysqli_fetch_assoc($result2);
    // echo "<b>Name</b>: ".$rowforname['name'];
    echo $tab1;

    $exit1 = "\q";
       mysqli_query($conc,$exit1);



        $conc = mysqli_connect("localhost","$naam","$pass");
        $uo = "use ipd";
        mysqli_query($conc,$uo);


}



?>
</html>
