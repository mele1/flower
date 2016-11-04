<!DOCTYPE html>
<html>

<head>
		<title>Staff Log In Page
        </title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css" media="screen">

       				<script type="text/javascript">
<!--
var image1=new Image()
                    image1.src="images/banner22.jpg"
                    var image2=new Image()
                    image2.src="images/banner111.jpg"
                    var image3=new  Image()
                    image3.src="images/bannner200.jpg"
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
                    </script>

     
</head>

<body onLoad="MM_preloadImages('images/book 4.jpg','images/gift1.jpg')">
	<div id="outter">
	<div id="container">
		
        	<div id="logo">
            <a href="index.html"><img src="../images/logo.jpg" alt="logo"></a>
            </div>
            <br>
           
        
        <div id="navi">
             <ul>
                <li><a href="../index.html" title="Home Page">Home</a></li>
                <li><a href="../Products.html" title="View Our Products">Products</a>       
                </li>
               
                <li><a href="../Services.html">Services</a></li>
                <li><a href="../About.html" title="Know About Us">About</a></li>
                <li><a href="../Feedback.html" title="Give Us Feedback">Feedback</a></li>
              </ul>
        </div>
        
       
        
        <div id="contentt">
        	<div id="formss">
      <center><h1>Staff Log In</h1></center>
			

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$uname=$_REQUEST['username'];
$pwd=$_REQUEST['password'];
$pos=$_REQUEST['position'];

$con = mysql_connect("localhost","root","");

// Select  table
mysql_select_db("userinfo", $con);

$sql="SELECT * FROM stafflogin WHERE username='$uname' AND password='$pwd'";

$result=mysql_query($sql, $con);

$num=mysql_numrows($result);

if ($num==0) {
echo  "<p><font color=red>Invalid Username and Password </font></p>";
//echo "<a href=login.html>Login</a>";
} else {
date_default_timezone_set("America/New_york");

$logintime=date("h:i:s");
session_start(); 
$_SESSION['username'] = $uname; 
$_SESSION['password'] = $pwd;
$_SESSION['logintime']=$logintime;
$_SESSION['position']=$pos;
$row = mysql_fetch_array($result);
if ($row['position']==$pos){
$logindate=date("d-m-y h:m:s");


$sql1="INSERT INTO timesheet (username,position,logindate,logintime)
	        VALUES ('$uname','$pos',CURDATE(),CURTIME())";
			if (!mysql_query($sql1,$con))
  {
  die('Error: ' . mysql_error());
  }
 //$row=mysql_fetch_array($sql);
 
 if($row['position']=='manager'){
	 header("location: manager.php");
 }
 else if($row['position']=='cashier'){
	 header("location: cashier.php");
 }
 else
 // header("location: ../index.html");
  echo $row['position'];
 

}
//else 
//echo"error";
}

mysql_close($con)
?> 
			
                         
         
</div>        
                    
</div>
            
            
        
        
        <div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Mixflowers.com 2014. All rights reserved.</center>
            </div>
            
        	<div id="social">
               
            <center>
            <img src="../images/icons/cards.png"> 
            <img src="../images/fb.jpg">
            <img src="../images/twii.jpg"></center>
            </div>
            
           
        </div>
	</div>
    </div>
</body>
</html>





