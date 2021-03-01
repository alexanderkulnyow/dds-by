<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//добавление alt и title для миниатюр записей end
function clients_thumbnail() {
	if ( has_post_thumbnail() ) :

		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		?>
		<img class="img-fluid"
		     src="<?php echo $thumb[0] ?>"/>
	<?php

	endif;
}

function portfolio_post_thumbnail() {
	if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

		?>
		<a href="<?php the_permalink(); ?>" rel="nofollow noopener">
			<img class="icard-img-top embed-responsive-1by1 w-100" src="<?php echo $thumb[0] ?>"
			     alt="" title=""/>
			<div class="card__caption">
				<h3 class="card-title" itemprop="name"><?php echo get_the_title(); ?></h3>
			</div>
		</a>
		<?php
	}
}
