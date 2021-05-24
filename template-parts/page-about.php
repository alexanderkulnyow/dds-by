<?php
/**
 * Template Name: Страница - о нас
*/
get_header();

category__header( 'О нас' );
kama_breadcrumbs( ' /' );
?>

       <article>

        <section class="container mt-80">
            <header class="col-3">
                <h2 class="text-right">Dinnersaur<br>Design<br>Studio</h2>
            </header>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 offset-sm-3 col-sm-9 mb-5">
							<?php the_content(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
			<?php do_action( 'dds_about' ); ?>

    </article>

<?php

get_footer();

