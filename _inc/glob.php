<?php
	##############
	## glob.php ##
	##############

	$params['db']['hostname']  = "localhost";
	$params['db']['username']  = "habbogl1_ollie";
	$params['db']['password']  = "0Ms2mOwd}GhL";
	$params['db']['database']  = "habbogl1_staff";
	
	$params['core']['salt1']   = "3f08c4619c";
	$params['core']['salt2']   = "9a1decf1ac";

	$params['user']['timeout'] = "30 minutes";

	session_start();
	putenv( "TZ=Europe/London" );

	require_once( "db.inc.php" );
	require_once( "core.inc.php" );
	require_once( "user.inc.php" );
	
	if( file_exists( "_installer/" ) ) {
	
		die( "Please delete the /_installer directory." );
	
	}
?>