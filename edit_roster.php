<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'ACCOUNT');
if (!$g_user->process_change_passphrase()) {
	$g_user->print_change_passphrase();
}
echo "<br />";
$g_user->process_edit_roster();
$g_user->print_edit_roster();
echo "<br />";
echo "<br />";

if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
  if ($file = getimagesize($_FILES["upfile"]["tmp_name"])) {
	if($_FILES["upfile"]["size"] <= 1000000 && $file[2] == IMAGETYPE_PNG) {
		if (file_exists("./face/" . $g_user->data['user_id'] . ".jpg")) {
			unlink("./face/" . $g_user->data[user_id] . ".jpg");
		} 
		if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "face/" . $g_user->data['user_id'] . ".png")) {
    			chmod("files/" . $g_user->data['user_id'] . ".png", 0644);
    			echo $_FILES["upfile"]["name"] . " upload successful";
		} else {
			echo "Can not upload the photo for an unknown reason";
		}
	} else if ($_FILES["upfile"]["size"] <= 1000000 && $file[2] == IMAGETYPE_JPEG) { 
		if (file_exists("./face/" . $g_user->data['user_id'] . ".png")) {
			unlink("./face/" . $g_user->data['user_id'] . ".png");
		}
		if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "face/" . $g_user->data['user_id'] . ".jpg")) {
    			chmod("files/" . $g_user->data['user_id'] . ".jpg", 0644);
    			echo $_FILES["upfile"]["name"] . " upload successful";
		} else {
			echo "Can't upload the photo for an unknown reason";
		}
  	} else {
    	     echo "Can't upload the photo (check the size/format)";
 	 } 
  }else {
  	echo "Not a photo";
  }
} else {
  echo "Upload your APO profile photo (.PNG or .JPG and the size has to be under 1.0MB)";
}

echo <<<DOCHERE
<body>
<form method="post" enctype="multipart/form-data">
  <input class="btn btn-small" type="file" name="upfile" size="30" /><br />
  <br />
  <input class="btn btn-primary btn-small" type="submit" value="Upload" />
</form>
DOCHERE;
Template::print_body_footer();
Template::print_disclaimer();
?>