<?php get_header(); ?>
<?php $blog_layout = apply_filters( 'egovt_theme_sidebar','' ); 
	$blog_template = apply_filters( 'egovt_blog_template', '' );

	$class_blog_template = $blog_template == 'classic' ? 'default' : $blog_template;
?>
	<div class="wrap_site <?php echo esc_attr($blog_layout); ?>">
		<div id="main-content" class="main">

			<?php
				if( $blog_template == 'grid_small' || $blog_template == 'grid_medium' || $blog_template == 'grid_sidebar' ){
					$class_blog_template = $blog_template . ' blog-grid';
				}
			?>
			
			<div class="<?php echo esc_attr( $class_blog_template ); ?>">

				<?php if( $blog_template == 'grid_small' || $blog_template == 'grid_medium' || $blog_template == 'grid_sidebar' ) { ?>
				<div class="ova-wrap-grid">
				<?php } ?>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				        <?php switch ($blog_template) {
				        	case 'default':
				        		get_template_part( 'content/blog', 'default' );
				        		break;

				        	case 'classic':
				        		get_template_part( 'content/blog', 'default' );
				        		break;

			        		case 'grid_small':
				        		get_template_part( 'content/blog', 'grid' );
				        		break;

			        		case 'grid_medium':
				        		get_template_part( 'content/blog', 'grid' );
				        		break;

			        		case 'grid_sidebar':
				        		get_template_part( 'content/blog', 'grid' );
				        		break;

				        	default:
				        		get_template_part( 'content/blog', 'default' );
				        		break;
				        }?>
				<?php endwhile; ?>

				<?php if( $blog_template == 'grid_small' || $blog_template == 'grid_medium' || $blog_template == 'grid_sidebar' ) { ?>
				</div>
				<?php } ?>
			</div>

		    <div class="pagination-wrapper">
		        <?php egovt_pagination_theme(); ?>
			</div>

			<?php else : ?>
			        <?php get_template_part( 'content/content', 'none' ); ?>
			<?php endif; ?>
			
		</div> <!-- #main-content -->
		<?php get_sidebar(); ?>
	</div> <!-- .wrap_site -->

<?php get_footer(); ?>