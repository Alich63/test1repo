<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Successfull Logout')</script>";
echo "<script>location.href='../index.php';</script>";
?>
