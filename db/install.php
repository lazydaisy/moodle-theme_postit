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
 * Theme Posit install.
 *
 * @package    theme_postit
 * @copyright  2015 Mary Evans
 * @copyright  2014 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Theme Postit install function.
 *
 * @return void
 */
function xmldb_theme_postit_install() {
    global $CFG;

    // Set the default background.
    $fs = get_file_storage();

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
