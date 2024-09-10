<?php
/**
 * Plugin Name: Composer Autoloader
 * Description: Autoloads the Composer autoload file from the vendor directory.
 * Version: 1.0.0
 * Author: Chris Reynolds
 * Author URI: https://jazzsequence.com
 * License: MIT
 */

if ( file_exists( __DIR__ . '../../vendor/autoload.php' ) ) {
	require_once __DIR__ . '../../vendor/autoload.php';
}
