<?php

if (!session_id()) {
    // No session is currently in progress, so start one.
    session_start();
}

require 'sanitize.php';

//
// Check for user authentication
//
// If user is not authenticated, redirect them to our login page.
//
if (!isset($_SESSION['authenticated'])) {

    // User is NOT authenticated, so redirect them to 
    // login.php and pass along to it the file they
    // were trying to access.
    //
    // Where did they come from?
    $scriptName = sanitizeString(INPUT_SERVER, 'SCRIPT_NAME');

    // Redirect them to login.php
    header("Location: http://localhost:3000/login.php?url=" . urlencode($scriptName));
}