<?php
session_start();
$connect = mysql_connect("localhost", "techyudh_root", "chirag@123");
if(!$connect){
die(mysql_error());
}

//Selecting database
$select_db = mysql_select_db("techyudh_copypaste", $connect);
if(!$select_db){
die(mysql_error());
}
$pod = $_GET['id'];


$checkid = mysql_query("SELECT pod FROM upid WHERE pod='$pod'");
$check2 = mysql_num_rows($checkid);

  if($check2 < 1){
header('Location: /filenotfound.html');
}


if(isset($_GET['id'])) 
{

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


$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";

$result = mysql_query($query) or die('Error, query failed');
list($name, $type, $size, $content) = mysql_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;

 
exit;
}

?>