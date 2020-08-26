<?php

	session_start();

	if(isset($_SESSION['aemail']))
	{
		session_destroy();
		header('location: auth-login.php');
	}
	else
	{
		header('location: auth-login.php');
	}

?>