<link href="http://www.cutcopynpaste.com/css/GrungeEra.css" rel="stylesheet" type="text/css" />
<link href="http://www.cutcopynpaste.com/css/reset.css" rel="stylesheet" type="text/css" />

<html>
<head>

<?php
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
		
		 
		
		echo"hello ".$user['first_name']." ".$user['last_name'];
	}
	else
		die("error");
		
}
else
{
	$url = $facebook->getLoginUrl();
	echo "<a href ='".$url."'>click</a> to go to app";
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

?>
<style type="text/css">
background:#FFF;
	
	

</style>
<CENTER><img src="http://cutcopynpaste.com/images/logo.png" width="230" height="105" /></CENTER>	

<form method="post" action=" "  enctype="multipart/form-data">
<input type="hidden"  name="MAX_FILE_SIZE" value="20000000" tabindex="1" />
<input name="userfile" value= "browse" type="file" id="userfile" >
</br></br>
<h3>Upload your file and continue to get your instant share link</h3>
</br>
<button onclick="beingupjava()">Upload the file</button>
<br></br>
         			
</form>

<script>
function beingupjava()
{
 alert("<?php beingup(); echo"lets see" ?>");
 }
</script>

<?php
function beingup(){
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
global $link = "cutcopynpaste.com/downloadfile.php?id=$hash";

echo" $link";

}
}
?>	



</html>