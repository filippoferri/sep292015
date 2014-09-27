<?php

/**
 * Create the section
 */
function my_custom_section( $wp_customize ) {

	// Create the "My Section" section
	$wp_customize->add_section( 'footer_section', array(
		'title'    => __( 'Footer', 'translation_domain' ),
		'priority' => 40
	) );

}
add_action( 'customize_register', 'my_custom_section' );

/**
 * Create the setting
 */
function my_custom_setting( $controls ) {

	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'copyright',
		'label'    => __( 'Copyright', 'translation_domain' ),
		'section'  => 'footer_section',
		'default'  => '',
		'priority' => 1,
	);

	return $controls;
}
add_filter( 'kirki/controls', 'my_custom_setting' );
