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
					clients_thumbnail();
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

        <div class="container mt-30">
			<?php kama_breadcrumbs( ' /' ); ?>
        </div>

        <div class="container mt-80">
			<?php the_content(); ?>
        </div>


		<?php portfolio_same_posts('Примеры работ'); ?>

    </article>

<?php
get_footer();
