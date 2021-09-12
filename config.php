<?php
$server="sql303.epizy.com";
$user="epiz_28903455";
$pass="eZeQGj4yVl2";
$database="epiz_28903455_login_detail";

$conn= mysqli_connect($server,$user,$pass,$database);

if(!$conn){
    echo "<script>alert('connection failed')</script>";
}