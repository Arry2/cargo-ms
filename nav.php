<?php
include("conn.php");
session_start();
if (!isset($_SESSION['id'])) {
    # code...
    
        echo"<script>window.alert('ACCESS DENIED!!!!!');window.location.href='login.php'</script>";
    
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
        .c{
            height: 8pc;
            box-shadow: 0 0 20px black; 
        }
    </style>
</head>
<body>
    <div class="c">
    <center>
    <h1>ARMY SHOP MANAGENT SYSTEM</h1>
    <a class="btn btn-info" href="index.php">PRODUCTS</a>
    <a class="btn btn-info" href="stockin.php">STOCK IN</a>
    <a class="btn btn-info" href="stockout.php">STOCK OUT</a>
    <a class="btn btn-info" href="reporti.php">STOCKIN REPORT</a>
    <a class="btn btn-info" href="logout.php">LOGOUT(<?php echo $_SESSION['name']?>)</a>
    </center>
    </div>
</body>
</html>