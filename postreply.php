<?php

include("functionlibrary.php");


date_default_timezone_set('Asia/Taipei');
		if(isset($_POST['submit'])) {
		$content= $_POST['content'];
		$replyMother= $_POST['replyMother'];
		//Block html code
					$content= str_replace("<","#&60;",$content);
		$content= str_replace(">","&gt;",$content);;
		$content= str_replace("'","&#039;",$content);
		$content= str_replace("[b]","<b>",$content);
		$content= str_replace("[/b]","</b>",$content);
		$username = $_POST['username'];
		$time = date ("Y-m-d / H:i:s");
			$conn=odbc_connect('sba','',''); 
			$sql="SELECT UserLoginName AS PostUserLoginName FROM UserTable WHERE UserName='" . $username . "'";
		$rs=odbc_exec($conn,$sql);
		$userLoginName=odbc_result($rs,"PostUserLoginName");
			$sql="SELECT AvatarType AS AvatarImage FROM UserTable WHERE UserName='" . $username . "'";
		$rs=odbc_exec($conn,$sql);
		$avatarType=odbc_result($rs,"AvatarImage");
		$content= uni_encode($_POST['content']);
											$content= str_replace("[url]","{url}",$content);
				$content= str_replace("[\/url]","{#url}",$content);
		$sql="INSERT INTO Reply (PostContent, PostTime, UserName, UserLoginName, ReplyMother) VALUES ('" . $content . "','" . $time . "','" . $username . "', '" . $userLoginName . "', '" . $replyMother . "')";

		odbc_exec($conn,$sql);
		

} ?><head>


<META HTTP-EQUIV="refresh" CONTENT="0; url=comment_post.php?commentID=<?php echo $replyMother; ?>"></head>