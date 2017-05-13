<?php

$conn=odbc_connect('sba','','',SQL_CUR_USE_ODBC);
odbc_longreadlen( $rs, 1000000);
$sql="INSERT INTO Comment (PostContent)
VALUES
('$_POST[content]')";
		$rs=odbc_exec($conn,$sql);
echo "1 record added";

?>