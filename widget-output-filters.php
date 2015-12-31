<?php
/*
Plugin Name: Widget Output Filters
Plugin URI:  http://philipnewcomer.net/wordpress-plugins/widget-output-filters/
Description: Enables developers to filter the output of WordPress widgets.
Author:      Philip Newcomer
Author URI:  http://philipnewcomer.net
Version:     1.0
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright (C) 2014  Philip Newcomer
Based on code contained in the Widget Logic plugin by Alan Trewartha

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

require_once( __DIR__ . '/src/class.Widget_Output_Filters.php' );
new Widget_Output_Filters();
