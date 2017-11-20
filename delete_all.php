<?php
session_start();
// If not logged in, let log in, else logut link
		if (!isset($_SESSION['user_id']))
		{
		echo '<script type="text/javascript">alert("Please Login Again..");</script>';
		 header("location:login.php");
		}
require('db_config.php');
$sql = "DELETE FROM journals";
$sq = "DELETE FROM status";
$mysqli->query($sql);
$mysqli->query($sq);
 header("location:view.php");
?>