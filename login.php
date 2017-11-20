<?php
session_start(); // Always at the top
if (isset($_GET['submit']))
    {
   // username and password sent from form 
   $Username = $_GET['username'];
		$Password = $_GET['password'];
		 if($Username=='admin' && $Password=='admin123')
   {
   $_SESSION['user_id'] ='admin';
    header("location:admin.php");
   }
   else
   {
   echo '<script type="text/javascript">alert("Incorrect Username/Password");</script>';
   }
   }
	if (!isset($_SESSION['user_id']))
		{
		
		}
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FindeX</title>
<link href="css/style 03.css" rel="stylesheet" type="text/css" />
<link href="css/ddmenu.css" rel="stylesheet" type="text/css" />
<script src="javascripts/ddmenu.js" type="text/javascript"/></script>
<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>

</head>
<body>
<center>
<div id="wrapper">
<div class="header">
<div class="logo"><img src="local/images/logo05.png" /></div></div>
<nav id="ddmenu">
    <ul>
          <li><a href="index.html">Home</a></li>       
        <li><a href="login.php">Login</a></li>
         <li><a href="search.php">Search</a></li>       
        <li><a href="contact.php">Contact us</a></li>
            
   </ul></nav>

        <h2>Login</h2>    <div class="text_box">
    
    <form action="login.php" method="get" enctype="text/plain">
 
<p><span class="style14"><font face="Lucida Sans Unicode, Lucida Grande, sans-serif"><font size="-1px">Username</font></font></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="username" placeholder="username" class="txtbox" />    
        <br>
        <br>
        <span class="style14"><font face="Lucida Sans Unicode, Lucida Grande, sans-serif"><font size="-1px">Password </font></font></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="password" name="password" placeholder="password" class="txtbox"">
          <br>
          <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input  type="submit" name="submit" value="Login" class="btn">
      <input type="reset" value="Reset" class="btn">
	  </form></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     

 

<div class="footer"><hr /><div class="footer"><div class="copy">2017 all right reserved 
</div><div class="by">powered by @Findex</div></div>

</div>
</center>

</body>
</html>
