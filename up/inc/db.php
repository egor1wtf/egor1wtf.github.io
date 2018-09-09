<?php
$error = "error";
$con = mysql_connect('localhost',"root", "") or die($error);
mysql_select_db('Cafedra',$con) or die($error);
