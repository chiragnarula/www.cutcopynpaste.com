<?php
session_start();


$firsttime='1';
require 'facebook.php';
$api_key = '119762598091042';
$secret = 'c27f9cd90b30fe7468632dd3f83af24d';

$facebook = new Facebook(array(
'appId' => '119762598091042',
'secret' => 'c27f9cd90b30fe7468632dd3f83af24d',
'cookie' => true,
));

$session = $facebook->getSession();


if (!empty($session))
{
	try{
			$uid = $facebook->getUser();
			$user = $facebook->api('/me');
		} catch (Exception $e) {}
	
	if (!empty($user))
	{
		
		 
		
		
	}
	else
		die("error");
		
}
else
{
	$url = $facebook->getLoginUrl();
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


 
 
//function which does the processing from the index
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

$_SESSION['dlink']=$link;

//echo"$link";
header("Location: http://apps.facebook.com/cutcopynpaste/new.php");

} 
else{
die("error.. no file");
}

?>	
