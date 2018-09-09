<?php

include 'database.php';
$login=$_POST['login'];
$password= md5($_POST['password']);
$email=$_POST['email'];
$id_student=$_POST['id_student'];
if($login!=null&& $password!=null && $email!=null){
    mysqli_set_charset($connection, "utf8");
    $sql = "UPDATE `register` SET `login` = '$login', `password` = '$password', `email` = '$email' WHERE `id_student` = $id_student";
    $result = mysqli_query($connection, $sql);
}
echo "<script> window.location.href='../registration.html';</script>";
?>