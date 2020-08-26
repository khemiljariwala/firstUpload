<?php

	require('conn.php');

?>

<?php

	if(!empty($_POST["vendor_id"]))
	{

    	// Fetch vendor data based on the specific vendor type 
    	$query = "SELECT * FROM vendor_detail WHERE vendor_id = ".$_POST['vendor_id']." AND vendor_is_active = 1 ORDER BY vendor_name ASC"; 
    	$q = mysqli_query($conn, $query);
     
    	// Generate HTML of vendor name options list 
    	if(mysqli_num_rows($q) > 0)
    	{ 
        	echo '<option value="">Select Vendor</option>'; 
        	while($row = mysqli_fetch_array($q))
        	{  
            	echo '<option value="'.$row['vendor_detail_id'].'">'.$row['vendor_name'].'</option>'; 
        	} 
    	}
    	else
    	{ 
        	echo '<option value="">Vendor not available</option>'; 
    	} 
	}






?>