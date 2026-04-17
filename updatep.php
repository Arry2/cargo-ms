<?php
include("nav.php");
include("conn.php");
$id=$_GET['id'];
$se="SELECT * FROM product where pid='$id'";
$see=mysqli_query($conn,$se);
$rw=mysqli_fetch_array($see);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .co{
            width: 15pc;
            margin-left: 40pc;
            margin-top: 4pc;
        }
    </style>
</head>
<body>
    <div class="co">
        <center>
    <h4>UPDATE PROCUCT</h4>
    <form action="" method="post">
        <input type="text" name="pname" value="<?php echo $rw['pname']?>" class="form-control" required><br>
        <input type="text" name="desc" value="<?php echo $rw['description']?>" class="form-control" required><br>
        <input type="submit" name="update" value="update" class="form-control btn btn-info">
    </form>
    </center>
    </div>
    <?php
    if (isset($_POST['update'])) {
        # code...
        $a=$_POST['pname'];
        $b=$_POST['desc'];
        $up="UPDATE `product` SET `pname` = '$a', `description` = '$b' WHERE pid ='$id'";
        $upex=mysqli_query($conn,$up);
        if ($upex) {
            # code...
            
            echo"<script>window.alert('product updated');window.location.href='index.php'</script>";
        } else {
            # code...
            echo"<script>window.alert('update failed');window.location.href='index.php'</script>";
        }
    }
    ?>