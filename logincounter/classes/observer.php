<?php
namespace block_logincounter;

defined('MOODLE_INTERNAL') || die();

class observer {
    public static function user_loggedin(\core\event\user_loggedin $event) {
        global $DB;

        $userid = $event->userid;
        $record = $DB->get_record('block_logincounter', ['userid' => $userid]);

        if ($record) {
            $record->logincount++;
            $DB->update_record('block_logincounter', $record);
        } else {
            $DB->insert_record('block_logincounter', ['userid' => $userid, 'logincount' => 1]);
        }
    }
}
