<?php
$hostname="localhost";
$username="root";
$pass="";
$db="hms";

$attach=mysqli_connect($hostname,$username,$pass,$db);

if($attach==true)
{
    print "connected";
}
else
{
    echo "Not Connect";
}
?>