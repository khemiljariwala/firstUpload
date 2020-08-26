<?php

	session_start();

	if(isset($_SESSION['vendor_email']))
	{
		session_destroy();
		header('location: vendor-login.php');
	}
	else
	{
		header('location: vendor-login.php');
	}

?>