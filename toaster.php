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
			'return_format' => 'id',
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
				'operator' => '!=',
                // Lets just add the fields everywhere.
				'value' => '',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '!=',
                // Lets just add the fields everywhere.
				'value' => '',
			),
		),
        array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
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

/**
 * @todo figure out how to handle this on posts and on taxonomies.
 */
function toaster_manual_post_id_insertion( $post_id ) {
    // // // bail early if no ACF data
    if( empty($_POST['acf']) ) {

        return;

    }
    // if you have a post id then what we have is a post and not a taxonomy so lets use post id instead of primary id...
    if (!empty( $_POST['acf']['post_ID'] )) {
        $object_ID = $_POST['acf']['post_ID'];
    } else {
        $object_ID = 'primary_'.$_POST['tag_ID'].'';
    }
    $manual_ids = $_POST['acf']['field_5511c114893b4'];

    // Update the posts field with new post id
    update_field('field_5511c104893b3', $manual_ids, $object_ID);

    // Clear the manual post id field wes dont need to actually save any data there.
    update_field('field_5511c114893b4', '', $object_ID);
}
// run before ACF saves the $_POST['fields'] data
add_action('acf/save_post', 'toaster_manual_post_id_insertion', 20);

/**
 * We dont want to show some fields in the backend depending on location.
 * This function hides the social network selection field on posts.
 */
function toaster_hide_some_fields() {
    // field_key-field_5511d1e3cec98
}

function toaster_get_social($location) {
    $social_network = get_field('toaster_social_network', $location);
    $social_profile = get_field('toaster_social_profile', $location);

    if ( 'Facebook' === $social_network ) {
        $toaster = '
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "facebook-jssdk"));</script>

        <div class="fb-like" data-href="http://facebook.com/'.$social_profile.'" data-send="false" data-width="300" data-show-faces="true"></div>
        ';
    } elseif ( 'Twitter' === $social_network ) {
        $toaster = "<a href='https://twitter.com/".$social_profile."' class='twitter-follow-button' data-show-count='true' data-size='large'>Follow @".$social_profile."</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
    }
    return $toaster;
}

function toaster_get_post_toaster() {
    $sub_title = '';
    if ( get_field('toaster_subtitle', 'options') ) {
        $sub_title = '<h5>'.get_field('toaster_subtitle').'</h5>';
    }
    $title = '';
    if ( get_field('toaster_title', 'options') ) {
        $title = '<h3>'.get_field('toaster_title').'</h3>';
    }
    $text = get_field('toaster_text');
    $post = get_field('toaster_post');
    $markup = '';
    if (!empty($sub_title) || !empty($title) || !empty($text) || !empty($post)) {
        // Check for a post first, if present use that over text.
        if (!empty($post)) {
            $toaster_post = get_post($post);
            $attachment_id = get_post_meta($toaster_post->ID, '_thumbnail_image_id', true);
            $toaster_image = wp_get_attachment_image_src( $attachment_id, 'stack' );
            $markup .= '
            '.$sub_title.'
            <a href="'.get_permalink($toaster_post->ID).'" class="toaster-post">
                <div class="toaster-featured-image">
                    <img src="'.$toaster_image[0].'">
                </div>
                <div class="toaster-text">
                    <h3>'.$toaster_post->post_title.'</h3>
                    '.$toaster_post->post_excerpt.'
                </div>
            </a>
            ';
        } else {
            $markup .= '
            '.$sub_title.'
            <div class="toaster-text">
                '.$title.'
                '.$text.'
            </div>
            ';
        }
    }
    return $markup;
}

function toaster_get_tax_toaster() {
    $markup = '';
    if( has_filter('cap_toaster_taxonomy') ) {
        $taxonomy = apply_filters('cap_toaster_taxonomy', $content);
        $term_object = get_the_terms( get_the_ID(), ''.$taxonomy.'' );
        $term = array_pop($term_object);
        $taxonomy_name = $term->taxonomy;
        $taxonomy_term_id = $term->term_id;
        $taxonomy_term = ''.$taxonomy_name.'_'.$taxonomy_term_id.'';
        // if get fields then use if not then get social
        $sub_title = '';
        if ( get_field('toaster_subtitle', $taxonomy_term) ) {
            $sub_title = '<h5>'.get_field('toaster_subtitle', $taxonomy_term).'</h5>';
        }
        $title = '';
        if ( get_field('toaster_title', $taxonomy_term) ) {
            $title = '<h3>'.get_field('toaster_title', $taxonomy_term).'</h3>';
        }
        $text = get_field('toaster_text', $taxonomy_term);
        $post = get_field('toaster_post', $taxonomy_term);

        if (!empty($sub_title) || !empty($title) || !empty($text) || !empty($post)) {
            // Check for a post first, if present use that over text.
            if (!empty($post)) {
                $toaster_post = get_post($post);
                $attachment_id = get_post_meta($toaster_post->ID, '_thumbnail_image_id', true);
                $toaster_image = wp_get_attachment_image_src( $attachment_id, 'stack' );
                $markup .= '
                '.$sub_title.'
                <a href="'.get_permalink($toaster_post->ID).'" class="toaster-post">
                    <div class="toaster-featured-image">
                        <img src="'.$toaster_image[0].'">
                    </div>
                    <div class="toaster-text">
                        <h3>'.$toaster_post->post_title.'</h3>
                        '.$toaster_post->post_excerpt.'
                    </div>
                </a>
                ';
            } else {
                $markup .= '
                '.$sub_title.'
                <div class="toaster-text">
                    '.$title.'
                    '.$text.'
                </div>
                ';
            }
        } elseif ( !empty(toaster_get_social($taxonomy_term)) ) {
            $markup .= toaster_get_social($taxonomy_term);
        }
    }
    return $markup;
}

function toaster_get_global_toaster() {
    // if get fields then use if not then get social
    $sub_title = '';
    if ( get_field('toaster_subtitle', 'options') ) {
        $sub_title = '<h5>'.get_field('toaster_subtitle', 'options').'</h5>';
    }
    $title = '';
    if ( get_field('toaster_title', 'options') ) {
        $title = '<h3>'.get_field('toaster_title', 'options').'</h3>';
    }
    $text = get_field('toaster_text', 'options');
    $post = get_field('toaster_post', 'options');
    $markup = '';
    if (!empty($text)) {
        $markup .= '
        '.$sub_title.'
        <div class="toaster-text">
            '.$title.'
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
            jQuery("<?php echo apply_filters('cap_toaster_post_class', $class);?>").append('<div id="trigger-toaster"></div>');
            var waypoint = new Waypoint({
                element: document.getElementById("trigger-toaster"),
                handler: function(direction) {
                    if (direction = 'down'){
                        console.log("Basic waypoint triggered");
                        jQuery('#toaster').addClass('open');
                    }
                },
                offset: '200%'
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
