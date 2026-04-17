<?php
include("conn.php");
session_start();
if (isset($_POST['login'])) {
    # code...
    $a=$_POST['uname'];
    $b=$_POST['pass'];
    $sel="SELECT * FROM users where uname='$a' and password='$b'";
    $selex=mysqli_query($conn,$sel);
    if (mysqli_num_rows($selex)>0) {
        # code...
        $row=mysqli_fetch_array($selex);
        $_SESSION['id']=$row['uid'];
        $_SESSION['name']=$row['uname'];
        echo"<script>window.alert('welcome');window.location.href='index.php'</script>";
    } else {
        # code...
        echo"<script>window.alert('use correct credentials');window.location.href='login.php'</script>";
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
            margin-left: 35pc;
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
   <center><h1>ARMY SHOP MANAGENT SYSTEM</h1></center> 
    </div>
     <div class="cont">
        <center>
    <h4>LOGIN HERE</h4>
    <form action="" method="post">
    <input type="text" name="uname" placeholder="ENTER USER NAME" class="form-control" required><br>
<input type="password" name="pass" placeholder="ENTER PASSWORD" class="form-control" required><br>
<input type="submit" name="login" value="login" class="form-control btn btn-info"><br>
<a class="btn btn-success"href="reg.php">register</a>

</form>
</center>
</div>
</body>
</html>