<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dds.by
 */

get_header();
?>
    <div class="container mt-30">
		<?php kama_breadcrumbs( ' /' ); ?>
    </div>
    <main class="container ">
        <h2 class="text-center">WHAAAAAAAAAT?!</h2>
        <div class="row justify-content-center">
            <img class="img404" src="<?php echo get_template_directory_uri(); ?>/img/dino.jpg" alt="">

        </div>
        <h3 class="text-center">
            <a href="https://dds.by">Let's get out of here!</a></h3>
    </main>

<?php
get_footer();
