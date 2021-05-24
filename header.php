<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dds.by
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!--    google-->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NN7D6F4');</script>
    <!-- End Google Tag Manager -->
    <!--    my meta-->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
    <!--    my links-->
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link type="text/plain" rel="author" href="https://dds.by/humans.txt"/>
    <link rel="manifest" href="https://dds.by/site.webmanifest"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NN7D6F4"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header id="masthead" class="header site-header" itemscope itemtype="http://schema.org/WPHeader">

    <nav class="menu__container fixed-top">
		<?php the_custom_logo(); ?>
        <button id="hamburger" class="hamburger hamburger--spring d-md-none">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </button>
        <div id="menu1" class="">
            <h2 class="text-left d-md-none">Dinnersaur<br/>Design<br/>Studio</h2>
			<?php
			$args = array(
				'container'       => 'ul',
				'container_class' => '',
				'container_id'    => '',
				'theme_location'  => 'Primary',
				'menu'            => 'Primary',
				'menu_class'      => 'menu__list list__none d-md-flex',
				'menu_id'         => 'menu',
				'echo'            => true,
//				'fallback_cb'    => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => - 1,
				'walker'          => new dds_Walker_Nav_Menu(),
			);
			wp_nav_menu( $args );
			?>
            <ul class="navigation__social-mobile d-md-none">
				<?php social_media(); ?>
            </ul>
        </div>

        <!--	social desctop-->
        <ul class="navigation__social d-none d-md-flex">
			<?php social_media(); ?>

        </ul>
    </nav>
    <style>
        .breadcrumb {
            background: none;
        }
    </style>
</header><!-- #masthead -->
<main class="container-fluid site-content">


