<?php
include("conn.php");
include("nav.php");
if (isset($_POST['submit'])) {
    # code...
    $a=$_POST['pname'];
    $b=$_POST['amount'];
    $c=$_POST['up'];
    $d=$c*$b;
    $sel="INSERT INTO stockin values(null,'$a',current_date(),'$b','$c','$d')";
    $selex=mysqli_query($conn,$sel);
    if ($selex) {
        # code...
       
        echo"<script>window.alert('stock inserted');window.location.href='stockin.php'</script>";
    } else {
        # code...
        echo"<script>window.alert('stock in failed');window.location.href='stockin.php'</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .co{
            width:15pc;
        }
        .container{
            margin-top: 4pc;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="co">
    <h4>ADD STOCK</h4>
    <form action="" method="post">
    <select name="pname" class="form-control">
        <option value="">SELECT PRODUCT NAME</option>
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
        <input type="number" min="1" max="100"  name="amount" placeholder="ENTER AMOUNT" class="form-control"><br>
        <input type="number" min="100" max="10000" name="up" placeholder="ENTER UNIT PRICE" class="form-control"><br>
        <input type="submit" name="submit" value="submit" class="form-control"><br>
    </form>
    </div>
    <div class="co1">
        <h4>LIST OF STOCK</h4>
    <table class="table table-hower table-bordered table-striped" style="box-shadow: 0 0 20px orange;">
        <tr>
            <th>PRODUCT NAME</th>
            <th>DATE</th>
            <th>AMOUNT</th>
            <th>UNIT PRICE</th>
            <th>TOTAL PRICE</th>
            <th>ACTION</th>
        </tr>
        <?php
        $sel3="select stockin.stid,product.pname,stockin.date,stockin.amount,stockin.uprice,stockin.tprice from product,stockin where product.pid=stockin.pid";
        $selex3=mysqli_query($conn,$sel3);
        while ($rw=mysqli_fetch_array($selex3)) {
            # code...
        
        ?>
        <tr>
            <td><?php echo $rw['pname']?></td>
            <td><?php echo $rw['date']?></td>
            <td><?php echo $rw['amount']?></td>
            <td><?php echo $rw['uprice']?></td>
            <td><?php echo $rw['tprice']?></td>
            
            <td>
                <a class="btn btn-info" href="updatei.php?id=<?php echo $rw['stid']?>">update</a>
                <a class="btn btn-danger" href="deletei.php?id=<?php echo $rw['stid']?>">delete</a>
            </td>
        </tr>
    <?php
}
?>
    </table>
    </div>
    </div>
</body>
</html>