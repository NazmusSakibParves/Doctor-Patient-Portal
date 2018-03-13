<?php
	session_start();
	if(!isset($_SESSION["Duser_name"]))
	{
		header("Location: ../errorpage.php");
	}
	
?>