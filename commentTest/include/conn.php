<?php
/*���ݿ�·��,���Լ��޸ģ�����������в�����*/
$db=$_SERVER['DOCUMENT_ROOT']."\include\#mydb.mdb";
//echo $db;
//exit;
$conn = new COM('ADODB.Connection') or die('can not start Active X Data Objects');
$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$db"); 
//if ($conn)
//echo "ok";
//exit;
?>