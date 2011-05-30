<?php
session_start();
$username = $_SESSION['username'];

if (!isset($_SESSION['basic_is_logged_in']) 
    || $_SESSION['basic_is_logged_in'] !== true) {

    // not logged in, move to login page
    header('Location:/index.php');
    exit;
}
$name = $_SESSION['username'];
$dbname="techyudh_copypaste";
$host="localhost";
$user="techyudh_root";
$pass="chirag@123";
$link = mysql_connect("localhost", "techyudh_root", "chirag@123");
mysql_select_db($dbname, $link);
?>


<html  xml:lang="en" lang="en">
<head>
</head>


<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

<title>CutCopynPaste Upload</title>
<?php

if(!$username && !$password){ ?><img src="images/bird2.png"   class="float-left" /><h2 align="left">
<a href="/login.php">Sign in</a> | <a href="/register.php">Register</a></h2> <?php
}else{ ?> <img src="images/bird3.png"   class="float-left" /></br><h2 align="left"> <?php
echo "".$username." | <a href=/logout.php>Logout</a>";
}


?> </h2>


<div id="wrap">


	<!-- header -->
	<div id="header">
	
<CENTER><img src="images/logo.png" width="430" height="175" /></CENTER>	

				
	
	
	
</div>	
<body>
		<div id="content-outer" class="clear" ><div id="content-wrap" >
	
		<div class="content">
		<div class="post"> <CENTER>
		<h6 align="right">
							<a href=<?php 
				echo "/profile.php?logname=".$username;?>>My Uploads </a> </h6>
<form method="post" action="/lp.php" enctype="multipart/form-data">

<TR>
   <TD><h3>File Description: </h3></TD>
   <TD><TEXTAREA NAME="description" ROWS="5" COLS="50"></TEXTAREA></TD>
  </TR>
<TR>
	<TD><h3>Category: </h3></TD>
	<TD><input type="radio" name="Category" value="Public" checked/>Public<br/>
		<input type="radio" name="Category" value="Private" />Private
		</TD>
</TR>
<tr>
<td><h3>Select File: </h3></td>
<td width="200"><CENTER>
<input type="hidden" name="MAX_FILE_SIZE" value="20000000">
<input name="userfile" type="file" id="userfile"></CENTER>
</td></br>
<class="no-border">
<input class="button" type="submit" value="Continue"  name = "Submit" tabindex="2" />
</tr>
</table>
</form>




</div>	
	</DIV>		
			<!-- columns ends -->	
			</div>
				
		</div>

	<!-- footer ends -->
	</div></div>
	
	<div id="footer-bottom">	
		<p>
			<a href="/about.html">About</a> |
			
			<a href="/faqs.html">FAQs</a>|
			<a href="/contact.php">Contact</a> 
			</a>
		</p>
	</div>			

<!-- wrap ends -->
</div>
</body>
</html>