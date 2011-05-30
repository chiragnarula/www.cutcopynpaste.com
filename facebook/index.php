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




?>


	

<form method="post" action="http://www.cutcopynpaste.com/facebook/beingup.php "  enctype="multipart/form-data">
<input type="hidden"  name="MAX_FILE_SIZE" value="20000000" tabindex="1" />
<input name="userfile" value= "browse" type="file" id="userfile" >
</br></br>
<h3>Upload your file and continue to get your instant share link</h3>
</br>
<input class="button" type="submit" value="Continue"  name = "Submit"  />
<br></br>

<TR>
   <TD><h3>File Description: </h3></TD>
   <TD><TEXTAREA NAME="description" ROWS="5" COLS="50"></TEXTAREA></TD>
  </TR>
<TR>
        
</form>







</html>