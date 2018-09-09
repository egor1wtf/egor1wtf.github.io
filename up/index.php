<?php
include('inc/db.php');

$sql = "SELECT * FROM `inf`";

$res = mysql_query($sql);

?>

<html>
<head>
    <title>Documents</title>
</head>
<body>

    <a href="upload.php">Add new Documents</a> <br> <br>
    <?php
    while ($row = mysql_fetch_array($res))
    {
        $id = $row['id'];
        $name = $row['name'];
        $path = $row['path'];

        echo $id. "" . $name . "<a href='download.php?dow=$path'>Download</a>";
    }
    ?>
</body>
</html>
