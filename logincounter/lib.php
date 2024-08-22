<?php
// Ensure this file is part of Moodle.
defined('MOODLE_INTERNAL') || die();

/**
 * Implements the user_login hook to track login counts.
 *
 * @param object $user The user object.
 */
if (!function_exists('block_logincounter_user_login')){
    function block_logincounter_user_login($user) {
        global $DB;
    
        // Check if the record exists for the user.
        if ($record = $DB->get_record('block_logincounter', ['userid' => $user->id])) {
            // Increment the login count.
            $record->logincount++;
            $DB->update_record('block_logincounter', $record);
        } else {
            // First login for this user, create a new record.
            $record = new stdClass();
            $record->userid = $user->id;
            $record->logincount = 1;
            $DB->insert_record('block_logincounter', $record);
        }
    }
}
