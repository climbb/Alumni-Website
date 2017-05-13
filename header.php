<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-1.9.1.min.js">
</script>
<?php
include("functionlibrary.php");
	session_start();
	$sessionID = session_id();
$checkSessionExist = CheckSessionExist($sessionID);
?>


<br />


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
{?>"homepage.php"<?php } else {?>"index.php"<?php } ?>><img src="img/logo.png" /></a></div>

</div>
<div class="container">


<div id="satuts">

</div>
<div class="content">