<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-1.9.1.min.js">
</script>

<?php
include("functionlibrary.php");
	session_start();
	$sessionID = session_id();
$checkSessionExist = CheckSessionExist($sessionID);
if($checkSessionExist == 0)
{?>
 <meta http-equiv="refresh" content="0; url=index.php"/>
  <?php } else {
?>


<br />
<br />

<div id="logintopbar">
<div class="topbar-nav-container">
	<a href="comment.php"><div class="topbar-nav-box">Comment</div></a>
    	<a href="admincontrol-1.php"><?php $powerLevel = CheckPowerLevel($sessionID);
if($powerLevel == 1) {?><div class="topbar-nav-box">Admin</div></a><?php } ?><a href="account_config.php"><div class="topbar-nav-box">Config</div></a><a href="homepage.php"><div class="topbar-nav-box">Home</div></a><a href="logout.php"><div class="topbar-nav-box">Logout</p></div></a>
</div>
</div>
<div id="header">
<div id="Log">
  <?php
if($checkSessionExist == 0) {?>

  <ul class="login-menu">
  <a href="login-1.php"><li>Login</li></a>
  <a href="sign-1.php"><li>Sign Up</li></a>
  </ul>
 <?php }?>
</div>
<div id="Logo">
<a href=<?php if($checkSessionExist > 0)
{?>"homepage.php"<?php } else {?>"index.php"<?php }} ?>><img src="img/logo.png" /></a></div>

</div>
<div class="container">
<div class="content">