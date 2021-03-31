<?php

/**
 * dds.by functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dds.by
 */

add_action( 'after_setup_theme', 'dds_by_setup' );
add_action( 'after_setup_theme', 'dds_by_content_width', 0 );
add_action( 'widgets_init', 'dds_by_widgets_init' );
add_action( 'init', 'page_excerpt' );
add_filter( 'template_include', 'my_template' );
add_filter( 'emoji_svg_url', '__return_empty_string' );
add_filter( 'single_template', 'post_templates' );
add_action( 'admin_init', 'dds_option_settings' );
add_action( 'widgets_init', 'dds_remove_default_widget', 20 );
add_action( 'wp_enqueue_scripts', 'dds_by_scripts' );

function phone_number() {
	echo '<a href="' . get_option( 'dds_options' )['phone_link'] . '" itemprop="telephone">' . get_option( 'dds_options' )['phone_text'] . '</a>';
}

function e__mail() {
	echo '<a href="mailto:' . get_option( 'dds_options' )['email'] . '" itemprop="email">' . get_option( 'dds_options' )['email'] . '</a>';
}

function social_media() {
	echo '<a class="no__left" title="Behance" href="' . get_option( 'dds_options' )['social_be'] . '" target="_blank">';
	echo '<img src="' . get_template_directory_uri() . '/img/icons/behance.svg" alt="Ресторанный дизайн Витебск"/>';
	echo '</a>';
	echo '<a class="col" title="Vk" href="' . get_option( 'dds_options' )['social_vk'] . '" target="_blank">';
	echo '<img src="' . get_template_directory_uri() . '/img/icons/vk.svg" alt="Ресторанный дизайн Витебск"/>';
	echo '</a>';
	echo '<a class="col" title="Instagram" href="' . get_option( 'dds_options' )['social_inst'] . '" target="_blank">';
	echo '<img src="' . get_template_directory_uri() . '/img/icons/in-logo.svg" alt="Ресторанный дизайн Витебск"/>';
	echo '</a>';
}

if ( ! function_exists( 'dds_by_setup' ) ) :
	function dds_by_setup() {

		load_theme_textdomain( 'dds-by', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'       => esc_html__( 'Primary', 'dds-by' ),
			'top'          => esc_html__( 'top', 'dds-by' ),
			'footer_serv'  => esc_html__( 'Футер Услуги', 'dds-by' ),
			'footer_about' => esc_html__( 'Футер О нас', 'dds-by' ),
			'post_Footer'  => esc_html__( 'terms', 'dds-by' ),
		) );
		add_filter( 'nav_menu_css_class', 'nav_css_filter' );

		function nav_css_filter( $classes ) {
			// Здесь добавить или убрать классы...
			return $classes;
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'dds_by_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dds_by_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dds_by_content_width', 640 );
}


function dds_by_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dds-by' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dds-by' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}


function dds_by_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap-4.6.0-dist/css/bootstrap.min.css', array(), '4.6.0' );
	wp_enqueue_style( 'hamburgers', get_template_directory_uri() . '/vendors/hamburgers/hamburgers.min.css', array(), '' );
	wp_enqueue_style( 'animatecss', get_template_directory_uri() . '/vendors/animatecss/animate.css', array(), '4.1.1' );
	wp_enqueue_style( 'dds-by-style', get_stylesheet_uri(), array(), '3.6' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap-4.6.0-dist/js/bootstrap.min.js', array(), '4.6.0' );
//	wp_enqueue_ыскшзк( 'wowjs', get_template_directory_uri() . 'vendors/wow/wow.min.js', array(), '' );
	wp_enqueue_script( 'dds-by-main', get_template_directory_uri() . '/js/main.js', array(), '1.4', true );

	if ( is_category( 'portfolio' ) ) {
		wp_enqueue_script( 'dds-by-mixitup.js', get_template_directory_uri() . '/vendors/mixitup/mixitup.min.js', array(), '1.0', true );
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom post types.
 */
require get_template_directory() . '/inc/custom-post-types.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
	/**
	 * Disable the emoji's
	 */
	add_action( 'init', 'disable_emojis' );
	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 *
	 * @param array $plugins
	 *
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();

		}
	}
}

function page_excerpt() {
	add_post_type_support( 'page', array( 'excerpt' ) );
}

## Отключаем Emojis в WordPress
## отключаем DNS prefetch

function dds_remove_default_widget() {
	unregister_widget( 'WP_Widget_Archives' ); // Архивы
	unregister_widget( 'WP_Widget_Calendar' ); // Календарь
	unregister_widget( 'WP_Widget_Categories' ); // Рубрики
	unregister_widget( 'WP_Widget_Meta' ); // Мета
	unregister_widget( 'WP_Widget_Pages' ); // Страницы
	unregister_widget( 'WP_Widget_Recent_Comments' ); // Свежие комментарии
	unregister_widget( 'WP_Widget_Recent_Posts' ); // Свежие записи
	unregister_widget( 'WP_Widget_RSS' ); // RSS
	unregister_widget( 'WP_Widget_Search' ); // Поиск
	unregister_widget( 'WP_Widget_Tag_Cloud' ); // Облако меток
	unregister_widget( 'WP_Widget_Text' ); // Текст
	unregister_widget( 'WP_Nav_Menu_Widget' ); // Произвольное меню
}

////////////////////////////////////////////////////////////////////////////
////                          шалонизаця постов
///////////////////////////////////////////////////////////////////////////

function post_templates( $template ) {
	// Get the current single post object
	$post = get_queried_object();
	// Set our 'constant' folder path
	$path = 'template-parts/';

	// Set our variable to hold our templates
	$templates = [];

	// Lets handle the custom post type section
	if ( 'post' !== $post->post_type ) {
		$templates[] = $path . 'single-' . $post->post_type . '-' . $post->post_name . '.php';
		$templates[] = $path . 'single-' . $post->post_type . '.php';
	}

	// Lets handle the post post type stuff
	if ( 'post' === $post->post_type ) {
		// Get the post categories
		$categories = get_the_category( $post->ID );
		// Just for incase, check if we have categories
		if ( $categories ) {
			foreach ( $categories as $category ) {
				// Create possible template names
				$templates[] = $path . 'single-cat-' . $category->slug . '.php';
				$templates[] = $path . 'single-cat-' . $category->term_id . '.php';
			} //endforeach
		} //endif $categories
	} // endif

	// Set our fallback templates
	$templates[] = $path . 'single.php';
	$templates[] = $path . 'default.php';
	$templates[] = 'index.php';

	/**
	 * Now we can search for our templates and load the first one we find
	 * We will use the array ability of locate_template here
	 */
	$template = locate_template( $templates );

	// Return the template rteurned by locate_template
	return $template;
}

//////////////////////////////////////////////////////////////////////////
//                          шалонизаця сраниц
/////////////////////////////////////////////////////////////////////////
// фильтр передает переменную $template - путь до файла шаблона.
// Изменяя этот путь мы изменяем файл шаблона.

function my_template( $template ) {
	# аналог второго способа
	// если это страница со слагом portfolio, используем файл шаблона page-portfolio.php
	// используем условный тег is_page()
	if ( is_page( 'about' ) ) {
		if ( $new_template = locate_template( array( '/template-parts/page-about.php' ) ) ) {
			return $new_template;
		}
	}
	if ( is_page( 'contacts' ) ) {
		if ( $new_template = locate_template( array( '/template-parts/page-contacts.php' ) ) ) {
			return $new_template;
		}
	}

	# шаблон для группы рубрик
	// этот пример будет использовать файл из папки темы tpl_special-cats.php,
	// как шаблон для рубрик с ID 9, названием "Без рубрики" и слагом "php"
	if ( is_category( array( 9, 'services', 'php' ) ) ) {
		return get_stylesheet_directory() . '/template-parts/category-service.php';
	}
	if ( is_category( array( 9, 'portfolio', 'php' ) ) ) {
		return get_stylesheet_directory() . '/template-parts/category-portfolio.php';
	}

	return $template;
//
}

require get_template_directory() . '/f/f_breadcrumbs.php';

//require get_template_directory() . '/f/f_thumbnail.php';

function carousel_thumbnail() {
	global $post;
	if ( has_post_thumbnail() ) :
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$alt          = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
		$attr         = array(
			'class' => "img-fluid",
			'alt'   => $alt,
		);
		the_post_thumbnail( 'full', $attr );

	endif;
}

function clients_thumbnail() {
	global $post;
	if ( has_post_thumbnail() ) :
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$alt          = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
		$attr         = array(
			'class' => "img-fluid",
			'alt'   => $alt,
		);
		echo '<div class="col-6 col-md-3 clients">';
		the_post_thumbnail( 'medium', $attr );
		echo '</div>';
	endif;
}

function portfolio_thumbnail() {
	global $post;
	if ( has_post_thumbnail() ) :
		echo '<a href="', the_permalink() . '" class="embed-responsive embed-responsive-1by1" rel="nofollow noopener">';
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$alt          = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
		$attr         = array(
			'class' => "icard-img-top embed-responsive-item w-100",
			'alt'   => $alt,
		);
		the_post_thumbnail( 'medium', $attr );
	endif;
	echo '<div class="card__caption">';
	the_title( '<h3 class="card-title" itemprop="name">', '</h3>' );
	echo '	</div>
		</a>';
}

function portfolio_same_posts( $same_post_tittle = 'примеры работ' ) {
	?>
    <section class="container">
        <h3><a href="<?php get_permalink() ?>"><?php echo $same_post_tittle ?></a></h3>
        <img class="arrow__down img-fluid"
             src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
        <div class="row portfolio__items">
			<?php
			$post_id = get_the_ID();
			$args    = array(
				'posts_per_page' => 2,
				'orderby'        => 'rand',
				'category_name'  => 'portfolio',
				'post__not_in'   => array( $post_id )
			);
			$query   = new WP_Query( $args );
			// Цикл
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
                    <div class="card col-6 p-0 m-0">
						<?php portfolio_thumbnail(); ?>
                    </div>
					<?php
				};
			};
			/* Возвращаем оригинальные данные поста. Сбрасываем $post. */
			wp_reset_postdata();
			?>
        </div>
    </section>
	<?php
}

function order_item( $atts, $content = null ) {
	ob_start();
	?>
    <div class='services__order'>
        <div class="row">
			<?php
			extract( shortcode_atts( array(
				"s_cat" => '',
				"alt"   => ''
			), $atts ) );
			global $post;
			$post->post_name;
			$args = array(
				'numberposts'      => 3,
				'category_name'    => sprintf( 'order-' . $atts['s_cat'] ),
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			);

			query_posts( $args );
			while ( have_posts() ) :
				the_post();
				?>

                <div class="col-12 col-md-4 card order_card" itemtype="http://schema.org/Product" itemscope>
                    <div class="embed-responsive embed-responsive-4by3" itemprop="offers"
                         itemtype="http://schema.org/Offer" itemscope>
                        <meta itemprop="availability" content="https://schema.org/InStock"/>
                        <meta itemprop="price"
                              content="<?php echo get_post_meta( get_the_ID(), 'dds_price', true ); ?>"/>
                        <meta itemprop="priceCurrency" content="BYN"/>
                        <meta itemprop="name" content="<?php echo esc_html( get_the_title() ); ?>"/>
                        <img src=" <?php echo get_the_post_thumbnail_url(); ?>"
                             itemprop="image"
                             class="card-img-top embed-responsive-item"
                             alt="<?php echo $atts['alt']; ?>">
                        <h4 class=" text-center" itemprop="name"><?php echo esc_html( get_the_title() ); ?> </h4>
                    </div>
                    <div class="">
                        <div class="card-title">
                            <h4 class=" text-center" itemprop="name"><?php echo esc_html( get_the_title() ); ?> </h4>
                        </div>
                        <div class="card_cost">
                            <p itemprop="price">Стоимость: от
								<?php echo get_post_meta( get_the_ID(), 'dds_price', true ); ?> BYN
                                <br>
                                Срок: от
								<?php echo get_post_meta( get_the_ID(), 'dds_time', true ); ?> недель
                            </p>
                        </div>
                        <button data-toggle="modal" data-target="#modal_ex" class="card_button btn btn-primary">
                            Заказать
                        </button>
                    </div>

                </div>
			<?php
			endwhile;
			wp_reset_query();

			?>
        </div>
    </div>
	<?php
	return ob_get_clean();
}

add_shortcode( 'shortcode_order', 'order_item' );

/*
 *
 * wp bootstrap slider
 *
 * */
//frontpage
add_action( 'dds_frontpage', 'dds_main_slider', 10 );
add_action( 'dds_frontpage', 'dds_main_about', 20 );
add_action( 'dds_frontpage', 'dds_main_services', 30 );
add_action( 'dds_frontpage', 'dds_main_portfolio', 40 );
add_action( 'dds_frontpage', 'dds_main_contactform', 50 );
add_action( 'dds_frontpage', 'dds_main_clients', 50 );

//services
add_action( 'dds_services', 'dds_main_services' );

//about
add_action( 'dds_about', 'dds_main_clients' );

//contacts
add_action( 'dds_contacts', 'dds_main_contactform' );

function dds_main_slider() {
	echo '<section class="carousel header__carousel slide d-none d-md-block" id="Carousel" data-ride="carousel">';
	echo '<div class="carousel-inner">';

	$args  = array(
		'category_name' => 'main-slider', //!!!!!category_name!!!!!!!
		'order'         => 'ASC',
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		$i = 0;
		while ( $query->have_posts() ) : $query->the_post();
			if ( $i === 0 ) {
				echo '<div class="carousel-item active">';
			} else {
				echo '<div class="carousel-item">';
			}
			echo '<div class="row carousel__bg justify-content-center align-content-end">';
			echo '<div class="col-3 align-self-center wow fadeInLeft">';
			the_title( '<h1 class="text-right" itemprop="name">', '</h1>' );
			echo '</div>';
			echo '<div class="col-9 wow fadeInRight">';

			carousel_thumbnail();

			echo '</div>';
			echo '</div>';
			echo '</div>';
			$i ++;
		endwhile;
	endif;
	wp_reset_postdata();
	echo '</div>';
	echo '<a class="carousel-control-prev" href="#Carousel" data-slide="prev" role="button">
        <img class="arrow" src="' . get_template_directory_uri() . '/img/icons/prev.svg" alt="дизайн меню">        
        <span class="sr-only">Previous</span></a>';
	echo '<a class="carousel-control-next" href="#Carousel" data-slide="next" role="button" >
        <img class="arrow" src="' . get_template_directory_uri() . '/img/icons/next-2.svg"  alt="дизайн меню">
        <span class="sr-only">Next</span ></a>
    </section >';
}

function dds_main_about() {
	?>
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
            <h2><a class="link__slow" href="#home__services">Делаем<br/>то, что<br/>любим.</a></h2>
            <img class="arrow__down" src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg"
                 alt="стрелка"/>
        </div>
    </section><!--конец блока о нас-->
	<?php
}

// todo с этим точно надо что-то делать
function dds_main_services() {
	?>
    <section id="home__services" class="container section__services">
        <div class="row services__container">
			<?php if ( have_posts() ) : query_posts( 'p=164' );
				while ( have_posts() ) : the_post();
					?>

                    <div class="col wow fadeInLeft" data-wow-offset="200" style="background-color: #F3EFEA;">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                            <div class="services__icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/services/icon-menu.svg"
                                     alt="">
                                <h3 class="text-center" itemprop="name"><?php the_title(); ?></h3>
                            </div>
                        </a>
                    </div>

                    <div class="col services__tags wow fadeInRight d-none d-sm-none d-md-flex" data-wow-offset="200">
                        <ul class="">
                            <li>#Дизайн меню</li>
                            <li>#Основное меню</li>
                            <li>#Сезонное меню</li>
                            <li>#Барные карты</li>
                            <li>#Тэйбл тенты</li>
                            <li>#Плейсметы</li>
                            <li>#Перевод меню</li>
                        </ul>
                    </div>
				<?php
				endwhile;
			endif;
			wp_reset_query(); ?>
        </div>
    </section>
    <section class="container">
        <div class="row services__container">
			<?php if ( have_posts() ) : query_posts( 'p=166' );
				while ( have_posts() ) : the_post();
					?>
                    <div class="col order-1 wow fadeInRight" data-wow-offset="200" style="background-color: #E1ECEF;">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                            <div class="services__icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/services/011-restaurant.svg"
                                     alt="">
                                <h3 class="text-center" itemprop="name">
									<?php the_title(); ?></h3>
                            </div>
                        </a>
                    </div>
                    <div class="col order-0 services__tags wow fadeInLeft d-none d-sm-none d-md-flex"
                         data-wow-offset="200">
                        <ul class="">
                            <li>#Фирменный стиль</li>
                            <li>#Логотип</li>
                            <li>#Афиша</li>
                            <li>#Рекламны баннер</li>
                            <li>#Оформление социальны сетей</li>
                            <li>#Плейсметы</li>
                            <li>#Перевод меню</li>
                        </ul>
                    </div>
				<?php endwhile;
			endif;
			wp_reset_query(); ?>
        </div>
    </section>
    <section class="container">
        <div class="row services__container">
			<?php if ( have_posts() ) : query_posts( 'p=168' );
				while ( have_posts() ) : the_post();
					?>
                    <div class="col wow fadeInLeft" data-wow-offset="200" style="background-color: #EFEFEF;">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                            <div class="services__icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/services/036-website.svg"
                                     alt="">
                                <h3 class="text-center" itemprop="name"><?php the_title(); ?></h3>
                            </div>
                        </a>
                    </div>
                    <div class="col services__tags wow fadeInRight d-none d-sm-none d-md-flex" data-wow-offset="200">
                        <ul class="">
                            <li>#Сайт доставки еды</li>
                            <li>#Интернет магазин</li>
                            <li>#Корпоративный сайт</li>
                            <li>#Landind‑page</li>
                            <li>#Сайт‑визитка</li>

                        </ul>
                    </div>
				<?php endwhile;
			endif;
			wp_reset_query(); ?>
        </div>
    </section>
	<?php
}

function dds_main_portfolio() {
	?>
    <section class="section__portfolio">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h2 itemprop="name"><a class="link__slow mt-5" href="#home__portfolio">Любим<br>то,
                            что<br>делаем.</a>
                    </h2>
                    <img class="arrow__down img-fluid"
                         src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!--        <div class="pad-40">-->
            <div id="home__portfolio">
                <div class="container">
                    <h2>Последние работы</h2>
                </div>
                <div class="row portfolio__container">
					<?php
					// параметры по умолчанию
					$q_args = array(
						'posts_per_page' => 12,
						'category_name'  => 'portfolio',
						'orderby'        => 'date',
						'order'          => 'DESC',
						'post_type'      => 'post',
					);
					$query  = new WP_Query( $q_args );
					while ( $query->have_posts() ) {
						$query->the_post();
						echo '<div class="card col-6 col-md-4 col-xl-3 p-0 m-0 embed-responsive-1by1">';
						portfolio_thumbnail();
						echo '</div>';
					}
					wp_reset_postdata();
					?>
                </div>
            </div>
        </div>
        <!--        больше работ-->
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
    </section>
	<?php
}

function dds_main_contactform() {
	?>
    <section class="container home__contactscont" id="home__contacts">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-10 offset-1 offset-md-2 col-md-8 justify-content-end">
				<?php if ( is_front_page() ) { ?>
                    <h2 class="text-right">Мы<br>всегда<br>готовы<br>к<br>сотрудничеству<br>
                        <img class="arrow__down align-self-end"
                             src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                    </h2>
				<?php } ?>
                <p class="text-right">Позвоните нам или отправьте сообщение<br>и мы сами свяжемся с Вами.</p>
            </div>
        </div>

        <div class="row home__contacts" itemscope itemtype="https://schema.org/Organization">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
                <ul class="row list__none">
                    <li class="col-12 col-md-4"> <?php phone_number(); ?> </li>
                    <li class="col-12 col-md-4"> <?php e__mail(); ?>  </li>
                    <li class="col-12 col-md-4">
                        <ul class="navigation__social">
							<?php social_media(); ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="w-100"></div>
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
                <div class="form-group">
					<?php echo do_shortcode( '[contact-form-7 id="416" title="Основная"]' ) ?>
                </div>
            </div>
    </section><!--конец формы контактов-->
	<?php

}

function dds_main_clients() {
	?>
    <section class="home__clients" style="background-color: #efecec">
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
					'posts_per_page'   => 16,
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

				$query = new WP_Query( $args );
				while ( $query->have_posts() ) {
					$query->the_post();
					clients_thumbnail();
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
    </section>
	<?php

}


$dds_page = 'myparameters.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите
/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function dds_options() {
	global $dds_page;
	add_theme_page( 'Контакты', 'Контакты', 'manage_options', $dds_page, 'dds_option_page' );
}

add_action( 'admin_menu', 'dds_options' );

function dds_option_page() {
	global $dds_page;
	?>
    <div class="wrap">
    <h2>Дополнительные параметры сайта</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
		<?php
		settings_fields( 'dds_options' ); // меняем под себя только здесь (название настроек)
		do_settings_sections( $dds_page );
		?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>"/>
        </p>
    </form>
    </div><?php
}

function dds_option_settings() {
	global $dds_page;

	register_setting( 'dds_options', 'dds_options', 'dds_validate_settings' ); // true_options

	add_settings_section( 'dds_section_1', 'Контакты', '', $dds_page );
	add_settings_section( 'dds_section_2', 'Social Media', '', $dds_page );
	add_settings_section( 'dds_section_3', 'Messengers', '', $dds_page );


	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'phone_text',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'phone_text\']; </code> ',
		'label_for' => 'phone_text'
	);
	add_settings_field( 'Phone', '№ Телефона', 'dds_option_display_settings', $dds_page, 'dds_section_1', $dds_field_params );

	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'phone_link',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'phone_link\']; </code> ',
		'label_for' => 'phone_link'
	);
	add_settings_field( 'phone_link', 'phone_link', 'dds_option_display_settings', $dds_page, 'dds_section_1', $dds_field_params );

	$dds_field_params = array(
		'type'      => 'email',
		'id'        => 'email',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'email\']; </code> ',
		'label_for' => 'email'
	);
	add_settings_field( 'e-mail', 'e-mail', 'dds_option_display_settings', $dds_page, 'dds_section_1', $dds_field_params );

	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'social_be',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'social_be\']; </code> ',
		'label_for' => 'social_be'
	);
	add_settings_field( 'social_behance', 'Behance', 'dds_option_display_settings', $dds_page, 'dds_section_2', $dds_field_params );


	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'social_vk',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'social_vk\']; </code> ',
		'label_for' => 'social_vk'
	);
	add_settings_field( 'vk', 'VK', 'dds_option_display_settings', $dds_page, 'dds_section_2', $dds_field_params );

	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'social_inst',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'social_inst\']; </code> ',
		'label_for' => 'social_inst'
	);
	add_settings_field( 'Instagram', 'Instagram', 'dds_option_display_settings', $dds_page, 'dds_section_2', $dds_field_params );

	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'msg_tg',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'msg_tg\']; </code> ',
		'label_for' => 'msg_tg'
	);
	add_settings_field( 'Telegram', 'Telegram', 'dds_option_display_settings', $dds_page, 'dds_section_3', $dds_field_params );

	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'msg_vb',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'msg_vb\']; </code> ',
		'label_for' => 'msg_vb'
	);
	add_settings_field( 'Viber', 'Viber', 'dds_option_display_settings', $dds_page, 'dds_section_3', $dds_field_params );

	$dds_field_params = array(
		'type'      => 'text',
		'id'        => 'msg_sk',
		'desc'      => '<code> echo get_option( \'dds_options\' )[\'msg_sk\']; </code> ',
		'label_for' => 'msg_sk'
	);
	add_settings_field( 'Skype', 'Skype', 'dds_option_display_settings', $dds_page, 'dds_section_3', $dds_field_params );
}

function dds_option_display_settings( $args ) {
	global $type;
	global $id;
	global $desc;
	extract( $args );

	$option_name = 'dds_options';

	$o = get_option( $option_name );

	switch ( $type ) {
		case 'text':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			break;
		case 'email':
			$o[ $id ] = esc_attr( stripslashes( $o[ $id ] ) );
			echo "<input class='regular-text' type='email' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
			echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			break;
	}
}

function dds_validate_settings( $input ) {
	foreach ( $input as $k => $v ) {
		$valid_input[ $k ] = trim( $v );

		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}

	return $valid_input;
}


require_once get_template_directory() . '/f/DDS_Walker_Nav_Menu.php';

function category__header( $category_title ) {
	?>
    <header class="portfolio__header row bg_dotted">
        <div class="col-12">

            <div class="row align-items-end">
                <div class="col-2 bg-white offset-3">
					<?php echo '<h2 class="text-left" itemprop="name">' . $category_title . '</h2>'; ?>
                    <div class="d-flex justify-content-start">
                        <img class="arrow__down img-fluid"
                             src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                        <img class="arrow__down img-fluid"
                             src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                        <img class="arrow__down img-fluid"
                             src="<?php echo get_template_directory_uri(); ?>/img/icons/download.svg" alt="стрелка">
                    </div>
                </div>
            </div>

        </div>
    </header>
	<?php
}

function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ) {

	echo ' <div class="container">';
//	echo ' <div class="row">';
	echo '<div class="my-3">';
	$kb = new Kama_Breadcrumbs;
	echo $kb->get_crumbs( $sep, $l10n, $args );
	echo '</div>';
//	echo '</div>';
	echo '</div>';
}
