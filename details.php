<?php  
  session_start();
  $pod = $_GET['id']; 
 $new_name = $_GET['user'];
  
  $name = $_SESSION['username'];
  if ($new_name != $name){
				$sel_name = $new_name;
				}
	else { 
		$sel_name = $name;
		}
$connect = mysql_connect("localhost", "techyudh_root", "chirag@123");
			if(!$connect){
			die(mysql_error());}
$select_db = mysql_select_db("techyudh_copypaste", $connect);
			if(!$select_db){
			die(mysql_error());
			}
$checkname = mysql_query("SELECT username FROM users WHERE username='$new_name'");
$check = mysql_num_rows($checkname);

$checkid = mysql_query("SELECT pod FROM upid WHERE pod='$pod'");
$check2 = mysql_num_rows($checkid);

   if($check < 1){
header('Location:index.php');
}
else if($check2 < 1){
header('Location:index.php');
}


?>


<html  xml:lang="en" lang="en">

<head>
<?php

if(!$name){ ?><img src="images/bird2.png"   class="float-left" /><h2 align="left"></br>
<a href="/login.php">Sign in</a> | <a href="/register.php">Register</a></h2> <?php
}else{ ?> <img src="images/bird3.png"   class="float-left" /><h2 align="left"></br> <?php
echo "".$name." | <a href=/logout.php>Logout</a>";?> </h2>

<?php
}


?> 
<title>File Details</title>



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
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like show_faces="false" width="450"></fb:like>	<CENTER>
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

?> <h2><?php if($name == $new_name){
echo "  File Name  ";?>   </h2>  
<h3><?php echo "  <td>$data->name";?></h3></br><h2><?php
echo "  <td>Type</td>\n";?></h2><h3><?php 
echo "  <td>$data->type</td>\n";?></h3> </br> <h2><?php
echo "  <td>Size</td>\n"; ?></h2><h3><?php 
echo "  <td>$data->size MBs</td>\n";?></h3></br><h2><?php
echo "  <td>Description</td>\n";?></h2><h3><?php
echo "  <td>" . stripslashes($data->description) . "</td>\n";?></h3></br><h2><?php
echo"   <td>Privacy</td>\n";?></h2><h3><?php
echo " <td>$data->category</td>\n";?></h3></br><h2><?php
  
  echo "  <td><a href='/delete.php?id=$pod'>Delete</a> </td>\n";?>|<?php
  echo "  <td><a href='/download.php?id=$pod'>Download</a> </td>\n";?>|<?php
  echo "  <td><a href='/upload.php'>Upload More</a> </td>\n";?>|<?php
  echo "  <td><a href='/profile.php?logname=$new_name'>View Uploads</a> </td>\n";?><?php
  
  
  echo " </tr>\n";


?></h2>
<h3>Download link to the file is</h3>
	<code><?php echo "cutcopynpaste.com/downloadfile.php?id=$pod";?></code> <?php 
	}
	
	else {
	echo "  File Name  ";?>   </h2>  
<h3><?php echo "  <td>$data->name";?></h3></br><h2><?php
echo "  <td>Type</td>\n";?></h2><h3><?php 
echo "  <td>$data->type</td>\n";?></h3> </br> <h2><?php
echo "  <td>Size</td>\n"; ?></h2><h3><?php 
echo "  <td>$data->size Bytes</td>\n";?></h3></br><h2><?php
echo "  <td>Description</td>\n";?></h2><h3><?php
echo "  <td>" . stripslashes($data->description) . "</td>\n";?></h3></br><h2><?php

  echo "  <td><a href='/download.php?id=$pod'>Download</a> </td>\n";
  
  
  echo " </tr>\n";


?></h2>
<h3>Download link to the file is</h3>
	<code><?php echo "cutcopynpaste.com/downloadfile.php?id=$pod";?></code> <?php 
	} ?>
</div>
</div>
		
</div></div></div></div>
<div id="footer-bottom">	
		<p>
			<a href="/about.php">About</a> |
			
			<a href="/faqs.php">FAQs</a>|
			<a href="/contact.php">Contact</a> 
			</a>
		</p>
	</div>	
</body>
</html>

