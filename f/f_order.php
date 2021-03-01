<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
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
			//			foreach ( $args as $key => $value ) {
			//				echo "$key = $value <br />";
			//			}
			//			foreach ( $atts as $key => $value ) {
			//				echo "$key = $value <br />";
			//			}
			//			echo $atts->alt;
			//			echo $atts['s_cat'];
			query_posts( $args );
			while ( have_posts() ) :
				the_post();
				?>

                <div class="col-12 col-md-4 card order_card">
                    <div class="embed-responsive embed-responsive-4by3">
                        <img src=" <?php echo get_the_post_thumbnail_url(); ?>"
                             class="card-img-top embed-responsive-item"
                             alt="<?php echo $atts['alt']; ?>">
                    </div>
                    <div class="card-title">
                        <h4 class=" text-center"><?php echo esc_html( get_the_title() ); ?> </h4>
                    </div>
                    <div class="card_cost">
                        <p>Стоимость: от <?php echo get_post_meta( get_the_ID(), 'dds_price', true ); ?> BYN
                            <br>
                            Срок: от <?php echo get_post_meta( get_the_ID(), 'dds_time', true ); ?> недель</p>
                    </div>
                    <button data-toggle="modal" data-target="#modal_ex" class="card_button btn btn-primary">
                        Заказать
                    </button>
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
