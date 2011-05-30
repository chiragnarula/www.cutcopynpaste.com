<?php
session_start();
$name = $_SESSION['username'];
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

  if (!isset($_SESSION['basic_is_logged_in']) 
    || $_SESSION['basic_is_logged_in'] !== true) {

    
    header('Location: index.php');
    
}else if($check2 < 1){
header('Location: index.php');
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

$query = "DELETE FROM upload WHERE id = '$id' ";

$result = mysql_query($query) or die('Error, query failed');

$query2 = "DELETE FROM upid WHERE pod = '$pod' ";

$result2 = mysql_query($query2) or die('Error, query failed');
header('Location: profile.php?logname='.$name);


 
exit;

}


?>