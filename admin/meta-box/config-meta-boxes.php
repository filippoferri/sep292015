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

	// Amazon
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'amz_dettagli',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Dettagli', 'roots' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'amazon' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Carica frontespizio', 'roots' ),
				'id'               => "amz_cover",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

			// TITLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Titolo', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "amz_title",
				// Field description (optional)
				//'desc'  => __( 'Will create a big title', 'roots' ),
				'type'  => 'text',
			),
			// SUBTITLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Autore', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "amz_author",
				// Field description (optional)
				//'desc'  => __( 'Will create a subtitle', 'roots' ),
				'type'  => 'text',
			),
			// AMAZON URL
			array(
				'name'  => __( 'Amazon Link', 'root' ),
				'id'    => "amz_url",
				'desc'  => __( 'URL description', 'root' ),
				'type'  => 'url',
				'std'   => 'http://',
			),

		),
	);

	// Dettagli
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'dettagli',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Dettagli', 'roots' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'side',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

			// AUTORE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Autore', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "autore",
				// Field description (optional)
				//'desc'  => __( 'Will create a big title', 'roots' ),
				'type'  => 'text',
			),

			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Immagine dell\'autore', 'roots' ),
				'id'               => "immagine",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

			// SUBTITLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Titolo', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "titolo",
				// Field description (optional)
				//'desc'  => __( 'Will create a subtitle', 'roots' ),
				'type'  => 'textarea',
			),

		),
	);

	// Descrizione e frontespizio
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'desc',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Breve descrizione', 'roots' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post' ),

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

			// In breve
			array(
				// Field name - Will be used as label
				'name'  => __( 'Solo poche parole', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "descrizione",
				// Field description (optional)
				//'desc'  => __( 'Will create a subtitle', 'roots' ),
				'type'  => 'textarea',
				'cols' => 20,
				'rows' => 6,
			),

			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Immagine di copertina', 'roots' ),
				'id'               => "frontespizio",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

		),
	);

	return $meta_boxes;
}
