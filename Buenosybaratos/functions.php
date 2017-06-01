<?php

/*
 * Buenosybaratos functions and definitions
 * Set the content width based on the theme's design and stylesheet.
 * Created On: 12.05.2017
 * Created By: T:307
 */

/* Include required library and template files */
require get_template_directory() . '/lib/post-types/default.php';
require get_template_directory() . '/lib/post-types/whatwedo.php';
require get_template_directory() . '/lib/post-types/products.php';
//require get_template_directory() . '/lib/post-types/demo.php';
require get_template_directory() . '/lib/widget/widget.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

if (!isset($content_width)) {
    $content_width = 660;
}

/* Buenosybaratos only works in WordPress 4.1 or later. */
if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}


/*
 * Create theme customization 
 * Add theme setting for homepage background
 */
add_action('customize_register', 'theme_footer_customizer');

function theme_footer_customizer($wp_customize) {
    
    /* Add right sidebar title block settings */
    $wp_customize->add_section('buenosybaratos_right_sidebar_title', array(
        'title' => 'Right Sidebar Title Block'
    ));

    $wp_customize->add_setting('related_articles', array(
        'default' => 'Related Article',
    ));
    $wp_customize->add_control('related_articles', array(
        'label' => 'Related Article',
        'section' => 'buenosybaratos_right_sidebar_title',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('top_products', array(
        'default' => 'Top Products',
    ));
    $wp_customize->add_control('top_products', array(
        'label' => 'Top Products',
        'section' => 'buenosybaratos_right_sidebar_title',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('important_specs', array(
        'default' => 'Important specs',
    ));
    $wp_customize->add_control('important_specs', array(
        'label' => 'Important specs',
        'section' => 'buenosybaratos_right_sidebar_title',
        'type' => 'text',
    ));
    $wp_customize->add_setting('how_we_work', array(
        'default' => 'How we work',
    ));
    $wp_customize->add_control('how_we_work', array(
        'label' => 'How we work',
        'section' => 'buenosybaratos_right_sidebar_title',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('no_record_found', array(
        'default' => 'No record found text',
    ));
    $wp_customize->add_control('no_record_found', array(
        'label' => 'No record found text',
        'section' => 'buenosybaratos_right_sidebar_title',
        'type' => 'text',
    ));
    
    
    /* Add new block search settings */
    $wp_customize->add_section('buenosybaratos_search_settings', array(
        'title' => 'Search Settings'
    ));

    $wp_customize->add_setting('search_result_for', array(
        'default' => 'Search Result For Text',
    ));
    $wp_customize->add_control('search_result_for', array(
        'label' => 'Search Result For Text',
        'section' => 'buenosybaratos_search_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('search_continue_reading', array(
        'default' => 'Continue Reading Text',
    ));
    $wp_customize->add_control('search_continue_reading', array(
        'label' => 'Continue Reading Text',
        'section' => 'buenosybaratos_search_settings',
        'type' => 'text',
    ));
    
   
    /* Add new block called Block Settings */
    $wp_customize->add_section('buenosybaratos_block_settings', array(
        'title' => 'Static Blocks'
    ));

    /* Who we do blocks */
    $wp_customize->add_setting('what_we_do_heading', array(
        'default' => 'What We Do Heading',
    ));
    $wp_customize->add_control('what_we_do_heading', array(
        'label' => 'What We Do Heading',
        'section' => 'buenosybaratos_block_settings',
        'type' => 'text',
    ));
    $wp_customize->add_setting('what_we_do_text', array(
        'default' => 'What We Do Text',
    ));
    $wp_customize->add_control('what_we_do_text', array(
        'label' => 'What We Do Text',
        'section' => 'buenosybaratos_block_settings',
        'type' => 'textarea',
    ));


    /* Who we are blocks */
    $wp_customize->add_setting('who_we_are_background', array(
        'default' => 'What We Are Background',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'who_we_are_background', array(
        'label' => 'Who We Are Background',
        'section' => 'buenosybaratos_block_settings',
        'settings' => 'who_we_are_background',
    )));
    
    $wp_customize->add_setting('who_we_are_heading', array(
        'default' => 'Who We Are Heading',
    ));
    $wp_customize->add_control('who_we_are_heading', array(
        'label' => 'Who We Are Heading',
        'section' => 'buenosybaratos_block_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('who_we_are_text', array(
        'default' => 'Who We Are Text',
    ));
    $wp_customize->add_control('who_we_are_text', array(
        'label' => 'Who We Are Text',
        'section' => 'buenosybaratos_block_settings',
        'type' => 'textarea',
    ));
    


    $wp_customize->add_setting('top_product_heading', array(
        'default' => 'Top Product Heading',
    ));
    $wp_customize->add_control('top_product_heading', array(
        'label' => 'Top Product Heading',
        'section' => 'buenosybaratos_block_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('top_product_text', array(
        'default' => 'Top Product Text',
    ));
    $wp_customize->add_control('top_product_text', array(
        'label' => 'Top Product Text',
        'section' => 'buenosybaratos_block_settings',
        'type' => 'textarea',
    ));
    
    /* Footer About Company */
    $wp_customize->add_setting('footer_about_text', array(
        'default' => 'Footer About Text',
    ));
    $wp_customize->add_control('footer_about_text', array(
        'label' => 'Footer About Text',
        'section' => 'buenosybaratos_block_settings',
        'type' => 'textarea',
    ));
    


    /* Create section for footer logo*/
    $wp_customize->add_section('buenosybaratos_footer', array(
        'title' => 'Footer Logo'
    ));
    
    $wp_customize->add_setting('footer_logo', array(
        'default' => 'Footer Logo',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => 'Footer Logo',
        'section' => 'buenosybaratos_footer',
        'settings' => 'footer_logo',
    )));

    $wp_customize->add_setting('home_bkg_uper_text', array(
        'default' => 'Home Background Uper Text',
    ));
    $wp_customize->add_control('home_bkg_uper_text', array(
        'label' => 'Home Background Uper Text',
        'section' => 'background_image',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('home_bkg_bottom_text', array(
        'default' => 'Home Background Bottom Text',
    ));
    $wp_customize->add_control('home_bkg_bottom_text', array(
        'label' => 'Home Background Bottom Text',
        'section' => 'background_image',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('home_search_placeholder', array(
        'default' => 'Search placeholder text',
    ));
    $wp_customize->add_control('home_search_placeholder', array(
        'label' => 'Search placeholder text',
        'section' => 'background_image',
        'type' => 'text',
    ));

    $wp_customize->add_setting('home_search_level', array(
        'default' => 'Search placeholder level',
    ));
    $wp_customize->add_control('home_search_level', array(
        'label' => 'Search placeholder level',
        'section' => 'background_image',
        'type' => 'text',
    ));
}

if (!function_exists('buenosybaratos_setup')) :

    function buenosybaratos_setup() {
        /* Theme load and suppport */
        load_theme_textdomain('Buenosybaratos');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'buenosybaratos'),
            'social' => __('Social Links Menu', 'buenosybaratos'),
        ));

        /* search form, comment form, and comments */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /* Enable support for Post Formats. */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        /* Enable support for custom logo */
        add_theme_support('custom-logo', array(
            'height' => 248,
            'width' => 248,
            'flex-height' => true,
        ));

        /* Filter Buenosybaratos custom-header support arguments. */
        add_theme_support('custom-background', apply_filters('buenosybaratos_custom_background_args', array(
            'default-attachment' => 'fixed',
        )));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css'));
        add_theme_support('customize-selective-refresh-widgets');
    }

endif;
add_action('after_setup_theme', 'buenosybaratos_setup');

/* Register widget area. */

function buenosybaratos_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Consumers Served', 'buenosybaratos'),
        'id' => 'consumers-served',
        'description' => __('Define Consumers Served.', 'buenosybaratos'),
        'before_widget' => false,
        'after_widget' => false,
        'before_title' => false,
        'after_title' => false,
    ));

    register_sidebar(array(
        'name' => __('Table of content', 'buenosybaratos'),
        'id' => 'toc',
        'description' => __('show table of content with toc plugin', 'buenosybaratos'),
        'before_widget' => false,
        'after_widget' => false,
        'before_title' => false,
        'after_title' => false,
    ));
}

add_action('widgets_init', 'buenosybaratos_widgets_init');

/**
 * JavaScript Detection.
 * Adds a js class to the root `<html>` element when JavaScript is detected.
 */
function buenosybaratos_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'buenosybaratos_javascript_detection', 0);

/* Enqueue scripts and styles. */

function buenosybaratos_scripts() {

    // Add responsive, used in the main stylesheet.
    wp_enqueue_style('themecss', get_template_directory_uri() . '/css/theme.css', array(), '1.0');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), '1.0');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700', array(), '1.0');
    wp_enqueue_style('buenosybaratos-style', get_stylesheet_uri());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('buenosybaratos-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20141010');
    }

    wp_enqueue_script('buenosybaratos-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150330', true);
    wp_localize_script('buenosybaratos-script', 'screenReaderText', array(
        'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'buenosybaratos') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'buenosybaratos') . '</span>',
    ));
}

add_action('wp_enqueue_scripts', 'buenosybaratos_scripts');


/* Add featured image as background image to post navigation elements */

function buenosybaratos_nav_background() {
    if (!is_single()) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);
    $css = '';

    if (is_attachment() && 'attachment' == $previous->post_type) {
        return;
    }

    if ($previous && has_post_thumbnail($previous->ID)) {
        $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url($prevthumb[0]) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ($next && has_post_thumbnail($next->ID)) {
        $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url($nextthumb[0]) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style('buenosybaratos-style', $css);
}

add_action('wp_enqueue_scripts', 'buenosybaratos_nav_background');

/* Display descriptions in main navigation. */

function buenosybaratos_nav_description($item_output, $item, $depth, $args) {
    if ('primary' == $args->theme_location && $item->description) {
        $item_output = str_replace($args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output);
    }
    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'buenosybaratos_nav_description', 10, 4);

/* Add a `screen-reader-text` class to the search form's submit button. */

function buenosybaratos_search_form_modify($html) {
    return str_replace('class="search-submit"', 'class="search-submit screen-reader-text"', $html);
}

add_filter('get_search_form', 'buenosybaratos_search_form_modify');

/* Getting related article
 *  call the function in single post right sidebar
 */

function post_related_article($post_id) {
    $data = get_post_meta($post_id, 'related_article_data', true);
    $related_file_arr = maybe_unserialize($data);
	$html = "";
    if (!empty($related_file_arr)) {
        foreach ($related_file_arr as $key => $dataset) {
            $src = '<img src="' . $dataset['artcle_img'] . '" width="30" height="30">';
            
            $html .= '<li>
                <a href="' . $dataset['artcle_link'] . '">
                    <span class="pro-img">' . $src . '</span>
                    <span class="pro-detail">' .  $dataset['artcle_title'] . '</span>
                </a>
            </li>';
        }
    } else {
        $no_record_found =  (!empty(get_theme_mod("no_record_found")))?get_theme_mod("no_record_found"):'No record available.';
        $html .= '<li><a href="javascript:;">'.$no_record_found.'</a></li>';
    }
	return $html;
}

function post_top_product($post_id) {
   
    $data = get_post_meta($post_id, 'top_product_data', true);
    $top_product_file_arr = maybe_unserialize($data);
    $html = "";
    if (!empty($top_product_file_arr)) {
        foreach ($top_product_file_arr as $key => $dataset) {
            $src = '<img src="' . $dataset['top_product_img'] . '">';
            $html .= '<div class="top-p-grp">
                    <figure><a href="' . $dataset['top_product_link'] . '">' . $src . '</a></figure>
                    <h3>' .$dataset['top_product_link_level'] . '</h3>
                </div>';
        }
    } else {
        $no_record_found =  (!empty(get_theme_mod("no_record_found")))?get_theme_mod("no_record_found"):'No record available.';
        $html .= '<li><a href="javascript:;">'.$no_record_found.'</a></li>';
    }
	return $html;
}


add_filter('posts_orderby','my_sort_custom',10,2);
function my_sort_custom( $orderby, $query ){
    global $wpdb;

    if(!is_admin() && is_search()) 
        $orderby =  $wpdb->prefix."posts.post_type ASC, {$wpdb->prefix}posts.post_title DESC";

    return  $orderby;
}

/* Home Elements Setting */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Home Elements Setting', 'text-domain' ),
				esc_html__( 'Home Elements Setting', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// What We Do
				if ( ! empty( $options['what_we_do'] ) ) {
					$options['what_we_do'] = 'on';
				} else {
					unset( $options['what_we_do'] ); // Remove from options if not checked
				}

				// Who we are & Consumers Served
				if ( ! empty( $options['what_we_are'] ) ) {
					$options['what_we_are'] = 'on';
				} else {
					unset( $options['what_we_are'] ); // Remove from options if not checked
				}

				// View our Top Products
				if ( ! empty( $options['top_products'] ) ) {
					$options['top_products'] = 'on';
				} else {
					unset( $options['top_products'] ); // Remove from options if not checked
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Home Elements Setting', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">

						<?php // What We Do ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'What We Do', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'what_we_do' ); ?>
								<input type="checkbox" name="theme_options[what_we_do]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Hide this on home page.', 'text-domain' ); ?>
							</td>
						</tr>
						
						<?php // Who we are & Consumers Served ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Who we are & Consumers Served', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'what_we_are' ); ?>
								<input type="checkbox" name="theme_options[what_we_are]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Hide this on home page.', 'text-domain' ); ?>
							</td>
						</tr>
						
						<?php // View our Top Products ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'View our Top Products', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'top_products' ); ?>
								<input type="checkbox" name="theme_options[top_products]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Hide this on home page.', 'text-domain' ); ?>
							</td>
						</tr>


					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}
/* Home Elements Setting */