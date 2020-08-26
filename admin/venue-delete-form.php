<?php include 'conn.php'; ?>

<?php 

$qry = "DELETE FROM venue_detail WHERE venue_detail_id='".$_POST['vdeleteid']."'";

$q = mysqli_query($conn, $qry);

?>