<?php
include("conn.php");
include("nav.php");
if (isset($_POST['submit'])) {
    # code...
    $a=$_POST['pname'];
    $b=$_POST['amount'];
    $c=$_POST['up'];
    $d=$c*$b;
    $one="SELECT *, sum(amount) from stockin where pid='$a'";
    $onex=mysqli_query($conn,$one);
    $select1=mysqli_fetch_array($onex);

    $two="SELECT *, sum(amount) from stockout where pid='$a'";
    $twox=mysqli_query($conn,$two);
    $select2=mysqli_fetch_array($twox);
    if ($select1['sum(amount)']-$select2['sum(amount)']>= $b) {
        # code...
    
    $ins="INSERT INTO stockout values(null,'$a',current_date(),'$b','$c','$d')";
    $inlex=mysqli_query($conn,$ins);
    if ($inlex) {
        # code...
       
        echo"<script>window.alert('stock removed');window.location.href='stockout.php'</script>";
    } else {
        # code...
        echo"<script>window.alert('failed');window.location.href='stockout.php'</script>";
    }
}else {
    # code...
    echo"<script>window.alert('stock not enought');window.location.href='stockout.php'</script>";
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
    <h4>REMOVE STOCK</h4>
    <form action="" method="post">
    <select name="pname" class="form-control">
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
        <input type="number" min="1" max="1000"   name="amount" placeholder="ENTER AMOUNT" class="form-control"><br>
        <input type="number" min="100" max="10000" name="up" placeholder="ENTER UNIT PRICE" class="form-control"><br>
        <input type="submit" name="submit" value="submit" class="form-control">
    </form>
    </div>
    <div class="cont1">
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
        $sel3="select stockout.sid,product.pname,stockout.date,stockout.amount,stockout.uprice,stockout.tprice from product,stockout where product.pid=stockout.pid";
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
                <a class="btn btn-info" href="updateo.php?id=<?php echo $rw['sid']?>">update</a>
                <a class="btn btn-danger" href="deleteo.php?id=<?php echo $rw['sid']?>">delete</a>
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