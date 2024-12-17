<?php
/**
 * Content class for Slider Bin.
 *
 * @package Slider_Bin
 */

namespace Slider_Bin\inc;

use Slider_Bin\inc\traits\Singleton;

class Content {
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
     * Initialize the Content functionality.
     */
    public function setup_plugin() {
        // Content-related setup code here.


    }
}