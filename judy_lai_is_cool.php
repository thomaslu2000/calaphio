<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");

$user_id = 733;
$total_hours = 0;
$table = "";

$name = "";
$query = new Query(sprintf("SELECT firstname, lastname FROM apo_users WHERE user_id=%d LIMIT 1", $user_id));
if ($row = $query->fetch_row())
{
	$name = "$row[firstname] $row[lastname]";
}

$query = new Query(sprintf("
	SELECT * FROM apo_calendar_event JOIN apo_calendar_attend USING (event_id) WHERE user_id=%d
	AND (type_service_chapter=1 OR type_service_campus=1 OR type_service_community=1 OR type_service_country=1 OR type_fundraiser=1)
	AND attended=1 AND deleted=0 AND evaluated=1
	ORDER BY date ASC", $user_id));
while ($row = $query->fetch_row())
{
	$total_hours += $row['hours'];
	$date = date("M j, Y", strtotime($row['date']));
	$hours_text = $row['hours'] == 1 ? "hour" : "hours";
	$table .= <<<HEREDOC
<tr>
	<td axis="date" class="date">
		$date
	</td>
	<td axis="title" class="title">
		$row[title]
	</td>
	<td axis="hours" class="hours">
		$row[hours] $hours_text
	</td>
</tr>
<tr>
	<td axis="description" colspan="3" class="description">
		$row[description]
	</td>
</tr>

HEREDOC;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
	<link type="text/css" rel="stylesheet" href="judy_lai_is_cool.css" media="screen" />
	<link type="text/css" rel="stylesheet" href="judy_lai_is_cool.print.css" media="print" />
  <link rel="shortcut icon" type="image/x-icon" href="http://www.calaphio.com/apo_favicon.ico" />
  <title>Alpha Phi Omega - Service Hour Report for <?php echo $name; ?></title>
</head>
<body>
<div class="document">
<h1>Alpha Phi Omega</h1>
<h2>Service Report for <?php echo $name; ?></h2>
<p><strong>Total hours of community service:</strong> <?php echo $total_hours; ?></p>
<table class="service_report">
<?php echo $table; ?>
</table>
<p class="signature">Signature of Service VP: ___________________________</p>
</div>
</body>
</html>