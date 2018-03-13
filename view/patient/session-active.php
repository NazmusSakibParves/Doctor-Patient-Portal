<?php
	session_start();
	if(!isset($_SESSION["Puser_name"]))
	{
		header("Location: ../errorpage.php");
	}
	
?>