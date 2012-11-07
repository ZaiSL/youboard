<?php
// map class name to file
Autoloader::map(array(
	'YouTrackAuth' => __DIR__.'/libraries/youtrackauth.php',
));

// register the auth driver
Auth::extend('youtrackauth', function() {
	return new YouTrackAuth();
});
