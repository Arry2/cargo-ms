<?php
include("conn.php");
include("nav.php");
$id=$_GET['id'];
$sel="select product.pid,product.pname,stockout.date,stockout.amount,stockout.uprice,stockout.tprice from product,stockout where product.pid=stockout.pid and sid='$id'";
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
    <h4>UPDATE STOCK OUT</h4>
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
        //$d=$c*$b;
        $sel="UPDATE `stockout` SET `amount` = '$b', `uprice` = '$c' WHERE sid ='$id'";
        $selex=mysqli_query($conn,$sel);
        if ($selex) {
            # code...
           
            echo"<script>window.alert('stock out updated ');window.location.href='stockout.php'</script>";
        } else {
            # code...
            echo"<script>window.alert('stock out update failed');window.location.href='stockout.php'</script>";
        }
        
    }
    
    ?>
</body>
</html>