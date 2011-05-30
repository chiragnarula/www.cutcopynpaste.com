<?php
session_start();
?>
<html  xml:lang="en" lang="en">

<head>

<title>Login</title>



<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

</head>

<body></br></br></br></br>
<?php


//This displays my login form
function index(){
?>
<form method="post" action='?act=login'>
   <h2>Username: </h2>
    <input type="text" NAME="username" size="37">
  
  <h2>Password: </h2>
   <input type="password" NAME="password" size="37">
  </br></br>
  <class="no-border">
<input class="button" type="submit" value="Login"  name = "Login"  />
  </form>
  <h3><a href="/register.php">Register</a> here if you don`t have an account. </h3> 
  </br></br></br>
  <?php
  

}

function login(){

//Collect your info from login form
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
if(empty($username)){

die("Please enter a username! <br>");
}

if(empty($password)){
die("Please enter your password! <br>");
}





//Connecting to database
$connect = mysql_connect("localhost", "techyudh_root", "chirag@123");
if(!$connect){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("techyudh_copypaste", $connect);
if(!$select_db){
die(mysql_error());
}

//Find if entered data is correct

$result = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");
$row = mysql_fetch_array($result);
$id = $row['id'];

$select_user = mysql_query("SELECT * FROM users WHERE id='$id'");
$row2 = mysql_fetch_array($select_user);
$user = $row2['username'];

if($username != $user){
die("Username is wrong!");
}


$pass_check = mysql_query("SELECT * FROM users WHERE username='$username' AND id='$id'");
$row3 = mysql_fetch_array($pass_check);
$email = $row3['email'];
$select_pass = mysql_query("SELECT * FROM users WHERE username='$username' AND id='$id' AND email='$email'");
$row4 = mysql_fetch_array($select_pass);
$real_password = $row4['password'];

if($password != $real_password){
die("Your password is wrong!");
}
?>
<script language="JavaScript" type="text/JavaScript">
<!--
window.location.href = "/index.php";
//-->
</script>
<?php


$_SESSION['username'] = $username;
$_SESSION['basic_is_logged_in'] = true;

}


$act = $_GET['act'];
switch($act){

default;
index();
break;

case "login";
login();
break;

}
?> 
<div id="wrap">

	<a name="top"></a>

	<!-- header -->
	<div id="header">					
		
		<CENTER><a href="/index.php"><img src="images/logo.png" width="430" height="175" /></CENTER>				
		
	</div>
</div>
<div id="footer-bottom">
	
		
		
			<a href="/about.php">About</a> |
			
			
			<a href="/faqs.html">FAQs</a>|
			<a href="/contact.php">Contact</a> 
	   	   
			</div>
</body>
</html>