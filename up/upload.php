<?php
include("inc/db.php");

if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $mark = $_POST['mark'];
    $doc_name = $_POST['doc_name'];

    $name = $_FILES['myfile']['name'];
    $tmp_name = $_FILES['myfile']['tmp_name'];

    if($name) {
        $location = "documents/$name";
        move_uploaded_file($tmp_name, $location);
        $query = mysql_query("UPDATE `inf` SET `name` = '$doc_name', `path` = '$location', `mark` = '$mark' WHERE `id` = $id");
        echo "<script type='text/javascript'>alert('Успешно'); </script>";
    }

    else

        die("Please select a file");

    $one = mysql_query("update inf set id_prep = 1 WHERE type = 'Учебная [2 семестр]'");
    $two = mysql_query("update inf set id_prep = 2 WHERE type = 'Производственная [6 семестр]'");
    $three = mysql_query("update inf set id_prep = 3 WHERE type = 'Преддипломная [8 семестр]'");
    $four = mysql_query("update inf set id_prep = 4 WHERE type = 'НИР [8 семестр]'");


}
?>

<html>
<head>
    <title>Upload Documents</title>
    <style>
        @import url("../style/index.css");
        @import url("../style/menu.css");
        p {
            margin-right: 5%; /* Отступ справа */
            margin-left: 200px;
            font-size: 14pt;
        }
        input[type=text] {
            width: 85%;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/addcss.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <h1 align="center">Учёт документов</h1>
    <hr>
</head>
<body>
<div id="menu">
    <center><a>МЕНЮ</a></center>
    <li><a href="../info.html">Информация о кафедре</a> <br></li>
    <li><a href="../docum.html">Нормативные документы</a> <br></li>
    <li><a href="../stats.html">Статистика</a> <br></li>
    <li><a href="../register.html">Добавление студента</a> <br></li>
    <li><a href="upload.php">Учёт документов </a> <br></li>
    <li><a href="../PersonSearch.html">Поиск студента</a> <br></li>
    <li><a href="../index.html">Выход</a></a> <br></li>
</div>

<table border="0" align="center" cellpadding="10" cellspacing="5">
<div class="input" align="center">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <th>ID:</th><th>
            <input type="text" name="id"></th><tr><th>
            Оценка:</th><th>
                <input type="text" name="mark"></th><tr><th>
                Имя файла в БД:</th><th>
        <input type="text" name="doc_name"></th><tr><th>
            </th><th><input type="file" name="myfile"></th><tr><th>
            </th><th><input type="submit" name="submit" value="Загрузить" class="btn btn-primary"></th><tr><th>
    </form>
</div>
</table>
</body>
</html>