<?php
session_start();
if(!isset($_SESSION['dlink'])){
     
    header('Location:/index.php');}
?>


<html  xml:lang="en" lang="en">


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
	

<!-- wrap ends -->



</html>