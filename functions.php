<?php
define('THEME_NAME', get_current_theme());
define('THEME_URL',get_template_directory_uri()."/");
function _THEME_URL(){
    echo THEME_URL;
}


function theme_name($echo = false){
	if($echo){
		echo wp_get_theme()->get("TextDomain");
	}else{
		return wp_get_theme()->get("TextDomain");
	}
}

function theme_url($echo = false){
	if($echo){
		echo get_template_directory_uri()."/";
	}else{
		return get_template_directory_uri()."/";
	}
}

function theme_dir($echo = false){
	if($echo){
		echo get_template_directory();
	}else{
		return get_template_directory();
	}		
}

function dd_script_load($hook) {
 
    // create my own version codes
    wp_enqueue_style('bootstrap', THEME_URL."vendor/bootstrap/css/bootstrap.min.css");
    wp_enqueue_style('fonts',THEME_URL.'css/font-awesome.min.css');
    wp_enqueue_style('wonder',THEME_URL."css/one-page-wonder.css");
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    wp_deregister_script('jquery');
    wp_register_script('jquery', THEME_URL.'vendor/jquery/jquery.min.js', array(), '1.0.0', true);
    
    wp_register_script('bootstrap', THEME_URL.'vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
 
}
add_action('wp_enqueue_scripts', 'dd_script_load');

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );
/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );
function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
});
</script>

<?php
}
require_once theme_dir()."/inc/custom-functions.php";
?>