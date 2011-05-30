<?php  
  session_start();
  $new_name = $_GET['logname'];
  
  $name = $_SESSION['username'];
  $connect = mysql_connect("localhost", "techyudh_root", "chirag@123");
			if(!$connect){
			die(mysql_error());}
$select_db = mysql_select_db("techyudh_copypaste", $connect);
			if(!$select_db){
			die(mysql_error());
			}
$checkname = mysql_query("SELECT username FROM users WHERE username='$new_name'");
$check = mysql_num_rows($checkname);
  if (!$new_name ){

    // not logged in, move to login page
    header('Location:index.php');
    exit;
}else if($check < 1){
header('Location:index.php');
}
  
  if ($new_name != $name){
				$sel_name = $new_name;
				}
	else { 
		$sel_name = $name;
		}
		
  //$fullname = $_SESSION['fullname'];
  
  
?>


<html  xml:lang="en" lang="en">

<head>
<?php

if(!$name ){ ?><img src="images/bird2.png"   class="float-left" /><h2 align="left"></br>
<a href="/login.php">Sign in</a> | <a href="/register.php">Register</a></h2> <?php
}else{ ?> <img src="images/bird3.png"   class="float-left" /><h2 align="left"></br> <?php
echo "".$name." | <a href=/logout.php>Logout</a>";?> </h2>

<?php
}


?> 
<title>My uploads on CutCopynPaste</title>



<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

</head>
<body>
<div id="wrap">


	<!-- header -->
	<div id="header">	
<CENTER><a href="/index.php"><img src="images/logo.png" width="430" height="175" /></a></CENTER>	

</div>
<div id="content-outer" class="clear" ><div id="content-wrap" >
	
		<div class="content">
	<div class="post"> 
	<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like show_faces="false" width="450"></fb:like>
	<CENTER>
	<h6 align="right">
							<a href=<?php 
				echo "/upload.php";?>>upload</a> </h6>
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
			
			$first = mysql_query("SELECT * FROM users WHERE username='$sel_name'");
			while($row = mysql_fetch_array($first))
				{
				?>
				<h2><?php echo $row['fullname'] ;}?></h2></br>
				
<?php


$connect = mysql_connect("localhost", "techyudh_root", "chirag@123");
if(!$connect){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("techyudh_copypaste", $connect);
if(!$select_db){
die(mysql_error());
}


if($name == $new_name){
$result = mysql_query("SELECT * FROM upload WHERE username='$sel_name'");
$rows = mysql_num_rows($result);
for ($i = 0; $i < $rows; $i++) {
  $data = mysql_fetch_object($result);
  $select_user = mysql_query("SELECT * FROM upid WHERE nid='$data->id'");
$row2 = mysql_fetch_array($select_user);
$hash = $row2['pod'];
  
  ?><h3><?php
  
  echo "  <td>$data->name</td>\n"; ?> </h3><?php
 
  echo "  <td>( <a href='/download.php?id=$hash'>Download</a> )</td>\n";
  echo "  <td>( <a href='/delete.php?id=$hash'>Delete</a> )</td>\n";
  echo "  <td>( <a href='/details.php?user=$sel_name&id=$hash'>View Details</a> )</td>\n"; ?> </br><?php }
  
  
}else{
$result = mysql_query("SELECT * FROM upload WHERE username='$sel_name' AND category='public'");
$rows = mysql_num_rows($result);
for ($i = 0; $i < $rows; $i++) {
  $data = mysql_fetch_object($result);
  $select_user = mysql_query("SELECT * FROM upid WHERE nid='$data->id'");
$row2 = mysql_fetch_array($select_user);
$hash = $row2['pod'];
  
  ?><h3><?php
  
  echo "  <td>$data->name</td>\n"; ?> </h3><?php
 
  echo "  <td>( <a href='/download.php?id=$hash'>Download</a> )</td>\n";
  
  echo "  <td>( <a href='/details.php?user=$sel_name&id=$hash'>View Details</a> )</td>\n"; ?> </br><?php }

	}			
	?>
</div>
</div>
</div></div></div>
<div id="footer-bottom">
	
		
		
			<a href="/about.html">About</a> |
			
			<a href="/faqs.html">FAQs</a>|
			<a href="/contact.php">Contact</a> 
										
			 
	   	   
			</div>
</body>
</html>	