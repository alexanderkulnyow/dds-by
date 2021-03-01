<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function dds_by_scripts()
{
	wp_enqueue_style( 'dds-by-style', get_template_directory_uri() . '/css/style.css', array(), '3.4' );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, null, true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dds-by-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.3', true );

	if ( is_category( 'portfolio' ) )
	{
		wp_enqueue_script( 'dds-by-mixitup.js', get_template_directory_uri() . '/assets/js/mixitup.min.js', array(), '1.0', true );
	}
}
add_action( 'widgets_init', 'true_remove_default_widget', 20 );
add_action( 'wp_enqueue_scripts', 'dds_by_scripts' );
