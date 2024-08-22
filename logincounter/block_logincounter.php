<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 * Login Counter block.
 *
 * @package   block_logincounter
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_logincounter extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_logincounter');
    }

    public function get_content() {
        global $USER, $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        // Get the user's login count.
        if ($record = $DB->get_record('block_logincounter', ['userid' => $USER->id])) {
            echo 'my name is akmkdijijijijijijijijijijijiji';
            $login_count = $record->logincount;
        } else {
            echo 'diejiejeidj';
            $login_count = 0;
        }

        $this->content = new stdClass();
        $this->content->text = get_string('login_count', 'block_logincounter', $login_count);
        $this->content->footer = '';

        return $this->content;
    }

    public function applicable_formats() {
        return ['site' => true, 'my' => true];
    }
}