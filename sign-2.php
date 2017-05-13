<?php

include("functionlibrary.php");

		$conn=odbc_connect('sba','','');
		session_start();
		
If ($_POST['submit'] == "Sign Up")
{
	$signUserLoginName=$_POST['signUserLoginName'];
	$signPassword=$_POST['signPassword'];
	$signPasswordConfirm=$_POST['signPasswordConfirm'];
	$name=$_POST['name'];
	$emailAddress=$_POST['emailAddress'];
	$year=$_POST['Year'];
	$class=$_POST['Class'];
	$classNo=$_POST['ClassNo'];
	$phone=$_POST['phone'];
}

		if ($signUserLoginName == "")
	{$signUserLoginNameCheck= 1;} else {$signUserLoginNameCheck=0;} //Blank Check
			if ($signPassword == "")
	{$signPasswordCheck = 1;} else {$signPasswordCheck=0;} 
			if ($name == "")
	{$nameCheck=1;} else {$nameCheck=0;} 
			if ($emailAddress == "")
	{$emailAddressCheck=1;} else {$emailAddressCheck=0;}  
			if ($phone == "")
	{$phoneCheck=1;} else {$phoneCheck=0;} 

	$signUserStatus = Sign($signUserLoginName, $signPassword);
	if ($signUserLoginNameCheck == 1 or $signPasswordCheck == 1 or $nameCheck == 1 or $emailAddressCheck == 1 or $phoneCheck == 1)
	{$signUserStatus = 3;
	}
			if ($signPassword != $signPasswordConfirm)
	{$signUserStatus=2;} //Password Not match

	If($signUserStatus == 1)
	{
		//Unsuccessful 'Username used'

		$sessionID = session_id();
		$sql="INSERT INTO UserSignTable (Session, St) values ('" . $sessionID . "', '1')";
		odbc_exec($conn,$sql);
		?><meta http-equiv="refresh" content="0; url=sign-1.php"/><?php
	}
	Else
	{

		
	if ($signUserStatus == 2)
	{
		//Unsuccessful 'password not match'
		$conn=odbc_connect('sba','','');
		$sessionID = session_id();
		$sql="INSERT INTO UserSignTable (Session, St) values ('" . $sessionID . "', '3')";
		odbc_exec($conn,$sql);
		?><meta http-equiv="refresh" content="0; url=sign-1.php"/><?php
	}
	
	if ($signUserStatus == 3)
	{
		//Unsuccessful 'blanked'
		$conn=odbc_connect('sba','','');
		$sessionID = session_id();
		$sql="INSERT INTO UserSignTable (Session, St, UserLoginNameCheck, PasswordCheck, NameCheck, EmailAddressCheck,  PhoneCheck) values ('" . $sessionID . "', '4', '" . $signUserLoginNameCheck . "', '" . $signPasswordCheck . "', '". $nameCheck . "', '" . $emailAddressCheck . "', '" . $phoneCheck . "')";
		odbc_exec($conn,$sql);
		?><meta http-equiv="refresh" content="0; url=sign-1.php"/><?php
	}
	
	if ($signUserStatus == 0) 
	{
		//echo "Successful";
		$conn=odbc_connect('sba','','');
					$sql="INSERT INTO UserTable (UserLoginName, Password, UserName, Email, GraduationYear, GraduationClass, ClassNo, PhoneNo, Proved, PowerLevel) values ('" . $signUserLoginName . "', '". $signPassword . "', '" . $name . "', '" . $emailAddress . "', '" . $year . "', '" . $class . "', '" . $classNo . "', '" . $phone . "', '0', '0')";
			odbc_exec($conn,$sql);
		$sessionID = session_id();
		$sql="INSERT INTO UserSignTable (Session, St, SuccessUserLoginName) values ('" . $sessionID . "', '2', '" . $signUserLoginName . "')";
		odbc_exec($conn,$sql);
	
	?><meta http-equiv="refresh" content="0; url=sign-3.php"/><?php
	}
	}
?>
	