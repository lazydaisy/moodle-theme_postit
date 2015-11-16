<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Postit upgrade.
 *
 * @package    theme_postit
 * @copyright  2015 Mary Evans
 * @copyright  2014 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Theme Postit upgrade function.
 *
 * @param  int $oldversion The version we upgrade from.
 * @return bool
 */
function xmldb_theme_postit_upgrade($oldversion) {
    global $CFG;

    if ($oldversion < 2015110800) {

        // Set the default background. If an image is already there then ignore.
        $fs = get_file_storage();
        $bg = $fs->get_area_files(context_system::instance()->id, 'theme_postit', 'backgroundimage', 0);

        // Add default background image.
        if (empty($bg)) {
            $filerecord = new stdClass();
            $filerecord->component = 'theme_postit';
            $filerecord->contextid = context_system::instance()->id;
            $filerecord->userid    = get_admin()->id;
            $filerecord->filearea  = 'backgroundimage';
            $filerecord->filepath  = '/';
            $filerecord->itemid    = 0;
            $filerecord->filename  = 'postit.jpg';
            $fs->create_file_from_pathname($filerecord, $CFG->dirroot . '/theme/postit/pix/images/postit.jpg');
        }

        upgrade_plugin_savepoint(true, 2015111000, 'theme', 'postit');

    }

    if ($oldversion < 2015111001) {

        // Set the default settings as they might already be set.
        set_config('linkcolor', '#ff9933', 'theme_postit');
        set_config('sidewayheadercolor', '#ffdd99', 'theme_postit');
        set_config('backgroundrepeat', 'repeat', 'theme_postit');
        set_config('backgroundimage', '/images/postit.jpg', 'theme_postit');

        upgrade_plugin_savepoint(true, 2015111001, 'theme', 'postit');
    }

    // Moodle v3.1.0 release upgrade line.
    // Put any upgrade step following this.


    return true;
}
