<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace theme_name()
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Index Settings', theme_name() ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __( 'Enable Top Bar', theme_name() ),
		'desc' => __( 'Mark this to enable top bar', theme_name() ),
		'id' => 'topbar',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Top Menu Left', theme_name() ),
		'desc' => __( 'Textarea description.', theme_name() ),
		'id' => 'top_menu_left',
		'std' => 'Top Menu Left Text',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'Top Menu Right', theme_name() ),
		'desc' => __( 'Textarea description.', theme_name() ),
		'id' => 'top_menu_right',
		'std' => 'Top Menu Right Text',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Enable Slider on Home Page', theme_name() ),
		'desc' => __( 'Mark this to enable slider on home page', theme_name() ),
		'id' => 'home_slider',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Input Text', theme_name() ),
		'desc' => __( 'A text input field.', theme_name() ),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Input with Placeholder', theme_name() ),
		'desc' => __( 'A text input field with an HTML5 placeholder.', theme_name() ),
		'id' => 'example_placeholder',
		'placeholder' => 'Placeholder',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Textarea', theme_name() ),
		'desc' => __( 'Textarea description.', theme_name() ),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea'
	);

	
	if ( $options_categories ) {
		$options[] = array(
			'name' => __( 'Select a Category', theme_name() ),
			'desc' => __( 'Passed an array of categories with cat_ID and cat_name', theme_name() ),
			'id' => 'example_select_categories',
			'type' => 'select',
			'options' => $options_categories
		);
	}

	if ( $options_tags ) {
		$options[] = array(
			'name' => __( 'Select a Tag', 'options_check' ),
			'desc' => __( 'Passed an array of tags with term_id and term_name', 'options_check' ),
			'id' => 'example_select_tags',
			'type' => 'select',
			'options' => $options_tags
		);
	}

	$options[] = array(
		'name' => __( 'Select a Page', theme_name() ),
		'desc' => __( 'Passed an pages with ID and post_title', theme_name() ),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages
	);

	

	$options[] = array(
		'name' => __( 'Example Info', theme_name() ),
		'desc' => __( 'This is just some example information you can put in the panel.', theme_name() ),
		'type' => 'info'
	);

	

	$options[] = array(
		'name' => __( 'Advanced Settings', theme_name() ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Check to Show a Hidden Text Input', theme_name() ),
		'desc' => __( 'Click here and see what happens.', theme_name() ),
		'id' => 'example_showhidden',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Hidden Text Input', theme_name() ),
		'desc' => __( 'This option is hidden unless activated by a checkbox click.', theme_name() ),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Uploader Test', theme_name() ),
		'desc' => __( 'This creates a full size uploader that previews the image.', theme_name() ),
		'id' => 'example_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png'
		)
	);

	

	$options[] = array(
		'name' => __( 'Colorpicker', theme_name() ),
		'desc' => __( 'No color selected by default.', theme_name() ),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color'
	);

	

	$options[] = array(
		'name' => __( 'Text Editor', theme_name() ),
		'type' => 'heading'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', theme_name() ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', theme_name() ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	return $options;
}
