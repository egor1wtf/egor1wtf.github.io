<?php
include 'database.php';


mysqli_set_charset($connection, "utf8_general_ci");

$email=$_GET['login'];
$password = md5($_GET['password']);

$query = "SELECT login, password FROM register WHERE login = '$email' AND password = '$password'";
$result = mysqli_query($connection, $query)
or die("Ошибка " . mysqli_error($connection));

if(mysqli_num_rows($result) == 1) {
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $row['login'];
        $_SESSION['password'] = $row['password'];
    }
    echo '<meta http-equiv="refresh" content="0; URL=../info.html">';

} else echo "Не получилось войти.";
echo '<br><br><button onclick="window.location.href=\'/../index.html\'" type="button" >Вернуться назад</button>';

?>




