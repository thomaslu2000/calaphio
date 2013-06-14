<?php

class ApoGallery {
	
	function register($external_id, $fullname, $pledgeclass, $email)
	{
		require_once 'gallery2/embed.php';
		$ret = GalleryEmbed::init(array(
			'g2Uri' => '/gallery2/',
			'embedUri' => '/gallery.php',
			'relativeG2Path' => 'gallery2',
			'activeUserId' => $external_id));
		if ($ret) {
			// Error!
			// Did we get an error because the user doesn't exist in g2 yet?
			$ret2 = GalleryEmbed::isExternalIdMapped($external_id, 'GalleryUser');
			if ($ret2 && $ret2->getErrorCode() & ERROR_MISSING_OBJECT) {
				// The user does not exist in G2 yet. Create it now on-the-fly
				$ret = GalleryEmbed::createUser($external_id, array(
					'username' => $fullname . '-' . $pledgeclass,
					'email' => $email,
					'fullname' => $fullname));
				/*if ($ret) {
					// An error during user creation. Not good, print an error or do whatever is appropriate 
					// in your emApp when an error occurs
					print "An error occurred during the on-the-fly user creation <br>";
					print $ret->getAsHtml();
					exit;
				}*/
			}/* else {
				// The error we got wasn't due to a missing user, it was a real error
				if ($ret2) {
					print "An error occurred while checking if a user already exists<br>";
					print $ret2->getAsHtml();
				}
				print "An error occurred while trying to initialize G2<br>";
				print $ret->getAsHtml();
				exit;
			}*/
		}
	}
}
?>
