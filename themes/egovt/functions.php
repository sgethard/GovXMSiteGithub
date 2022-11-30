<?php
	if(defined('EGOVT_URL') == false) 	define('EGOVT_URL', get_template_directory());
	if(defined('EGOVT_URI') == false) 	define('EGOVT_URI', get_template_directory_uri());

	load_theme_textdomain( 'egovt', EGOVT_URL . '/languages' );
	
	// require libraries, function
	require_once( EGOVT_URL.'/inc/init.php' );

	// Add js, css
	require_once( EGOVT_URL.'/extend/add_js_css.php' );
	
	// require walker menu
	require_once( EGOVT_URL.'/inc/ova_walker_nav_menu.php' );

	require_once( EGOVT_URL.'/inc/woo_init.php' );
	

	// register menu, widget
	require_once( EGOVT_URL.'/extend/register_menu_widget.php' );

	// require content
	require_once( EGOVT_URL.'/content/define_blocks_content.php' );
	
	// require breadcrumbs
	require_once( EGOVT_URL.'/extend/breadcrumbs.php' );

	// Hooks
	require_once( EGOVT_URL.'/inc/class_hook.php' );

	// Widgets
	require_once( EGOVT_URL.'/widgets/init.php' );

	// Metahox
	require_once( EGOVT_URL.'/metabox/init.php' );
	
	
	
	
	/* Customize */
	
	if( current_user_can('customize') ){
	    require_once( EGOVT_URL.'/customize/custom-control/google-font.php' );
	    require_once( EGOVT_URL.'/customize/custom-control/heading.php' );
	    require_once( EGOVT_URL.'/customize/class-customize.php' );
	}
	
    require_once( EGOVT_URL.'/customize/render-style.php' );
    
    
    
	
	// Require metabox
	if( is_admin() ){
		// Require TGM
		require_once( EGOVT_URL.'/install_resource/active_plugins.php' );		
	}

	class GIVE_templates_loader2 {
    
  
    public function __construct() {
        add_filter( 'template_include', array( $this, 'template_loader2' ) );
    }

    

    public function template_loader2( $template ) {

        $post_type = isset($_REQUEST['post_type'] ) ? $_REQUEST['post_type'] : get_post_type();

       
        
        
     if( is_tax( 'give_forms_category' ) ||  get_query_var( 'give_forms_category' ) != '' ){

            $paged = get_query_var('paged') ? get_query_var('paged') : '1';
            
            query_posts( '&give_forms_category='.get_query_var( 'give_forms_category' ).'&paged=' . $paged );
               get_template_part( 'content/content', 'taxonomy' );
            return false;
        }

      if(  $post_type == 'give_forms' ){



			if (  is_post_type_archive( 'give_forms' )  ) { 

				get_template_part( 'archive', 'give_forms' );
				return false;

			} else if ( is_single() ) {

				get_template_part( 'give/single', 'give-form' );
				return false;

			}
		}

     if ( $post_type !== 'give_forms' ){
			return $template;
		}
     

    


            }
}

new GIVE_templates_loader2();



	

