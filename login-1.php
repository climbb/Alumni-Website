<html>
<body id="background4">
<?php include("header.php") ?>
<br>
<div class="SignUpLoginTopic">Login</div>
<div  id="divlogin">
<form method="POST" action="login-2.php">
<table>
<tr>
<td>
User Name: </td><td>
  <input type="text" name="userLoginName" />
</td>
</tr>
<tr>
<td>
Password: </td><td><input type="password" name="password" />
</td>
</tr>
<tr>
<td>
<input class="input" type="submit" name="submit" value="Login">
</td>
</tr>
</table>
</form>

</div>
<div id="divan">
<?php
		$sessionID = session_id();
		$conn=odbc_connect('sba','','');
		$sql="SELECT COUNT(*) AS Count FROM UserLoginSuccessCheck WHERE Session='" . $sessionID . "' AND St='1' OR St='2'";
		$rs=odbc_exec($conn,$sql);
		$check1=odbc_result($rs,"Count");
		if ($check1 > 0)
		{
		$sql="SELECT St  AS Count FROM UserLoginSuccessCheck WHERE Session='" . $sessionID . "'";
		$rs=odbc_exec($conn,$sql);
		$check2=odbc_result($rs,"Count");
		if ($check2 == 2){
			echo "Your account has not been approved. Please wait for the approval of your account.";
			$sql="DELETE FROM UserLoginSuccessCheck WHERE Session='" . $sessionID . "' AND  St='2'";
			odbc_exec($conn,$sql);
		}
		else if ($check2 == 1){
		echo "You have specified an incorrect username. If you can't remember your username or password, you can check it here.";
			$sql="DELETE FROM UserLoginSuccessCheck WHERE Session='" . $sessionID . "' AND  St='1'";
			odbc_exec($conn,$sql);
			}
		}
	?>	
	</div>
</body>
</html>