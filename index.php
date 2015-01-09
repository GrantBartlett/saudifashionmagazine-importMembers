<?php

require_once('_includes/database.php');
require_once('_includes/userGenerator.php');
require_once('_includes/outputQuery.php');

/***
 * New instance of DB class, select competition email data source
 */

$database = new Db();
$results = $database->select("SELECT field1 FROM email");


/***
 * Store password plaintext, in seperate db to export and send to user in email
 */

// Prepare password table
$database->query('ALTER TABLE email ADD password VARCHAR( 255 ) NOT NULL');

// Insert passwords so there is a record we can keep to send out
foreach ($results as $k => $v) {
    $k = $k + 1;
    $password = genCreds($v['field1']);
    $email = $v['field1'];
    $database->query("UPDATE ignore email set password = '$password' WHERE id = $k");
}

/***
 * Output SQL Query to import into live database.
 */

outputQuery($results);