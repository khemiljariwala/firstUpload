<?php

	session_start();
	require('conn.php');

	if(isset($_SESSION['aemail']))
	{
		
		$qry = "UPDATE vendor_detail SET vendor_is_active = '2' WHERE vendor_detail_id=".$_GET['vendor_detail_id'];

        $q = mysqli_query($conn, $qry);

		header('location: vendor-view-unactive-registrations.php');
	}
	else
	{
		header('location: auth-login.php');
	}

?>