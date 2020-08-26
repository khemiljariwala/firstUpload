<?php include 'conn.php'; ?>

<?php 

$qry = "DELETE FROM vendor_detail WHERE vendor_detail_id='".$_POST['vdeleteid']."'";

$q = mysqli_query($conn, $qry);

?>