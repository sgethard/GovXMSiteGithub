<?php if ( !defined( 'ABSPATH' ) ) exit();

get_header();

$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$donation_type = get_theme_mod( 'archive_donation_show_sidebar', '' );

if ( isset($_GET['donation_type']) ) {
	$donation_type = $_GET['donation_type'];
}
$id = get_the_ID();

$give_type  = get_the_terms( $id, 'give_forms_category') ? get_the_terms( $id, 'give_forms_category') : '' ;


if ( $give_type != '' ) {

		$value_give_type = get_queried_object()->term_id;;


	$args_base = array(
		'post_type' => 'give_forms',
		'paged' => $paged,
		'tax_query' => array(
			array(
				'taxonomy' => 'give_forms_category',
				'field'    => 'term_id',
				'terms'    => $value_give_type,
			),
		),
	);


if( $donation_type == 'type_5'){ 

	$args_base = array(
		'post_type' => 'give_forms',
		'paged' => $paged,
		'posts_per_page' => -1,
		'tax_query' => array(
		array(
				'taxonomy' => 'give_forms_category',
				'field'    => 'term_id',
				'terms'    => $value_give_type,
			),
		),
	
);
						
} 

}

$give_donation = new WP_Query( $args_base );



?>

<div class="container">
	<div class="archive_give_donation content_related content_archive <?php echo esc_attr($donation_type); ?>">
		<div class="summary">
			<?php if( $donation_type == 'type_2' || $donation_type == 'type_3'|| $donation_type == 'type_5' ){ ?>
		<div class="title_archive second_font">
			<?php esc_html_e( 'See Our Campains', 'egovt' ); ?>
		
		</div>
		<div class="title_archive2 second_font">
			<?php echo  'Each donation is essential to </br> help others always' ; ?>
		</div>
	<?php } ?>
			<div class="wrap_summary">
				<?php if($give_donation->have_posts() ) : while ( $give_donation->have_posts() ) : $give_donation->the_post(); ?>

					<?php
					$id = get_the_ID();

					$ova_met_gallery_give = get_post_meta( $id, 'ova_met_gallery_give', true ) ? get_post_meta( $id, 'ova_met_gallery_give', true ) : '';
					$ova_met_media_give = get_post_meta( $id, 'ova_met_media_give', true ) ? get_post_meta( $id, 'ova_met_media_give', true ) : 'javascript:;';

					$show_goal = give_get_meta( $id, '_give_goal_option', true );
					$charihope_progress_stats = apply_filters( 'charihope_progress_stats', $id );


					?>
					<div class="give_detail">

						<div class="image_future">
							<div class="thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<div class="media">
								<ul style="display: none;">
									<?php if ( $ova_met_gallery_give ) {
										foreach ( $ova_met_gallery_give as $key => $value ) { ?>
											<li><a href="<?php echo esc_attr( $value ); ?>" data-fancybox="<?php echo esc_attr( $id ); ?>"><img src="<?php echo esc_attr( $value ); ?>" alt="<?php echo esc_attr( $key ); ?>"></a></li>
										<?php }
									} ?>
								</ul>
								<a href="javascript:;" data-fancybox-trigger="<?php echo esc_attr( $id ); ?>" class="gallery"><i class="icon_images"></i></a>
								<a href="<?php echo esc_attr( $ova_met_media_give ); ?>" class="video"><i class="icon_film"></i></a>
							</div>
							
						</div>
						
						<div class="detail_body">

							<h3 class="second_font title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p class="desc"><?php echo esc_html( get_the_excerpt() ); ?></p>

							<?php if ($show_goal != 'disabled') { ?>
								<div class="progress">
									<?php if ($charihope_progress_stats['progress'] < '50') { ?>
										<span class="wrap_percentage_1" style="width: <?php echo esc_attr( $charihope_progress_stats['progress'].'%' ); ?>; ">
											<span class="percentage"><?php echo esc_attr( $charihope_progress_stats['progress'].'%' ); ?></span>
										</span>
									<?php } elseif ( $charihope_progress_stats['progress'] >= '50') { ?>
										<span class="wrap_percentage_2" style="width: <?php echo esc_attr( $charihope_progress_stats['progress'].'%' ); ?>; ">
											<span class="percentage"><?php echo esc_attr( $charihope_progress_stats['progress'].'%' ); ?></span>
										</span>
									<?php } ?>
									
								</div>
							<?php } ?>

							

							<div class="raised">
											<div class="income">
												<span class="second_font"><?php esc_html_e( 'Raised', 'egovt' ); ?></span>
												<span><?php echo esc_html( $charihope_progress_stats['actual'] ); ?></span>
											</div>

											<span class="ingo"><?php esc_html_e( '/', 'egovt' ); ?></span>

											<?php if ($show_goal != 'disabled') { ?>
												<div class="goal">
													<span class="second_font"><?php esc_html_e( 'Goal', 'egovt' ); ?></span>
													<span><?php echo esc_html( $charihope_progress_stats['goal'] ); ?></span>
												</div>
											<?php } ?>
										</div>

							<div class="donate_remaining">
								<a href="<?php the_permalink(); ?>" class="donate second_font"><?php esc_html_e( 'Donate Now', 'egovt' ); ?></a>
							</div>

						</div>
					</div>
				<?php endwhile; 
				else: ?>
					<div class="search_not_found">
						<?php esc_html_e( 'Not Found Give Donation', 'egovt' ); ?>
					</div>

				<?php endif; wp_reset_postdata(); wp_reset_query(); ?>
			</div>

			<?php if( $donation_type != 'type_5'){ ?>
		
				<?php egovt_pagination_theme($give_donation); ?>
				

			<?php } ?>
			
		</div>


		<div class="sidebar sidebar_give">
			<?php
			do_action( 'give_before_single_form_summary' );
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>