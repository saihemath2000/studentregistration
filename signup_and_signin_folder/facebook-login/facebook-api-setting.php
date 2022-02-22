<?php

// Database Connection
class FB_API{
public $hostname=       'localhost'; // Enter Your Hostname
public $DBusername=     'root';    // Enter your database username
public $DBpassword=     '';        // Enter your database password
public $DBname=         'codingstatus'; // Enter your database name
public $usersTableName= 'fblogin'; // Enter your users table name

// Facebook API Key
public $FB_APP_ID= '294208816008752'; // Enter your fb App ID
public $FB_APP_SECRET='3b671df9205576617e1279bffcdfc5b0'; // Enter your fb Secret key
public $FB_REDIRECT_URL= 'http://localhost/registration/indexpage.php'; // Enter page address where it will redirect after login

// Facebook API Path
public $FB_API_path='\php-graph-sdk-5.x\src\Facebook\autoload.php'; /* keep as it is your api folder same
like this*/
}
?>