<?php
require '../vendor/autoload.php';
include 'database.php';

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$type = $_POST['type'];
$n_group = $_POST['n_group'];

mysqli_set_charset($connection, "utf8");
$sql = "INSERT INTO `inf`(`lastname`,`firstname`,`middlename`, `type`, `n_group`) VALUES ('$lastname','$firstname','$middlename', '$type', '$n_group')";
$result = mysqli_query($connection, $sql);
//проверка на успешное добавление
$sql = "SELECT `id` FROM `inf` where lastname = '$lastname' AND  firstname = '$firstname' AND middlename = '$middlename' AND type = '$type' AND n_group = '$n_group'";
$resultm = mysqli_query($connection, $sql);
while( $row = mysqli_fetch_assoc($resultm) ){
    $kek = $row['id'];
}
// Надо починить вывод
$fileName = '../doc/input.docx';

$word = new \PhpOffice\PhpWord\TemplateProcessor($fileName);
$word->setValue('lastname', $lastname);
$word->setValue('firstname', $firstname);
$word->setValue('middlename', $middlename);
$word->setValue('type',$type);
$word->setValue('n_group',$n_group);
$word->setValue('date',date("d.m.y"));
$word->saveAs('output.docx');


echo "<script type='text/javascript'>alert('Ваш уникальный идентификатор = $kek'); window.location = 'output.docx';</script>";
echo "<script> window.location.href='../register.html';</script>";

?>

