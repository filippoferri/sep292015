<?php

/**
 * Create the section
 */
function my_custom_section( $wp_customize ) {

	// Create the "My Section" section
	$wp_customize->add_section( 'footer_section', array(
		'title'    => __( 'Footer', 'roots' ),
		'priority' => 30
	) );
	// Home Page
	$wp_customize->add_section( 'home_section', array(
		'title'    => __( 'Home Page', 'roots' ),
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
		'setting'  => 'title1',
		'label'    => __( 'Titolo carosello', 'roots' ),
		'section'  => 'home_section',
		'default'  => 'Diario verde',
		'priority' => 1,
	);
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'title2',
		'label'    => __( 'Titolo seconda sezione', 'roots' ),
		'section'  => 'home_section',
		'default'  => 'Casa di vetro',
		'priority' => 2,
	);
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'title3',
		'label'    => __( 'Titolo sezione verde', 'roots' ),
		'section'  => 'home_section',
		'default'  => 'L\'arte di leggere e di non leggere',
		'priority' => 3,
	);
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'copyright',
		'label'    => __( 'Copyright', 'roots' ),
		'section'  => 'footer_section',
		'default'  => '',
		'priority' => 1,
	);

	return $controls;
}
add_filter( 'kirki/controls', 'my_custom_setting' );
