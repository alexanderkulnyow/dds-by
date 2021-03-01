<?php

get_header();


//add_action( 'dds_frontpage', 'dds_main_slider', 10 );
//add_action( 'dds_frontpage', 'dds_main_about', 20);
//add_action( 'dds_frontpage', 'dds_main_services', 30);
//add_action( 'dds_frontpage', 'dds_main_portfolio', 40);
//add_action( 'dds_frontpage', 'dds_main_contactform', 50);
//add_action( 'dds_frontpage', 'dds_main_clients', 50);

do_action( 'dds_frontpage' );

get_footer();

