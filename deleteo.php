<?php
include("conn.php");
$id=$_GET['id'];
$del="DELETE from stockout where sid='$id'";
$delex=mysqli_query($conn,$del);
if ($delex) {
    # code...
    
    echo"<script>window.alert('stock out deleted');window.location.href='stockout.php'</script>";
} else {
    # code...
    echo"<script>window.alert('delete failed');window.location.href='stockout.php'</script>";
}
?>