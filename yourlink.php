<?php
session_start();
//file which does the processing from the index
$dbname="techyudh_copypaste";
$host="localhost";
$user="techyudh_root";
$pass="chirag@123";
$link = mysql_connect("localhost", "techyudh_root", "chirag@123");
mysql_select_db($dbname, $link);
if(isset($_POST['Submit']) && $_FILES['userfile']['size'] > 0)
{
$description = $_REQUEST['description'];
$cat = $_POST['Category'];

$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'] / "1048576";
$fileType = $_FILES['userfile']['type'];
$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
  $fileName = addslashes($fileName);
}

$query = "INSERT INTO upload( name, size, type, content ) ".
"VALUES ( '$fileName', '$fileSize', '$fileType', '$content')";
mysql_query($query) or die('Error, query failed');




$temp_array = mysql_fetch_array(mysql_query("select last_insert_id()")); 
$nid = $temp_array['last_insert_id()'];


$query2 = "INSERT INTO upid( nid , pod) ".
"VALUES ( '$nid', md5('$nid'))";
mysql_query($query2) or die('Error, query failed');


$select_user = mysql_query("SELECT * FROM upid WHERE nid='$nid'");
$row2 = mysql_fetch_array($select_user);
$hash = $row2['pod'];
$link = "cutcopynpaste.com/downloadfile.php?id=$hash";

$_SESSION['dlink'] = $link;


header("Location: /downloadlink.php?id=$hash");
}else{
header("location:http://cutcopynpaste.com/");}
?>	