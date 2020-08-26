<?php

    require('conn.php');

?>

<?php

    if(!empty($_POST["venue_id"]))
    {

        // Fetch venue data based on the specific venue type 
        $query4 = "SELECT * FROM venue_detail WHERE venue_id = ".$_POST['venue_id']." AND venue_is_active = 1 ORDER BY venue_detail_id DESC LIMIT 5"; 
        $q4 = mysqli_query($conn, $query4);
     
        // Generate HTML of venue name options list 
        if(mysqli_num_rows($q4) > 0)
        { 
            
            while($row4 = mysqli_fetch_array($q4))
            {

                $name=$row4['venue_fname'].$row4['venue_detail_id'];

            ?>
                
            
                <li class="nav-item">
                    <a class="nav-link" id="venue_images" data-toggle="tab" name="venue_images" href="<?php echo "#".$name; ?>" aria-expanded="true">
                        <span class="image">
                            <img src="../venue/venue_thumbnail/<?php echo $row4['venue_pic']; ?>" alt="Image_not_found"> 
                        </span>
                        <span class="title">
                            <strong class="yellow-color"><?php echo $row4['venue_name']; ?> </strong>
                        </span>
                        <small class="sub-title">Venue Capacity: <?php echo $row4['venue_capacity']; ?></small>
                        <small class="price yellow-color">Price from <?php echo $row4['venue_per_day_price']; ?></small>
                    </a>
                </li>
            

            <?php



            } 
        }
        else
        { 
           echo "Select Venue type from list first!!!";
        } 
    }


?>