<?php  // Qcep configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'qcep';
$CFG->dbuser    = 'usrxxxxxxx';
$CFG->dbuserread = 'usrxxxxxxx';
$CFG->dbpass    = 'xxxxxxxxxx';
$CFG->url   = 'https://xxxxxxxxxxx';
$CFG->clientID = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com';
$CFG->clientSecret = 'GOxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$CFG->redirectUrl = $CFG->url;
