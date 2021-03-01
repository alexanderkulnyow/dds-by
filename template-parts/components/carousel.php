<div class="carousel header__carousel slide d-none d-md-block" id="Carousel" data-ride="carousel">
    <div class="carousel-inner">
		<?php
		$args  = array(
			'category_name' => 'main-slider', //!!!!!category_name!!!!!!!
			'order'         => 'ASC',
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			$i = 0;
			while ( $query->have_posts() ) : $query->the_post() ?>
                <div class="carousel-item <?php if ( $i === 0 ): ?> active <?php endif; ?>">
                    <div class="row carousel__bg justify-content-center align-content-end">
                        <div class="col-3 align-self-center">
                            <h1 class="text-right" itemprop="name"> <?php echo get_the_title(); ?></h1>
                        </div>
                        <div class="col-9">
							<?php
							if ( has_post_thumbnail() ) {
								$thumb       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
								$thumb_alt   = trim( strip_tags( $attachment->post_excerpt ) );
								$thumb_title = trim( strip_tags( $attachment->post_title ) );
								echo '<img class="img-fluid" src="' . $thumb[0] . '" alt="' . $thumb_alt . '" title="' . $thumb_title . '" />';
							}
							?>
                        </div>
                    </div>
                </div>
				<?php $i ++;
			endwhile;
		endif;
		wp_reset_postdata(); ?>
    </div>
    <a class="carousel-control-prev" href="#Carousel" data-slide="prev" role="button">
        <img class="arrow"
             src="<?php echo get_template_directory_uri(); ?>/img/icons/prev.svg"
             alt="arrows dds">
        <span class="sr-only">Previous</span></a>
    <a class="carousel-control-next" href="#Carousel" data-slide="next"
       role="button">
        <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/img/icons/next-2.svg"><span class="sr-only">Next</span></a>
</div>
