<?php

	session_start();

	if(isset($_SESSION['venue_email']))
	{
		session_destroy();
		header('location: venue-login.php');
	}
	else
	{
		header('location: venue-login.php');
	}

?>