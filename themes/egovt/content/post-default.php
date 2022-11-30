<div class="single-post-egovt">

	<?php $sticky_class = is_sticky()?'sticky':''; ?>

	<?php $show_title = get_theme_mod( 'show_hide_title', 'yes' ); ?>

	<?php if( has_post_format('link') ){ ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
			
				<?php
				        $link = get_post_meta( $post->ID, 'format_link_url', true );
				        $link_description = get_post_meta( $post->ID, 'format_link_description', true );
				        
				        if ( is_single() ) {
				                printf( '<h1 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h1>',
				                        $link,
				                        get_the_title()
				                );
				        } else {
				                printf( '<h2 class="entry-title"><a href="%1$s" target="blank">%2$s</a></h2>',
				                        $link,
				                        get_the_title()
				                );
				        }
				?>
				<?php
				        printf( '<a href="%1$s" target="blank">%2$s</a>',
				                $link,
				                $link_description
				        );
				?>
		</article>

	<?php }elseif ( has_post_format('aside') ){ ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
				<div class="post-body">
			           <?php the_content(); /* Display content  */ ?>
			    </div>
		</article>

	<?php }else{ ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >

				<?php if( has_post_format('audio') ){ ?>

					 <div class="post-media">
			        	<?php egovt_postformat_audio(); /* Display video of post */ ?>
			        </div>

				<?php }elseif(has_post_format('gallery')){ ?>

					<?php egovt_content_gallery(); /* Display gallery of post */ ?>

				<?php }elseif(has_post_format('video')){ ?>

					 <div class="post-media">
			        	<?php egovt_postformat_video(); /* Display video of post */ ?>
			        </div>

				<?php }elseif(has_post_thumbnail()){ ?>

			        <div class="post-media">
			        	<?php egovt_content_thumbnail('full'); /* Display thumbnail of post */ ?>
			        </div>

		        <?php } ?>


		        <div class="post-meta">
			        <?php egovt_content_meta(); /* Display Date, Author, Comment */ ?>
			    </div>

			   
				<?php if(  $show_title== 'yes' ){ ?>
					<div class="post-title">
						<?php egovt_content_title(); /* Display title of post */ ?>
					</div>
				<?php } ?>

			    <div class="post-body">
			    	<div class="post-excerpt">
			            <?php egovt_content_body(); /* Display content of post or intro in category page */ ?>
			        </div>
			    </div>

			    <?php if(!is_single()){ ?> 
			            <?php egovt_content_readmore(); /* Display read more button in category page */ ?>
			    <?php }?>

			    <?php if(is_single()){ ?>
			    <?php egovt_content_tag(); /* Display tags, category */ ?>
			    <?php } ?>

			    <?php 
			    
			    $author_id = get_the_author_meta( 'ID' );
			    if( get_the_author_meta( 'user_description' ) != '' ){ ?>
					<div class="blog-details-author">
						<div class="ova-img-author">
							<?php echo get_avatar($author_id, $size='80', $default = 'mysteryman' ); ?>
						</div>
						<div class="ova-des-author">
							<h4><?php echo get_the_author_meta( 'display_name' ); ?></h4>
							<p><?php echo get_the_author_meta( 'user_description' ); ?></p>
						</div>
					</div>
				<?php } ?>



				<div class="ova-next-pre-post">
					<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();
					?>
					
					<?php
					if($prev_post) {
						?>
						<a class="pre" href="<?php echo esc_attr(get_permalink($prev_post->ID)); ?>">
							<span class="num-1">
								<span class="icon"><i class="arrow_carrot-left"></i></span>
							</span>
							<span  class="num-2">
								<span class="second_font text-label"><?php esc_html_e('Previous', 'egovt'); ?></span>
								<span  class="second_font title" ><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
							</span>
						</a>

						<a class="ova-slash" href="<?php echo get_post_type_archive_link('post') ?>" title="<?php esc_html_e('Slash', 'egovt'); ?>">
							<span></span>
							<span></span>
							<span></span>
						</a>
						<?php
					}
					?>

					
					
					<?php
					if($next_post) {
						?>
						<a class="next" href="<?php echo esc_attr(get_permalink($next_post->ID)); ?> ">
							<span class="num-1">
								<span class="icon" ><i class="arrow_carrot-right"></i></span>
							</span>
							<span  class="num-2">
								<span class="second_font text-label"><?php esc_html_e('Next', 'egovt'); ?></span>
								<span class="second_font title" ><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
							</span>
						</a>
						<?php if( ! $prev_post ) { ?>
						<a class="ova-slash" href="<?php echo get_post_type_archive_link('post'); ?>" title="<?php esc_html_e('Slash', 'egovt'); ?>">
							<span></span>
							<span></span>
							<span></span>
						</a>
						<?php } ?>
						<?php
					}
					?>
				</div>

		</article>

	<?php } ?>
</div>
