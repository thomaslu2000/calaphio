<?php
require("include/includes.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', '');

if (!$g_user->is_logged_in() || !$g_user->permit("admin add users"))
{
	trigger_error("You must be logged in as an admin to access this feature", E_USER_ERROR);
}
else if (isset($_FILES['csv_file']) && isset($_POST['pledgeclass']))
{
	// Input validation
	if (!is_uploaded_file($_FILES['csv_file']['tmp_name']) || $_FILES['csv_file']['error'] != UPLOAD_ERR_OK)
	{
		trigger_error("Your file did not upload successfully. Please try again.");
	}
	else if (!trim($_POST['pledgeclass']))
	{
		trigger_error("You must specify a pledge class.");
	}
	else
	{
		echo "<table>\r\n";
		echo "<caption>Batch loading...</caption>\r\n";
		$insert_count = 0;
		$lines = explode("\n", str_replace(array("\r\n", "\r"), "\n", trim(file_get_contents($_FILES['csv_file']['tmp_name']))));
		$keys = explode(",", array_shift($lines));
		echo "<tr><th style=\"font-weight: bold; text-align: center; padding: 2px;\">" . implode("</th><th style=\"font-weight: bold; text-align: center; padding: 2px;\">", $keys) . "</th></tr>\r\n";
		foreach ($lines as $line)
		{
			$fields = array_combine($keys, explode(",", $line));
			echo "<tr><td style=\"font-size: smaller; padding: 2px;\">" . implode("</td><td style=\"font-size: smaller; padding: 2px;\">", $fields) . "</td></tr>\r\n";
			$fields['pledgeclass'] = trim($_POST['pledgeclass']);
			$fields['salt'] = User::generate_salt();
			$fields['passphrase'] = User::encrypt_passphrase($fields['salt'], $fields['sid']);
			$fields['registration_timestamp'] = date("Y-m-d H:i:s");
			$fields['registration_user'] = $g_user->data['user_id'];
			$fields['birthday'] = $fields['birthday'] ? date("Y-m-d", strtotime($fields['birthday'])) : null;
			$fields['shirtsize'] = $fields['shirtsize'] ? strtoupper($fields['shirtsize']) : null;
			$sql_update = array();
			foreach ($fields as $key => $value)
			{
				$fields[$key] = '"' . Query::escape_string($value) . '"';
				if ($key != "salt" && $key != "passphrase")
				{
					$sql_update[] = "$key = $fields[$key]";
				}
			}
			$query = new Query(sprintf("INSERT INTO apo_users (%s) VALUES (%s) ON DUPLICATE KEY UPDATE %s", implode(", ", array_keys($fields)), implode(", ", $fields), implode(", ", $sql_update)));
			if ($query->affected_rows() > 0)
			{
				$query2 = new Query(sprintf("INSERT IGNORE INTO apo_pledges SET user_id=%s", $query->last_insert_id()));
				if ($query2->affected_rows() > 0)
				{
					$insert_count++;
				}
			}
			ob_flush();
		}
		echo "</table>\r\n";
		echo "<p>Batch load completed! Successfully inserted $insert_count records.</p>\r\n";
	}
}
else
{
?>

<h1>New User Batch-Load</h1>
<p>This function accepts a Comma Separated Values (.csv) file. You can use this type of file with Microsoft Excel or any other spreadsheet software. Note that you may re-submit the same batch file as many times as necessary - it will simply overwrite existing accounts. Download the template file below to get started, but be careful when modifying the first row because it must correspond directly to a field in our database. The new user's passphrase will be their SID, and if you submit a second time, this will be smart enough to preserve the user's existing passphrase.</p>
<p><a href="batch_load_template.csv">Download Batch-Load Template</a></p>
<br />
<form enctype="multipart/form-data" method="post" action="">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
Pledgeclass Letters: <input type="text" name="pledgeclass" /><br />
<br />
CSV File: <input type="file" name="csv_file" /><br />
<br />
<button type="submit">Submit</button>
</form>

<?php
}
Template::print_body_footer();
Template::print_disclaimer();
?>