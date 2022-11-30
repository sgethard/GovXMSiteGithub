<?php
add_action('wp_enqueue_scripts', 'egovt_theme_scripts_styles');
add_action('wp_enqueue_scripts', 'egovt_theme_script_default');


function egovt_theme_scripts_styles() {

    // enqueue the javascript that performs in-link comment reply fanciness
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' ); 
    }
    
    /* Add Javascript  */
    wp_enqueue_script( 'bootstrap', EGOVT_URI.'/assets/libs/bootstrap/js/bootstrap.bundle.min.js' , array( 'jquery' ), null, true );
    wp_enqueue_script( 'select2', EGOVT_URI.'/assets/libs/select2/select2.min.js' , array( 'jquery' ), null, true );

    wp_enqueue_script( 'feather', EGOVT_URI.'/assets/libs/feather.min.js' , array( 'jquery' ), null, true );

    wp_enqueue_script( 'fancybox', EGOVT_URI.'/assets/libs/fancybox-master/dist/jquery.fancybox.min.js',  array( 'jquery' ), null, true );

    wp_enqueue_script( 'jquery-ui-tabs' );
    wp_enqueue_script( 'jquery-ui-datepicker' );

     wp_enqueue_style( 'fancybox', EGOVT_URI.'/assets/libs/fancybox-master/dist/jquery.fancybox.min.css', array(), null );

     // Load js when product detail
    if( is_singular( 'product' ) ){
        if( is_ssl() ){
          wp_enqueue_script('prettyphoto', EGOVT_URI.'/assets/libs/prettyphoto/jquery.prettyPhoto_https.js', array('jquery'),null,true);  
        }else{
          wp_enqueue_script('prettyphoto', EGOVT_URI.'/assets/libs/prettyphoto/jquery.prettyPhoto.js', array('jquery'),null,true);
        }
        wp_enqueue_style('prettyphoto', EGOVT_URI.'/assets/libs/prettyphoto/css/prettyPhoto.css', array(), null);
    }


    wp_enqueue_script('egovt-script', EGOVT_URI.'/assets/js/script.js', array('jquery'),null,true);


    /* Add Css  */
    wp_enqueue_style('bootstrap', EGOVT_URI.'/assets/libs/bootstrap/css/bootstrap.min.css', array(), null);

    wp_enqueue_style('linearicons', EGOVT_URI.'/assets/libs/linearicons/style.css', array(), null);
    

    wp_enqueue_style( 'select2', EGOVT_URI. '/assets/libs/select2/select2.min.css', array(), null );

    wp_enqueue_style('v4-shims', EGOVT_URI.'/assets/libs/fontawesome/css/v4-shims.min.css', array(), null);
    wp_enqueue_style('fontawesome', EGOVT_URI.'/assets/libs/fontawesome/css/all.min.css', array(), null);
    wp_enqueue_style('elegant-font', EGOVT_URI.'/assets/libs/elegant_font/ele_style.css', array(), null);

    wp_enqueue_style( 'jquery-ui', EGOVT_URI.'/assets/libs/jquery-ui/jquery-ui.min.css',  array(), null );


    
    
    
    
    wp_enqueue_style('egovt-theme', EGOVT_URI.'/assets/css/theme.css', array(), null);

    

}

function egovt_theme_script_default(){

    if ( is_child_theme() ) {
      wp_enqueue_style( 'egovt-parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css', array(), null );
    }

    wp_enqueue_style( 'egovt-style', get_stylesheet_uri(), array(), null );
}