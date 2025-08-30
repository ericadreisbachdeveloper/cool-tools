<?php

if (! defined('ABSPATH')) {
    exit;
}    // Exit if accessed directly

// Initialize this TinyMCE plugin
add_action('init', 'add_custom_tinymce_buttons');

function add_custom_tinymce_buttons() {
    add_filter('mce_buttons', 'register_custom_tinymce_buttons');
    add_filter('mce_external_plugins', 'add_custom_tinymce_plugin');
}

// Register buttons
function register_custom_tinymce_buttons($buttons) {
    array_push($buttons, 'sr_only_button', 'highlight_button', 'cite_button');
    return $buttons;
}

// Add JavaScript from /assets/js/tinymce.js
function add_custom_tinymce_plugin($plugin_array) {
    $plugin_array['custom_spans'] = TDIR. '/assets/js/tiny-mce.js?v=1.0.2';
    return $plugin_array;
}

// Add CSS for editor styling (backend)
// button content defined in /asset/js/tiny-mce.js 
add_filter('mce_css', 'add_tinymce_custom_styles');
function add_tinymce_custom_styles($mce_css) {
    // Create a temporary CSS file or use wp_add_inline_style equivalent for TinyMCE
    $custom_css = TDIR . '/assets/css/tinymce-admin-styles.css';
    
    if (!empty($mce_css)) {
        $mce_css .= ',' . $custom_css;
    } else {
        $mce_css = $custom_css;
    }
    
    return $mce_css;
}

// Add frontend CSS if needed? not needed 
// add_action('wp_enqueue_scripts', 'enqueue_custom_span_styles');
/* 
function enqueue_custom_span_styles() {
    
    wp_add_inline_style('theme-style', '
        .highlight {
            background-color: #ffeb3b;
            padding: 2px 4px;
            border-radius: 3px;
        }
        
        .cite {
            font-style: italic;
            color: #666;
            border-left: 3px solid #ccc;
            padding-left: 8px;
            margin-left: 4px;
        }
        
        .sr-only {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

    ');
    

}
*/ 