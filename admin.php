<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('db_config.php');
 session_start();
// If not logged in, let log in, else logut link
		if (!isset($_SESSION['user_id']))
		{
		echo '<script type="text/javascript">alert("Please Login Again..");</script>';
		 header("location:login.php");
		}
	
if(isset($_POST['Submit'])){

	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		$uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());
		
		$file_name=basename($_FILES['file']['name'],".ods");
		

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	
				/* Check If sheet not emprt */
		        $title = isset($Row[0]) ? $Row[0] : '';
				$issn = isset($Row[1]) ? $Row[1] : '';
				$e_issn = isset($Row[2]) ? $Row[2] : '';
				$publisher = isset($Row[3]) ? $Row[3] : '';
				
	$total=$mysqli->query("SELECT * FROM journals WHERE title= '".$title."'");
    $tindex=$mysqli->query("SELECT * FROM status WHERE title='".$title."' AND intexed='".$file_name."'");
        if (!$total || mysqli_num_rows($total)>0){
            $remarkSql = "UPDATE journals
                         SET `title` = '".$title."' ,`issn` = '".$issn."',`e_issn` = '".$e_issn."' ,`publisher` = '".$publisher."'
                         WHERE `title`='".$title."'";
         
              
			   if (!$tindex ||mysqli_num_rows($tindex)==0){
			 $mysqli->query("INSERT INTO `status`(title,indexed)
                            VALUES ('".$title."','".$file_name."')");
							}
                            
        } else {
            $remarkSql= "INSERT INTO `journals` (title,issn,e_issn,publisher)
                            VALUES ('".$title."','".$issn."','".$e_issn."','".$publisher."')";
							
				 $mysqli->query("INSERT INTO `status`(title,indexed)
                            VALUES ('".$title."','".$file_name."')");
        }

			//	$query = "insert into items(title,description) values('".$title."','".$description."')";
	 
				$mysqli->query($remarkSql);
	
	        }

		}
		
		$mysqli->query("DELETE s1 FROM status s1, status s2 WHERE s1.id > s2.id AND s1.title = s2.title AND s1.indexed = s2.indexed");
		//$hyp=$mysqli->query("select * from journals");
		//while($row = $hyp->fetch_assoc()) {
		// if(strlen($row['issn']) <= 8) {
        // $first_part = substr($row['issn'],0,4);
         // $second_part = substr($row['issn'],4,8);
         // $zipcode = $first_part.'-'.$second_part;
		  // $mysqli->query("UPDATE journals SET `issn` = $zipcode WHERE id = {$row['id']}");
    //}
//}

		echo '<script type="text/javascript">alert("Journals Inserted Successfully");</script>';
		

	}else { 
	echo '<script type="text/javascript">alert("Sorry, File type is not allowed. Only Excel file.");</script>';
	
	}

}
mysqli_close($mysqli);
?>

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

</head>
<body>
<center>
<div id="wrapper">
<div class="header">
<div class="logo"><img src="local/images/logo05.png" /></div></div>
<nav id="ddmenu">
    <ul>
          <li><a href="#">Upload</a></li>       
        <li><a href="view.php">View</a></li>
		<li><a href="addlink.php">Page Link</a></li>
		<li><a href="contact_messages.php">Messages</a></li>
		<li><a href="logout.php"> LogOut </a></li>
         
   </ul></nav>

        <h1 style="color:red">Full File Upload</h1> 
    
   <form  action="admin.php" method="POST" enctype="multipart/form-data">
 
  <input type="file"  name="file" >
  
 <input type= "submit" name="Submit" value ="Upload" >
  
  
</form>
	     
        <br />
		<br />
		<br />
		<br />
		<br />
		   <br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
        
        
        
   
<div class="footer"><hr /><div class="footer"><div class="copy">2017 all right reserved 
</div><div class="by">powered by @Findex</div></div>

</div>
</center>

</body>
</html>
