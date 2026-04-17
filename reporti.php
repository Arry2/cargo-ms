<?php
include("conn.php");
include("nav.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .con{
            width: 15pc;
        }
        .container{
            display: flex;
            justify-content: space-between;
            margin-top: 4pc;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="con">
        <h4>DAILY REPORT</h4>
    <form action="" method="post">
        <input type="date" name="daily" class="form-control" required><br>
        <input type="submit" name="generate" value="generate" class="form-control btn btn-info">
    </form>
    </div>
    <div class="con1">  
        <h4>REPORT</h4> 
         <table class="table table-hower table-bordered table-striped" style="box-shadow: 0 0 20px orange;">
<tr>
    <th>PRODUCT NAME</th>
    <th>DATE</th>
    <th>AMOUNT IN</th>
    <th>DATE</th>
    <th>AMOUNT OUT</th>
    <th>REMAINING</th>
</tr>
<?php
if (isset($_POST['generate'])) {
    # code...
    $a=$_POST['daily'];
    $sel1="SELECT *from product";
    $selex1=mysqli_query($conn,$sel1);
    
//$sel="select product.pname,stockin.date,sum(stockin.amount),stockout.date,sum(stockout.amount) from
 //product,stockin,stockout where stockin.date='$a' and stockout.date='$a' and product.pid=stockin.pid and
 // product.pid=stockout.pid group by product.pid,stockin.date,stockout.date";
//$selex=mysqli_query($conn,$sel);
while ($row=mysqli_fetch_array($selex1)) {
    # code...
$id=$row['pid'];
$sel2="SELECT *,sum(amount) from stockin where pid='$id' and stockin.date='$a'";
$selex2=mysqli_query($conn,$sel2);
$se=mysqli_fetch_array($selex2);
$sel3="SELECT *,sum(amount) from stockout where pid='$id' and stockout.date='$a'";
$selex3=mysqli_query($conn,$sel3);
$se2=mysqli_fetch_array($selex3)
?>
<tr>
    <td><?php echo $row['pname']?></td>
    <td><?php echo $se['date']?></td>
    <td><?php echo $se['sum(amount)']-0?></td>
    <td><?php echo $se2['date']?></td>
    <td><?php echo $se2['sum(amount)']-0?></td>
    <td><?php echo $se['sum(amount)']-$se2['sum(amount)'] ?></td>
</tr>
<?php
}
}
?>
    </table>
    </div>
    </div>
</body>
</html>