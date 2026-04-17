<?php
include("conn.php");
$id=$_GET['id'];
$del="DELETE from product where pid='$id'";
$delex=mysqli_query($conn,$del);
if ($delex) {
    # code...
    
    echo"<script>window.alert('product deleted');window.location.href='index.php'</script>";
} else {
    # code...
    echo"<script>window.alert('delete failed');window.location.href='index.php'</script>";
}
?>