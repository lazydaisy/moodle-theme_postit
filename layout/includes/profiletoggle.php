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
 * @package   theme_postit
 * @copyright 2015 Mary Evans
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if ( isloggedin()) {

    $url = $CFG->wwwroot. ' /user/view.php?id=' . $USER->id . '&amp;course=' . $COURSE->id;
    $togurl = "javascript:postittoggle('profilebar', 'toggle')";
    $content = '';

    $content .= html_writer::start_tag('div', array('id' => 'profiletoggle', 'class' => 'span6'));
    // Profilpic.
    $content .= html_writer::start_tag('div', array('id' => 'profilepic'));
    $content .= $OUTPUT->user_picture($USER, array('size'=>50));
    $content .= html_writer::end_tag('div');
    // Profilename.
    $content .= html_writer::start_tag('div', array('id' => 'profilename'));
    $content .= html_writer::start_tag('ul');
    $content .= html_writer::tag('li', html_writer::link($url, $USER->firstname));
    $content .= html_writer::tag('li', html_writer::link($togurl, ' &#9660;', array('id' => 'toggle')));
    $content .= html_writer::end_tag('ul');
    $content .= html_writer::end_tag('div');
    // Closing divs.
    $content .= html_writer::end_tag('div');

    echo $content;

} ?>
