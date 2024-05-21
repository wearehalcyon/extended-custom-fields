<?php
/*
Plugin Name: Extended Custom Fields
Plugin URI: https://github.com/wearehalcyon/extended-custom-fields
Description: This plugin provide extended (advanced) custom fields to your WordPress site. Plugin based on Carbon Fields.
Author: Roman A
Version: 0.0.5
Author URI: mailto:thewitness45@gmail.com
Requires PHP: 7.4
Requires at least: 5.8
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}

// Include Dash admin menu
require "includes/admin/cpt/ecf-cpt.php";