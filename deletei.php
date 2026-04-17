<?php
include("conn.php");
$id=$_GET['id'];
$del="delete from stockin where stid ='$id'";
$delex=mysqli_query($conn,$del);
if ($delex) {
    # code...
    
    echo"<script>window.alert('stock deleted');window.location.href='stockin.php'</script>";
} else {
    # code...
    echo"<script>window.alert('stock delete failed');window.location.href='stockin.php'</script>";
}
?>