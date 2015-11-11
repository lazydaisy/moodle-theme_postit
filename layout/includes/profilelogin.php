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
 * Configuration for Moodle's base theme.
 *
 * This theme is special, and implements a minimalist theme with only
 * basic layout. It is intended as a base for other themes to build upon.
 * It is not recommend to actually choose this theme for production sites!
 *
 * DO NOT COPY THIS TO START NEW THEMES!
 * Start with another theme, like "standard".
 *
 * For full information about creating Moodle themes, see:
 *  http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_postit
 * @copyright 2015 Mary Evans
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


    function get_content () {
    global $USER, $CFG, $SESSION, $COURSE;
    $wwwroot = '';
    $signup = '';}

    if (empty($CFG->loginhttps)) {
        $wwwroot = $CFG->wwwroot;
    } else {
        $wwwroot = str_replace("http://", "https://", $CFG->wwwroot);
    }

if (!isloggedin() or isguestuser()) {
    echo '<div id="profilelogin">';
    echo '<form id="login" method="post" action="'.$wwwroot.'/login/index.php?authldap_skipntlmsso=1">';
    echo '<ul>';
    echo '<li><input class="loginform" type="text" name="username" id="login_username" value="" placeholder="'.get_string('username').'" /></li>';
    echo '<li><input class="loginform" type="password" name="password" id="login_password" value="" placeholder="'.get_string('password').'" /></li>';
    echo '<li><input type="submit" value="&nbsp;&nbsp;'.get_string('login').'&nbsp;&nbsp;" /></li>';
    echo '</ul>';
    echo '</form>';
    echo '</div>';
} else {
    echo '<div id="profilepic">';
    echo $OUTPUT->user_picture($USER, array('size'=>50));
    echo '</div>';
} ?>
