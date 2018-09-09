<?php
error_reporting(E_ERROR);

$connection = new mysqli('localhost:3307', 'root', 'root', 'accounts');
if (mysqli_connect_errno())
{
    $err =  "Ошибка -- " .mysqli_connect_errno()."<br>".mysqli_connect_error();
//    echo mysqli_connect_errno();
}


?>

