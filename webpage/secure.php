<?php 
session_start();
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use

// if session is not set redirect the user
if(!empty($_SESSION['log']))
	header("Location:index.php");

?>