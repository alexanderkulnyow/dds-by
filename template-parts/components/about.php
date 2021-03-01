<section class="container home__about" id="home__about">
    <div class="row">
        <div class="col-3">
            <h2 class="text-right" itemprop="name">Dinnersaur<br/>Design<br/>Studio</h2>
        </div>
        <div class="w-100"></div>
        <div class="col-12 offset-sm-3 col-sm-9">
            <?php
            $post27 = get_post( 116 );
            $text = $post27->post_content; // контент поста
            echo apply_filters('the_content', $text); // выводим контент
            ?>
        </div>
    </div>
    <div class="col-sm-3">
            <h2><a class="link__slow" href="#home__services">Делаем<br/>то, что<br/>любим.</a></h2><img class="arrow__down" src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка"/>
    </div>
</section>


