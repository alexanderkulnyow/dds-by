<section class="container home__contactscont" id="home__contacts">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-10 offset-1 offset-md-2 col-md-8 justify-content-end">
            <h2 class="text-right">Мы<br>всегда<br>готовы<br>к<br>сотрудничеству<br><img
                        class="arrow__down align-self-end"
                        src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка"></h2>
            <p class="text-right">Позвоните нам или заполните форму<br>и мы сами свяжемся с Вами.</p>
        </div>
    </div>
    <div class="row home__contacts">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
            <ul class="row list__none">
                <li class="col-12 col-md-4"><a href="tel: +37529244-43-75">+375(29)244-43-75</a></li>
                <li class="col-12 col-md-4"><a class="link__mail" href="mailto: info@dds.by">info@dds.by</a></li>
                <li class="col-12 col-md-4">
                    <ul class="navigation__social">
                        <li class="text-center"><a href="https://www.behance.net/DinnersaurDesign"
                                                   target="_blank"><img
                                        src="<?php echo get_template_directory_uri(); ?>/img/icons/behance.svg"
                                        alt="Ресторанный дизайн Витебск"></a></li>
                        <li><a href="https://vk.com/dinnersaurdesign" target="_blank"><img
                                        src="<?php echo get_template_directory_uri(); ?>/img/icons/vk.svg"
                                        alt="Ресторанный дизайн Витебск"></a>
                        </li>
                        <li><a href="https://www.instagram.com/DinnersaurDesign/" target="_blank"><img
                                        src="<?php echo get_template_directory_uri(); ?>/img/icons/in-logo.svg"
                                        alt="Ресторанный дизайн Витебск"></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="w-100"></div>
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
            <form id="ajaxform" method="POST" name="application" action="">
                <div class="form-group">
                    <input class="form-control" id="user" type="text" name="name" placeholder="Ваше имя *" required>
                    <input class="form-control" id="email" type="text" name="email" placeholder="e-mail *" required>
                    <input class="form-control" id="phone" type="text" name="tel" placeholder="Номер телефона">
                    <textarea class="form-control" id="text" rows="6" name="message"
                              placeholder="Описание Вашего проекта"></textarea>
                    <div class="g-recaptcha" data-sitekey="6LekLVMUAAAAAPPDXLTaDGaGb-q6jePQzbeTU__G"
                         placeholder="Я не робот"></div>
                    <input class="btn btn-primary text-center" id="button" type="submit" value="Отправить">
                    <!--button.g-recaptcha(data-sitekey="6Ld2N2cUAAAAALoNzHJqZvFQ9xjqZ3xkcyfLGFe6" data-callback="YourOnSubmitFn" ) Отправить-->
                </div>
            </form>
            <div id="result_form"></div>
        </div>
</section>
