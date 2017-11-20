<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>FindeX</title>
<link href="css/ddmenu.css" rel="stylesheet" type="text/css" />
<link href="css/style 04.css" rel="stylesheet" type="text/css" />
<script src="javascripts/ddmenu.js" type="text/javascript"/></script>
<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
	

<style>
.textbox { 
    border: 1px solid #848484; 
    -webkit-border-radius: 30px; 
    -moz-border-radius: 30px; 
    border-radius: 30px; 
    outline:0; 
    height:25px; 
    width: 275px; 
    padding-left:10px; 
    padding-right:10px; 
  } 
  .combobox { 
    border: 1px solid #848484; 
    -webkit-border-radius: 30px; 
    -moz-border-radius: 30px; 
    border-radius: 30px; 
    outline:0; 
    height:25px; 
    width: 100px; 
    padding-left:10px; 
    padding-right:10px; 
  } 
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 1px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
}
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
    background-color: #4CAF50;
    color: white;
    padding: 0px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
   
    display: inline-block;
}

.dropdown-content {
   
    position:absolute;
    background-color: #f9f9f9;
   
}

.dropdown-content a {
    color: black;
    
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
<script language="javascript" type="text/javascript">
<!--

function addHyphen() {
if(document.getElementById('selectid').value=='issn')
{
    var t = document.forms['form1'].elements['textbox1'];
      if (t.value.length > 0) {
        t.value = t.value.substring(0,4) + "-" + t.value.substring(4, t.value.length);
      }
	  }
	  if(document.getElementById('selectid').value=='e_issn')
{
    var t = document.forms['form1'].elements['textbox1'];
      if (t.value.length > 0) {
        t.value = t.value.substring(0,4) + "-" + t.value.substring(4, t.value.length);
      }
	  }
	  if(document.getElementById('selectid').value=='publisher')
{
    var t = document.forms['form1'].elements['textbox1'];
      if (t.value.length > 0) {
        t.value=t.value.replace("-","");
      }
	  }
	  if(document.getElementById('selectid').value=='journal')
{
    var t = document.forms['form1'].elements['textbox1'];
      if (t.value.length > 0) {
        t.value=t.value.replace("-","");
      }
	  }
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
         <li><a href="#">Search</a></li>       
        <li><a href="contact.php">Contact us</a></li>
            
   </ul></nav>
     <h2>Search</h2>    <div class="text_box">
    
    <form name="form1" action="search.php" method="get" enctype="text/plain">
 
      <input type="text" name="textbox1" class="textbox" onblur="" />    
        <select class="combobox" id="selectid" name="selectname" onchange="">
  <option value="title">Journal Name</option>
  <option value="issn">ISSN</option>
  <option value="e_issn">E-ISSN</option>
  <option value="publisher">Publisher</option>
</select>
      <input  type="Submit" name="submit" value=" Go " class="button button5" />
      
	  </form></div><br /><br />
 <?php
   
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$conn = mysqli_connect("localhost", "root", "", "findex");
 
// Check connection
//if($conn === false){
    //die("ERROR: Could not connect. " . mysqli_connect_error());
//}
require('db_config.php');
if(isset($_GET['submit']))
{
$text_value = $_GET['textbox1'];
$option_value = $_GET['selectname'];

$results_per_page = 500;
 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;
//$sql = "SELECT * FROM journals where title LIKE '".$text_value."%' LIMIT $start_from, ".$results_per_page;
//$sqlin="select indexed from status where title LIKE 'r%'";
if($option_value=="title")
{
$sql = "SELECT * FROM journals where title LIKE '".$text_value."%' LIMIT $start_from, ".$results_per_page;
$sq = "SELECT * from  journals where title LIKE '".$text_value."%'";
}
if($option_value=="issn")
{
$sql = "SELECT * FROM journals where issn LIKE '".$text_value."%' LIMIT $start_from, ".$results_per_page;
$sq = "SELECT * from  journals where issn LIKE '".$text_value."%'";
}
if($option_value=="e_issn")
{
$sql = "SELECT * FROM journals where e_issn LIKE '".$text_value."%' LIMIT $start_from, ".$results_per_page;
$sq = "SELECT * from  journals where e_issn LIKE '".$text_value."%'";
}
if($option_value=="publisher")
{
$sql = "SELECT * FROM journals where publisher LIKE '".$text_value."%' LIMIT $start_from, ".$results_per_page;
$sq = "SELECT * from  journals where publisher LIKE '".$text_value."%'";
}
$rs_result = $mysqli->query($sql);
//$sqlin_result=$conn->query($sqlin);
 if (!$rs_result || mysqli_num_rows($rs_result)>0)
 {
?> 
<table>
<tr>
    <td bgcolor="#b3d1ff"><strong>TITLE</strong></td>
    <td bgcolor="#b3d1ff"><strong>ISSN/SOURCE</strong></td><td bgcolor="#b3d1ff"><strong>E-ISSN/SUBJECTS</strong></td><td bgcolor="#b3d1ff"><strong>PUBLISHER/COUNTRY</strong></td><td bgcolor="#b3d1ff"><strong>INDEXED IN</strong></td><td bgcolor="#b3d1ff"><strong>PAGE LINK</strong></td></tr>
<?php 
$myArray = array();
 while($row = $rs_result->fetch_assoc()) {
?> 
            <tr>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["issn"]; ?></td>
			<td><?php echo $row["e_issn"]; ?></td>
			<td><?php echo $row["publisher"]; ?></td>
			<td><b><?php 
			$sqlin_result=$mysqli->query("select indexed from status where title ='".$row["title"]."'");
 while($r = $sqlin_result->fetch_assoc()) {
 $myArray[]=$r["indexed"];?> 
			<?php 
};

echo implode($myArray,',' );
unset($myArray);
 
//print_r(array_unique($myArray));
//$s = array_unique($a);
//foreach ($s as $value){
   // echo "$value";}
?>

</b></td>	   					<?php 
}; 
?>
	<td><?php echo '<a href="'.$row['weblink'].'">view</a>' ?></td>
   </tr>     

</table>
 
 
 
<?php 
//$sq = "SELECT * from  journals where title LIKE '".$text_value."%'";
$result = $mysqli->query($sq);
$row = mysqli_num_rows($result);
$total_pages = ceil($row / $results_per_page); // calculate total pages with results
  echo "Total No.of Journals :  " .$row."<br>";
for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='search.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
};
 }
   else {
  echo '<script type="text/javascript">alert("Journals not found..!");</script>';
  }
 }
// Close connection
mysqli_close($mysqli);

?>

 <br /> <br />
 <br /><br /> <br />
 <br /><br /> <br />
 <br /><br />
 <br /><br />

<div class="footer"><hr /><div class="footer"><div class="copy">2017 all right reserved 
</div><div class="by">powered by @Findex</div></div>

</div>
</center>

</body>
</html>
