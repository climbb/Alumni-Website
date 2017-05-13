<?php

include("functionlibrary.php");

If ($_POST['submit'] == "Login")
{
	$userLoginName=$_POST['userLoginName'];
	$password=$_POST['password'];
}

	$loginUserStatus = CheckUserLogin($userLoginName, $password);
	If($loginUserStatus == 1)
	{
		//Successful
		?>
        	<meta http-equiv="refresh" content="0; url=index.php">
            <?php
	}
	Else
	{
		//Unsuccessful
		$conn=odbc_connect('sba','','');
		$sql="SELECT COUNT(*) AS CountUnproved FROM UserTable WHERE UserLoginName='" . $userLoginName . "' AND Password='" . $password . "' AND Proved='0'";
		session_start();
		$sessionID = session_id();
		$rs = odbc_exec($conn,$sql);
		$countUnprovedUser=odbc_result($rs,"CountUnproved");
		if ($countUnprovedUser == 1)
		{ $sql="INSERT INTO UserLoginSuccessCheck (Session, St) values ('" . $sessionID . "', '2')";odbc_exec($conn,$sql);}
		
		else{

		$sql="INSERT INTO UserLoginSuccessCheck (Session, St) values ('" . $sessionID . "', '1')";odbc_exec($conn,$sql);
		}
				?>
        	<meta http-equiv="refresh" content="0; url=login-1.php">
            <?php
	}
	
	 

?>

