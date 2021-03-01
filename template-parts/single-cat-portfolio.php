<?php
get_header();
?>

    <article>
        <section>
            <header class="container mt-100">
                <div class="row">
                    <div class="col-8 align-self-center">
                        <h2 class="text-left"><a
                                    href=" <?php esc_url( get_permalink() ); ?> "> <?php the_title(); ?> </a></h2>
                    </div>
            </header>

				<?php kama_breadcrumbs( ' /' ); ?>

            <div class="container mt-80 single-cat-portfolio">
				<?php the_content(); ?>

            </div>
            <p style="text-align: center;"> Следите за обновлениями в instagram
                <a href="https://www.instagram.com/DinnersaurDesign/" target="_blank">@dinnersaurdesign</a>
                <br>
                Спасибо за внимание!
            </p>
        </section>
        <!--        вывод позожиз -->
<!--		--><?php //portfolio_same_posts( 'Похожие работы' ); ?>
    </article>


<?php

get_footer();
