
  
<?php

  require('conn.php');

    $output = '';
    $ddvenuenameID=$_POST['ddvenuenameID'];
    $select_query = "SELECT * FROM venue_enquiry where venue_detail_id=$ddvenuenameID";
    $result = mysqli_query($conn, $select_query);
    $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th>First Name</th>  
                         <th>Last Name</th>  
                         <th>Email</th>  
                         <th>Mobile</th>  
                         <th>Date</th>  
                         <th>Budget</th>  
                         <th>Message</th>  
                    </tr>

     ';
      while($row = mysqli_fetch_array($result))
      {
        $output .= '
        <tr>  
          <td>' . $row["enquiry_first_name"] . '</td>  
          <td>' . $row["enquiry_last_name"] . '</td>
          <td>' . $row["enquiry_email"] . '</td>
          <td>' . $row["enquiry_mob"] . '</td>
          <td>' . $row["enquiry_date"] . '</td>
          <td>' . $row["enquiry_budget"] . '</td>
          <td>' . $row["enquiry_msg"] . '</td>
        </tr>';
      }
      $output .= '</table>';
      echo $output;



?>