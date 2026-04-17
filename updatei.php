<?php
include("conn.php");
include("nav.php");
$id=$_GET['id'];
$sel="select product.pid,product.pname,stockin.date,stockin.amount,stockin.uprice,stockin.tprice from product,stockin where product.pid=stockin.pid and stid='$id'";
$selex=mysqli_query($conn,$sel);
$rw=mysqli_fetch_array($selex);
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
    <h4>UPDATE STOCK</h4>
    <form action="" method="post">
    <select name="pname" class="form-control">
    <option value="<?php echo $rw['pid']?>"><?php echo $rw['pname']?></option>
        <?php
        $sel2="SELECT * from product";
        $selex2=mysqli_query($conn,$sel2);
        while ($row=mysqli_fetch_array($selex2)) {
            # code...
        
        ?>
        <option value="<?php echo $row['pid']?>"><?php echo $row['pname']?></option>
    <?php
}
?>
    </select><br>
        <input type="number" name="amount" value="<?php echo $rw['amount']?>" class="form-control"><br>
        <input type="number" name="up" value="<?php echo $rw['uprice']?>" class="form-control"><br>
        <input type="submit" name="update" value="update" class="form-control btn btn-info">
    </form>
    </div>
    <?php
    if (isset($_POST['update'])) {
        # code...
        //$a=$_POST['pname'];
        $b=$_POST['amount'];
        $c=$_POST['up'];
        $d=$c*$b;
        $sel="UPDATE `stockin` SET `amount` = '$b', `uprice` = '$c', tprice='$d' WHERE stid ='$id'";
        $selex=mysqli_query($conn,$sel);
        if ($selex) {
            # code...
           
            echo"<script>window.alert('stock updated ');window.location.href='stockin.php'</script>";
        } else {
            # code...
            echo"<script>window.alert('stock in update failed');window.location.href='stockin.php'</script>";
        }
        
    }
    
    ?>
</body>
</html>