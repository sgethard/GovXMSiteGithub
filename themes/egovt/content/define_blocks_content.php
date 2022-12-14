<?php

add_filter( 'egovt_header_bg_customize', 'egovt_header_bg_customize_404_page', 10, 1 );
function egovt_header_bg_customize_404_page( $bg ){

	if( is_404() ) {
	  	$bg = get_theme_mod( 'background_header_404_page', '' );
	}

	return $bg;
}

/* This is functions define blocks to display post */

if ( ! function_exists( 'egovt_content_thumbnail' ) ) {
  function egovt_content_thumbnail( $size ) {
    if ( has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image') )  :
      the_post_thumbnail( $size, array('class'=> 'img-responsive' ));
    endif;
  }
}

if ( ! function_exists( 'egovt_postformat_video' ) ) {
  function egovt_postformat_video( ) { ?>
    <?php if(has_post_format('video') && wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true))){ ?>
	    <div class="js-video postformat_video">
	        <?php echo wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true)); ?>
	    </div>
    <?php } ?>
  <?php }
}

if ( ! function_exists( 'egovt_postformat_audio ') ) {
  function egovt_postformat_audio( ) { ?>
    <?php if(has_post_format('audio') && wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true))){ ?>
	    <div class="js-video postformat_audio">
	        <?php echo wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true)); ?>
	    </div>
    <?php } ?>
  <?php }
}

if ( ! function_exists( 'egovt_content_title' ) ) {
  function egovt_content_title() { ?>

    <?php if ( is_single() ) : ?>
      <h1 class="post-title">
          <?php the_title(); ?>
      </h1>
    <?php else : ?>
      <h2 class="post-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>
      <?php endif; ?>

 <?php }
}


if ( ! function_exists( 'egovt_content_meta' ) ) {
  function egovt_content_meta( ) { ?>
	    <span class="post-meta-content">

		    <span class=" post-date">
		        <span class="left"><i class="fa fa-clock-o"></i></span>
		        <span class="right ova-meta-general"><?php the_time( get_option( 'date_format' ));?></span>
		    </span>

		    <?php if(has_category( )) { ?>
		    	<span class="wp-categories">
		    		<span class="slash ova-meta-general"><?php esc_html_e(' - In', 'egovt') ?></span>
				    <span class=" categories">
				        <span class="right"><?php the_category('&sbquo;&nbsp;'); ?></span><!-- end right -->             
				    </span><!-- end categories -->
		    	</span><!-- end wp-category -->
			<?php } ?>

			<span class="wp-author">
		    	 <span class="slash ova-meta-general"><?php esc_html_e('By', 'egovt') ?></span>
			    <span class=" post-author">
			        <span class="right"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></span>
			    </span>
		    </span>

		    <span class=" comment">
		        <span class="right">   
		        	<i data-feather="message-square"></i>                 
		            <?php comments_popup_link(
		            	esc_html__(' 0', 'egovt'), 
		            	esc_html__(' 1', 'egovt'), 
		            	' % ',
		            	'',
                  		esc_html__( 'Comment off', 'egovt' )
		            ); ?>
		        </span>                
		    </span>
		</span>
  <?php }
}

if ( ! function_exists( 'egovt_content_meta_date' ) ) {
  function egovt_content_meta_date( ) { ?>
	    <span class="post-meta-content-date">
		    <span class=" post-date">
		        <span class="right second_font"><?php the_time( get_option( 'date_format' ));?></span>
		    </span>
		</span>
  <?php }
}


if ( ! function_exists( 'egovt_content_meta_blog_grid' ) ) {
  function egovt_content_meta_blog_grid( ) { ?>
	    <span class="post-meta-content-grid">
		    <?php if(has_category( )) { ?>
		    	<span class="wp-categories">
		    		<span class="slash ova-meta-general"><?php esc_html_e('In', 'egovt') ?></span>
				    <span class=" categories">
				        <span class="right"><?php the_category('&sbquo;&nbsp;'); ?></span><!-- end right -->             
				    </span><!-- end categories -->
		    	</span><!-- end wp-category -->
			<?php } ?>

		    <span class=" comment">
		        <span class="right">   
		        	<i data-feather="message-square"></i>
		            <?php comments_popup_link(
		            	esc_html__(' 0', 'egovt'), 
		            	esc_html__(' 1', 'egovt'), 
		            	' % ',
		            	'',
                  		esc_html__( 'Comment off', 'egovt' )
		            ); ?>
		        </span>                
		    </span>

		</span>
  <?php }
}





if ( ! function_exists( 'egovt_content_body' ) ) {
  function egovt_content_body( ) { ?>
  	<div class="post-excerpt">
		<?php if(is_single()){
		    the_content();
		    wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'egovt' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '%',
				'separator'   => '',
			) );             
		}else{
			the_excerpt();
		}?>
	</div>

	<?php 
	}
}

if ( ! function_exists( 'egovt_content_readmore' ) ) {
  function egovt_content_readmore( ) { ?>
  	<div class="post-footer">
		<div class="egovt-post-readmore">
		    <a class="btn-readmore second_font" href="<?php the_permalink(); ?>">
		    	<?php  esc_html_e('Continue Reading', 'egovt'); ?>
		    	<i data-feather="arrow-right"></i>
		    </a>
		</div>
	</div>
 <?php }
}

if ( ! function_exists( 'egovt_content_readmore_classic' ) ) {
  function egovt_content_readmore_classic( ) { ?>
  	<div class="post-footer">
		<div class="egovt-post-readmore">
		    <a class="btn-readmore second_font" href="<?php the_permalink(); ?>">
		    	<?php  esc_html_e('Continue Reading', 'egovt'); ?>
		    	<i data-feather="arrow-right" ></i>
		    </a>
		</div>
	
		<?php if( has_filter( 'ova_share_social' ) ){ ?>
			<div class="socials-inner">
				<div class="share-social">
					<span class="egovt-svg-icon">
						<i data-feather="share-2"></i>
					</span>
					<?php 
						$link = get_the_permalink();
						$title = get_the_title(); 
					?>
						        			
					<?php echo apply_filters( 'ova_share_social', $link, $title  ); ?>
				</div>
			</div>
		<?php } ?>

	</div>
 <?php }
}

if ( ! function_exists( 'egovt_content_tag' ) ) {
  function egovt_content_tag( ) { ?>
	
	    <footer class="post-tag">
	        <?php if(has_tag()){ ?>
	            <div class="post-tags">
	            	<span class="ovatags second_font"><?php esc_html_e('Tags: ', 'egovt'); ?></span>
	                <?php the_tags('','',''); ?>
	            </div>
	        <?php } ?>

	        <?php if( has_filter( 'ova_share_social' ) ){ ?>
		        <div class="share_social">
		        	<span class="ova_label second_font"><?php esc_html_e('Share Article ', 'egovt'); ?></span>
		        	<?php echo apply_filters('ova_share_social', get_the_permalink(), get_the_title() ); ?>
		        </div>
	        <?php } ?>
	    </footer>
	
 <?php }
}

if ( ! function_exists( 'egovt_content_gallery' ) ) {
 	function egovt_content_gallery( ) {
 			
 			$post_id = get_the_ID();

			$gallery = get_post_meta($post_id, 'ova_met_file_list', true) ? get_post_meta($post_id, 'ova_met_file_list', true) : '';

			$carousel_id = 'carousel'.$post_id.'gallery';

		    $k = 0;
		    if($gallery){ $i=0; ?>

		        <div id="<?php echo esc_attr($carousel_id); ?>" class="carousel slide" data-ride="carousel">

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	<?php foreach ($gallery as $key => $value) { $active_dot = ( $k == 0 ) ? 'active' : ''; ?>
					    <div class="carousel-item <?php echo esc_attr($active_dot); $k++; ?>">
					      <img class="img-responsive" src="<?php  echo esc_attr($value); ?>" alt="<?php the_title_attribute(); ?>">
					    </div>
				   	<?php } ?>
				   </div>

					<a class="carousel-control-prev" href="#<?php echo esc_attr( $carousel_id ) ?>" role="button" data-slide="prev">
						<i data-feather="chevron-left"></i>
					</a>
					<a class="carousel-control-next" href="#<?php echo esc_attr( $carousel_id ) ?>" role="button" data-slide="next">
						<i data-feather="chevron-right"></i>
					</a>

				</div>

		       
		        <?php
		    }
	}
}






//Custom comment List:
if ( ! function_exists( 'egovt_theme_comment' ) ) {
function egovt_theme_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <article class="comment_item" id="comment-<?php comment_ID(); ?>">

         <header class="comment-author">
         	<?php echo get_avatar($comment,$size='80', $default = 'mysteryman' ); ?>
         </header>

         <section class="comment-details">

            <div class="author-name">

            	<div class="name">
            		<?php printf('%s', get_comment_author_link()) ?>	
            	</div>

            	<div class="date">
            		<?php printf(get_comment_date()) ?>	
            	</div>

	        </div> 

            <div class="comment-body clearfix comment-content">
			    <?php comment_text() ?>

			    <div class="ova_reply">
		            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		            <?php edit_comment_link( esc_html__( '(Edit)', 'egovt' ), '  ', '' );?>
	            </div>
			</div>



        </section>

          <?php if ($comment->comment_approved == '0') : ?>
             <em><?php esc_html_e('Your comment is awaiting moderation.', 'egovt') ?></em>
             <br />
          <?php endif; ?>
        
     </article>
<?php
}
}








