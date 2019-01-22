<?php
    session_start();
    //Check if user is logged in
    if(!$_SESSION['login']){
        header("location:login.php");
        exit();
    }
    //Set the duration of the session
    $sessionTimeout = 3600;
    if (!isset($_SESSION['sessionTimeout'])) {
        //Saves the the time when you logged in
		$_SESSION['sessionTimeout'] = time();
    }
    //Destroys session if the user is longer afk then $sessionTimeout
	if ((time() - $_SESSION['sessionTimeout']) > $sessionTimeout) {
		session_destroy();
		header("Location: login.php");
    }
    //Resets the timer if the user did something
	$_SESSION['sessionTimeout'] = time();
?>
