<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

$id = get_the_ID();

$ova_met_media_give = get_post_meta( $id, 'ova_met_media_give', true ) ? get_post_meta( $id, 'ova_met_media_give', true ) : '';
$ova_met_gallery_give = get_post_meta( $id, 'ova_met_gallery_give', true ) ? get_post_meta( $id, 'ova_met_gallery_give', true ) : '';
$ova_met_contact_form_give = get_post_meta( $id, 'ova_met_contact_form_give', true ) ? get_post_meta( $id, 'ova_met_contact_form_give', true ) : '';
$ova_met_name_form_give = get_post_meta( $id, 'ova_met_name_form_give', true ) ? get_post_meta( $id, 'ova_met_name_form_give', true ) : '';
$ova_met_email_form_give = get_post_meta( $id, 'ova_met_email_form_give', true ) ? get_post_meta( $id, 'ova_met_email_form_give', true ) : '';
$ova_met_phone_form_give = get_post_meta( $id, 'ova_met_phone_form_give', true ) ? get_post_meta( $id, 'ova_met_phone_form_give', true ) : '';
$ova_met_web_form_give = get_post_meta( $id, 'ova_met_web_form_give', true ) ? get_post_meta( $id, 'ova_met_web_form_give', true ) : '';

$show_goal = give_get_meta( $id, '_give_goal_option', true );
$charihope_progress_stats = apply_filters( 'charihope_progress_stats', $id );

$show_content = give_get_meta( $id, '_give_display_content', true );
$content = get_post_meta( $id, '_give_form_content', true );

$charihope_count_donor = apply_filters( 'charihope_count_donor', $id);

$end_date = get_post_meta( $id, 'ova_met_end_date_give', true ) ? get_post_meta( $id, 'ova_met_end_date_give', true ) : '0';
$format_end_date = date("Y-m-d H:i:s", $end_date);


$interval = intval($end_date) - time();

$days_left = floor($interval / (60 * 60 * 24)) +1;

$charihope_count_donor = apply_filters( 'charihope_count_donor', $id);

?>


<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>
	<div class="sidebar sidebar_give">
		<?php
		do_action( 'give_before_single_form_summary' );
		?>
	</div>

	<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'summary entry-summary' ); ?>">
		<div class="ova_media">
			<?php the_post_thumbnail($id); ?>

			<p class="count_donor">
							<?php echo esc_html( $charihope_count_donor ); ?>
							<?php 
								if( $charihope_count_donor == '1') {
									esc_html_e( 'Donor', 'egovt' );
								}else{
									esc_html_e( 'Donors', 'egovt' );
								} ?>
			</p>
			
			<div class="date_social">
				<div class="due_date" data-date="<?php echo esc_attr( $format_end_date ); ?>">
				</div>
			</div>
		</div>


		
		<div class="donation">

			<?php 
				$give_type  = !is_wp_error( get_the_terms( $id, 'give_forms_category') ) ? get_the_terms( $id, 'give_forms_category') : '' ;

				$value_give_type = array();
				if ( $give_type != '' ) {
					foreach ( $give_type as $value ) {
						$value_give_type[] = $value->term_id ? '<a class="give_type" href="'.get_term_link($value->term_id).'">' .$value->name. '</a>': "";
						

					}
				}
			?>

			<?php if( $end_date || !empty(array_filter($value_give_type)) ){ ?>

				<div class="days_left">

					<?php if( $end_date ){ ?>
						
					 	<i data-feather="map-pin"></i>

						<div class="donate_remaining second_font">

							<?php if ($days_left > 0) { ?>
								<?php if ($days_left == '1' ) { ?>
									<div class="time_remaining">
										<?php esc_html_e( $days_left .' day left', 'egovt' ); ?>
									</div>
								<?php } else {?>
									<div class="time_remaining">
										<?php esc_html_e( $days_left .' days left', 'egovt' ); ?>
									</div>
								<?php } ?>

							<?php } elseif ($days_left == 0) { ?>
								<div class="time_remaining">
									<?php esc_html_e( 'In day', 'egovt' ); ?>
								</div>
							<?php } else { ?>
								<div class="time_remaining">
									<?php esc_html_e( 'Close', 'egovt' ); ?>
								</div>
							<?php } ?>
						</div>

					<?php } ?>

					<?php if ( !empty(array_filter($value_give_type)) ) { ?>
						<span  class="second_font">
							<?php esc_html_e( '-In', 'egovt' ); ?>
						</span>

						<div class="post_cat second_font">
							<?php echo implode(', ', $value_give_type); ?>
						</div>

					<?php } ?>

				</div>

			<?php } ?>

			<?php if (isset($charihope_progress_stats)) { ?>

				<div class="ova_info_donation">

					<?php if ( $show_goal != 'disabled' ) { ?>
						<div class="progress">

						

							<span style="width: <?php echo esc_attr( $charihope_progress_stats['progress'].'%' ); ?>">
									
								<?php if ($show_goal != 'disabled') { ?>
									<span class="percentage">
										<?php echo esc_html( $charihope_progress_stats['progress'] . '%' ); ?>
									</span>
								<?php } ?>
							
							</span>
						</div>
					<?php } ?>

					<div class="raised">
						<div class="income">
							<span class="second_font"><?php esc_html_e( 'Raised:', 'egovt' ); ?></span>
							<span><?php echo esc_html( $charihope_progress_stats['actual'] ); ?></span>
						</div>

						<?php if ($show_goal != 'disabled') { ?>
							<div class="goal">
								<span  class="second_font"><?php esc_html_e( 'Goal:', 'egovt' ); ?></span>
								<span><?php echo esc_html( $charihope_progress_stats['goal'] ); ?></span>
							</div>
						<?php } ?>
					</div>

				</div>
			<?php } ?>


        


			<?php
			remove_action( 'give_single_form_summary', 'give_template_single_title', 5 );
			remove_action( 'give_pre_form_output', 'give_form_content', 10 );
			remove_action( 'give_pre_form', 'give_show_goal_progress', 10 );
			do_action( 'give_single_form_summary' );

			/* Add action */
			add_action( 'give_single_form_summary', 'give_template_single_title', 5 );
			add_action( 'give_pre_form_output', 'give_form_content', 10, 2 );
			add_action( 'give_pre_form', 'give_show_goal_progress', 10, 2 );

			?>
		</div>


		<div class="give_form_info">
			<ul class="form_tab">

				<?php if( $content != '' ){ ?>
					<li>
						<a href="#description" class="second_font">
							<?php esc_html_e( 'Description', 'egovt' ); ?>
						</a>
					</li>
				<?php } ?>

				<?php if ( $ova_met_gallery_give ) { ?>
					<li>
						<a href="#gallery" class="second_font">
							<?php esc_html_e( 'Photos', 'egovt' ); ?>
						</a>
					</li>
				<?php } ?>
				
				<li>
					<a href="#donor" class="second_font">
						<?php esc_html_e( 'Donor', 'egovt' ); ?>
						<sup class="count_donor">
							<?php echo esc_html( $charihope_count_donor ); ?>
						</sup>
					</a>
				</li>
				
				<?php if( $ova_met_name_form_give != '' || $ova_met_email_form_give != '' || $ova_met_phone_form_give != '' || $ova_met_web_form_give != '' ){ ?>	
					<li>
						<a href="#contact" class="second_font">
							<?php esc_html_e( 'Organization Details', 'egovt' ); ?>
						</a>
					</li>
				<?php } ?>

			</ul>

			<?php if ($show_content != 'disabled' && $content != '') { ?>
				<div id="description">
					<p><?php echo do_shortcode( $content ); ?></p>
				</div>
			<?php } ?>
			


			<div id="donor">
				<?php echo do_shortcode( '[give_donor_wall form_id="'.$id.'"]' ); ?>
			</div>

			<?php if( $ova_met_name_form_give != '' || $ova_met_email_form_give != '' || $ova_met_phone_form_give != '' || $ova_met_web_form_give != '' ){ ?>	
				<div id="contact">
						<div class="event_row">
							<div class="col_contact">
								<div class="contact">
									<ul class="info-contact">
										<?php if( $ova_met_name_form_give != '' ) : ?>
											<li>
											<span class="second_font"><?php esc_html_e('Organizer Name:','egovt'); ?></span>
											<span class="info"><?php echo esc_html($ova_met_name_form_give); ?></span>
										</li>
										<?php endif; ?>
										<?php if( $ova_met_phone_form_give != '') : ?>
										<li>
											<span class="second_font"><?php esc_html_e('Phone:','egovt'); ?></span>
											<a href="tel:<?php echo esc_attr( $ova_met_phone_form_give ) ?>" target="_blank" class="info"><?php echo esc_html( $ova_met_phone_form_give); ?></a>
										</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div class="col_contact">
								<div class="contact">
									<ul class="info-contact">
										<?php if( $ova_met_email_form_give != '') : ?>
										<li>
											<span class="second_font"><?php esc_html_e('Email:','egovt'); ?></span>
											<a href="mailto:<?php echo esc_attr( $ova_met_email_form_give ) ?>" target="_blank" class="info"><?php echo esc_html($ova_met_email_form_give); ?></a>
										</li>
										<?php endif; ?>
										<?php if( $ova_met_web_form_give != '') : ?>
										<li>
											<span class="second_font"><?php esc_html_e('Website:','egovt'); ?></span>
											<a href="<?php echo esc_url( $ova_met_web_form_give ) ?>" target="_blank" class="info"><?php echo esc_html($ova_met_web_form_give); ?></a>
										</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
			  			</div>
				</div>
			<?php } ?>

			<?php if ( $ova_met_gallery_give ) { ?>
				<div id="gallery">
					<ul>
						<?php foreach ( $ova_met_gallery_give as $key => $value ) { ?>
							<li><a href="<?php echo esc_attr( $value ); ?>" data-fancybox="<?php echo esc_attr( $id ); ?>"><img src="<?php echo esc_attr( $value ); ?>" alt="<?php echo esc_attr( $key ); ?>"></a></li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>


			<div class="icon_give_form">

				<div class="share_social icon_give">
					     <span class="second_font"><?php esc_html_e('Share this Page','egovt'); ?></span>
						<?php echo apply_filters( 'ova_share_social', get_the_permalink(), get_the_title() ); ?>
					</div>
			</div>

			

			<?php
			$give_type  = !is_wp_error( get_the_terms( $id, 'give_forms_category') ) ? get_the_terms( $id, 'give_forms_category') : '' ;

			$value_give_type = array();

			if ( $give_type != '' ) {

				foreach ( $give_type as $value ) 
					$value_give_type[] = $value->term_id ;




				$args_base = array(
								'post_type' => 'give_forms',
								'post__not_in' => array($id),
			                    'showposts'=>2, // Số bài viết bạn muốn hiển thị.
			                    'tax_query' => array(
						        	array(
						        		'taxonomy' => 'give_forms_category',
						        		'field'    => 'term_id',
						        		'terms'    => $value_give_type,
						        	),
			        			) );
			}else{
				$args_base = array(
								'post_type' => 'give_forms',
								'post__not_in' => array($id),
			                    'showposts'=>2, // Số bài viết bạn muốn hiển thị.
			                    );
			}

			$give_donation = new WP_Query( $args_base );


		

			?>

<div class="container">
	<div class="archive_give_donation content_related ">
		   <span class="second_font title_related"><?php esc_html_e('Related Causes','egovt'); ?></span>
		<div class="summary">
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
								<a href="javascript:;" data-fancybox-trigger="<?php echo esc_attr( $id ); ?>" class="gallery" title="<?php esc_html_e( 'Donation Gallery', 'egovt' );?>"><i class="icon_images"></i></a>
								<a href="<?php echo esc_attr( $ova_met_media_give ); ?>" class="video" title="<?php esc_html_e( 'Donation Video', 'egovt' );?>"><i class="icon_film"></i></a>
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
			
		</div>


	
	</div>
</div>

    		 	<?php  if ( comments_open($id) || get_comments_number($id) ) { ?>
				<div id="comment">
					<?php comments_template(); ?>
				</div>
			<?php } ?>





	</div> <!-- End Content -->
	

</div>

