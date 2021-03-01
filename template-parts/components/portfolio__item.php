<div class="entry-header">
	<div class="row">
		<div class="col-3 align-self-center">
			<h1 class="text-right"> <?php echo get_the_title(); ?></h1>
		</div>
		<div class="col-9">
			<?php

			if (has_post_thumbnail()) {
				$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

				$thumb_alt = trim(strip_tags( $attachment->post_excerpt ));
				$thumb_title = trim(strip_tags( $attachment->post_title ));

				echo '<img class="img-fluid w-100" src="'.$thumb[0].'" alt="'.$thumb_alt.'" title="'.$thumb_title.'" />';
			}
			?>
		</div>
	</div>

</div><!-- .entry-header -->

