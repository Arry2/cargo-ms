<?php
include("conn.php");
if (isset($_POST['register'])) {
    # code...
    $a=$_POST['uname'];
    $b=$_POST['pass'];
    if (preg_match('/^[A-Za-z ]*$/',$a)) {
        # code...
    
    $sel="INSERT INTO users values(null,'$a','$b')";
    $selex=mysqli_query($conn,$sel);
    if ($selex) {
        # code...
        
        echo"<script>window.alert('registered');window.location.href='login.php'</script>";
    } else {
        # code...
        echo"<script>window.alert('user exist');window.location.href='reg.php'</script>";
    }}else {
        
        echo"<script>window.alert('use letters only')</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .cont{
            width: 15pc;
            margin-left: 40pc;
            margin-top: 5pc;
        }
        .c{
            box-shadow: 0 0 20px black;
            height: 5pc;
        }
    </style>
</head>
<body>
    <div class="c">
   <center> <h1>ARMY SHOP MANAGENT SYSTEM</h1></center>
   </div>
    <div class="cont">
        <center>
    <h4>REGISTER HERE</h4>
    <form action="" method="post">
    <input type="text" name="uname" placeholder="ENTER USER NAME" class="form-control" required><br>
<input type="password" min="8" max="8" name="pass" placeholder="ENTER PASSWORD" class="form-control" required><br>
<input type="submit" name="register" value="register" class="form-control btn btn-info">
</form>
</center>
</div>
</body>
</html>