<?php 

function egovt_breadcrumbs_header(){
    if( ! ( class_exists( 'woocommerce' ) && is_woocommerce() ) ){
        if( get_post_meta(  egovt_get_current_id() ,'egovt_met_show_breadcrumbs', true ) != 'no' ){
            return apply_filters( 'egovt_breadcrumbs_customize', 'egovt_breadcrumbs' );
        }
    }else{
        $args = array(
            'delimiter' => '<li class="li_separator"><span class="separator"></span></li>',
            'wrap_before' => '<div id="breadcrumbs" ><ul class="breadcrumb">',
            'wrap_after' => '</ul></div>',
            'before' => '<li>',
            'after' => '</li>',
            'home' => esc_html__( 'Home', 'egovt' )
        );

        woocommerce_breadcrumb( apply_filters( 'egovt_woocommerce_breadcrumb_customize', $args ) );
    }
}

add_filter('egovt_breadcrumbs_customize', 'egovt_breadcrumbs');
function egovt_breadcrumbs() {
	$html = '<div id="breadcrumbs">';
	       
	        	$separator = '<li class="li_separator"><span class="separator"></span></li>';
		        $home = esc_html__('Home', 'egovt');
		        $before = '<li>';
		        $after = '</li>'; 
			

				$html .= '<ul class="breadcrumb">';
					global $post;
			        global $wp_query;
			        
			        $homeLink = home_url('/');
			        $type=get_post_type();

			        
			        $html .= '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $separator . ' ';
			        
			        
			        if ( is_category() ) {
				        
				        $cat_obj = $wp_query->get_queried_object();
				        $thisCat = $cat_obj->term_id;
				        $thisCat = get_category($thisCat);
				        $parentCat = get_category($thisCat->parent);
				        if ($thisCat->parent != 0) $html .=  get_category_parents($parentCat, TRUE, $separator);
				        $html .= wp_kses_post( $before) . single_cat_title('', false) . '' . $after;

			        } elseif ( is_day() ) {

				        $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $separator . ' ';
				        $html .= '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>' . $separator . ' ';
				        $html .= wp_kses_post($before ) . esc_html__('Archive by date', 'egovt').' ' . get_the_time('d') . '"' . $after;

			        } elseif ( is_month() ) {

				        $html .= '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $separator . ' ';
				        $html .= wp_kses_post($before) . esc_html__('Archive by month', 'egovt').' ' . get_the_time('F') . '"' . $after;

			        } elseif ( is_year() ) {

			        	$html .= wp_kses_post($before) . esc_html__('Archive by year', 'egovt').' ' . get_the_time('Y') . '"' . $after;

			        } elseif ( is_single() && !is_attachment() ) {

				        if ( get_post_type() != 'post' ) {
					        $post_type = get_post_type_object(get_post_type());
					        $slug = $post_type->rewrite;
					        $html .= '<li><a href="' . $homeLink .  $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>' . $separator . ' ';
					        $html .= wp_kses_post($before) . get_the_title() . $after;
				        } else {
					        $cat = get_the_category(); $cat = $cat[0];
					        $html .= ' ' . get_category_parents($cat, TRUE, ' ' . $separator . ' ') . ' ';
					        $html .= wp_kses_post( $before ) . '' . get_the_title() . ' ' . $after;
				        }
			        }elseif ( is_search()) {
			            $html .= wp_kses_post( $before ) . esc_html__('Search results for', 'egovt').' ' . get_search_query() . '"' . $after;
			        }elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

				        $post_type = get_post_type_object(get_post_type());

				        if ( is_archive() ) {
				        	$html .= get_the_archive_title() ? wp_kses_post( $before ) . get_the_archive_title() . $after : '';
				        } else {
				        	$html .= $post_type ? wp_kses_post( $before ) . $post_type->labels->singular_name . $after : '';
				        }

			        } elseif ( is_attachment() ) {

				        $parent_id  = $post->post_parent;
				        $breadcrumbs = array();
				        while ($parent_id) {
					        $page = get_page($parent_id);
					        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					        $parent_id    = $page->post_parent;
				        }
				        $breadcrumbs = array_reverse($breadcrumbs);
				        foreach ($breadcrumbs as $crumb) $html .= ' ' . $crumb . ' ' . $separator . ' ';
				        $html .= wp_kses_post( $before ) . '' . get_the_title() . '' . $after;

			        }elseif ( is_page() && !$post->post_parent ) {

			        	$html .= wp_kses_post( $before ) . '' . get_the_title() . '' . $after;

			        } elseif ( is_page() && $post->post_parent ) {

				        $parent_id  = $post->post_parent;
				        $breadcrumbs = array();
				        while ($parent_id) {
					        $page = get_page($parent_id);
					        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					        $parent_id    = $page->post_parent;
				        }
				        $breadcrumbs = array_reverse($breadcrumbs);
				        foreach ($breadcrumbs as $crumb) $html .= ' ' . $crumb . ' ' . $separator . ' ';
			        	$html .= wp_kses_post( $before ) . '' . get_the_title() . '' . $after;

			        }elseif ( is_tag() ) {
			        	$html .= wp_kses_post( $before ) . esc_html__('Archive by tag', 'egovt').' ' . single_tag_title('', false) . '"' . $after;
			        } elseif ( is_author() ) {
			        global $author;
			        $userdata = get_userdata($author);
			        	$html .= wp_kses_post( $before ) . esc_html__('Articles posted by', 'egovt').' ' . $userdata->display_name . '"' . $after;
			        } elseif ( is_home() ){
			        	$html .= wp_kses_post( $before ) . esc_html__('Blog', 'egovt').'&nbsp;' . $after;
			        }elseif ( is_404() ) {
			        	$html .= wp_kses_post( $before ) . esc_html__('You got it Error 404 not Found', 'egovt').'&nbsp;' . $after;
			        }
			        if ( get_query_var('paged') ) {
				        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $html .= ' ';
				        
				        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) $html .= '';
			        }
					$html .= '</ul>';
	      
	$html .= '</div>';

	$args = array(
	    'a' => array(
	        'href' => array(),
	        'title' => array()
	    ),
	    'div'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'ul'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'li'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'span'	=> array(
	    	'id'	=> array(),
	    	'class'	=> array(),
	    ),
	    'br' => array(),
	    'em' => array(),
	    'strong' => array(),
	);

	return wp_kses( $html, $args );

}