
<?php
   require('db_config.php');
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$conn = mysqli_connect("localhost", "root", "", "findex");
 
// Check connection
//if($conn === false){
    //die("ERROR: Could not connect. " . mysqli_connect_error());
//}
if (isset($_GET['submit']))
    {
$sql = "INSERT INTO contactus 
VALUES ('".$_GET["name"]."','".$_GET["mail"]."','".$_GET["txtmess"]."')";

if ($mysqli->query($sql) === TRUE) {
    echo '<script type="text/javascript">alert("Message has been sent");</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$mysqli->close();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FindeX</title>
<link href="css/style 05.css" rel="stylesheet" type="text/css" />
<link href="css/ddmenu.css" rel="stylesheet" type="text/css" />
<script src="javascripts/ddmenu.js" type="text/javascript"/></script>
<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
<!--
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}



-->
</script>
</head>
<body>
<center>
<div id="wrapper">
<div class="header">
<div class="logo"><img src="local/images/logo05.png" /></div></div>
<nav id="ddmenu">
    <ul>
        <li><a href="index.html">Home</a></li>       
         <li><a href="search.php">Search</a></li>       
        <li><a href="contact.php">Contact us</a></li>
            
   </ul></nav>
 <h2>Contact Us</h2>
     


<div class="text_box">
    
    <form name="form1" action="" method="get" enctype="text/plain" onsubmit="return validate();">
 
<p><span class="style14"><font face="Lucida Sans Unicode, Lucida Grande, sans-serif"><font size="-1px">Name</font></font></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="name" placeholder="your name" style="width:330px; height:24px;" required/>    
        <br>
        <br>
        <span class="style14"><font face="Lucida Sans Unicode, Lucida Grande, sans-serif"><font size="-1px">E-mail </font></font></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="mail" placeholder="your email" required style="width:330px; height:24px;" onblur="validateEmail(this);">
          <br>
          <br>
          
          
          
          
          <span class="style14"><font face="Lucida Sans Unicode, Lucida Grande, sans-serif"><font size="-1px">Comment</font></font></span>
      <textarea name="txtmess" cols="17" rows="2" class="Form_Text_Ver" id="txtmess" placeholder="" style="width:330px; height:54px;" required></textarea>
          <br>
          <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="submit" name="submit" value="Send">
      <input type="reset" value="Reset">

   
  
  
    </p></form></div>






<div class="infor">
</div>
















































 


<div class="footer"><hr /><div class="footer"><div class="copy">2017 all right reserved 
</div><div class="by">powered by @Findex</div></div>

</div>
</center>

</body>
</html>
