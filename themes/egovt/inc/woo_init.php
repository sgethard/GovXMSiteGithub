<?php
/*
 * Remove title archive shop page
 */

add_filter( 'woocommerce_show_page_title', 'egovt_woocommerce_hide_title_shop_page' );
function egovt_woocommerce_hide_title_shop_page( $param ){
	return false;
}


/*
 * Add div ova-shop-wrap
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', function(){
	?>
	<div class="ova-shop-wrap">
	<?php
	wc_get_template( 'global/wrapper-start.php' );
}, 10 );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action( 'woocommerce_sidebar', function(){
	wc_get_template( 'global/sidebar.php' );
	?>
	</div>
	<?php
}, 10);

/*
 * Remove breadcrum woo
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


/*
 * Button add to cart up to title shop page
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 5 );

/*
 * add link title shop page
 */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', function(){
	echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
}, 10 );



/*
 * Pagination change next, pre text
 */

function egovt_woocommerce_pagination_args( $array ) { 
    $array_next_pre = array(
        'prev_text' => '<i data-feather="chevron-left"></i>' . esc_html__( 'Previous', 'egovt' ), 
        'next_text' => esc_html__( 'Next', 'egovt' ) . '<i data-feather="chevron-right"></i>', 
    );

    $agrs = array_merge( $array, $array_next_pre );

    return $agrs; 
}; 
add_filter( 'woocommerce_pagination_args', 'egovt_woocommerce_pagination_args' );

/* Change number product related */
add_filter( 'woocommerce_output_related_products_args', 'egovt_change_number_product_related' );
function egovt_change_number_product_related( $agrs ){
	$agrs_setting = [
		'posts_per_page' => 3,
		'columns'        => 3,
	];
	$agrs = array_merge( $agrs, $agrs_setting );
	return $agrs;
}

/* add data prettyPhoto in gallery */
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'egovt_single_product_image_thumbnail_html', 1, 2 );

function egovt_single_product_image_thumbnail_html($html, $attachment_id){
	global $product;

	$post_thumbnail_id = $product->get_image_id();
	
	if ( $product->get_image_id() ) {

		$img_url = wp_get_attachment_image_url ($attachment_id,'large' );

		$image_title 	= esc_attr( get_the_title( $post_thumbnail_id ) );
		$html = '<div class="woocommerce-product-gallery__image"><a href="'.esc_url( $img_url ).'" data-gal="prettyPhoto[gal]"><img src="'.esc_url( $img_url ).'" alt="'.esc_attr( $image_title ).'"></a></div>';

	} else {
		$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image"  />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'egovt' ) );
			$html .= '</div>';
	}
	return $html;

} 


add_action( 'woocommerce_login_form', function(){
	?>
	<p class="form-row woocommerce-form-row rememberme_lost_password">
		<span class="rememberme-egovt">
				<label class="second_font woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme" for="rememberme">
				<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'egovt' ); ?></span>
			</label>
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		</span>
		<span class="lost_password_egovt woocommerce-LostPassword lost_password">
			<a class="second_font" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'egovt' ); ?></a>
		</span>
		
	</p>

	<p class="form-row woocommerce-form-row">
		<button type="submit" class="second_font woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'egovt' ); ?>"><?php esc_html_e( 'Log in', 'egovt' ); ?></button>
	</p>
	
	<?php
	
}, 5 );

add_action( 'woocommerce_before_customer_login_form', function(){
	?>
	<ul class="egovt-login-register-woo">
		<li class="active">
			<a href="javascript:void(0)" class="second_font" data-type="login">
				<?php esc_html_e( 'Login', 'egovt' ); ?>
			</a>
		</li>
		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
		<li>
			<a href="javascript:void(0)" class="second_font"  data-type="register">
				<?php esc_html_e( 'Register', 'egovt' ); ?>
			</a>
		</li>
		<?php endif ?>
	</ul>
	<?php
}, 100 );

?>