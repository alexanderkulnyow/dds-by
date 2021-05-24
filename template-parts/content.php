<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dds.by
 */


if ( in_category( 'portfolio' ) ) {
	get_template_part( 'template-parts/single-cat-portfolio' );
} elseif ( in_category( 'services' ) ) {
	get_template_part( 'template-parts/single-cat-services' );
}
?>



