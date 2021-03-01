<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function portfolio_same_posts( $same_post_tittle = 'примеры работ' ) {
	?>
    <section class="container">
        <h3><a href="<?php get_permalink() ?>"><?php echo $same_post_tittle ?></a></h3>
        <img class="arrow__down img-fluid"
             src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
        <div class="row portfolio__items">
			<?php
			$post_id = get_the_ID();
			$args    = array(
				'posts_per_page' => 2,
				'orderby'        => 'rand',
				'category_name'  => 'portfolio',
				'post__not_in'   => array( $post_id )
			);
			$query   = new WP_Query( $args );
			// Цикл
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
                    <div class="card col-6 p-0 m-0">
						<?php portfolio_post_thumbnail(); ?>
                    </div>
					<?php
				};
			};
			/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
			wp_reset_postdata();
			?>
        </div>
    </section>
	<?php
}
