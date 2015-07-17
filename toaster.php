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

    // js.cookie library
    wp_register_script( 'js-cookie', plugin_dir_url(__FILE__).'bower_components/js-cookie/src/js.cookie.js' );
    wp_enqueue_script( 'js-cookie' );

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
			'label' => 'Toaster Post ID',
			'name' => 'toaster_post',
			'prefix' => '',
			'type' => 'text',
			'instructions' => 'Insert a post id that you would like to see in the post toaster.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '3605082',
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
        array (
            'key' => 'field_55a7d2011a8a3',
            'label' => 'Toaster Cookie Expiration (in days)',
            'name' => 'toaster_cookie_expires',
            'prefix' => '',
            'type' => 'number',
            'instructions' => 'The toaster will redisplay this number of days after the user clicks Don\'t show this to me again',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => 60,
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => 1,
            'max' => 365,
            'step' => '',
            'readonly' => 0,
            'disabled' => 0,
        ),
        array (
            'key' => 'field_55a7d16f1a8a2',
            'label' => 'Toaster Cookie Value',
            'name' => 'toaster_cookie_value',
            'prefix' => '',
            'type' => 'text',
            'instructions' => 'Change the toaster cookie value to show users the toaster before their toaster cookies have expired',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '20150716',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
        ),
        array (
            'key' => 'field_55a53b743ee54',
            'label' => 'Hide toaster on desktop',
            'name' => 'hide_toaster_desktop',
            'type' => 'true_false',
            'message' => '',
            'default_value' => 0,
        ),
        array (
            'key' => 'field_55a53b743f02b',
            'label' => 'Hide toaster on tablet',
            'name' => 'hide_toaster_tablet',
            'type' => 'true_false',
            'message' => '',
            'default_value' => 0,
        ),
        array (
            'key' => 'field_55a53b743f1c7',
            'label' => 'Hide toaster on mobile',
            'name' => 'hide_toaster_mobile',
            'type' => 'true_false',
            'message' => '',
            'default_value' => 0,
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
 * We dont want to show some fields in the backend depending on location.
 * This function hides the social network selection field on posts.
 */
function toaster_hide_some_fields() {
    $screen = get_current_screen();
    if ('post' === $screen->base) {
        echo '<style>.field_key-field_5511d1e3cec98 {display: none!important;}</style>';
    }
    if ('toplevel_page_acf-options' === $screen->base) {
        echo '<style>.field_key-field_5511c104893b3 {display: none!important;}</style>';
    }
}
add_action('admin_head', 'toaster_hide_some_fields');

function toaster_cookies() {
    // check toaster cookies
    $cookie_name = 'tp_hide_toaster';
    $cookie_value = get_field('toaster_cookie_value','options');
    $cookie_expires = get_field('toaster_cookie_expires','options');
    $script = "
    <script>
    jQuery(document).ready(function(){
    	// see if there is an existing tp_hide_toaster cookie
    	var toasterCookie = Cookies.get('{$cookie_name}');

    	// if there is, then hide the toaster altogether
    	if ('{$cookie_value}' == toasterCookie) {
    		jQuery('#toaster').hide();
    	}
        // otherwise, see if there's an existing tp_liked_social cookie
        var socialCookie = Cookies.get('tp_liked_social');

        // if there is, then hide social
        if (socialCookie) {
            jQuery('.social-toaster').hide();
        } else {
            jQuery('.non-social-toaster').hide();
        }

        // set a value for the cookie so we wont show the social toaster again too soon
        jQuery('.social-toaster').click(function(){
            console.log('Social toaster clicked, we will hide this prompt for 60 days');
            Cookies.set('tp_liked_social', 1, {expires:60});
        });

        // set a value of the tp_hide_toaster cookie so we won't show this for 60 days
        jQuery('.hide-toaster').click(function(){
        	Cookies.set('tp_hide_toaster', '{$cookie_value}', {expires: {$cookie_expires}});
        	jQuery('#toaster .close-toaster').click();
        });
    });
    </script>
    ";
    return $script;
}

function toaster_get_social($location) {
    $social_network = get_field('toaster_social_network', $location);
    $social_profile = get_field('toaster_social_profile', $location);

    if ( 'Facebook' === $social_network ) {
        $toaster = '
        <div class="social-toaster">
            <h5>Like Us On Facebook</h5>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, "script", "facebook-jssdk"));</script>

            <div class="fb-like" data-href="http://facebook.com/'.$social_profile.'" data-send="false" data-width="300" data-show-faces="true"></div>
        </div>';
        $toaster .= toaster_cookies();
    } elseif ( 'Twitter' === $social_network ) {
        $toaster = "<div class='social-toaster'><h5>Follow Us On Twitter</h5><a href='https://twitter.com/".$social_profile."' class='twitter-follow-button' data-show-count='true' data-size='large'>Follow @".$social_profile."</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></div>";
        $toaster .= toaster_cookies();
    }
    return $toaster;
}

/**
 * @todo at some point we should come back here and refactor this into a more standardized ajax call. I envision theres a nice way to use wp-admin-ajax to check for a cookie and then get information from the database meaning this page can be cached better.
 */
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
    if (!empty($sub_title)) {
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
        } elseif(!empty($text)) {
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

        if ( !empty($sub_title) ) {

            // If social toaster is present then lets use it.
            if ( !empty(toaster_get_social($taxonomy_term)) ) {
                $markup .= toaster_get_social($taxonomy_term);
            }

            // Check for a post first, if present use that over text.
            if (!empty($post)) {
                $toaster_post = get_post($post);
                $attachment_id = get_post_meta($toaster_post->ID, '_thumbnail_image_id', true);
                $toaster_image = wp_get_attachment_image_src( $attachment_id, 'stack' );

                $markup .= '
                <div class="non-social-toaster">
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
                </div>
                ';
            } elseif(!empty($text)) {
                $markup .= '
                <div class="non-social-toaster">
                    '.$sub_title.'
                    <div class="toaster-text">
                        '.$title.'
                        '.$text.'
                    </div>
                </div>
                ';
            }
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
    $markup = '';

    // Check for global social toaster. If not present fall back to manual toaster.
    if ( !empty($sub_title) ) {

        // If social toaster is present then lets use it.
        if ( !empty(toaster_get_social('options')) ) {
            $markup .= toaster_get_social('options');
        }

        $markup .= '
        <div class="non-social-toaster">
            '.$sub_title.'
            <div class="toaster-text">
                '.$title.'
                '.$text.'
            </div>
        </div>
        ';
    }
    return $markup;
}

function get_toaster() {
    if (is_singular()) {

        // classes to be added to the toaster
        $classes = '';
        if ( true === get_field('hide_toaster_desktop','options')) {
            $classes .= 'hide-toaster-desktop ';
        }
        if ( true === get_field('hide_toaster_tablet','options')) {
            $classes .= 'hide-toaster-tablet ';
        }
        if ( true === get_field('hide_toaster_mobile','options')) {
            $classes .= 'hide-toaster-mobile ';
        }
        if (! empty($classes)) {
            $classes = ' class = "' . $classes . '" ';
        }

        $markup = '<div id="toaster" ' . $classes . '>';
        $markup .= '<span class="close-toaster">x</span>';
        $markup .= '<div class="toaster-inside">';
        if ( !empty(toaster_get_post_toaster()) ) {
            $markup .= toaster_get_post_toaster();
        } elseif ( !empty(toaster_get_tax_toaster()) ) {
            $markup .= toaster_get_tax_toaster();
        } else {
            $markup .= toaster_get_global_toaster();
        }
	    $markup .= '<div class="hide-toaster">' . "Don't show this to me again" . '</div>';
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
                        jQuery('#toaster').addClass('open');
                    }
                },
                offset: '100%'
            });
            jQuery('#toaster .close-toaster').click(function(){
                jQuery('#toaster').removeClass('open');
                Waypoint.destroyAll();
            });
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'get_toaster');
