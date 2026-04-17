<?php
include("conn.php");
session_start();
session_destroy();
echo"<script>window.alert('logged out');window.location.href='login.php'</script>";
?>