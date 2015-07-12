<?php

require_once( 'wp-less/wp-less.php' );
// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');



function our_theme_resources() {
	wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array(), false);
    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), false);
    wp_enqueue_style('googlefont', 'http://fonts.googleapis.com/css?family=Lato|Rokkitt', array(), false);
    // enqueue a .less style sheet
    if ( ! is_admin() ) {
        wp_enqueue_style('our-style', get_stylesheet_directory_uri() . '/style.less');
    }

    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'our_theme_resources');


// Customize excerpt word count length
function custom_excerpt_length() {
	return 22;
}

add_filter('excerpt_length', 'custom_excerpt_length');


// Theme setup
function our_theme_setup() {
	
	// Navigation Menus
	register_nav_menus(array(
		'primary' => __( 'Primary Menu'),
		'footer' => __( 'Footer Menu'),
	));
	
	// Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('square-thumbnail', 80, 80, true);
	add_image_size('banner-image', 920, 210, array('left', 'top'));
	
	// Add post type support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'our_theme_setup');

// Add Widget Areas
function ourWidgetsInit() {
	
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
}

add_action('widgets_init', 'ourWidgetsInit');


// Customize Appearance Options
function our_visualization_options( $wp_customize ) {

	$wp_customize->add_setting('our_link_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('our_btn_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('our_btn_hover_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));

	$wp_customize->add_section('our_standard_colors', array(
		'title' => __('Standard Colors'),
		'priority' => 30,
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'our_link_color_control', array(
		'label' => __('Link Color'),
		'section' => 'our_standard_colors',
		'settings' => 'our_link_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'our_btn_color_control', array(
		'label' => __('Button Color'),
		'section' => 'our_standard_colors',
		'settings' => 'our_btn_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_hover_color_control', array(
		'label' => __('Button Hover Color'),
		'section' => 'lwp_standard_colors',
		'settings' => 'our_btn_hover_color',
	) ) );

    /*
     * Images and Icons
     */
    $wp_customize->add_section('our_images', array(
        'title' => __('Images'),
        'priority' => 31,
        'description' => 'Modify Images and Icons'
    ));


    $wp_customize->add_setting('our_favicon' , array(
        'default-image' => 'https://s.w.org/favicon.ico?2',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_favicon_image_control' , array(
        'label' => __('Choose Favicon Image'),
        'section' => 'our_images',
        'settings' => 'our_favicon'
    )));

    $wp_customize->add_setting('our_icon' , array());

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_icon_image_control' , array(
        'label' => __('Choose Icon'),
        'section' => 'our_images',
        'settings' => 'our_icon'
    )));

    $wp_customize->add_setting('our_background' , array());

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'our_bkground_image_control' , array(
        'label' => __('Choose Background Image'),
        'section' => 'our_images',
        'settings' => 'our_background'
    )));

}

add_action('customize_register', 'our_visualization_options');



// Output Customize CSS
function our_customized_css() { ?>

	<style type="text/css">

		a:link,
		a:visited {
			color: <?php echo get_theme_mod('our_link_color'); ?>;
		}
        
        <?php
            if (get_theme_mod('our_background') != $null) { ?>
        body {
            background-image: url("<?php echo get_theme_mod('our_background'); ?>");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
        <?php
            }
        ?>

	</style>

<?php }

add_action('wp_head', 'our_customized_css');

function our_header_links () { ?>
    <link rel="shortcut icon" href="<?php echo get_theme_mod('our_favicon'); ?>"/>
<?php
}

add_action('wp_head', 'our_header_links');

?>