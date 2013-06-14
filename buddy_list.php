<?php
include 'include/includes.php';

if ($g_user->is_logged_in() && isset($_REQUEST['pledgeclass'])) {
	$pledgeclass = Query::escape_string(strtoupper($_REQUEST['pledgeclass']));
	$query = new Query(sprintf("SELECT firstname, lastname, aim, pledgeclass FROM %susers WHERE pledgeclass = '%s' AND aim != '' ORDER BY aim", TABLE_PREFIX, $pledgeclass));
	while ($row = $query->fetch_row()) {
		$row_pledgeclass = strtoupper($row['pledgeclass']);
		$buddies .= <<<DOCHERE_buddy
      "$row[aim]" {
        BuddyNote {
          NoteString "$row[firstname] $row[lastname] - $row_pledgeclass"
	}
      }

DOCHERE_buddy;
	}
	
	$filename = $pledgeclass . ".blt";
	$mime_type = (PMA_USR_BROWSER_AGENT == 'IE' || PMA_USR_BROWSER_AGENT == 'OPERA') ? 'application/octetstream' : 'application/octet-stream';
	header('Content-Type: ' . $mime_type);
	if (PMA_USR_BROWSER_AGENT == 'IE') {
		header('Content-Disposition: inline; filename="' . $filename . '"');
		header("Content-Transfer-Encoding: binary");
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
	} else {
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header("Content-Transfer-Encoding: binary");
		header('Expires: 0');
		header('Pragma: no-cache');
	}
	
	echo <<<DOCHERE_buddy_list
Config {
  version 1
}
Buddy {
  list {
    APhiO-$pledgeclass {
$buddies
    }
  }
}

DOCHERE_buddy_list;
exit();
}