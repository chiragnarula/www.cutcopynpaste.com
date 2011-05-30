<?php  
session_start();
  // the page when u click the download button.. shows the file details with actual download button
  $pod = $_GET['id']; 

$name = $_SESSION['username'];
  
$connect = mysql_connect("localhost", "techyudh_root", "chirag@123");
			if(!$connect){
			die(mysql_error());}
$select_db = mysql_select_db("techyudh_copypaste", $connect);
			if(!$select_db){
			die(mysql_error());
			}


$checkid = mysql_query("SELECT pod FROM upid WHERE pod='$pod'");
$check2 = mysql_num_rows($checkid);

   
if($check2 < 1){
header('Location: /filenotfound.html');
}




?>


<html  xml:lang="en" lang="en">

<head>
<?php

if($name == NULL){ ?><img src="images/bird2.png"   class="float-left" /><h2 align="left"></br>
<a href=login.php>Sign in</a> | <a href=register.php>Register</a></h2> <?php
}else{ ?> <img src="images/bird3.png"   class="float-left" /><h2 align="left"></br> <?php
echo "".$name." | <a href=/logout.php>Logout</a>";?> </h2>

<?php
}


?> 
<title>CutCopynPaste</title>



<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

</head>
<body>
<div id="wrap">


	<!-- header -->
	<div id="header">	
<CENTER><a href="http://cutcopynpaste.com"><img src="images/logo.png" width="430" height="175" /></a></CENTER>	

</div>
<div id="content-outer" class="clear" ><div id="content-wrap" >
	
		<div class="content">
	<div class="post">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like show_faces="false" width="450"></fb:like>
	<CENTER>
	<?php
			
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
			



$select_user = mysql_query("SELECT * FROM upid WHERE pod='$pod'");
$row2 = mysql_fetch_array($select_user);
$id = $row2['nid'];
$link = "downlink.php?id=$id";

$result = mysql_query("SELECT * FROM upload WHERE id='$id'");
$data = mysql_fetch_object($result);

$selectusername = mysql_query("SELECT * FROM upload WHERE id='$id'");
$row3 = mysql_fetch_array($selectusername);
$username = $row3['username'];



?> 
 <?php

 $checkname = mysql_query("SELECT username FROM upload WHERE id='$id'");
$fetch = mysql_fetch_array($checkname);

 
//if($check == 1){ 
if($username){
	
	?><h2><?php
	echo "  File Name  ";?>   </h2>  
<h3><?php echo "  <td>$data->name";?></h3></br><h2><?php
echo "  <td>Type</td>\n";?></h2><h3><?php 
echo "  <td>$data->type</td>\n";?></h3> </br> <h2><?php
echo "  <td>Size</td>\n"; ?></h2><h3><?php 
echo "  <td>$data->size MBs</td>\n";?></h3></br><h2><?php
echo "  <td>Description</td>\n";?></h2><h3><?php
echo "  <td>" . stripslashes($data->description) . "</td>\n";?></h3></br><h2>

<h2> Uploaded By </h2><a href=<?php 
				echo "/profile.php?logname=".$username ?>><?php echo"$username" ?> </a><h2>
<?php
  echo "  <td><a href='/download.php?id=$pod'>Download</a> </td>\n";
  
  
  echo " </tr>\n";

}
?></h2>

<h2>
<?php
//if($check == 0){
if(!$username){

echo "  File Name  ";?>   </h2>  
<h3><?php echo "  <td>$data->name";?></h3></br><h2><?php
echo "  <td>Type</td>\n";?></h2><h3><?php 
echo "  <td>$data->type</td>\n";?></h3> </br> <h2><?php
echo "  <td>Size</td>\n"; ?></h2><h3><?php 
echo "  <td>$data->size Bytes</td>\n";?></h3><h2>

<?php
  echo "  <td><a href='/download.php?id=$pod'>Download</a> </td>\n";
  
  
  echo " </tr>\n";

}?>

</div>
</div>
</div></div></div>
</div></div></div>
<div id="footer-bottom">	
		<p>
			<a href="/about.html">About</a> |
			
			<a href="/faqs.html">FAQs</a>|
			<a href="/contact.php">Contact</a> 
			</a>
		</p>
	</div>	
</body>
</html>

