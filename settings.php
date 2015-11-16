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
 * Theme More settings.
 *
 * Each setting that is defined in the parent theme Clean should be
 * defined here too, and use the exact same config name. The reason
 * is that theme_postit does not define any layout files to re-use the
 * ones from theme_clean. But as those layout files use the function
 * {@link theme_clean_get_html_for_settings} that belong to Clean,
 * we have to make sure it works as expected by having the same settings
 * in our theme.
 *
 * @package    theme_postit
 * @copyright  2015 Mary Evans
 * @copyright  2014 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // @sidewayHeaderColor setting.
    $name = 'theme_postit/sidewayheadercolor';
    $title = get_string('sidewayheadercolor', 'theme_postit');
    $description = get_string('sidewayheadercolor_desc', 'theme_postit');
    $default = '#FFDD33';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // @linkColor setting.
    $name = 'theme_postit/linkcolor';
    $title = get_string('linkcolor', 'theme_postit');
    $description = get_string('linkcolor_desc', 'theme_postit');
    $default = '#FF9933';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // @bodyBackground setting.
    $name = 'theme_postit/bodybackground';
    $title = get_string('bodybackground', 'theme_postit');
    $description = get_string('bodybackground_desc', 'theme_postit');
    $default = '';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background image setting.
    $name = 'theme_postit/backgroundimage';
    $title = get_string('backgroundimage', 'theme_postit');
    $description = get_string('backgroundimage_desc', 'theme_postit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background repeat setting.
    $name = 'theme_postit/backgroundrepeat';
    $title = get_string('backgroundrepeat', 'theme_postit');
    $description = get_string('backgroundrepeat_desc', 'theme_postit');;
    $default = 'repeat';
    $choices = array(
        '0' => get_string('default'),
        'repeat' => get_string('backgroundrepeatrepeat', 'theme_postit'),
        'repeat-x' => get_string('backgroundrepeatrepeatx', 'theme_postit'),
        'repeat-y' => get_string('backgroundrepeatrepeaty', 'theme_postit'),
        'no-repeat' => get_string('backgroundrepeatnorepeat', 'theme_postit'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background position setting.
    $name = 'theme_postit/backgroundposition';
    $title = get_string('backgroundposition', 'theme_postit');
    $description = get_string('backgroundposition_desc', 'theme_postit');
    $default = '0';
    $choices = array(
        '0' => get_string('default'),
        'left_top' => get_string('backgroundpositionlefttop', 'theme_postit'),
        'left_center' => get_string('backgroundpositionleftcenter', 'theme_postit'),
        'left_bottom' => get_string('backgroundpositionleftbottom', 'theme_postit'),
        'right_top' => get_string('backgroundpositionrighttop', 'theme_postit'),
        'right_center' => get_string('backgroundpositionrightcenter', 'theme_postit'),
        'right_bottom' => get_string('backgroundpositionrightbottom', 'theme_postit'),
        'center_top' => get_string('backgroundpositioncentertop', 'theme_postit'),
        'center_center' => get_string('backgroundpositioncentercenter', 'theme_postit'),
        'center_bottom' => get_string('backgroundpositioncenterbottom', 'theme_postit'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background fixed setting.
    $name = 'theme_postit/backgroundfixed';
    $title = get_string('backgroundfixed', 'theme_postit');
    $description = get_string('backgroundfixed_desc', 'theme_postit');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Logo file setting.
    $name = 'theme_postit/logo';
    $title = get_string('logo','theme_postit');
    $description = get_string('logodesc', 'theme_postit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_postit/customcss';
    $title = get_string('customcss', 'theme_postit');
    $description = get_string('customcssdesc', 'theme_postit');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_postit/footnote';
    $title = get_string('footnote', 'theme_postit');
    $description = get_string('footnotedesc', 'theme_postit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
}
