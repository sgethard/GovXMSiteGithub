<?php $sticky_class = is_sticky()?'sticky':''; ?>

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
		           <?php the_content(''); /* Display content  */ ?>
		    </div>
	</article>

<?php }else{ ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
		<div class="wrap-article">
			
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
		        	<a href="<?php echo get_the_permalink(); ?> " title="<?php esc_html_e('Post Media', 'egovt'); ?>">
		        		<?php egovt_content_thumbnail('egovt_portfolio_thumb'); /* Display thumbnail of post */ ?>
		        	</a>
		        </div>

	        <?php } ?>
			<div class="evgovt-content">
		        <div class="post-meta-date">
			        <?php egovt_content_meta_date(); /* Display Date */ ?>
			    </div>

			    <div class="post-meta-grid">
			        <?php egovt_content_meta_blog_grid(); /* Display Category, Comment */ ?>
			    </div>

		        <div class="post-title">
			            <?php egovt_content_title(); /* Display title of post */ ?>
			    </div>	        

			    <?php if(!is_single()){ ?> 
			            <?php egovt_content_readmore(); /* Display read more button in category page */ ?>
			    <?php }?>
			</div>
		</div>



	</article>


<?php } ?>