<html>

 <?php
 		 include("loginheader.php");
	?>
    <body id="commentBackground">

            
<div class="SignUpLoginTopic">Account Configuration</div>
<br>
<table width="780">
<tr>
<td width="200" valign="top">
<div class="account-left">
<a href="account_config.php?config=avatar1"><h2>Avatar</h2></a><br><a href="account_config.php?config=avatar2"><h2>Avatar2</h2></a>
</div>
</td>
<td>
<div class="account-right">

<?php
	$username = CheckUserName ($sessionID);	

// index.php
function generate_resized_image(){
$max_dimension = 1920; // Max new width or height, can not exceed this value.
$dir = "./avatars/"; // Directory to save resized image. (Include a trailing slash - /)
// Collect the post variables.
$postvars = array(
"image"    => trim($_FILES["image"]["name"]),
"image_tmp"    => $_FILES["image"]["tmp_name"],
"image_size"    => (int)$_FILES["image"]["size"],
"image_max_width"    => (int)$_POST["image_max_width"],
"image_max_height"   => (int)$_POST["image_max_height"]
);
// Array of valid extensions.
$valid_exts = array("jpg","jpeg","gif","png");
// Select the extension from the file.
$ext = end(explode(".",strtolower(trim($_FILES["image"]["name"]))));
// Check not larger than 175kb.
if($postvars["image_size"] <= 1792000){
// Check is valid extension.
if(in_array($ext,$valid_exts)){
if($ext == "jpg" || $ext == "jpeg"){
$image = imagecreatefromjpeg($postvars["image_tmp"]);
}
else if($ext == "gif"){
$image = imagecreatefromgif($postvars["image_tmp"]);
}
else if($ext == "png"){
$image = imagecreatefrompng($postvars["image_tmp"]);
}
// Grab the width and height of the image.
list($width,$height) = getimagesize($postvars["image_tmp"]);
// If the max width input is greater than max height we base the new image off of that, otherwise we
// use the max height input.
// We get the other dimension by multiplying the quotient of the new width or height divided by
// the old width or height.

if ($height > $width)
{
	if ($height >  $postvars["image_max_height"])
	{	
		$newheight = $postvars["image_max_height"];
	}
	else
	{

		$newheight = $height;		
	}
	
	$newwidth = ($newheight / $height) * $width;

}
else
{
	
		if ($width >  $postvars["image_max_width"])
	{	
		$newwidth = $postvars["image_max_width"];
	}
	else
	{

		$newwidth = $width;		
	}
	
	$newheight = ($newwidth / $width) * $height;
	

}

///if($postvars["image_max_width"] > $postvars["image_max_height"]){
///if($postvars["image_max_width"] > $max_dimension){
///$newwidth = $max_dimension;
///} else {
///$newwidth = $postvars["image_max_width"];
///}
///$newheight = ($newwidth / $width) * $height;
///} else {
///if($postvars["image_max_height"] > $max_dimension){
///$newheight = $max_dimension;
///} else {
///$newheight = $postvars["image_max_height"];
///}
///$newwidth = ($newheight / $height) * $width;
///}


// Create temporary image file.
$tmp = imagecreatetruecolor($newwidth,$newheight);
imagealphablending($tmp,false);
imagesavealpha($tmp,true); 
// Copy the image to one with the new width and height.
imagecopyresampled($tmp,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
// Create random 4 digit number for filename.
$rand = rand(1000,9999);
	$sessionID = session_id();
	$userID = CheckUserIDName ($sessionID);
//$filename = $dir.$rand.$postvars["image"];
// Create image file with 100% quality.

if ($_FILES["image"]["type"] == "image/jpeg")
{
	$filename = $dir.$userID.".jpg";
		$sql="UPDATE UserTable SET AvatarType='jpg' WHERE UserLoginName='" . $userID . "'";
		$conn=odbc_connect('sba','','');
		$rs=odbc_exec($conn,$sql);
		imagejpeg($tmp,$filename,100);
}
if($_FILES["image"]["type"] == "image/png")
{
	$filename = $dir.$userID.".png";
		$sql="UPDATE UserTable SET AvatarType='png' WHERE UserLoginName='" . $userID . "'";
		$conn=odbc_connect('sba','','');
		$rs=odbc_exec($conn,$sql);
		imagepng($tmp,$filename,9);
}
		$sql="UPDATE UserTable SET AvatarUploaded='1' WHERE UserLoginName='" . $userID . "'";
		$conn=odbc_connect('sba','','');
		$rs=odbc_exec($conn,$sql);
		
imagedestroy($image);
imagedestroy($tmp);
} else {
return "File size too large. Max allowed file size is 175kb.";
}
} else {
return "Invalid file type. You must upload an image file. (jpg, jpeg, gif, png).";
}
}
if(isset($_POST["submit"])){
if($_POST["submit"] == "Submit!"){
$upload_and_resize = generate_resized_image();
} else {
$upload_and_resize = "";
}
} else {
$upload_and_resize = "";
}
?>

<div class="account-right-content">
<div class="account-right-avatar-content">
<div class="account-topic">Upload your avatar here</div>
<form action="/account_config.php" method="post" enctype="multipart/form-data">
<table width="100%" align="center" border="0" cellpadding="2" cellspacing="0">
<tr>
  <td width="100" align="left"> </td>
</tr>
<tr>
<td align="left"><input type="file" name="image" size="40" /></td></tr>
<tr>
<td align="left" colspan="2">
<ol style="margin:0;padding:3px 0px 3px 15px">
<li></li>
</ol>
</tr>

</table>

</div>
<div id="upload" class="account-avatar-box">
<?php

	$sessionID = session_id();
	$userID = CheckUserIDName ($sessionID);
		$sql="SELECT AvatarUploaded AS AvatarExist FROM UserTable WHERE UserLoginName='" . $userID . "'";
		$conn=odbc_connect('sba','','');
		$rs=odbc_exec($conn,$sql);
		$avatarExist=odbc_result($rs,"AvatarExist");
		$sql="SELECT AvatarType AS AvatarImage FROM UserTable WHERE UserLoginName='" . $userID . "'";
		$rs=odbc_exec($conn,$sql);
		$avatarType=odbc_result($rs,"AvatarImage");
		if ($avatarExist == 0)
		{
			?><img src="avatars/default-avatar.png" style="max-width:200px;'"><?php
            }
		else
		{ ?><img src="avatars/<?php echo $userID; ?>.<?php echo $avatarType; ?>" style="max-width:200px;'"><?php
            }
		?></div>
                <div class="account-right-avatar-submit">
        <input name="image_max_width" style="width: 120px" type="hidden" maxlength="4" value="200"/><input type="hidden" name="image_max_height" style="width: 120px" maxlength="4" value="200"/><input type="submit" name="submit" value="Submit!" class="input" />
        </form>
      </div>
</div>
    </td>
  </tr>
    </table>
</div>

</body>
</html>

     
</body>
</html>