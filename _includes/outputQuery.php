<?php

/***
 * Generate SQL Query
 * @param $results
 */

function outputQuery($results){
    $members_table = "exp_members";
    $members_data_table = "exp_member_data";
    $members_fields = "(password,username,email,screen_name,unique_id,timezone,language,group_id,join_date)";

    foreach($results as $k => $v)
    {
        // PRINT SQL STATEMENT TO ADD MEMBERS.
        echo "INSERT IGNORE INTO `".$members_table."`" . $members_fields . 'VALUES';
        echo "('" .sha1(genCreds($v['field1'])) ."','". $v['field1'] ."','". $v['field1'] ."','". $v['field1']."','".uniqid('mod_'.microtime())."','". "UTC" ."','". "English"."','". "11"."','". genTimestamp() ."');";

        // PRINT SQL STATEMENT TO ADD MEMBER DATA.
        echo "INSERT IGNORE INTO " . $members_data_table.
            "(". "member_id" .",". "m_field_id_3,". "m_field_id_4,". "m_field_id_5,". "m_field_id_6,". "m_field_id_8,". "m_field_id_10,". "m_field_id_11". ")
            VALUES (LAST_INSERT_ID()," . "'". '' ."'" .",". "'". '' ."'" .",". "'". '' ."'" .",". "'". '' ."'" .",". "'". '' ."'" .",". "'". '' ."'" .",". "'". '' ."'" .");";
    }
}


// For future reference
/**
 * echo "('" .sha1($v['password']) ."','". $v['username'] ."','". $v['email'] ."','". $v['username']."','".uniqid('mod_'.microtime())."','". "UTC" ."','". "English"."','". "11"."','". "1409224705"."');";
 */