
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
	<script type="text/javascript">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
        <li><a href="#">View</a></li>
		<li><a href="addlink.php">Web Link</a></li>
		<li><a href="contact_messages.php">Messages</a></li>
		<li><a href="logout.php"> LogOut </a></li>
         
   </ul></nav><br />
		    
   <div class="dropdown">
  
 
  <div class="dropdown-content">
    </div>
</div> <h2> List Of Journals</h2><form action="delete_all.php" method="post" onsubmit="return confirm('Really Want to Delete?');">
<input type="submit" name="Submit" value="Delete All Journals"/>
<br /><br />
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
$results_per_page = 500;
 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;
$sql = "SELECT * FROM journals LIMIT $start_from, ".$results_per_page;
$rs_result = $mysqli->query($sql);
?> 
<table>
<tr>
    <td bgcolor="#CCCCCC"><strong>Title</strong></td>
    <td bgcolor="#CCCCCC"><strong>ISSN/SOURCE</strong></td><td bgcolor="#CCCCCC"><strong>E-ISSN/SUBJECTS</strong></td><td bgcolor="#CCCCCC"><strong>PUBLISHER/COUNTRY</strong></td><td bgcolor="#CCCCCC"><strong>PAGE LINK</strong></td></tr>
<?php 
 while($row = $rs_result->fetch_assoc()) {
  //$first_part = substr($row['issn'],0,4);
        //$second_part = substr($row['issn'],4,8);
        //$zipcode = $first_part.'-'.$second_part;
?> 
            <tr id="<?php echo $row['title'] ?>">
            <td ><?php echo $row["title"]; ?></td>
            <td><?php echo $row["issn"]; ?></td>
            <td><?php echo $row["e_issn"]; ?></td>
			 <td><?php echo $row["publisher"]; ?></td>
			 <td><?php echo $row["weblink"]; ?></td>
            </tr>
<?php 
}; 
?> 
</table>
 
 
 
<?php 
$sql = "SELECT COUNT(title) AS total FROM journals ";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  echo "Total No.of Journals :  " .$row["total"]."<br>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='view.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
};



 
// Close connection
mysqli_close($mysqli);

?>
	        
        
        
        </form>
        
   
<div class="footer"><hr /><div class="footer"><div class="copy">2017 all right reserved 
</div><div class="by">powered by @Findex</div></div>

</div>
</center>

</body>
</html>
