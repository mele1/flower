<?php
		error_reporting(E_ALL ^ E_DEPRECATED);
		 $username =$_REQUEST['username'];
If (empty ($username))
{
	echo" <p><Font color='Red'> Please enter Username </Font></p>";}
	$password=$_REQUEST['password'];
	If (empty ($password))
	{
		echo "<p><Font color='Red'> Please enter Password </Font></p>";
	}
	$conn=mysql_connect("localhost","root","")or die ('error');
	mysql_select_db("userinfo",$conn) or die ('error');
	
	
	
	if ($_POST['username'] && $_POST['password']){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$user = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$username'"));
				if($user =='0'){
					die("That username does not exist");
					
				}
			
				
		if($user['password'] != $password){
			die("wrong password");
		}
		
		if($username="admin"){
			header("location:../feedback.html");
			}
			
		if($username="cashier"){
				header("location:../products.html");
				}
		else echo "You are now logged in as $username";
		
	}
	
	
?>



