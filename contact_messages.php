<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="css/style 03.css" rel="stylesheet" type="text/css" />
<link href="css/ddmenu.css" rel="stylesheet" type="text/css" />
<script src="javascripts/ddmenu.js" type="text/javascript"/></script>
<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
<style>
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}
table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
table tr {
  background: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}
table th,
table td {
  padding: .625em;
  text-align: center;
}
table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  table caption {
    font-size: 1.3em;
  }
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  table td:before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  table td:last-child {
    border-bottom: 0;
  }
}
.dropbtn {
    background-color: #666;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 130px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
</head>
<body>
<center>
<div id="wrapper">
<div class="header">
<div class="logo"><img src="local/images/logo05.png" /></div></div>
<nav id="ddmenu">
    <ul>
          <li><a href="admin.php">Upload</a></li>       
        <li><a href="view.php">View</a></li>
		<li><a href="addlink.php">Page Link</a></li>
		<li><a href="#">Messages</a></li>
		<li><a href="logout.php"> LogOut </a></li>
         
   </ul></nav><br />
		    
   <div class="">
  
 
  <div class="dropdown-content">
    
  </div>
</div> <h2>User Messages</h2>
   <?php
    session_start();
// If not logged in, let log in, else logut link
		if (!isset($_SESSION['user_id']))
		{
		echo '<script type="text/javascript">alert("Please Login Again..");</script>';
		 header("location:login.php");
		}
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$conn = mysqli_connect("localhost", "root", "", "findex");
 
// Check connection
//if($conn === false){
   // die("ERROR: Could not connect. " . mysqli_connect_error());
//}
require('db_config.php');
$sql = "SELECT * FROM contactus";
$rs_result = $mysqli->query($sql);
?> 
<table>
<tr>
    <td bgcolor="#CCCCCC"><strong>Name</strong></td>
    <td bgcolor="#CCCCCC"><strong>Email</strong></td><td bgcolor="#CCCCCC"><strong>Comments</strong></td></tr>
<?php 
 while($row = $rs_result->fetch_assoc()) {
?> 
            <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["comment"]; ?></td>
            </tr>
<?php 
}; 
?> 
</table>
 
 

 
 <?php 
// Close connection
mysqli_close($mysqli);

?>
	        
        
        
        
        
   
<div class="footer"><hr /><div class="footer"><div class="copy">2017 all right reserved 
</div><div class="by">powered by @Findex</div></div>
</div>
</center>

</body>