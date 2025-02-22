<?php
    /*
    Plugin Name:        Slider Bin
    Plugin URI:         https://wolfdevs.com/products/
    Description:         A versatile WordPress slider plugin supporting multiple slider types including hero, post, image, and video sliders.
    Version:            1.1.1
    Requires at Least:  6.7.1
    Requires PHP:       7.2
    Author:             wolfdevsllc
    Author URI:         https://github.com/wolfdevsllc
    License:            GNU General Public License v2 or later
    License URI:        http://www.gnu.org/licenses/gpl-2.0.html
    Update URI:         https://github.com/wolfdevsllc
    Text Domain:        slider_bin
    */


    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }

/**
 * Define plugin root path
 * Define plugin root URL
 * Define plugin basename
 */

    define('SLIDER_BIN_VERSION', '1.1.0');
    define('SLIDER_BIN_URL', plugin_dir_url(__FILE__));
    define('SLIDER_BIN_PATH', plugin_dir_path(__FILE__));

// Autoloader
    spl_autoload_register(function ($class) {
        if (strpos($class, 'Slider_Bin') === 0) {
            $class_file = SLIDER_BIN_PATH . 'class/class-' . strtolower(str_replace('_', '-', $class)) . '.php';
            if (file_exists($class_file)) {
                require_once $class_file;
            }
        }
    });

/**
 * Include the main plugin class
 * Initialize the plugin
 */
    require_once SLIDER_BIN_PATH . 'class/class-slider-bin.php';


/// Initialize main plugin class
    function slider_bin_init() {
        global $slider_bin;
        $slider_bin = new Slider_Bin();
    }


// Activation hook
    register_activation_hook(__FILE__, 'slider_bin_activate');
    function slider_bin_activate() {
        // Version checks
        if (version_compare(PHP_VERSION, '7.2', '<')) {
            wp_die(__('Slider Bin requires PHP 7.2 or higher.', 'slider_bin'));
        }
        if (version_compare(get_bloginfo('version'), '5.0', '<')) {
            wp_die(__('Slider Bin requires WordPress 5.0 or higher.', 'slider_bin'));
        }
        // Flush rewrite rules
        flush_rewrite_rules();

        // Flush rewrite rules
        flush_rewrite_rules();
    }

// Deactivation hook
    register_deactivation_hook(__FILE__, 'slider_bin_deactivate');
    function slider_bin_deactivate() {
        flush_rewrite_rules();
    }


// Debug log function
    function slider_bin_debug_log($message) {
        if (WP_DEBUG === true) {
            if (is_array($message) || is_object($message)) {
                error_log(print_r($message, true));
            } else {
                error_log($message);
            }
        }

        if ( ! defined( 'WP_DEBUG' ) ) {
            define( 'WP_DEBUG', false );
        }

        if ( ! defined( 'WP_DEBUG_LOG' ) ) {
            define( 'WP_DEBUG_LOG', false );
        }
    }

/// Hook into WordPress init with priority 0 to ensure it runs early
    add_action('init', 'slider_bin_init', 0);