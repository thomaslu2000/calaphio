<?php
require 'include/includes.php';
header('Content-type: text/xml');
echo <<<HEREDOC
<?xml version="1.0" encoding="UTF-8" ?>
<results>

HEREDOC;
$abbrev = substr($_GET['name'], 0, 2);
if (preg_match('/^[a-zA-Z][a-zA-Z]$/', $abbrev)) {
  $query = new Query(sprintf("SELECT user_id, firstname, lastname, pledgeclass FROM apo_users WHERE firstname LIKE '%s%%' AND depledged=FALSE ORDER BY user_id DESC", $abbrev));
  while ($row = $query->fetch_row()) {
    echo sprintf("<user user_id=\"%d\"><![CDATA[%s %s (%s)]]></user>\r\n", $row['user_id'], $row['firstname'], $row['lastname'], $row['pledgeclass']);
  }
}
echo <<<HEREDOC
</results>

HEREDOC;
?>