<?php

include("functionlibrary.php");
	session_start();
	$sessionID = session_id();
	$powerLevel = CheckPowerLevel($sessionID);
	$username = CheckUserName ($sessionID);
	if(isset($_GET['commentID']))
		{
			$postID=$_GET['commentID'];
		$conn=odbc_connect('sba','','',SQL_CUR_USE_ODBC);
		$sql="SELECT * FROM Comment WHERE CommentID=" . $postID;
		$rs=odbc_exec($conn,$sql);
		$postUserName= odbc_result( $rs, 2 );
	if ($powerLevel == 1 or $username == $postUserName) {

			$sql="DELETE FROM Comment WHERE CommentID=" . $postID;
		$conn=odbc_connect('sba','','',SQL_CUR_USE_ODBC);
		$rs=odbc_exec($conn,$sql);
					$sql="DELETE FROM Reply WHERE ReplyMother='" . $postID. "'";
							$rs=odbc_exec($conn,$sql);
}} ?><head>


<META HTTP-EQUIV="refresh" CONTENT="0; url=comment.php"></head>