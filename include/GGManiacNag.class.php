<?php

class GGManiacNag {
	var $user;
	
	function GGManiacNag() {
		global $g_user;
		$this->user = $g_user;
	}
	
	function display() {
		if ($this->user->is_logged_in()) {
			$query = new Query(sprintf("SELECT * FROM apo_actives WHERE user_id = %d", $this->user->data['user_id']));
			$now = time();
			$results = "";
			if ($query->fetch_row()) {			
				$query = new Query(sprintf("SELECT id, end_time, poll_name, cancelled, start_time, expired FROM gg_maniac_polls ORDER BY end_time ASC"));
				while ($row = $query->fetch_row()) {
					if (!$row['expired'] && !$row['cancelled'] && $now < strtotime($row['end_time'])) {
						$already_voted = false;
						$query2 = new Query(sprintf("SELECT user_id FROM gg_maniac_votes WHERE poll_id=%d", $row['id']));
						while ($row2 = $query2->fetch_row()) {
							if ($row2['user_id'] == $this->user->data['user_id']) {
								$already_voted = true;
								break;
							}
						}

						if	($already_voted) {
							continue;
						}
							
						$start_time = strtotime($row['start_time']);
						$end_time = strtotime($row['end_time']);
						$poll_id = $row['id'];
						$poll_name = $row['poll_name'];
						
						$title = '<a href="gg_maniac_vote.php?id=' . $poll_id . '"> ' . $poll_name . '</a>';
						
						$size = ($now - $start_time) / 50000;
						$size < 1.5 ? $size = 1.5 : $size = $size;
						$size .= "em";
						$results .= <<<HEREDOC
			<div style="text-align: center; font-weight: bold; font-size: $size;">$title</div>

HEREDOC;
					}
				}
			}
			if ($results) {
					return <<<HEREDOC
						<div class="evalnag">
	  						<p class="moduleTitle">VOTE FOR GG MANIAC!</p>
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