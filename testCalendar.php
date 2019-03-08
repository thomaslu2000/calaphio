<?php 
include ('GCalendar.class.php');
$gcal = new GCalendar();

foreach($gcal->listOfCalendars() as $item) {
    echo $item->getSummary();
}
$e = array(
          'summary' => 'this the real test',
          'location' => '123 sesame street',
          'description' => 'A chance to hear more about Google\'s developer products.',
          'start' => array(
            'dateTime' => '2019-03-08T13:00:00-07:00',
            'timeZone' => 'America/Los_Angeles',
          ),
          'end' => array(
            'dateTime' => '2019-03-08T15:00:00-07:00',
            'timeZone' => 'America/Los_Angeles',
          ),
        );
$gcal->addEvent($e);
?>