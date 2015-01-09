<?php

/***
 * Create a username based off an email
 * @param $email
 * @return string
 */

function genCreds($email)
{
    $split = explode("@", $email);
    $string = $split[0];
    return $string .= '_sfm';
}


/***
 * @return int
 */
function genTimestamp()
{
    date_default_timezone_set('UTC');
    $date = new DateTime();
    return $date->getTimestamp();
}
