<?php

    
class GCalendar {
    function GCalendar() {
        require __DIR__ . '/vendor/autoload.php';
        $this->client = $this->getClient();
        $this->service = new Google_Service_Calendar($this->client);
        $this->calendar_id = 'q1htbip14b5k2j8fh9goa0eqt4@group.calendar.google.com';
    }
    
    //cli interface, webmaster use only!!
    function createNewToken($client) {
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
    }
    
	function getClient() {
        $client = new Google_Client();
        $client->setApplicationName('members');
        $client->setScopes(Google_Service_Calendar::CALENDAR);
        $client->setAuthConfig(__DIR__ . '/credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = __DIR__ . '/token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        } else {
            trigger_error("Google client didn't work, please contact webmaster");
        }
        
        return $client;
    }
    
    function listOfCalendars() {
        $calendarList = $this->service->calendarList->listCalendarList();
        $calendars = array();
        while(true) {
          foreach ($calendarList->getItems() as $calendarListEntry) {
            $calendars[] = $calendarListEntry;
          }
          $pageToken = $calendarList->getNextPageToken();
          if ($pageToken) {
            $optParams = array('pageToken' => $pageToken);
            $calendarList = $service->calendarList->listCalendarList($optParams);
          } else {
            break;
          }
        }
        return $calendars;
    }
    
    function deleteEvent($id) {
        try {
            $this->service->events->delete($this->calendar_id, $id);
        } catch (Google_Service_Exception $e) {
        }
        
    }
    
    function addEvent($title, $loc, $des, $startAt, $endAt, $id) {
        
        // create event resource object
        $startAt = str_replace('"', '', $startAt);
        $endAt = str_replace('"', '', $endAt);
        if (strtotime( $startAt ) > strtotime( $endAt )) {
            $endAt = date("Y-m-d H:i:s", strtotime( $startAt ) + 2 * 3600 );
        }
        $startAt = str_replace(' ', 'T', $startAt);
        $endAt = str_replace(' ', 'T', $endAt);
        $event_arr = array(
          'summary' => $title,
          'location' => $loc,
          'description' => $des,
            'id' => $id,
          'start' => array(
            'dateTime' => $startAt,
            'timeZone' => 'America/Los_Angeles',
          ),
          'end' => array(
            'dateTime' => $endAt,
            'timeZone' => 'America/Los_Angeles',
          ),
        );
        $newEvent = new Google_Service_Calendar_Event($event_arr);
        // check if event already exists
        try {
            $event = $this->service->events->get($this->calendar_id, $id);
            $newEvent = $this->service->events->update($this->calendar_id, $id, $newEvent);
            return $id;
        } catch (Google_Service_Exception $e) {
            $newEvent = $this->service->events->insert($this->calendar_id, $newEvent);
            return $newEvent->id;
        }
        
    }
}
?>