<?php
session_start();
 $pod = $_GET['id']; 
$dlink = $_SESSION['dlink'];
$username = $_SESSION['username'];


if(!isset($_SESSION['dlink'])){
     
    header('Location:/index.php');}
?>


<html  xml:lang="en" lang="en">
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<head><body>

<div id="wrap">


	<!-- header -->
	<div id="header">	
<CENTER><a href="/index.php"><img src="images/logo.png" width="430" height="175" /></a></CENTER>	

				
	</br>
	</br>	
	
	
</div>
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
<div id="content-outer" class="clear" ><div id="content-wrap" >
	
		<div class="content">
<div class="post"> <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like show_faces="false" width="450"></fb:like>	<CENTER>
	</br></br><h2>
	<?php echo "  File Name  ";?>   </h2>  
<h3><?php echo "  <td>$data->name";?></h3></br><h2><?php
echo "  <td>Type</td>\n";?></h2><h3><?php 
echo "  <td>$data->type</td>\n";?></h3> </br> <h2><?php
echo "  <td>Size</td>\n"; ?></h2><h3><?php 
echo "  <td>$data->size MBs</td>\n";?></h3></br>
	<h3>Download link to the file is</h3>
	<code><?php echo $dlink ?></code>
	<?php
if(!$username ) {?>
					<h2>Go to  <a href ="/index.php">home</a> upload more!</h2> <?php }else{
					?>
					<h2>Click <a href ="/upload.php">Me</a> to go back </h2> <?php } ?> 
					</div>
					<div id="footer-bottom">	
		<p>
			<a href="/about.html">About</a> |
			
			<a href="/faqs.html">FAQs</a>|
			<a href="/contact.php">Contact</a> 
			</a>
		</p>
	</div>	</div>	</div>	</div></div>

<!-- wrap ends -->

</body>

</html>