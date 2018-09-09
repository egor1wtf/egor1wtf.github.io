<?php

$connection = mysqli_connect('localhost', 'root', '', 'Cafedra');

if ($connection == false) {
    echo 'Failed to connect';
    echo mysqli_connect_errno();
    exit();
}

header("Content-Type: application/json");

function getDataString()
{
    global $connection;
    $query = "SELECT mark, count(id) FROM inf GROUP BY mark";
    $res = $connection->query($query);
    $getData = '{"cols": [';
    $getData .= '{"id":"","label":"Оценка","type":"number"},';
    $getData .= '{"id":"","label":"Количество","type":"number"}';
    $getData .= '], "rows": [';

    while ($row = mysqli_fetch_assoc($res)) {
        $getData .= '{"c":[{"v":"' . $row['mark'] . '"},{"v":' . $row['count(id)'] . '}]},';
    }
    $getData = rtrim($getData, ',');
    $getData .= ']}';
    return $getData;
}

echo getDataString();

?>