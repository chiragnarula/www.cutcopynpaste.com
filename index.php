<?php
session_start();



?>
<html  xml:lang="en" lang="en">

<head>
<link rel="shortcut icon" href="favicon.ico" >

<title>CutCopynPaste</title>


<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

</head>

<body>

<?php




$username = $_SESSION['username'];
$password = $_SESSION['password'];

?>

<?php

if(!$username && !$password){ ?><img src="images/bird2.png"   class="float-left" /><h2 align="left"></br>
<a href="/login.php">Sign in</a> | <a href="/register.php">Register</a></h2> <?php
}else{ ?> <img src="images/bird3.png"   class="float-left" /><h2 align="left"></br> <?php
echo "".$username." | <a href=/logout.php>Logout</a>";?> </h2>

<?php
}


?> 






<div id="wrap">


	
	<div id="header">	
<CENTER><img src="images/logo.png" width="430" height="175" /></CENTER>	


	
</div>	

	<div id="content-outer" class="clear" ><div id="content-wrap" >
	
		<div class="content">
	<div class="post"> <CENTER>
	</br>
			
			<form method="post" action="/yourlink.php" enctype="multipart/form-data">
			 <?php if($username ) { ?>
					 
					<h6 align="right">
							<a href=<?php 
				echo "/profile.php?logname=".$username;?>>my uploads </a> </h6></br>
					<?php
					}
					if(!$username ) {?>
					<h2>Instant share here or <a href ="/login.php">sign in</a> to save files in your profile</h2> <?php }else{
					?>
					<h2>Upload here or click <a href ="/upload.php">Me</a> to save files in your profile</h2>
						<?php } ?>
					 
					</br> 
					<input type="hidden"  name="MAX_FILE_SIZE" value="20000000" tabindex="1" />
					<input name="userfile" value= "browse" type="file" id="userfile" >
					</br></br>
				<h3>Upload your file and continue to get your instant share link</h3>
				 </br>
				<class="no-border">
					<input class="button" type="submit" value="Continue"  name = "Submit" tabindex="2" />
					<br></br>
         			
				
</form>

</div></div>
</CENTER>	
				
			
			
	</div></div><p></p></br></br></br></br>
	<div id="footer-bottom">
	
		
		
			<a href="/about.html">About</a> |
			
			<a href="/faqs.html">FAQs</a>|
			<a href="/contact.php">Contact</a> 
										
			 
	   	   
			</div></div></div>
</body>
</html>