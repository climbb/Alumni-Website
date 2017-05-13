<?php

include("functionlibrary.php");

		$conn=odbc_connect('sba','','');
		session_start();
		if(isset($_POST['postId'])) {
		$id=$_POST['postId'];}
		if(isset($_POST['approval'])) {		
if ($_POST['approval'] == "accept")
{
	$sql="UPDATE UserTable SET Proved='1' WHERE UserID=" . $id;
	odbc_exec($conn,$sql);

}
if ($_POST['approval'] == "reject")
{
	$sql="DELETE * FROM UserTable WHERE UserID=" . $id;
	odbc_exec($conn,$sql);

}}
?>
<head>


<META HTTP-EQUIV="refresh" CONTENT="0; url=admincontrol-1.php"></head>