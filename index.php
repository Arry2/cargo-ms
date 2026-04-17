<?php
include("conn.php");
include("nav.php");
if (isset($_POST['submit'])) {
    # code...
    $a=$_POST['pname'];
    $b=$_POST['desc'];
    if (preg_match('/^[A-Za-z]*$/',$a)) {
        if (preg_match('/^[A-Za-z]*$/',$a)) {
    
    $sel="INSERT INTO product values(null,'$a','$b')";
    $selex=mysqli_query($conn,$sel);
    if ($selex) {
        # code...
        
        echo"<script>window.alert('product inserted');window.location.href='index.php'</script>";
    } else {
        # code...
        echo"<script>window.alert('insert failed');window.location.href='index.php'</script>";
    }}else {
        echo"<script>window.alert('use letters')</script>";
    }}else{
        echo"<script>window.alert('use letters')</script>";
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
        .cont{
            width:18pc;
            background-color: grey;
            border-radius: 1pc;
        }
.c2{
    width:15pc;
    margin-left: 1pc;
    
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
    <div class="cont">
        <div class="c2">
        <h4>ADD PRODUCT</h4>
    <form action="" method="post">
        <input type="text" name="pname" placeholder="ENTER PRODUCT NAME" class="form-control" required><br>
        <input type="text" name="desc" placeholder="ENTER DESCRIPTION" class="form-control" required><br>
        <input type="submit" name="submit" value="submit" class="form-control btn btn-info">
    </form>
    </div>
    </div>
    <div class="cont1">
        <h4>LIST OF PRODUCTS</h4>
    <table class="table table-hower table-bordered table-striped" style="box-shadow: 0 0 20px orange;">
        <tr>
            <th>PRODUCT NAME</th>
            <th>DESCRIPTION</th>
        <th>ACTION</th>
        </tr>
        <?php
        include("conn.php");
        $s="SELECT * FROM product";
        $sx=mysqli_query($conn,$s);
        while ($row=mysqli_fetch_array($sx)) {
            # code...
        ?>
        
        <tr>
            <td><?php echo $row['1']?></td>
            <td><?php echo $row['2']?></td>
            <td>
<a class="btn btn-info" href="updatep.php?id=<?php echo $row['0']?>">update</a>
<a class="btn btn-danger" href="deletep.php?id=<?php echo $row['0']?>">delete</a>
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