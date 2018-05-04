<?php
add_theme_support( 'post-thumbnails' );
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', theme_name() ) );
  register_nav_menu( 'footer', __( 'Footer Menu', theme_name() ) );
}
function cptui_register_my_cpts() {


	/**
	 * Post Type: Services.
	 */

	$labels = array(
		"name" => __( "Services", THEME_NAME ),
		"singular_name" => __( "Service", THEME_NAME ),
	);

	$args = array(
		"label" => __( "Services", THEME_NAME ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "service", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-businessman",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "service", $args );

	

	/**
	 * Post Type: Drivers.
	 */

	$labels = array(
		"name" => __( "Drivers", THEME_NAME ),
		"singular_name" => __( "Driver", THEME_NAME ),
	);

	$args = array(
		"label" => __( "Drivers", THEME_NAME ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "driver", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-image-filter",
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
	);

	register_post_type( "driver", $args );

	/**
	 * Post Type: Jobs.
	 */

	$labels = array(
		"name" => __( "Jobs", THEME_NAME ),
		"singular_name" => __( "Job", THEME_NAME ),
	);

	$args = array(
		"label" => __( "Jobs", THEME_NAME ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "careers", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-welcome-learn-more",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "careers", $args );

	/**
	 * Post Type: Slides.
	 */

	$labels = array(
		"name" => __( "Slides", THEME_NAME ),
		"singular_name" => __( "Slide", THEME_NAME ),
	);

	$args = array(
		"label" => __( "Slides", THEME_NAME ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slide", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-slides",
		"supports" => array( "title", "thumbnail", "excerpt", "page-attributes" ),
	);

	register_post_type( "slide", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function get_post_data($type = "post"){
	$query = new WP_Query( array( 'post_type' => $type ) );
	return $query->posts;								
}

function cptui_register_my_taxes() {

	

	/**
	 * Taxonomy: Service Categories.
	 */

	$labels = array(
		"name" => __( "Service Categories", THEME_NAME ),
		"singular_name" => __( "Service Category", THEME_NAME ),
	);

	$args = array(
		"label" => __( "Service Categories", THEME_NAME ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Service Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'service_category', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "service_category", array( "service" ), $args );

	

	/**
	 * Taxonomy: Job Categories.
	 */

	$labels = array(
		"name" => __( "Job Categories", THEME_NAME ),
		"singular_name" => __( "Job Category", THEME_NAME ),
	);

	$args = array(
		"label" => __( "Job Categories", THEME_NAME ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Job Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'job_category', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "job_category", array( "careers" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
