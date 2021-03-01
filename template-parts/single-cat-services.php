<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dds.by
 */

get_header();
?>
    <article class="pagestyle">
        <header class="row bg_1 header__carousel ">
            <div class="header__desktop d-none d-md-flex">
                <!--                заголовок десктоп-->
                <div class="col-3 align-self-center wow fadeInLeft">
                    <h2 class="text-center"><a href="<?php esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                    </h2>
                    <!--                    описание услуги-->
                    <div class="text-right slidetext">
						<?php the_excerpt(); ?>
                    </div>
                </div>
                <div class="col-9 wow fadeInRight">
                    <!--                    изображение услуги-->
					<?php
					carousel_thumbnail();
					?>
                </div>
            </div>
            <!--заголовок мобильной версии-->
            <div class="header__mobile d-block d-md-none">
                <h2 class="text-center"><a href="<?php esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
                <div class="services__description_mobile">
					<?php the_excerpt(); ?>
                </div>
            </div>
        </header>


		<?php kama_breadcrumbs( ' /' ); ?>


        <div class="container mt-80">
			<?php the_content(); ?>
            <!--            --><?php //order_item( get_the_title() ); ?>
        </div>
        <div class="container container_modal">
            <div class="row">
                <div class="modal fade" id="modal_ex" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-center">Введите ваши данные</h3>
                                <div class="">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
							<?php echo do_shortcode( '[contact-form-7 id="1099" title="Модальная форма заказа"]' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<?php portfolio_same_posts( 'Примеры работ' ); ?>

    </article>
<?php //echo get_the_title(); ?>
<?php
get_footer();
