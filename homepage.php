<html>
  <body id="commentBackground">
<?php include("loginheader.php"); 	
$sessionID = session_id();
$checkSessionExist = CheckSessionExist($sessionID);
if($checkSessionExist == 0)
{?>
 <meta http-equiv="refresh" content="0; url=index.php"/>
  <p>
    <?php }?>
    
  </p>
  <p>Check List:</p>
  <p>．新增自組活動台</p>
  <p>．改善 Account Config</p>
  <p>．增設 reply delete 功能</p>
</body>
</html>