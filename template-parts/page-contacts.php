<?php
/**
 * Template Name: Страница - контакты
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dds.by
 */

get_header();

category__header( 'Свяжитесь с нами' );

kama_breadcrumbs( ' /' );

do_action( 'dds_contacts', 'dds_main_contactform' );

get_footer();
