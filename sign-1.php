<html>
<body id="background3">
<?php include("header.php");
$sessionID = session_id();
$conn=odbc_connect('sba','','');
$sql="SELECT St AS St2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$St = odbc_result($rs,"St2");
$sql="SELECT UserLoginNameCheck AS UserLoginNameCheck2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$signUserLoginNameCheck = odbc_result($rs,"UserLoginNameCheck2");
$sql="SELECT PasswordCheck AS PasswordCheck2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$signPasswordCheck = odbc_result($rs,"PasswordCheck2");
$sql="SELECT NameCheck AS NameCheck2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$nameCheck = odbc_result($rs,"NameCheck2");
$sql="SELECT EmailAddressCheck AS EmailAddressCheck2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$emailAddressCheck = odbc_result($rs,"EmailAddressCheck2");
$sql="SELECT PhoneCheck AS PhoneCheck2 FROM UserSignTable WHERE Session = '" . $sessionID . "'";
$rs = odbc_exec($conn,$sql);
$phoneCheck = odbc_result($rs,"PhoneCheck2");
?>
<br>
<div class="SignUpLoginTopic">Sign up</div>
<div  id="divlogin">

<form method="POST" action="sign-2.php">
<table width="800">
<tr>
<td width="159">
User Name: </td>
<td width="196"><input type="text" name="signUserLoginName"/></td><td width="429"> <?php
if ($signUserLoginNameCheck == 1) 
{ 
echo "<div class='Warning'><img src='img/check_error.gif'>Please fill the blank</div>";
 } ?> 
</tr>
<tr>
<td>
Password:</td><td> <input type="password" name="signPassword" /></td><td> <?php
if ($signPasswordCheck == 1) 
{ 
echo "<div class='Warning'><img src='img/check_error.gif'>Please fill the blank</div>";
 } ?> 
</td>
</tr>
<tr>
<td>
Confirm Password:</td> <td><input type="password" name="signPasswordConfirm" />
</td>
</tr>
<tr>
<td>
Name:</td><td> <input type="text" name="name"/></td><td> <?php
if ($nameCheck == 1) 
{ 
echo "<div class='Warning'><img src='img/check_error.gif'>Please fill the blank</div>";
 } ?> 
</td>
</tr>
<tr>
<td>
Email Address:</td><td><input type="text" name="emailAddress"/></td><td> <?php
if ($emailAddressCheck == 1) 
{ 
echo "<div class='Warning'><img src='img/check_error.gif'>Please fill the blank</div>";
 } ?> 
</td>
</tr>
<tr>
<td>
Graduation Year:</td><td><select name="Year">
  <option value="2000" selected>2000</option>
  <option value="2001">2001</option>
  <option value="2002">2002</option>
  <option value="2003">2003</option>
	<option value="2004">2004</option>
	  <option value="2005">2005</option>
  <option value="2006">2006</option>
  <option value="2007">2007</option>
  <option value="2008">2008</option>
	<option value="2009">2009</option>
	  <option value="2010">2010</option>
  <option value="2011">2011</option>
    <option value="2012">2012</option>
	  <option value="2013">2013</option>
	  	  <option value="2014">2014</option>
</select>
</td>
</tr>
<tr>
<td>
Graduation Class:</td><td><select name="Class" >
  <option value="CE5A" selected>CE-5A</option>
  <option value="CE5B">CE-5B</option>
  <option value="CE5C">CE-5C</option>
  <option value="CE5D">CE-5D</option>
	<option value="CE5E">CE-5E</option>
	  <option value="DSE6A">DSE-6A</option>
  <option value="DSE6B">DSE-6B</option>
  <option value="DSE6C">DSE-6C</option>
  <option value="DSE6D">DSE-6D</option>
	<option value="DSE6E">DSE-6E</option>
	  <option value="AL7A">AL-7A</option>
  <option value="AL7S">AL-7S</option>
</select>
</td>
</tr>
<tr>
<td>
Class Number:</td><td><select name="ClassNo">
<?php
$Magic=1;
while ( $Magic<=41)
{
	echo "<option value='" . $Magic . "'>" . $Magic . "</option>";
	$Magic++;
	}
?>
</select>
</td>
</tr>
<tr>
<td>
Phone Number:</td><td><input name="phone" type="text" maxlength="8" /></td><td> <?php
if ($phoneCheck == 1) 
{ 
echo "<div class='Warning'><img src='img/check_error.gif'>Please fill the blank</div>";
 } ?> 
</td>
</tr>
<tr>
<td>
<input class="input" name="submit" type="submit" id="submit" value="Sign Up">
</td>
</tr>
</table>
</form>
</form>
<div id="divan">
<?php

	if ($St == 1 )
		{
		echo "Sorry, User name has been uesd!";
			$sql="DELETE FROM UserSignTable WHERE Session='" . $sessionID . "' AND  St='1'";
			odbc_exec($conn,$sql);}
	elseif ($St == 3 ){
		echo "Passwords and passwords not recognized matching! Please fill the form again.";
		$sql="DELETE FROM UserSignTable WHERE Session='" . $sessionID . "' AND  St='3'";
			odbc_exec($conn,$sql);}
			
	elseif ($St == 4)
	{    	$sql="DELETE FROM UserSignTable WHERE Session='" . $sessionID . "' AND  St='4'";
			odbc_exec($conn,$sql); }


	?>	
	</div> 
</div>
</body>
</html>