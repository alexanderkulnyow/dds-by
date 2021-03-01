// including popper
// include ../../../../env/node_modules/popper.js/dist/popper.min.js
// including bootstrap
//=include ../../../../env/node_modules/bootstrap/dist/js/bootstrap.js
// including wowjs
//=include ../../../../env/node_modules/wowjs/dist/wow.min.js

jQuery(document).ready(function ($) {

    // мягкий скрол на ссылках
    $("body").on("click", ".link__slow", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();
        //забираем идентификатор бока с атрибута href
        var id = $(this).attr('href'),
            //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;
        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 500);
    });
// мобильное меню


    // капча ------ следует убрать
    $(function () {
        $('.g-recaptcha').hide();
        $("#button").click(function () {
            $('.g-recaptcha').show();
        })
    })
// подсветка выбраной категории в портфолио
    $(function () {
        $(".controls li").click(function () {
            $(".controls li").removeClass("active");
            $(this).addClass("active");
        })
    })


});


/*
to top button
*/
// When the user scrolls down 200px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("BtnTOP").style.display = "block";
    } else {
        document.getElementById("BtnTOP").style.display = "none";
    }
    ;
};
(function ($) {
    $(function () {

        $('#BtnTOP').click(function () {
            $('html, body').animate({scrollTop: 0}, 500);
            return false;
        })

    })
})(jQuery)


// mobile menu


let forEach = function (t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t)) for (let c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t); else for (let e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
};
let hamburgers = document.getElementById("hamburger");
let mobileMEnu = document.getElementById("menu1");

function mobileMenu() {
    let WWidht = window.innerWidth;
    if (WWidht <= 768) {
        mobileMEnu.classList.add("mobileMenu_hide");
    } else {
        mobileMEnu.classList.remove("mobileMenu_hide");
        mobileMEnu.classList.remove("mobileMenu_show");
    }
};
mobileMenu();

window.addEventListener(`resize`, event => {
    mobileMenu();
    // console.log(WWidht);
}, false);

if (hamburgers.length > 0) {
    forEach(hamburgers, function (hamburger) {
        hamburger.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}
hamburgers.onclick = function () {
    if (mobileMEnu.classList.contains('mobileMenu_hide')) {
        mobileMEnu.classList.add('mobileMenu_show')
        mobileMEnu.classList.remove('mobileMenu_hide')
    } else {
        mobileMEnu.classList.add('mobileMenu_hide')
    }
}

// hamburgers__item.onclick = function () {
//     hamburgers.classList.add("mobileMenu_hide");
// }


console.log('Developed by Alexander Kulnyow to dds.by');
console.log('Designed by Alexandra Betenya to dds.by');

