<script src="jquery-1.9.1.min.js"></script>

<?php

function CheckSessionExist($sessionID)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT COUNT(*) AS CountSessionExist FROM UserLogTable WHERE UserSessionID='" . $sessionID . "'";

	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$countSessionExist=odbc_result($rs,"CountSessionExist");

			}
		}
	return $countSessionExist;
}

function CheckSessionUser($sessionID)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT UserLoginName AS CountSessionUser FROM UserLogTable WHERE UserSessionID='" . $sessionID . "'";

	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$countSessionUser=odbc_result($rs,"CountSessionUser");
				$sql="SELECT UserName AS FindUserName FROM UserTable WHERE UserLoginName='" . $countSessionUser . "'";
				$rs=odbc_exec($conn,$sql);
				$Username=odbc_result($rs,"FindUserName");

			}
		}
	return $Username;
}

function CheckUserLogin($userLoginName, $password)
{
	$conn=odbc_connect('sba','','');

	$sql="SELECT COUNT(*) AS CountUserValid FROM UserTable WHERE UserLoginName='" . $userLoginName . "' AND Password='" . $password . "' AND Proved='1'";
	//echo $sql;
	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$countUserValid=odbc_result($rs,"CountUserValid");
			}
		}
		If ($countUserValid == 1)
		{
			session_start();
			$sessionID = session_id();
			$sql="INSERT INTO UserLogTable (UserSessionID, UserLoginName) values ('" . $sessionID . "', '" . $userLoginName . "')";
			odbc_exec($conn,$sql);

		}
	return $countUserValid;
}

function Sign($signUserLoginName, $signPassword)
{
	$conn=odbc_connect('sba','','');

	$sql="SELECT COUNT(*) AS SignCountUserValid FROM UserTable WHERE UserLoginName='" . $signUserLoginName . "'";

$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$signCountUserValid=odbc_result($rs,"SignCountUserValid");
			}
			

	return $signCountUserValid;
	}
	}
	


function FindSuccessful($sessionID, $type)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT COUNT(*) AS StatusEcho FROM " . $type . " WHERE Session='" . $sessionID . "' AND St='2'";

	//echo $sql;
	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$statusEcho=odbc_result($rs,"StatusEcho");
			}
		}
	return $statusEcho;
}

function FindIncorrectPW($sessionID)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT COUNT(*) AS StatusEcho FROM UserSignTable WHERE Session='" . $sessionID . "' AND St='3'";
	//echo $sql;
	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$statusEcho=odbc_result($rs,"StatusEcho");
			}
		}
	return $statusEcho;
}

function CheckingDoneOneTime($sessionID, $type)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT COUNT(*) AS StatusEcho FROM " . $type . " WHERE Session='" . $sessionID . "' AND St='1'";
	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$statusEcho=odbc_result($rs,"StatusEcho");
			}
		}
	return $statusEcho;
}

function Logout($sessionID)
{
	$conn=odbc_connect('sba','','');
	$sql="DELETE FROM UserLogTable WHERE UserSessionID='" . $sessionID . "'" ;
	odbc_exec($conn,$sql);
}

function CheckPowerLevel($sessionID)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT UserLoginName AS PowerLevelUser FROM UserLogTable WHERE UserSessionID='" . $sessionID . "'";
	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$powerLevelUser=odbc_result($rs,"PowerLevelUser");
			}
		}
		$sql="SELECT PowerLevel AS PowerLevelChecking FROM UserTable WHERE UserLoginName='" . $powerLevelUser . "'";
	$rs=odbc_exec($conn,$sql);
			if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$powerLevel=odbc_result($rs,"PowerLevelChecking");
			}
		}
	return $powerLevel;
}

function CheckUserName ($sessionID)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT UserLoginName AS UserID FROM UserLogTable WHERE UserSessionID='" . $sessionID . "'";
	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$userID=odbc_result($rs,"UserID");
			}
		}
		$sql="SELECT UserName AS PostUserName FROM UserTable WHERE UserLoginName='" . $userID . "'";
	$rs=odbc_exec($conn,$sql);
			if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$userName=odbc_result($rs,"PostUserName");
			}
		}
	return $userName;
}

function CheckUserIDName ($sessionID)
{
	$conn=odbc_connect('sba','','');
	$sql="SELECT UserLoginName AS UserID FROM UserLogTable WHERE UserSessionID='" . $sessionID . "'";
	$rs=odbc_exec($conn,$sql);
		if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$userID=odbc_result($rs,"UserID");
			}
		}
		$sql="SELECT UserLoginName AS PostUserName FROM UserTable WHERE UserLoginName='" . $userID . "'";
	$rs=odbc_exec($conn,$sql);
			if (!$rs)
		{
			exit("Error in SQL");
		}
		else
		{
			while (odbc_fetch_row($rs))
			{
				$userName=odbc_result($rs,"PostUserName");
			}
		}
	return $userName;
}
function uni_encode ($str, $code = 'utf-8'){
    if($code != 'utf-8'){ $str = iconv($code, 'utf-8', $str); }
    $str = json_encode($str);
    $str = preg_replace_callback('/\\\\u(\w{4})/', create_function('$hex', 'return \'&#\'.hexdec($hex[1]).\';\';'), substr($str, 1, strlen($str)-2));
    return $str;
}

/**
 * 对Unicode编码进行解码 
 * @param $str Unicode编码的字符串
 * @param $code 返回汉字字符串的编码，默认utf-8
 */
function uni_decode ($str, $code = 'utf-8'){
    $str = json_decode(preg_replace_callback('/&#(\d{5});/', create_function('$dec', 'return \'\\u\'.dechex($dec[1]);'), '"'.$str.'"'));
    if($code != 'utf-8'){ $str = iconv('utf-8', $code, $str); }
    return $str;
}

function get_all_strings_between($content) {
    preg_match_all('/{img}([^<]*){#img}/', $content, $m, PREG_SET_ORDER);

}

function auto_link_text($text)
{
   $pattern  = '#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#';
   $callback = create_function('$matches', '
       $url       = array_shift($matches);
       $url_parts = parse_url($url);

       $text = parse_url($url, PHP_URL_HOST) . parse_url($url, PHP_URL_PATH);
       $text = preg_replace("/^www./", "", $text);

       $last = -(strlen(strrchr($text, "/"))) + 1;
       if ($last < 0) {
           $text = substr($text, 0, $last) . "&hellip;";
       }

       return sprintf(\'<a rel="nofollow" href="%s">%s</a>\', $url, $text);
   ');

   return preg_replace_callback($pattern, $callback, $text);
}?>