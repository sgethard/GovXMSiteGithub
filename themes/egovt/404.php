<?php get_header();  ?>

<div class="egovt_404_page">

	<img src="<?php echo EGOVT_URI . '/assets/img/img_404.png' ?>" alt="<?php esc_html__( '404', 'egovt' ) ?>">
	<h1 class="title">
		<?php echo esc_html__( 'Ohh! Page Not Found', 'egovt' ) ?>
	</h1>
	<p class="desc-404">
		<?php echo esc_html__( 'It looks like nothing was found at this location. Click the button below to return home.', 'egovt' ) ?>
	</p>
	<?php get_search_form(); ?>
	<div class="egovt-go-home">
		<a href="<?php echo esc_url( home_url() ); ?>">
			<?php echo esc_html__( 'Back to Home', 'egovt' ) . '<i data-feather="arrow-right"></i>' ?>
		</a>
	</div>
	
   
</div>

<?php get_footer(); ?>