<section class="home__portfolio main__portfolio" id="home__portfolio">
    <div class="pad-40">
        <div class="container portfolio__container">
            <h2>Последние работы</h2>
            <div class="row portfolio__items">
				<?php
				// параметры по умолчанию
				$args = array(
					'numberposts'      => 6,
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
				foreach ( $posts as $post ) {
					setup_postdata( $post );
					if ( has_post_thumbnail() ) {
						$thumb       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						$thumb_alt   = trim( strip_tags( $attachment->post_excerpt ) );
						$thumb_title = trim( strip_tags( $attachment->post_title ) );
						?>
                        <div class="card col-12 col-sm-6 p-0 m-0">
                            <a href="<?php echo get_permalink(); ?>" rel="nofollow noopener">
                                <img class="icard-img-top embed-responsive-1by1 w-100" src="<?php echo $thumb[0] ?>"
                                     alt="<?php echo $thumb_alt ?>" title="<?php echo $thumb_title ?>"/>
                                <div class="card__caption">
                                    <h3 class="card-title" itemprop="name"><?php echo get_the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
						<?php
					}
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9 col-6 bg_dotted"></div>
            <div class="col-sm-3 col-6">
				<?php
				$category_id   = get_cat_ID( 'Примеры наших работ' );
				$category_link = get_category_link( $category_id );
				?>
                <h2 class="m-0"><a href=" <?php echo $category_link; ?> " target=" _blank" rel="nofollow noopener">
                        Ещё<br/>больше<br/>наших<br/>работ</a></h2>
                <img class="arrow__down" src="<?php echo get_template_directory_uri(); ?>/img/icons/next.svg"
                     alt="стрелка"/>
            </div>
        </div>
    </div>
</section>
