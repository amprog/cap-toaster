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

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_5511c0df8dce1',
	'title' => 'Toaster Options',
	'fields' => array (
		array (
			'key' => 'field_5511c0e9893b0',
			'label' => 'Toaster Subtitle',
			'name' => 'toaster_subtitle',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5511c0f5893b1',
			'label' => 'Toaster Title',
			'name' => 'toaster_title',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5511c0fb893b2',
			'label' => 'Toaster Text',
			'name' => 'toaster_text',
			'prefix' => '',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5511c104893b3',
			'label' => 'Toaster Post Search',
			'name' => 'toaster_post',
			'prefix' => '',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => '',
			'taxonomy' => '',
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array (
			'key' => 'field_5511c114893b4',
			'label' => 'Toaster Post ID',
			'name' => 'toaster_post_id',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5511d1e3cec98',
			'label' => 'Toaster Social Network',
			'name' => 'toaster_social_network',
			'prefix' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'Facebook' => 'Facebook',
				'Twitter' => 'Twitter',
			),
			'default_value' => array (
				'' => '',
			),
			'allow_null' => 1,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'key' => 'field_5511d209cec99',
			'label' => 'Toaster Social Profile',
			'name' => 'toaster_social_profile',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5511d1e3cec98',
						'operator' => '==',
						'value' => 'Facebook',
					),
				),
				array (
					array (
						'field' => 'field_5511d1e3cec98',
						'operator' => '==',
						'value' => 'Twitter',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
			),
		),
		array (
			array (
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'post_tag',
			),
		),
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'reports',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 100,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

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
