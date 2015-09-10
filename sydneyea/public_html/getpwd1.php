<?php

	 include("include/dbconnect.php");
include("include/constants.php");

// value sent from form
  $email_to=$_REQUEST['email_to'];

// table name
$tbl_name=tbl_cycling_membernew;

// retrieve password from table where e-mail = $email_to(mark@phpeasystep.com)
 $sql="SELECT * FROM $tbl_name WHERE varEmail='$email_to'";
$result=mysql_query($sql);

// if found this e-mail address, row must be 1 row
// keep value in variable name "$count"
$count=mysql_num_rows($result);

// compare if $count =1 row
if($count==1){

$rows=mysql_fetch_array($result);

// keep password in $your_password
$your_password=$rows['varPassword'];

$your_username=$rows['varUsername'];






// Your message


$messages= "<table><tr><td>Your Username & password for login to Sydney Easy Riders website</td></tr>";

$messages.="<tr><td>Your Username is ".$your_username."</td></tr>";

$messages.="<tr><td>Your password is ".$your_password."</td></tr></table>";



$email=$email_to;

$email11="admin@sydney-easy-riders.com.au";


//$from="amala@websolusionz.com";
  $subject = "Username & Password for Sydney Easy Riders";

       $header  = "Content-Type: text/html; charset=iso-8859-1\r\n";

       $header .= "To:".$email."\r\n";
       $header .= "From: ".$email11."\r\n";
$sentmail=mail($email,$subject,$messages,$header);


}

else {
header("location:forgotpass.php?flg=nf");
}

if($sentmail){
header("location:forgotpass.php?flg=succ");
}
else {
header("location:forgotpass.php?flg=cs");

}

?>

