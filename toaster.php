<?php
/*
Plugin Name: CAP Toaster
Plugin URI: http://americanprogress.org/
Description: Description
Version: 0.1
Author: Seth Rubenstein
Author URI: http://sethrubenstein.info
*/

function toaster_load_scripts_styles() {
    // Check for jQuery
    // Check for fitVids
    wp_register_script( 'waypoints', plugin_dir_url(__FILE__).'bower_components/waypoints/lib/noframework.waypoints.js' );
    wp_enqueue_script( 'waypoints' );

    wp_enqueue_style( 'toaster-css', plugin_dir_url(__FILE__).'toaster.css' );
}
add_action( 'wp_enqueue_scripts', 'toaster_load_scripts_styles' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function toaster_get_social($location) {
    $social_network = get_field('toaster_social_network', $location);
    $social_profile = get_field('toaster_social_profile', $location);

    return $social_profile;
}

function toaster_get_post_toaster() {
    $sub_title = get_field('toaster_subtitle');
    $title = get_field('toaster_title');
    $text = get_field('toaster_text');
    $post = get_field('toaster_post');
    $markup = '';
    if (!empty($text)) {
        $markup .= '
        <h5>'.$sub_title.'</h5>
        <div class="toaster-text">
            <h3>'.$title.'</h3>
            '.$text.'
        </div>
        ';
    }
    return $markup;
}

function toaster_term($content) {
    $content = 'category';
    return $content;
}
add_filter('cap_toaster_taxonomy', 'toaster_term', 10, 2);

function toaster_get_tax_toaster() {
    $markup = '';
    if( has_filter('cap_toaster_taxonomy') ) {
        $taxonomy = apply_filters('cap_toaster_taxonomy', $content);
        $term = get_the_terms( get_the_ID(), ''.$taxonomy.'' );
        $taxonomy_name = $term[1]->taxonomy;
        $taxonomy_term_id = $term[1]->term_id;
        $taxonomy_term = ''.$taxonomy_name.'_'.$taxonomy_term_id.'';
        // if get fields then use if not then get social
        $sub_title = get_field('toaster_subtitle', $taxonomy_term);
        $title = get_field('toaster_title', $taxonomy_term);
        $text = get_field('toaster_text', $taxonomy_term);
        $post = get_field('toaster_post', $taxonomy_term);
        if ( !empty($text) ) {
            $markup .= '
            <h5>'.$sub_title.'</h5>
            <div class="toaster-text">
                <h3>'.$title.'</h3>
                '.$text.'
            </div>
            ';
        } elseif ( !empty(toaster_get_social($taxonomy_term)) ) {
            $markup .= toaster_get_social($taxonomy_term);
        }
    }
    return $markup;
}

function toaster_get_global_toaster() {
    // if get fields then use if not then get social
    $sub_title = get_field('toaster_subtitle', 'options');
    $title = get_field('toaster_title', 'options');
    $text = get_field('toaster_text', 'options');
    $post = get_field('toaster_post', 'options');
    $markup = '';
    if (!empty($text)) {
        $markup .= '
        <h5>'.$sub_title.'</h5>
        <div class="toaster-text">
            <h3>'.$title.'</h3>
            '.$text.'
        </div>
        ';
    } elseif ( !empty( toaster_get_social('options')) ) {
        $markup .= toaster_get_social('options');
    }
    return $markup;
}

function get_toaster() {
    if (is_singular()) {
        $markup = '<div id="toaster">';
        $markup .= '<span class="close-toaster">x</span>';
        $markup .= '<div class="toaster-inside">';
        // need option to get toaster for just this post.
        // if there is one for the post use it over the taxonomy one.
        // if there is no taxonomy one fall back to global one.
        // if the global one is not set then fall back to a
        // social follow toaster for facebook or twitter.
        // so we need fields for the post, fields for the options page, and a field on the options page thatll default to twitter/facebook whichever is selected.
        // have google analytics events.
        if ( !empty(toaster_get_post_toaster()) ) {
            $markup .= toaster_get_post_toaster();
        } elseif ( !empty(toaster_get_tax_toaster()) ) {
            $markup .= toaster_get_tax_toaster();
        } else {
            $markup .= toaster_get_global_toaster();
        }
        $markup .= '</div></div>';
        echo $markup;
        ?>
        <script>
        jQuery(document).ready(function(){
            jQuery("article").append('<div id="trigger-toaster"></div>');
            var waypoint = new Waypoint({
                element: document.getElementById("trigger-toaster"),
                handler: function(direction) {
                    console.log("Basic waypoint triggered");
                    jQuery('#toaster').toggleClass('open');
                },
                offset: '100%'
            });
            jQuery('#toaster .close-toaster').click(function(){
                jQuery('#toaster').removeClass('open');
                jQuery('#toaster').addClass('close');
            });
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'get_toaster');
