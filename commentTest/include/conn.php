<?php
/*数据库路径,请自己修改，否则可能运行不正常*/
$db=$_SERVER['DOCUMENT_ROOT']."\include\#mydb.mdb";
//echo $db;
//exit;
$conn = new COM('ADODB.Connection') or die('can not start Active X Data Objects');
$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db"); 
//if ($conn)
//echo "ok";
//exit;
?>