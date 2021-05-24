</main>
<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <style>
        .menu-footer_about-container a {
            padding-left: 0;
        }

        .menu-footer_serv-container a {
            padding-left: 0;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="text-left">Dinnersaur<br/>Design<br/>Studio</h2>
            </div>
            <div class="w-100"></div>
            <div class="offset-md-2 col-lg-3 col-md-5">
                <h4>Услуги</h4>
                <ul class="list__none">
					<?php
					wp_nav_menu( array(
						'menu'       => 'footer_serv',
						'echo'       => true,
						'items_wrap' => '<li ><a>%3$s</a></li>',
						'depth'      => - 1,
						'walker'     => '',
					) );
					?>
                </ul>

            </div>
            <nav class="col-lg-2 col-md-5">

                <h4>О нас</h4>
                <ul class="list__none">
                    <!--                    <li><a href="#">Опыт работы</a></li>-->
                    <!--                    <li><a href="#">Отзывы</a></li>-->
                    <!--                    <li><a href="#">Наши клиенты</a></li>-->
                    <!--                    <li><a href="#">Контакты</a></li>-->
					<?php
					wp_nav_menu( array(
						'menu'       => 'footer_about',
						'echo'       => true,
						'items_wrap' => '<li><a>%3$s</a></li>',
						'depth'      => - 1,
						'walker'     => '',
					) );
					?>
                </ul>
            </nav>
            <nav class="offset-md-2 col-lg-2 col-md-5 offset-lg-0 footer__contacts">
                <h4>Контакты</h4>
                <ul class="list__none" itemscope="" itemtype="http://schema.org/Organization">


                    <li><?php phone_number(); ?></li>
                    <li><?php e__mail(); ?></li>

                    <li class="text-left" style="width: 150px;">

                        <a class="" title="Telegram"
                           href="<?php echo get_option( 'dds_options' )['msg_tg']; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/telegram-logo.svg"
                                 alt="Telegram">
                        </a>

                        <a class="" title="Viber" href="<?php echo get_option( 'dds_options' )['msg_vb']; ?>">
                            <img width="" src="<?php echo get_template_directory_uri(); ?>/img/icons/viber-logo.svg"
                                 alt="Viber">
                        </a>
                        <a class="" title="Skype" href="<?php echo get_option( 'dds_options' )['msg_sk']; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icons/skype-logo.svg"
                                 alt="Skype">
                        </a>
                    </li>
                    <li class="text-left mt-3" style="width: 150px;">
						<?php social_media(); ?>
                    </li>


                </ul>

            </nav>
            <div class="col-lg-2 col-md-5">
                <h4>Клиентам</h4>
                <p>Необязательно у нас что-то заказывать. Вы просто можете спросить совет и мы с радостью поможем.</p>
            </div>
            <!--            <div class="col-lg-2 col-12 mt-30">-->
            <!--                <ul class="navigation__social">-->
            <!--					--><?php //social_media(); ?>
            <!--                </ul>-->
            <!--            </div>-->
        </div>

        <ul class="row justify-content-center terms list__none">
			<?php
			wp_nav_menu( array(
				'menu'       => 'post_Footer',
				'container'  => 'ul',
				'echo'       => true,
				'menu_class' => '',
				'items_wrap' => '%3$s',
				'depth'      => - 1,
				'walker'     => '',
			) );
			?>
        </ul>
    </div>


    <button class="link__slow" id="BtnTOP" title="Go to top">
        <style>
            .link__slow:hover #toTOP {
                fill: white;
            }
        </style>
        <svg width="64" version="1.1" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 0 64 64"
             xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
            <g>
                <path id="toTOP" fill="#1D1D1B"
                      d="m45.539,63.41c0.394,0.394 0.908,0.59 1.424,0.59s1.031-0.197 1.424-0.59c0.787-0.787 0.787-2.061 0-2.848l-28.328-28.329 28.348-28.347c0.786-0.787 0.786-2.062 0-2.848-0.787-0.787-2.062-0.787-2.849,0l-29.736,29.735c-0.205,0.206-0.384,0.506-0.484,0.778-0.273,0.738-0.092,1.567 0.465,2.124l29.736,29.735z"/>
            </g>
        </svg>
    </button>

</footer><!-- #colophon -->

<!--<dialog>-->
<!--    <h2>Dialog Title</h2>-->
<!--    <p>Dialog content and other stuff will go here</p>-->
<!--</dialog>-->


<?php wp_footer(); ?>
<!--<script>    new WOW().init();</script>-->
</body>
</html>
