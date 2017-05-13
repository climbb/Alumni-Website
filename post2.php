<html>
<body>
<?php
if (isset($_POST['submit'])){
	$userLoginName=$_POST['userLoginName'];
	$password=$_POST['password'];
	
	echo $password,$userLoginName; 
	}
?>
<form method="POST" action="">
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
</body>
</html>