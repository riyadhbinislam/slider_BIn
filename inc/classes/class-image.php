<?php
/**
 * Image class for Slider Bin.
 *
 * @package Slider_Bin
 */

namespace Slider_Bin\inc;

use Slider_Bin\inc\traits\Singleton;

class Image {
    use Singleton;

    protected function __construct() {
        // Load dependencies if needed.
        $this->setup_hooks();
    }

    /**
     * Setup hooks.
     */
    protected function setup_hooks() {
        // Add actions and filters here.

    }

    /**
     * Initialize the Image functionality.
     */
    public function setup_plugin() {
        // Image-related setup code here.


    }
}