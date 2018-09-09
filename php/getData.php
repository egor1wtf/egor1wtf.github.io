<?php

$connection = mysqli_connect('localhost', 'root', '', 'Cafedra');

if ($connection == false)
{
    echo 'Failed to connect';
    echo mysqli_connect_errno();
    exit();
}

header("Content-Type: application/json");

function getDataString(){
	global $connection;
	$query = "SELECT type, count(id) FROM inf GROUP BY type";
	$res = $connection->query($query);
	$getData = '{"cols": [';
	$getData .= '{"id":"","label":"Country","type":"string"},';
	$getData .= '{"id":"","label":"sum(Visits)","type":"number"}';
	$getData .=  '], "rows": [';

	while($row = mysqli_fetch_assoc($res)) {
		$getData .= '{"c":[{"v":"' . $row['type'] . '"},{"v":'. $row['count(id)'] . '}]},';
	}
	$getData = rtrim($getData, ',');
	$getData .= ']}';
	return $getData;
}
echo getDataString();

?>

