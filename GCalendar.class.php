<?php

    
class GCalendar {
    function GCalendar() {
        require __DIR__ . '/vendor/autoload.php';
        $this->client = $this->getClient();
        $this->service = new Google_Service_Calendar($this->client);
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
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = 'token.json';
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
    
    function addEvent($event_arr) {
        /*
        example input:
        
        array(
          'summary' => 'this is the title',
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
        )
        */
        $event = new Google_Service_Calendar_Event($event_arr);

        $calendarId = '983e3gkdv6ll90o4v86v2fi6io@group.calendar.google.com';
        $event = $this->service->events->insert($calendarId, $event);
    }
}
?>