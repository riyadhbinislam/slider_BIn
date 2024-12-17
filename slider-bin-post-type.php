<?php

// Register Slider Post Type

    function slider_bin_register_post_type() {
        $args = array(
            'labels' => array(
                'name'               => 'Sliders',
                'singular_name'      => 'Slider',
                'menu_name'          => 'Slider Bin',
                'name_admin_bar'     => 'Slider',
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Slider',
                'new_item'           => 'New Slider',
                'edit_item'          => 'Edit Slider',
                'view_item'          => 'View Slider',
                'all_items'          => 'All Sliders',
                'search_items'       => 'Search Sliders',
                'parent_item_colon'  => 'Parent Sliders:',
                'not_found'          => 'No slider found.',
                'not_found_in_trash' => 'No slider found in Trash.',
            ),
            'public'            => true,
            'has_archive'       => true,
            'show_in_rest'      => true, // Enables Gutenberg support
            'supports'          => array('title', 'thumbnail'), //  'editor', Add other features like 'custom-fields', 'excerpt', etc.
            'rewrite'           => array('slug' => 'slider-post'), // Customize the URL slug
            'menu_icon'         => 'dashicons-tickets-alt', // Dashicons icon for the menu
            'menu_position'     => 101, // Position it at the bottom of the admin menu
        );

        // Register the custom post type
        register_post_type('slider_post', $args);
        }

    add_action('init', 'slider_bin_register_post_type');


// Add new columns to the post list

    function slider_bin_add_custom_columns($columns) {
        // Remove the 'date' column temporarily
        $date = $columns['date'];
        unset($columns['date']);

        // Add custom columns
        $columns['slider_type'] = __('Slider Type', 'slider_bin');
        $columns['shortcode'] = __('Shortcode', 'slider_bin');

        // Add the 'date' column back at the end
        $columns['date'] = $date;

        return $columns;
    }
    add_filter('manage_slider_post_posts_columns', 'slider_bin_add_custom_columns');


// Make Slider Type sortable
    function slider_bin_sortable_columns($columns) {
        $columns['slider_type'] = 'slider_type';
        return $columns;
    }
    add_filter('manage_edit-slider_post_sortable_columns', 'slider_bin_sortable_columns');


// Modify query to sort by Slider Type
    function slider_bin_column_orderby($query) {
        if (!is_admin()) {
            return;
        }

        $orderby = $query->get('orderby');
        if ('slider_type' === $orderby) {
            $query->set('meta_key', '_slider_type');
            $query->set('orderby', 'meta_value');
        }
    }
    add_action('pre_get_posts', 'slider_bin_column_orderby');


// Add data to the new columns
// Populate the custom columns
    function slider_bin_custom_columns($column, $post_id) {
        if ($column === 'slider_type') {
            $slider_type = get_post_meta($post_id, '_slider_type', true);
            $edit_link = get_edit_post_link($post_id); // Get the edit link for the post

            if ($slider_type) {
                // Display the slider type as a clickable link to edit the post
                echo '<a href="' . esc_url($edit_link) . '">' . esc_html(ucfirst($slider_type)) . '</a>';
            } else {
                // If no slider type is set, display a fallback message
                echo 'No Slider Type';
            }
        }

        if ($column === 'shortcode') {
            $shortcode = "[slider_bin id='{$post_id}']";
            echo '<input type="text" value="' . esc_attr($shortcode) . '" readonly="readonly" onclick="this.select();" style="width:75%;cursor:pointer;">';
            echo '<button onclick="navigator.clipboard.writeText(\'' . esc_js($shortcode) . '\')" style="margin-left:5px;cursor:pointer;">Copy</button>';
        }
    }

    add_action('manage_slider_post_posts_custom_column', 'slider_bin_custom_columns', 10, 2);


// Add the Settings page under the Slider Bin menu
    function slider_bin_add_settings_page() {
      add_submenu_page(
          'edit.php?post_type=slider_post', // Parent slug (for slider_post custom post type)
          __('Settings', 'slider_bin'), // Page title
          __('Settings', 'slider_bin'), // Menu title
          'manage_options', // Capability
          'slider_bin_settings', // Slug for the settings page
          'slider_bin_settings_page' // Function to render the settings page
      );
    }

    add_action('admin_menu', 'slider_bin_add_settings_page');


// Render the settings page content
    function slider_bin_settings_page() {
      ?>
      <div class="wrap">
          <h1><?php esc_html_e('Slider Bin Settings', 'slider_bin'); ?></h1>
          <p><?php esc_html_e('Configure your Slider Bin settings here.', 'slider_bin'); ?></p>
          <!-- Add your settings form here -->
      </div>
      <?php
    }


