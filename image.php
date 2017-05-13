<?php
// index.php
function generate_resized_image(){
$max_dimension = 800; // Max new width or height, can not exceed this value.
$dir = "./images/"; // Directory to save resized image. (Include a trailing slash - /)
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
if($postvars["image_size"] <= 179200){
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
if($postvars["image_max_width"] > $postvars["image_max_height"]){
if($postvars["image_max_width"] > $max_dimension){
$newwidth = $max_dimension;
} else {
$newwidth = $postvars["image_max_width"];
}
$newheight = ($newwidth / $width) * $height;
} else {
if($postvars["image_max_height"] > $max_dimension){
$newheight = $max_dimension;
} else {
$newheight = $postvars["image_max_height"];
}
$newwidth = ($newheight / $height) * $width;
}
// Create temporary image file.
$tmp = imagecreatetruecolor($newwidth,$newheight);
// Copy the image to one with the new width and height.
imagecopyresampled($tmp,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
// Create random 4 digit number for filename.
$rand = rand(1000,9999);
$filename = $dir.$rand.$postvars["image"];
// Create image file with 100% quality.
imagejpeg($tmp,$filename,100);
return "<strong>Image Preview:</strong><br/>
<img src=\"".$filename."\" border=\"0\" title=\"Resized  Image Preview\" style=\"padding: 4px 0px 4px 0px;background-color:#e0e0e0\" /><br/>
Resized image successfully generated. <a href=\"".$filename."\" target=\"_blank\" name=\"Download your resized image now!\">Click here to download your image.</a>";
imagedestroy($image);
imagedestroy($tmp);
} else {
return "File size too large. Max allowed file size is 175kb.";
}
} else {
return "Invalid file type. You must upload an image file. (jpg, jpeg, gif, png).";
}
}
?>
<form action="./index.php?do=upload" method="post" enctype="multipart/form-data">
<table width="100%" align="center" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="100">
New Width:</td>
<td align="left"><input name="image_max_width" style="width: 120px" type="text" maxlength="4" /> px.</td>
</tr>
<tr><td colspan="2"><strong>OR</strong></td></tr>
<tr>
<td align="left">
New Height:</td>
<td align="left"><input type="text" name="image_max_height" style="width: 120px" maxlength="4" /> px.</td>
</tr>
<tr>
<td align="left">
Image:</td>
<td align="left"><input type="file" name="image" size="40" /></td></tr>
<tr>
<td align="left" colspan="2">
<ol style="margin:0;padding:3px 0px 3px 15px">
<li>Max file size: 175 KB.</li>
<li>Allowed extensions: jpg, jpeg, gif, png.</li>
<li>Max Dimension: <em>800</em>px.</li>
</ol>
</tr>
<tr>
<td align="left" colspan="2">
<input type="submit" name="submit" value="Submit!" style="font: 10pt verdana" />
</td>
</tr>
</table>
</form>