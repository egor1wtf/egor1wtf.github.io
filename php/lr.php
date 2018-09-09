<?php
$connection = new mysqli('localhost:3306', 'root', '', 'Cafedra');

mysqli_set_charset($connection, "utf8");
$sql = "SELECT `id` FROM `inf` WHERE `lastname` = 'Федосеев' and `type` = 'Программист'";
$result = mysqli_query($connection, $sql);
while( $row = mysqli_fetch_assoc($result) ){
    $kek = $row['id'];
}
 echo "<script type='text/javascript'>alert('$kek'); </script>";
?>