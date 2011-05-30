<?php 
session_start();?>
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
if (isset($_REQUEST['PHPSESSID'])) {
     session_id($_REQUEST['PHPSESSID']);
}
session_start();


if ($session) {
          try {
            $uid = $facebook->getUser();
            $me =$facebook->api('/me');
          } catch (FacebookApiException $e) {
            error_log($e);
          }
        }
        
        // login or logout url will be needed depending on current user state.
        if ($me) {
          $logoutUrl = $facebook->getLogoutUrl();
        } else {
          $loginUrl = $facebook->getLoginUrl(array('canvas' => 1, 'fbconnect' => 0, "req_perms"=>"user_photos", "display"=>"page", 'next' => 'http://apps.facebook.com/cutcopynpaste/'));
          echo "<script type='text/javascript'>top.location.href = '" . $loginUrl. "';</script>";
        }


$link=$_SESSION['dlink'];
echo"$link";
echo"Your file has successfully been uploaded.. we are processing it. ";
$pod = $_GET['id']; 
$description = $_GET['desc'];
?><h3> File you uploaded can be downloaded at </h3><br><?php
echo"www.cutcopynpaste.com/downloadlink.php?id=$pod"; ?>
<h3> Description you added :</h3><br> <?php
echo"$description";
?>

