<html xmlns="http://www.w3.org/1999/xhtml">
 <?php
 include("functionlibrary.php");
	session_start();
	$sessionID = session_id();
$checkSessionExist = CheckSessionExist($sessionID);
if($checkSessionExist > 0)
{?>
 <meta http-equiv="refresh" content="0; url=homepage.php"/>
  <?php
}
else
{?>
<head>
<title>Alumni Association</title>
</head>
<body id="background2">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-1.9.1.min.js">
</script>

<div class="cover">

<div class="covertext">
<img src="img/cover-font1.png">
</div><br><br>
<br>
<br>
<br>


</div>
                <ul class="ca-menu">
                    <li>
                        <a href="login-1.php">
                            <span class="ca-icon">h</span>
                            <div class="ca-content">
                                <h2 class="ca-main">I Have Account</h2>
                                <h3 class="ca-sub">Login and start exploring us</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="sign-1.php">
                            <span class="ca-icon">N</span>
                            <div class="ca-content">
                                <h2 class="ca-main">I'm New</h2>
                                <h3 class="ca-sub">Sign up and join us</h3>
                            </div>
                        </a>
                    </li>
                   
                </ul>

</body>
</html>
<?php
}
?>
