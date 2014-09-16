<?php

/**
 * Create the section
 */
function my_custom_section( $wp_customize ) {

	// Create the "My Section" section
	$wp_customize->add_section( 'my_section', array(
		'title'    => __( 'My Section', 'translation_domain' ),
		'priority' => 12
	) );

}
add_action( 'customize_register', 'my_custom_section' );

/**
 * Create the setting
 */
function my_custom_setting( $controls ) {

	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'my_setting',
		'label'    => __( 'My custom control', 'translation_domain' ),
		'section'  => 'my_section',
		'default'  => 'some-default-value',
		'priority' => 1,
	);

	return $controls;
}
add_filter( 'kirki/controls', 'my_custom_setting' );
