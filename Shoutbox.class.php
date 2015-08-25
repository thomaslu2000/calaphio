<?php

class Shoutbox {
	var $user;
	
	function Shoutbox() {
		global $g_user;
		$this->user = $g_user;
	}
	
	function format_add_links($text) {
		// match protocol://address/path/
		$text = preg_replace("https?://([.]?[a-zA-Z0-9#!_/?&=%+~;:,\\-])*", "<a href=\"\\0\" target=\"_blank\">\\0</a>", $text);
		// match www.something
		$text = preg_replace("(^| |\(|\[|>)(www([.]?[a-zA-Z0-9#!_/?&=%+~;:,\\-])*)", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
		return $text;
	}
	
	function display() {
		if ($this->user->is_logged_in()) {
			$query = new Query("SELECT apo_shoutbox.*, firstname, lastname, pledgeclass FROM apo_shoutbox JOIN apo_users ON (apo_shoutbox.user_id = apo_users.user_id) ORDER BY post_time DESC");
			$posts = "";
			$today = strtotime(date("Y-m-d", strtotime("today")));
			while ($row = $query->fetch_row()) {
				$post_time = strtotime($row['post_time']);
				if ($post_time >= $today) {
					$date = date("g:ia", $post_time);
				} else {
					$date = date("M d", $post_time);
				}
				$message = Shoutbox::format_add_links($row['message']);
				$delete = $row['user_id'] == $this->user->data['user_id'] || $this->user->permit("admin delete shoutouts") ? "<div style=\"text-align: right\"><a href=\"?function=deleteShout&id=$row[shout_id]\" onclick=\"return confirm_delete_shoutout()\">delete</a></div>" : "";
				$posts .= <<<HEREDOC
	    <div class="posting">
	      <strong>$row[firstname] $row[lastname] ($row[pledgeclass]) $date</strong>
	      <p>$message</p>
	      $delete
	    </div>

HEREDOC;
			}
			return <<<HEREDOC
	<div class="shoutbox">
	  <script type="text/javascript">
	  function confirm_delete_shoutout() {
		  return confirm("Are you sure you want to delete this post?");
	  }
	  </script>
	  <p class="moduleTitle">SHOUTBOX</p>
	  <div class="postingBox">
$posts
	  </div>
	  <form action="" method="post">
	    <textarea name="body" rows="2"></textarea>
			<p style="float: right; padding: 10px 7px 0px 0px;">
				<a href="shoutbox.rss.php" style="margin-left: 3px; padding: 0 0 0 19px; background: url(images/feed-icon-14x14.png) no-repeat 0 50%;">RSS Feed</a>
			</p>
	    <p class="buttons">
	      <input class="btn btn-primary" type="submit" name="function" value="Post" />
	    </p>
	  </form>
	</div>

HEREDOC;
		}
		return "";
	}
	
	function process() {
		if ($this->user->is_logged_in() && isset($_POST['function']) && isset($_POST['body']) && $_POST['function'] == "Post") {
			$user_id = $this->user->data['user_id'];
			$post_time = date("Y-m-d H:i:s");
			$message = Query::escape_string(str_replace(array("\r\n", "\r", "\n"), "<br />", htmlentities($_POST['body'], ENT_QUOTES, 'UTF-8')));
			$query = new Query(sprintf("INSERT INTO apo_shoutbox SET user_id=%d, post_time='%s', message='%s'", $user_id, $post_time, $message));
			$this->user->redirect($_SERVER['PHP_SELF']);
		} else if ($this->user->is_logged_in() && isset($_GET['function']) && isset($_GET['id']) && $_GET['function'] == "deleteShout" && is_numeric($_GET['id'])) {
			$user_id = $this->user->data['user_id'];
			$query = new Query(sprintf("SELECT user_id FROM apo_shoutbox WHERE shout_id=%d LIMIT 1", $_GET['id']));
			if (($row = $query->fetch_row()) && ($row['user_id'] == $user_id || $this->user->permit("admin delete shoutouts"))) {
				$query = new Query(sprintf("DELETE FROM apo_shoutbox WHERE shout_id=%d LIMIT 1", $_GET['id']));
			}
			$this->user->redirect($_SERVER['PHP_SELF']);
		}
	}
}

?>