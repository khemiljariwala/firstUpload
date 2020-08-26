<?php

    require('conn.php');

?>

<?php

    if(!empty($_POST["venue_id"]))
    {

        // Fetch venue data based on the specific venue type 
        $query = "SELECT * FROM venue_detail WHERE venue_id = ".$_POST['venue_id']." AND venue_is_active = 1 ORDER BY venue_name ASC"; 
        $q = mysqli_query($conn, $query);
     
        // Generate HTML of venue name options list 
        if(mysqli_num_rows($q) > 0)
        { 
            echo '<option value="">Select Venue</option>'; 
            while($row = mysqli_fetch_array($q))
            {  
                echo '<option value="'.$row['venue_detail_id'].'">'.$row['venue_name'].'</option>'; 
            } 
        }
        else
        { 
            echo '<option value="">Venue not available</option>'; 
        } 
    }






?>