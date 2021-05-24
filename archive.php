<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dds.by
 */

get_header();
?>

    <div id="primary" class="content-area container">
        <main id="main" class="site-main">

            <!--			--><?php //if ( have_posts() ) : ?>

            <!--                <header class="page-header">-->
            <!--					--><?php
			//					the_archive_title( '<h1 class="page-title">', '</h1>' );
			//					the_archive_description( '<div class="archive-description">', '</div>' );
			//					?>
            <!--                </header>-->

			<?php
			/* Start the Loop */
//			if ( in_category( 'portfolio' ) ) {
//				get_template_part( 'template-parts/category-portfolio' );
//			}
//			if ( in_category( 'services' ) ) {
//				get_template_part( 'template-parts/category-services' );
//
//				echo 'hw';
//			} //				the_posts_navigation();

			//				else :
			//
			//				get_template_part( 'template-parts/content', 'none' );

			//			endif;
			?>

        </main>
    </div>

<?php
include 'template-parts/components/clients.php';
?>


<?php
//get_sidebar();
get_footer();
