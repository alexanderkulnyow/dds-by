<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dds.by
 */

get_header();

category__header( 'Наши работы' );
kama_breadcrumbs( ' /' );
?>

    <section class="container category__portfolio pad-40">
        <nav class="d-block">
            <ul class="controls portfolio_controls">
				<?php
				$all_categories = get_categories( array(
					'child_of'   => 4,
					'hide_empty' => false
				) );
				?>

				<?php foreach ( $all_categories as $category ): ?>
                    <li data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
				<?php endforeach; ?>
            </ul>
        </nav>
        <div class="row portfolio__container">
			<?php
			$args  = array(
				'numberposts'      => 0,
				'category_name'    => 'portfolio',
				'orderby'          => 'date',
				'order'            => 'DESC',
				'include'          => array(),
				'exclude'          => array(),
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'post',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			);
			$posts = get_posts( $args );
			foreach (
				$posts

				as $post
			) {
				setup_postdata( $post );

				$categories  = get_the_category();
				$slugs       = wp_list_pluck( $categories, 'slug' );
				$class_names = join( ' ', $slugs );

				?>

                <div class="card col-12 col-sm-6 p-0 m-0 mix <?php if ( $class_names ) {
					echo ' ' . $class_names;
				} ?> ">
					<?php
					portfolio_thumbnail();
					?>

                </div>
			<?php }
			wp_reset_postdata(); ?>

    </section>

    <div class="row">
        <div class="col-sm-9 col-6 bg_dotted"></div>
        <div class="col-sm-3 col-6">

            <h2 class="m-0"><a href="https://www.behance.net/DinnersaurDesign" target="_blank"
                               rel="nofollow noopener">Ещё<br/>больше<br/>наших<br/>работ </a></h2>
            <img class="arrow__down"
                 src="<?php echo get_template_directory_uri(); ?>/img/icons/next.svg"
                 alt="arrow"/>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            // микситап
            $(function () {
                let containerEl = document.querySelector('.portfolio__container');
                let mixer = mixitup(containerEl, {
                    controls: {
                        // toggleDefault: 'none'
                    },
                    animation: {
                        duration: 250,
                        // easing: 'ease-in-out'
                    }
                });
            })
        });

    </script>
<?php
get_footer();
