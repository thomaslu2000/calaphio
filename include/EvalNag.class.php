<?php

class EvalNag {
	var $user;
	
	function EvalNag() {
		global $g_user;
		$this->user = $g_user;
	}
	
	function display($start_date) {
		if ($this->user->is_logged_in()) {
			$query = new Query(sprintf("SELECT apo_calendar_event.* FROM apo_calendar_event
					JOIN apo_calendar_attend ON (apo_calendar_event.event_id = apo_calendar_attend.event_id)
					WHERE user_id=%d AND chair=TRUE AND evaluated=FALSE AND deleted=FALSE AND ignore_nag=FALSE AND date >= '%s'
					ORDER BY date ASC",
					$this->user->data['user_id'], date("Y-m-d", strtotime($start_date))));
			$results = "";
			$today = strtotime(date("Y-m-d", strtotime("today")));
			while ($row = $query->fetch_row()) {
				$event_time = strtotime($row['date']);
				if ($event_time > $today) continue;
				$title = Calendar::format_event_title($row);
				$size = ($today - $event_time) / 100000;
				$size .= "em";
				$results .= <<<HEREDOC
	<div style="text-align: center; font-weight: bold; font-size: $size;">$title</div>

HEREDOC;
			}
			if ($results) {
				return <<<HEREDOC
	<div class="evalnag">
	  <p class="moduleTitle">EVALUATE YOUR EVENT!</p>
	  <div class="eventList">
$results
	  </div>
	</div>

HEREDOC;
			}
		}
		return "";
	}
}

?>