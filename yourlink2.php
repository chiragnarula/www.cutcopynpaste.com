<?php
session_start();
$dlink = $_SESSION['dlink'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

?>


<html  xml:lang="en" lang="en">
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<head><body>

<div id="wrap">


	<!-- header -->
	<div id="header">	
<CENTER><img src="images/logo.png" width="430" height="175" /></CENTER>	

				
	</br>
	</br>	
	
	
</div>
<div class="post"> <CENTER>
	</br></br>
	<h3>Download link to the file is</h3>
	<code><?php echo $dlink ?></code>
	<?php
if(!$username && !$password) {?>
					<h2>Go to  <a href ="login.php">home</a> upload more!</h2> <?php }else{
					?>
					<h2>Click <a href ="upload.php">Me</a> to go back </h2> <?php } ?>
	