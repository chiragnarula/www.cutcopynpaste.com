<html>
<?php
$FB_API_KEY = '93e6211af8d35dffe0623a4731e83630';
$FB_SECRET = 'c27f9cd90b30fe7468632dd3f83af24d';
//Connecting to database
$ConnectDB = mysql_connect("localhost", "techyudh_root", "chirag@123");
if(!$ConnectDB){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("techyudh_copypaste", $ConnectDB);
if(!$select_db){
die(mysql_error());
}
?>
