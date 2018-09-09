<?php
error_reporting(E_ERROR);

$connection = new mysqli('localhost:3306', 'root', '', 'Cafedra');
if (mysqli_connect_errno())
{
    $err =  "Ошибка -- " .mysqli_connect_errno()."<br>".mysqli_connect_error();
//    echo mysqli_connect_errno();
}


?>

