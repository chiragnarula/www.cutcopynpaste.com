<?php
session_start();
?>
<html  xml:lang="en" lang="en">

<head>

<title>CutCopynPaste</title>



<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

</head>

<body>
<?php
//register form 
//This function will display the registration form
function register_form(){ ?>
<form method="post" action='?act=register'>
   <h3>Name: </h3>
    <input type="text" NAME="fullname" size="37">
  
  <h3>Username: </h3>
   <input type="text" NAME="username" size="37">
   
   <h3>Password: </h3>
   <input type="password" NAME="password" size="37">
  <h3>Retype Password: </h3>
   <input type="password" NAME="password_conf" size="37">
   <h3>Email: </h3>
   <input type="text" NAME="email" size="37">
  
  </br>
  <class="no-border"></br>
<input class="button" type="submit" value="Register"  name = "Register"  />
  </form>
  <h3><a href="/login.php">Sign In</a> here if you already have an account. </h3> 
  </br></br></br>

<?php
}

//This function will register users data
function register(){

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

//Collecting info
$fullname = $_REQUEST['fullname'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$pass_conf = $_REQUEST['password_conf'];
$email = $_REQUEST['email'];
$date = $_REQUEST['date'];

//Here we will check do we have all inputs filled

if(empty($fullname)){
die("Please Enter your name. This name appears on your profile! <br>");
}

if(empty($username)){
die("You Have Not Entered Any User Name<br>");
}

//check length of password 
if(strlen ("$username") < 5){ 
echo "Username should have more than 5 characters<br>"; 

}

if(empty($password)){
die("Please enter your password!<br>");
}

//check length of password 
if(strlen("$password") < 6){ 
die("Password too short..Should have more than 5 charactrs<br>"); 
}

if(empty($pass_conf)){
die("Please confirm your password!<br>");
}

if(empty($email)){
die("Please enter your email!");
}



//Let's check if this username is already in use

$user_check = mysql_query("SELECT username FROM users WHERE username='$username'");
$do_user_check = mysql_num_rows($user_check);

//Now if email is already in use

$email_check = mysql_query("SELECT email FROM users WHERE email='$email'");
$do_email_check = mysql_num_rows($email_check);

//Now display errors

if($do_user_check > 0){
die("Username is already in use!<br>");
}

if($do_email_check > 0){
die("Email is already in use!");
}

//check does passwords match

if($password != $pass_conf){
die("Passwords don't match!");
}


//If everything is okay let's register this user

$insert = mysql_query("INSERT INTO users (fullname,username, password, email) VALUES ('$fullname', '$username', '$password', '$email')");
if(!$insert){
die("There's little problem: ".mysql_error());
}
?>
<script language="JavaScript" type="text/JavaScript">
<!--
window.location.href = "login.php";
//-->
</script><?php
}
$act = $_GET['act'];
switch($act){

default;
register_form();
break;

case "register";
register();
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
			
			<a href="/faqs.php">FAQs</a>|
			
			<a href="/contact.php">Contact</a> 
										
			
	   	   
			</div>
</body>
</html>