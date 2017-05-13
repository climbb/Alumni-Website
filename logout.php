<link rel="stylesheet" type="text/css" href="style.css">
<?php

include("functionlibrary.php");
session_start();
	$sessionID = session_id();
	Logout($sessionID);
	
?>
<body>
</body>

	<meta http-equiv="refresh" content="0; url=index.php">