<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Slider_Bin_Post_Type {
    private static $instance = null;

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        // Prevent duplicate initialization
        if (self::$instance) {
            return;
        }
        self::$instance = $this;

        // Ensure the option exists with a default value
        // add_option('slider_bin_selected_type', 'hero_same', '', 'yes');

        add_action('init', array($this, 'register_post_type'), 5);
        $this->init_hooks();
    }

    private function init_hooks() {
        add_filter('manage_slider_post_posts_columns', array($this, 'add_custom_columns'));
        add_filter('manage_edit-slider_post_sortable_columns', array($this, 'sortable_columns'));
        add_action('pre_get_posts', array($this, 'column_orderby'));
        add_action('manage_slider_post_posts_custom_column', array($this, 'custom_column_content'), 10, 2);
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
    }


    public function register_post_type() {
        $labels = array(
            'name'               => __('Sliders', 'slider_bin'),
            'singular_name'      => __('Slider', 'slider_bin'),
            'menu_name'          => __('Slider Bin', 'slider_bin'),
            'name_admin_bar'     => __('Slider', 'slider_bin'),
            'add_new'            => __('Add New', 'slider_bin'),
            'add_new_item'       => __('Add New Slider', 'slider_bin'),
            'new_item'           => __('New Slider', 'slider_bin'),
            'edit_item'          => __('Edit Slider', 'slider_bin'),
            'view_item'          => __('View Slider', 'slider_bin'),
            'all_items'          => __('All Sliders', 'slider_bin'),
            'search_items'       => __('Search Sliders', 'slider_bin'),
            'parent_item_colon'  => __('Parent Sliders:', 'slider_bin'),
            'not_found'          => __('No sliders found.', 'slider_bin'),
            'not_found_in_trash' => __('No sliders found in Trash.', 'slider_bin')
        );

        $args = array(
            'labels'              => $labels,
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'slider'),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array('title'),
            'menu_icon'          => 'dashicons-images-alt2',
            'show_in_rest'       => true
        );

        register_post_type('slider_post', $args);
    }

    public function add_custom_columns($columns) {
        $date = $columns['date'];
        unset($columns['date']);

        $columns['slider_type'] = __('Slider Type', 'slider_bin');
        $columns['shortcode'] = __('Shortcode', 'slider_bin');
        $columns['date'] = $date;

        return $columns;
    }

    public function sortable_columns($columns) {
        $columns['slider_type'] = 'slider_type';
        return $columns;
    }

    public function column_orderby($query) {
        if (!is_admin()) {
            return;
        }

        $orderby = $query->get('orderby');
        if ('slider_type' === $orderby) {
            $query->set('meta_key', '_slider_type');
            $query->set('orderby', 'meta_value');
        }
    }

    public function custom_column_content($column, $post_id) {
        switch ($column) {
            case 'slider_type':
                $slider_type = get_post_meta($post_id, '_slider_type', true);
                $edit_link = get_edit_post_link($post_id);
                if ($slider_type) {
                    // Remove any potential duplication in the slider type
                    $slider_type = preg_replace('/(.+?)\1+/', '$1', $slider_type);
                    echo '<a href="' . esc_url($edit_link) . '">' . esc_html(ucfirst($slider_type)) . '</a>';
                } else {
                    echo __('No Type', 'slider_bin');
                }
                break;

            case 'shortcode':
                // Only output shortcode once
                if (!did_action('slider_bin_shortcode_' . $post_id)) {
                    $shortcode = "[slider_bin id='{$post_id}']";
                    echo '<div class="slider-shortcode-wrap">';
                    echo '<input type="text" value="' . esc_attr($shortcode) . '" readonly onclick="this.select()" class="slider-shortcode-input">';
                    echo '<button class="button button-secondary copy-shortcode" data-shortcode="' . esc_attr($shortcode) . '">' . __('Copy', 'slider_bin') . '</button>';
                    echo '</div>';
                    do_action('slider_bin_shortcode_' . $post_id);
                }
                break;
        }
          // Add translations for the copy button
          wp_localize_script('slider-bin-copy', 'sliderBinCopy', [
            'copyText' => __('Copy', 'slider_bin'),
            'copiedText' => __('Copied!', 'slider_bin')
        ]);
    }


}
// Instantiated in your main plugin file:
function slider_bin_init_post_type() {
    return Slider_Bin_Post_Type::get_instance();
}

