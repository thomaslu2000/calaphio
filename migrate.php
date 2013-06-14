<?php
include 'include/includes.php';

if (!$g_user->is_logged_in() || $g_user->data['user_id'] != 1) {
	$g_user->print_login();
	exit();
}

$g_error->output_error();

$timestamp = date("Y-m-d H:i:s");
$source_database = "apo";

$query = new Query(sprintf("DELETE FROM %s.members WHERE SID=1 OR SID=2 LIMIT 2", $source_database));

$query = new Query(sprintf("ALTER TABLE %s.members ADD salt CHAR(32) DEFAULT ''", $source_database));

$query = new Query(sprintf("SELECT SID FROM %s.members", $source_database));

while ($row = $query->fetch_row()) {
	$sid = $row['SID'];
	$query2 = new Query(sprintf("UPDATE %s.members SET salt='%s' WHERE SID=%d LIMIT 1", $source_database, User::generate_salt(), $sid));
}

$query = new Query(sprintf("UPDATE %s.members SET ename=concat('none_', ceil(rand() * SID / 10000)), eserve='berkeley.edu' WHERE ename IS NULL OR eserve IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET ename=concat('none_', ceil(rand() * SID / 10000)), eserve='berkeley.edu' WHERE ename='' OR eserve=''", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET pclass='' WHERE pclass IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET saddy='' WHERE saddy IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET city='' WHERE city IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET zip=0 WHERE zip IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET phone='' WHERE phone IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET cphone='' WHERE cphone IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET major='' WHERE major IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET aim='' WHERE aim IS NULL", $source_database));
$query = new Query(sprintf("UPDATE %s.members SET shirtsize='' WHERE shirtsize IS NULL", $source_database));

$query = new Query(sprintf("INSERT INTO %s.%susers (email, passphrase, salt, old_passphrase, firstname, lastname, pledgeclass, registration_timestamp, registration_user, last_login, sid, address, city, zipcode, phone, cellphone, major, birthday, aim, shirtsize)
	SELECT trim(concat(ename, '@', eserve)), sha1(concat(salt, rand())), salt, password, fname, lname, pclass, now(), 1, laston, SID, trim(saddy), trim(city), zip, trim(phone), trim(cphone), trim(major), bday, trim(aim), shirtsize FROM %s.members",
	DB_DATABASE, TABLE_PREFIX, $source_database));

$query = new Query(sprintf("UPDATE %s.%susers SET zipcode='' WHERE zipcode='0'", DB_DATABASE, TABLE_PREFIX));

/*
| members | CREATE TABLE `members` (
  `SID` int(11) NOT NULL default '0',
  `SIDhash` varchar(32) default NULL,
  `lname` text,
  `fname` text,
  `ename` text,
  `eserve` text,
  `saddy` text,
  `city` text,
  `zip` int(11) default NULL,
  `phone` text,
  `cphone` text,
  `bday` date default NULL,
  `major` text,
  `pclass` text,
  `laston` date default NULL,
  `aim` text,
  `password` varchar(32) character set latin1 collate latin1_bin default NULL,
  `shirtsize` text,
  `photo` blob,
  PRIMARY KEY  (`SID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 |
*/

$query = new Query(sprintf("ALTER TABLE %s.%scalendar_event ADD old_eid INT", DB_DATABASE, TABLE_PREFIX));
$query = new Query(sprintf("ALTER TABLE %s.%scalendar_event ADD INDEX old_eid (old_eid)", DB_DATABASE, TABLE_PREFIX));

$query = new Query(sprintf("UPDATE %s.events SET max=0 WHERE max IS NULL", $source_database));

$query = new Query(sprintf("INSERT INTO %s.%scalendar_event (title, location, description, date, old_eid, type_service_chapter, type_service_campus, type_service_community, type_service_country, type_fellowship, type_interchapter, type_active_meeting, type_pledge_meeting, evaluated, signup_limit)
	SELECT title, ggwhen, proj, ggday, ID, etype=0 || etype=4, etype=0 || etype=4, etype=0 || etype=4, etype=0 || etype=4, etype=1 || etype=5, etype=4 || etype=5, etype=2, etype=3, !(evalsid IS NULL), max FROM %s.events
	WHERE ggday > '2004-6-1'",
	DB_DATABASE, TABLE_PREFIX, $source_database));

/*
| events | CREATE TABLE `events` (
  `ID` int(11) NOT NULL auto_increment,
  `ggday` date default NULL,
  `ggwhen` text,
  `title` text,
  `proj` text,
  `chair` int(11) default NULL,
  `etype` int(11) default NULL,
  `eval` date default NULL,
  `evalsid` int(11) default NULL,
  `hours` int(11) default NULL,
  `max` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 |
*/

$query = new Query(sprintf("UPDATE %s.events SET hours=0 WHERE hours IS NULL", $source_database));

/*
|     2 |  317 | 15297967 |
|     2 |  353 | 15237129 |
|     2 |  376 | 16633950 |
*/
$query = new Query(sprintf("INSERT INTO %s.%scalendar_attend (event_id, user_id, signup_time, driver, hours, attended, flaked, chair)
	SELECT event_id, user_id, signup, atype=6, %s.events.hours, atype=3, atype=4, atype=6 FROM %s.attend
	JOIN %s.%scalendar_event ON (old_eid = EID)
	JOIN %s.events ON (EID = ID)
	JOIN %s.%susers ON (%s.%susers.sid = %s.attend.SID) WHERE %s.attend.SID != 0
	ON DUPLICATE KEY UPDATE attended=attended",
	DB_DATABASE, TABLE_PREFIX,
	$source_database, $source_database,
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX, DB_DATABASE, TABLE_PREFIX, $source_database, $source_database));

/*
| attend | CREATE TABLE `attend` (
  `SID` int(11) default NULL,
  `EID` int(11) default NULL,
  `atype` int(11) default NULL,
  `rides` int(11) default NULL,
  `signup` datetime default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 |
*/

$query = new Query(sprintf("INSERT INTO %s.%sevent_evaluation (event_id, field_id, user_id, text_response)
	SELECT event_id, 1, user_id, probs FROM %s.evaluations
	JOIN %s.%scalendar_event ON (old_eid = EID)
	JOIN %s.events ON (ID = EID)
	JOIN %s.%susers ON (%s.%susers.sid = %s.events.evalsid)",
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX, DB_DATABASE, TABLE_PREFIX, $source_database));

$query = new Query(sprintf("INSERT INTO %s.%sevent_evaluation (event_id, field_id, user_id, text_response)
	SELECT event_id, 2, user_id, fun FROM %s.evaluations
	JOIN %s.%scalendar_event ON (old_eid = EID)
	JOIN %s.events ON (ID = EID)
	JOIN %s.%susers ON (%s.%susers.sid = %s.events.evalsid)",
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX, DB_DATABASE, TABLE_PREFIX, $source_database));

$query = new Query(sprintf("INSERT INTO %s.%sevent_evaluation (event_id, field_id, user_id, text_response)
	SELECT event_id, 3, user_id, improve FROM %s.evaluations
	JOIN %s.%scalendar_event ON (old_eid = EID)
	JOIN %s.events ON (ID = EID)
	JOIN %s.%susers ON (%s.%susers.sid = %s.events.evalsid)",
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX, DB_DATABASE, TABLE_PREFIX, $source_database));

$query = new Query(sprintf("INSERT INTO %s.%sevent_evaluation (event_id, field_id, user_id, text_response)
	SELECT event_id, 4, user_id, again FROM %s.evaluations
	JOIN %s.%scalendar_event ON (old_eid = EID)
	JOIN %s.events ON (ID = EID)
	JOIN %s.%susers ON (%s.%susers.sid = %s.events.evalsid)",
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX, DB_DATABASE, TABLE_PREFIX, $source_database));

$query = new Query(sprintf("INSERT INTO %s.%sevent_evaluation (event_id, field_id, user_id, text_response)
	SELECT event_id, 5, user_id, misc FROM %s.evaluations
	JOIN %s.%scalendar_event ON (old_eid = EID)
	JOIN %s.events ON (ID = EID)
	JOIN %s.%susers ON (%s.%susers.sid = %s.events.evalsid)",
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX,
	$source_database,
	DB_DATABASE, TABLE_PREFIX, DB_DATABASE, TABLE_PREFIX, $source_database));

/*
| evaluations | CREATE TABLE `evaluations` (
  `EID` int(11) NOT NULL default '0',
  `probs` text,
  `fun` text,
  `improve` text,
  `again` text,
  `misc` text,
  PRIMARY KEY  (`EID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 |
*/
?>