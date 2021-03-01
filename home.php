<?php

get_header();
?>

    <!--вывод карусели-->

    <section class="carousel header__carousel slide d-none d-md-block" id="Carousel" data-ride="carousel">
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
                            <div class="col-3 align-self-center wow fadeInLeft">
                                <h1 class="text-right" itemprop="name"> <?php echo get_the_title(); ?></h1>
                            </div>
                            <div class="col-9 wow fadeInRight">
								<?php
								clients_thumbnail();
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
            <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/img/icons/next-2.svg"><span
                    class="sr-only">Next</span></a>
    </section>  <!--конец вывод карусели-->

    <!--вывод блока о нас-->
    <section class="container home__about" id="home__about">
        <div class="row">
            <div class="col-3">
                <h2 class="text-right" itemprop="name">Dinnersaur<br/>Design<br/>Studio</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-12 offset-sm-3 col-sm-9">
				<?php
				$post27 = get_post( 706 );
				$text   = $post27->post_content; // контент поста
				echo apply_filters( 'the_content', $text ); // выводим контент
				?>
            </div>
        </div>
        <div class="col-sm-3">
            <h2><a class="link__slow" href="#home__services">Делаем<br/>то, что<br/>любим.</a></h2><img
                    class="arrow__down" src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg"
                    alt="стрелка"/>
        </div>
    </section><!--конец блока о нас-->
    <!--вывод блока услуг-->
<?php include "template-parts/components/services.php"; ?>

    <section class="section__portfolio">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h2 itemprop="name"><a class="link__slow mt-5" href="#home__portfolio">Любим<br>то,
                            что<br>делаем.</a>
                    </h2>
                    <img
                            class="arrow__down img-fluid"
                            src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!--        <div class="pad-40">-->
            <div class="portfolio__container home__portfolio main__portfolio" id="home__portfolio">
                <div class="container">
                    <h2>Последние работы</h2>
                </div>

                <div class="row portfolio__items">
					<?php
					// параметры по умолчанию
					$args = array(
						'numberposts'      => 12,
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
						setup_postdata( $post ); ?>
                        <div class="card col-6 col-md-4 col-xl-3 p-0 m-0 embed-responsive-1by1">
							<?php portfolio_post_thumbnail(); ?>
                        </div>

					<?php }
					wp_reset_postdata();
					?>
                </div>
            </div>
        </div>


        </div>
        <div class="container-fluid">
            <div class="row wow fadeInLeft" data-wow-offset="200">
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
    </section><!--конец блока портфолио-->
    <!--вывод формы контактов-->
    <section class="container home__contactscont" id="home__contacts">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-10 offset-1 offset-md-2 col-md-8 justify-content-end">
                <h2 class="text-right">Мы<br>всегда<br>готовы<br>к<br>сотрудничеству<br><img
                            class="arrow__down align-self-end"
                            src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка"></h2>
                <p class="text-right">Позвоните нам или заполните форму<br>и мы сами свяжемся с Вами.</p>
            </div>
        </div>
        <div class="row home__contacts" itemscope itemtype="http://schema.org/Organization">
			<?php include 'template-parts/contacts.php'; ?>
            <div class="w-100"></div>
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="form-group">
						<?php echo do_shortcode( '[contact-form-7 id="416" title="Основная"]' ) ?>
                    </div>
                </form>
            </div>
    </section><!--конец формы контактов-->
    <!--вывод списка клиентов-->
    <section class=" d-none d-md-flex home__clients" style="background-color: #efecec">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 offset-sm-3 justify-content-end">
                    <h2 class="text-left" itemprop="name">Благодарим<br/>за<br/>сотрудничество<br/>
                        <img class="arrow__down align-self-end"
                             src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg"
                             alt="дизайн Витебск"/></h2>
                </div>
                <div class="w-100"></div>
				<?php
				// параметры по умолчанию
				$args = array(
					'numberposts'      => 16,
					'category_name'    => 'clients',
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

				foreach ( $posts

				as $post ) {
				setup_postdata( $post );
				?>
                <div class="col-md-3 clients">
					<?php clients_thumbnail(); ?>
                </div>
					<?
				}
				wp_reset_postdata();
				?>
            </div>


        </div>
    </section>
    <!--конец списка клиентов-->
<?php
get_footer();

