<?php
include 'database.php';
require_once('../vendor/phpoffice/phpexcel/Classes/PHPExcel.php');
function goback()
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

$lastname=$_GET['lastname'];
$firstname=$_GET['firstname'];
$middlename=$_GET['middlename'];
$type=$_GET['type'];
$n_group=$_GET['n_group'];

$templateFile = '../doc/input.xlsx';
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load($templateFile);
$sheet = $objPHPExcel->getSheetByName('Лист1');


  $sql = "select pre.*, inf.prepod From pre inf, inf pre where inf.id_prep = pre.id_prep and lastname like '%$lastname%' AND  firstname like '%$firstname%' AND middlename like '%$middlename%' AND type like '%$type%'";


  $result = $connection->query($sql);

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);


if($result->num_rows > 0){
    echo '<table border="1" cellspacing="15" cellpadding="20" align="center">';
    echo '<th>Фамилия</th>';
    echo '<th>Имя</th>';
    echo '<th>Отчество</th>';
    echo '<th>Вид практики</th>';
    echo '<th>Группа</th>';
    echo '<th>Оценка</th>';
    echo '<th>Название в БД</th>';
    echo '<th>Ссылка</th>';
    echo '<th> Научный руководитель</th>';
    echo '<hr>';
    echo '<tbody>';

    $cell_id = 2;
	  while($row = $result->fetch_assoc()) {
              echo '<tr>';
          echo '<td>' . $row['lastname'] . '</td>';
          echo '<td>' . $row['firstname'] . '</td>';
          echo '<td>' . $row['middlename'] . '</td>';
          echo '<td>' . $row['type'] . '</td>';
          echo '<td>' . $row['n_group'] . '</td>';
          echo '<td>' . $row['mark'] . '</td>';
          echo '<td>' . $row['name'] . '</td>';
          $id = $row['id'];
          $name = $row['name'];
          $path = $row['path'];
          echo '<td>'. "<a href='../up/download.php?dow=$path'>Скачать</a>".'</td>';
          echo '<td>' . $row['prepod'] . '</td>';
          echo '</tr>';

        $sheet->setCellValue('A' . $cell_id, $row['lastname']);
        $sheet->setCellValue('B' . $cell_id, $row['firstname']);
        $sheet->setCellValue('C' . $cell_id, $row['middlename']);
        $sheet->setCellValue('D' . $cell_id, $row['n_group']);
        $sheet->setCellValue('E' . $cell_id, $row['type']);
        $sheet->setCellValue('F' . $cell_id, $row['mark']);
        $cell_id = $cell_id + 1;

      }
    echo '</tbody>';
    echo '</table>';

    //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    //$objWriter->save('output.xlsx');

    } else {
        echo "<br><center>Студент не найден!</center>";
        echo "<br>";
        echo "";
    }
echo '<br><br><center><button onclick="window.location.href=\'/../PersonSearch.html\'" type="button" class="btn btn-primary">Вернуться назад</button></center>';
 ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <style>
         @import url("../style/index.css");
    </style>
     <script>


    function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    var z = 1;
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
        }
        csv.push(row.join(","));
    }

    downloadCSV(csv.join("\n"), filename);
}

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;
    csvFile = new Blob([csv], {type: "text/csv"});
    downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}
</script>
<BR>
<center><button type="submit" onclick="exportTableToCSV('data.csv')" class="btn btn-success">Экспортировать в CSV</button></center>
<script type="text/javascript">
    function getfolder(e) {
        var files = e.target.files;
        var path = files[0].webkitRelativePath;
        var Folder = path.split("/");
        alert(Folder[0]);
    }
</script>
<br>
<center><button type="submit" onclick="window.location = 'output.xlsx' " class="btn btn-success">Экспортировать в XLS</button></center>



