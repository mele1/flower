



<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$logouttime=date("h:i:s");
session_start(); 
$x=$_SESSION['logintime'];
$userid=$_SESSION['username'];


$con = mysql_connect("localhost","root","");
mysql_select_db("userinfo", $con);
  $sql= "UPDATE timesheet SET logouttime= CURTIME() WHERE username='$userid' and logintime='$x'";
 if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  else
{
mysql_close($con);
unset($_SESSION['usernmae']);
//session_unset(); 
session_destroy();

  header("Location: ../stafflog.html");
}
exit;
?> 
</body>
</html>
