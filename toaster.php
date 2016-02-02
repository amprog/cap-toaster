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

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' => 'Toaster Settings',
        'menu_title' => 'Toaster Settings',
        'menu_slug'  => 'cap-toaster',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-category',
        'redirect'   => false,
    ) );
}

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_5511c0df8dce1',
	'title' => 'Toaster Settings',
	'fields' => array (
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
			'new_lines' => '',
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
		array (
			'key' => 'field_55a53b743f2d8',
			'label' => 'Kill toaster',
			'name' => 'kill_toaster',
			'type' => 'true_false',
			'message' => 'Check to kill toaster site-wide',
			'default_value' => 0,
		),
	),
	'location' => array (
        array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'cap-toaster',
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

        // set a value of the tp_hide_toaster cookie so we won't show this for 60 days
        jQuery('.hide-toaster, .close-toaster').click(function(){
        	Cookies.set('tp_hide_toaster', '{$cookie_value}', {expires: {$cookie_expires}});
        });
    });
    </script>
    ";
    return $script;
}

//TP-1272a - Deleted all other "toaster_get" functions except for global, only one was needed
function toaster_get_global_toaster() {
    $text = get_field('toaster_text', 'options');
    $markup = '';
	$markup .= $text;
	$markup .= toaster_cookies();

    return $markup;
}

function get_toaster() {
    if (is_singular() && false === get_field('kill_toaster','options')) {

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
		$markup .= toaster_get_global_toaster();
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
            jQuery('#toaster .close-toaster, #toaster .hide-toaster').click(function(){
                jQuery('#toaster').removeClass('open');
                Waypoint.destroyAll();
            });
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'get_toaster');
