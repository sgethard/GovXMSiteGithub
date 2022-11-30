<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */



add_action( 'cmb2_init', 'egovt_metaboxes_default' );
function egovt_metaboxes_default() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'ova_met_';
    

        /* Give Forms Settings *********************************************************************************/
        /* *******************************************************************************/
        $give_forms_settings = new_cmb2_box( array(
            'id'           => 'give_form',
            'title'        => esc_html__( 'Extra Fields Give Forms Settings', 'ova-framework' ),
            'object_types' => array('give_forms'), // Post type
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true, // Show field names on the left
        ) );

        // Video or Audio
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Link audio or video', 'ova-framework' ),
                'desc' => esc_html__( 'Insert link audio or video use for video/audio', 'ova-framework' ),
                'id'   => $prefix . 'media_give',
                'type' => 'oembed',
            ) );

            // Gallery image
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Gallery image', 'ova-framework' ),
                'desc' => esc_html__( 'image in gallery post format', 'ova-framework' ),
                'id'   => $prefix . 'gallery_give',
                'type' => 'file_list',
            ) );

            // End Date
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'End Date', 'ova-framework' ),
                'desc' => esc_html__( 'Insert End Date', 'ova-framework' ),
                'id'   => $prefix . 'end_date_give',
                'type' => 'text_date_timestamp',
                'date_format' => 'Y-m-d',
            ) );

            // End Date
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Feature', 'ova-framework' ),
                'id'   => $prefix . 'feature_give',
                'type' => 'checkbox',
            ) );

              // Organizer 
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Organizer Name:', 'ova-framework' ),
                'id'   => $prefix . 'name_form_give',
                'type' => 'text',
            ) );
        
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Email:', 'ova-framework' ),
                'id'   => $prefix . 'email_form_give',
                'type' => 'text',
            ) );
              
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Phone:', 'ova-framework' ),
                'id'   => $prefix . 'phone_form_give',
                'type' => 'text',
            ) );
               
            $give_forms_settings->add_field( array(
                'name' => esc_html__( 'Website:', 'ova-framework' ),
                'id'   => $prefix . 'web_form_give',
                'type' => 'text',
            ) );





        

   
}

