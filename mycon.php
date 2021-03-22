<?php
$server='localhost';
$user='root';
$pass='';
$db='dcorporate';


    $connection = new mysqli ($server,$user,$pass,$db);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
