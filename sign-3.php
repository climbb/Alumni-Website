<html>
<body id="background3">
<?php 
include("header.php");
$sessionID = session_id();
$conn=odbc_connect('sba','','');
$sql="SELECT St AS St2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$St = odbc_result($rs,"St2");
if ($St != 2 )
{
?><meta http-equiv="refresh" content="0; url=sign-1.php"><?php	
}
$sql="SELECT SuccessUserLoginName AS SuccessUserLoginName2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$SuccessUserLoginName = odbc_result($rs,"SuccessUserLoginName2");
$sql="SELECT Password AS PasswordCheck2 FROM UserTable WHERE UserLoginName = '" . $SuccessUserLoginName . "'";
$rs = odbc_exec($conn,$sql);
$signPasswordCheck = odbc_result($rs,"PasswordCheck2");
$sql="SELECT UserName AS NameCheck2 FROM UserTable WHERE UserLoginName = '" . $SuccessUserLoginName . "'";
$rs = odbc_exec($conn,$sql);
$nameCheck = odbc_result($rs,"NameCheck2");
$sql="SELECT Email AS EmailAddressCheck2 FROM UserTable WHERE UserLoginName = '" . $SuccessUserLoginName . "'";
$rs = odbc_exec($conn,$sql);
$emailAddressCheck = odbc_result($rs,"EmailAddressCheck2");
$sql="SELECT PhoneNo AS PhoneCheck2 FROM UserTable WHERE UserLoginName = '" . $SuccessUserLoginName . "'";
$rs = odbc_exec($conn,$sql);
$phoneCheck = odbc_result($rs,"PhoneCheck2");
$sql="SELECT GraduationYear AS GraduationYear2 FROM UserTable WHERE UserLoginName = '" . $SuccessUserLoginName . "'";
$rs = odbc_exec($conn,$sql);
$GraduationYear = odbc_result($rs,"GraduationYear2");
$sql="SELECT GraduationClass AS GraduationClass2 FROM UserTable WHERE UserLoginName = '" . $SuccessUserLoginName . "'";
$rs = odbc_exec($conn,$sql);
$GraduationClass = odbc_result($rs,"GraduationClass2");
$sql="SELECT ClassNo AS ClassNo2 FROM UserTable WHERE UserLoginName = '" . $SuccessUserLoginName . "'";
$rs = odbc_exec($conn,$sql);
$ClassNo = odbc_result($rs,"ClassNo2");
?>
<br>
<div  id="divlogin">
<div class="SignUpLoginTopic"><b>Your Data</b></div>
<table width="800">
<tr>
<td width="159">
User Name: </td>
<td width="625"><?php echo $SuccessUserLoginName ?></td>
</tr>
<tr>
<td>
Password:</td><td><?php echo $signPasswordCheck ?></td>
</tr>
<tr>
<td>
Name:</td><td><?php echo $nameCheck ?></td>
</tr>
<tr>
<td>
Email Address:</td><td><?php echo $emailAddressCheck ?></td>
</tr>
<tr>
<td>
Graduation Year:</td><td><?php echo $GraduationYear ?></td>
</tr>
<tr>
<td>
Graduation Class:</td><td><?php echo $GraduationClass ?></td>
</tr>
<tr>
<td>
Class Number:</td><td><?php echo $ClassNo ?></td>
</tr>
<tr>
<td>
Phone Number:</td><td><?php echo $phoneCheck ?></td>>
</tr>
<tr>
<td>
</td>
</tr>
</table>
</form>
</form>
<br>
You have signed up successfuly! Please wait for the approval.
</div>

<div id="divan"></div> 
</body>
<?php

			$sql="DELETE FROM UserSignTable WHERE Session='" . $sessionID . "' AND  St='2'";
			odbc_exec($conn,$sql);
	?>
        
</html>