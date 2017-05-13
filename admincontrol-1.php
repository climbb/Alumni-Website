<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid #999;
}
</style>
 <?php
 include("functionlibrary.php");
 	session_start();
	$sessionID = session_id();
$checkSessionExist = CheckSessionExist($sessionID);
if($checkSessionExist == 0)
{?>
 <meta http-equiv="refresh" content="0; url=index.php"/>
  <?php } else {
$powerLevel = CheckPowerLevel($sessionID);
if($powerLevel == 0)
{?>
 <meta http-equiv="refresh" content="0; url=homepage.php"/>
  <?php
}
else
{?>
<html>
  <body id="commentBackground">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-1.9.1.min.js">
</script>
<div id="logintopbar">
<div class="topbar-nav-container">
	<a href="comment.php"><div class="topbar-nav-box">Comment</div></a>
    	<a href="admincontrol-1.php"><?php $powerLevel = CheckPowerLevel($sessionID);
if($powerLevel == 1) {?><div class="topbar-nav-box">Admin</div></a><?php } ?><a href="logout.php"><div class="topbar-nav-box">Logout</div></a>
</div>
</div>
<?php

?>
<br />
<div id="header">
<div id="Logo">
<a href=homepage.php><img src="img/logo.png" /></a>
</div>

</div>
<div class="adminPanel"><br>

<div class="SignUpLoginTopic">ADMIN PANEL</div>
<div class="adminContent">
<?php

	$conn=odbc_connect('sba','','');
	$sql="SELECT COUNT(*) AS CheckDataExisit FROM UserTable WHERE Proved='0'";
	$rs=odbc_exec($conn,$sql);
	$checkDataExisit=odbc_result($rs,"CheckDataExisit");
	if ($checkDataExisit > 0)
	{
		?><table><tr><th>User Name</th><th>Password</th><th>E-mail</th><th>Graduation Year</th><th>Graduation Class</th><th>Class No</th><th>Phone Number</th><th>APPROVAL</th></tr><?php
		$sql="SELECT * FROM UserTable WHERE Proved='0'";
		$rs=odbc_exec($conn,$sql);
		$num_row=0;
		while( odbc_fetch_row( $rs ) )
		{
			$num_row++;;
			$id= odbc_result( $rs, 1 );
			$name= odbc_result( $rs, 2 );
			$pw= odbc_result( $rs, 3 );
			$email= odbc_result( $rs, 4 );
			$gradYear= odbc_result( $rs, 5 );
			$gradClass= odbc_result( $rs, 6 );
			$classNo= odbc_result( $rs, 7 );
			$phoneNo= odbc_result( $rs, 8 );
			
			echo "<tr><td>" . $name . "</td><td>" . $pw . "</td><td>" . $email . "</td><td>" . $gradYear . "</td><td>" . $gradClass . "</td><td>" . $classNo . "</td><td>" . $phoneNo . "</td><td><form method='POST' action='admincontrol-2.php'><input name='postId' type='hidden' value='" . $id . "'><input class='inputAccept' name='approval' type='submit' value='accept'><input class='inputReject' name='approval' type='submit' value='reject'></form></td></tr>";
		
		}
				odbc_close( $conn);
	}
	else
	{ echo "No new user resently"; }
	?>
</body>
</html>
<?php } }
?>