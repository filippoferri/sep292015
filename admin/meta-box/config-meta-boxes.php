<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'ff_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function ff_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'ff_';

	// Background
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'standard',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Background', 'roots' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

            // CHECKBOX
			array(
				'name' => __( 'Enable Custom Background', 'rwmb' ),
				'id'   => "{$prefix}enable_bg",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),
            // COLOR
			array(
				'name' => __( 'Color picker', 'rwmb' ),
				'id'   => "{$prefix}bg_color",
				'type' => 'color',
                'std'     => '#3A3436',
			),

			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Upload your images', 'roots' ),
				'id'               => "{$prefix}bg",
				'type'             => 'image_advanced',
				'max_file_uploads' => 10,
			),

			// TITLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Title', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}title",
				// Field description (optional)
				'desc'  => __( 'Will create a big title', 'roots' ),
				'type'  => 'text',
			),
			// SUBTITLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'SubTitle', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}subtitle",
				// Field description (optional)
				'desc'  => __( 'Will create a subtitle', 'roots' ),
				'type'  => 'text',
			),

		),
	);



	return $meta_boxes;
}
