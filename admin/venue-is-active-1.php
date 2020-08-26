<?php

	session_start();
	require('conn.php');

	if(isset($_SESSION['aemail']))
	{
		
		$qry = "UPDATE venue_detail SET venue_is_active = '1' WHERE venue_detail_id=".$_GET['venue_detail_id'];

        $q = mysqli_query($conn, $qry);

		header('location: venue-view-active-registrations.php');
	}
	else
	{
		header('location: auth-login.php');
	}

?>