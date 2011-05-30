<?php
session_start();
if (isset($_SESSION['basic_is_logged_in'])) {
   unset($_SESSION['basic_is_logged_in']);
}

//This function will destroy your session
session_destroy();
header( 'Location: /index.php');

?> 