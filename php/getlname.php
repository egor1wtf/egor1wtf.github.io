<?php

include "database.php";

$sql = "SELECT lastname FROM `Students`";
$result = $connection->query($sql);
$names = array();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        array_push($names, $row['lastname']);
    }
}

if (!empty($_GET['term']))
{
    $term = $_GET['term'];

    // Шаблон рег. выражения
    $pattern = '/^'.preg_quote($term).'/iu';

    echo json_encode(preg_grep($pattern, $names));
}